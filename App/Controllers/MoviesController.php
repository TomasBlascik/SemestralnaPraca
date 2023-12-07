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
        $id = $this->request()->getValue('id');
        $movie = ( $id ? Movie::getOne($id) : new Movie());

        $test = $this->request()->getValue('year');
        if ($test > 0 && $test <=  date("Y")) {
            $movie->setName($this->request()->getValue('name'));
            $movie->setDirector($this->request()->getValue('director'));
            $movie->setYear($this->request()->getValue('year'));
            $movie->save();
        }
        return $this->redirect($this->url("movies.index"));

    }

    public function create() {
        return $this->html(new Movie(), viewName: 'create.form');
    }

    public function edit() {
        $id = $this->request()->getValue('id');
        $movieToEdit = Movie::getOne($id);
        return $this->html($movieToEdit, viewName: 'create.form');
    }

}