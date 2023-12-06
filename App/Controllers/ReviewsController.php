<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\Review;

class ReviewsController extends AControllerBase
{

    public function index(): Response
    {
        $reviews = Review::getAll();
        return $this->html($reviews);
    }

    public function delete() {
        $id = $this->request()->getValue('id');
        $reviewToDelete = Review::getOne($id);
        if ($reviewToDelete) {
            $reviewToDelete->delete();
        }
        return $this->redirect($this->url('reviews.index'));

    }

    public function store() {
        $id = $this->request()->getValue('id');
        $review = ( $id ? Review::getOne($id) : new Review());

        $review->setTitle($this->request()->getValue('title'));
        $review->setContent($this->request()->getValue('content'));
        $review->setAuthorId($this->request()->getValue('authorId'));
        $review->save();
        return $this->redirect($this->url('reviews.index'));

    }

    public function create() {
        return $this->html(new Review(), viewName: 'create.form');
    }

    public function edit() {
        $id = $this->request()->getValue('id');
        $reviewToEdit = Review::getOne($id);
        return $this->html($reviewToEdit, viewName: 'create.form');
    }

}