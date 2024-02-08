<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
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
            $movieToDelete->delete();
        }
        return $this->redirect($this->url("movies.index"));
    }

    public function store() {
        $id = (int)$this->request()->getValue('id');
        $movie = ( $id ? Movie::getOne($id) : new Movie());

        $movie->setName($this->request()->getValue('name'));
        $movie->setDirector($this->request()->getValue('director'));
        $movie->setYear($this->request()->getValue('year'));

        $formErrorsName = $this->formErrorsName();
        $formErrorsDirector = $this->formErrorsDirector();
        $formErrorsYear = $this->formErrorsYear();

        //kontrola
        if ((count($formErrorsName) +
             count($formErrorsDirector) +
             count($formErrorsYear)) > 0) {
            return $this->html(
                [
                    'movie' => $movie,
                    'errorsName' => $formErrorsName,
                    'errorsDirector' => $formErrorsDirector,
                    'errorsYear' => $formErrorsYear
                ], 'create.form'
            );
        } else {
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

}