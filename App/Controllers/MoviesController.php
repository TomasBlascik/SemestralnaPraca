<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Helpers\FileStorage;
use App\Models\Movie;

class MoviesController extends AControllerBase
{

    public function index(): Response
    {
        $movies = Movie::getAll();
        return $this->html($movies);
    }

    public function delete() {
        $id = $this->request()->getValue('id');
        $movieToDelete = Movie::getOne($id);
        if ($movieToDelete) {
            FileStorage::deleteFile($movieToDelete->getPicture());
            $movieToDelete->delete();
        }
        return $this->redirect($this->url("movies.index"));
    }

    public function store() {
        $id = (int)$this->request()->getValue('id');
        $oldPicture = "";
        if ($id > 0) {
            $movie = Movie::getOne($id);
            $oldPicture = $movie->getPicture();
        } else {
            $movie = new Movie();
        }

        $movie->setName($this->request()->getValue('name'));
        $movie->setDirector($this->request()->getValue('director'));
        $movie->setYear($this->request()->getValue('year'));
        $movie->setPicture($this->request()->getValue('picture'));

        $formErrorsName = $this->formErrorsName();
        $formErrorsDirector = $this->formErrorsDirector();
        $formErrorsYear = $this->formErrorsYear();
        $formErrorsPicture = $this->formErrorsPicture();

        //kontrola
        if ((count($formErrorsName) +
             count($formErrorsDirector) +
             count($formErrorsYear) +
             count($formErrorsPicture)) > 0) {
            return $this->html(
                [
                    'movie' => $movie,
                    'errorsName' => $formErrorsName,
                    'errorsDirector' => $formErrorsDirector,
                    'errorsYear' => $formErrorsYear,
                    'errorsPicture' => $formErrorsPicture,
                ], 'create.form'
            );
        } else {
            if ($oldPicture != "") {
                FileStorage::deleteFile($oldPicture);
            }

            $newPicture = "";
            if ($this->request()->getFiles()['picture']['name'] != "") {
                $newPicture = FileStorage::saveFile($this->request()->getFiles()['picture']);
            }

            $movie->setPicture($newPicture);
            $movie->save();
            return $this->redirect($this->url("movies.index"));
        }
    }

    public function create() {
        $errors = [];
        return $this->html(
            [
                'movie' => new Movie(),
                'errors' => $errors
            ], 'create.form'
        );
    }

    public function edit() {
        $id = $this->request()->getValue('id');
        $movieToEdit = Movie::getOne($id);
        $errors = [];
        return $this->html(
            [
                'movie' => $movieToEdit,
                'errors' => $errors
            ], 'create.form'
        );
    }

    private function formErrorsName(): array {
        $errors = [];
        $name = trim($this->request()->getValue('name'));
        if (empty($name)) {
            $errors[] = "Name can't be empty.";
        }
        if (strlen($name) >= 100) {
            $errors[] = "Title must be shorter than 100 characters.";
        }
        return $errors;
    }

    private function formErrorsDirector(): array {
        $errors = [];
        $director = trim($this->request()->getValue('director'));
        if (empty($director)) {
            $errors[] = "Director can't be empty.";
        }
        return $errors;
    }

    private function formErrorsYear(): array {
        $errors = [];
        $year = trim($this->request()->getValue('year'));
        if (empty($year)) {
            $errors[] = "Year can't be empty.";
        }
        if (($year < 1900) || ($year > date('Y'))) {
            $errors[] = "Year has to be between 1900 and current year.";
        }
        return $errors;
    }

    private function formErrorsPicture(): array {
        $errors = [];
        $pictureName = $this->request()->getFiles()['picture']['name'];
        $pictureType = $this->request()->getFiles()['picture']['type'];
        $pictureSize = $this->request()->getFiles()['picture']['size'];
        $MB = 1048576;

        if ($pictureName != "" && !in_array($pictureType, ['image/jpeg', 'image/png'])) {
            $errors[] = "Picture has be JPG or PNG.";
        }
        if ($pictureSize > ($MB)) {
            $errors[] = "Maximum picture size is 1MB.";
        }
        return $errors;
    }

}