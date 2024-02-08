<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\RedirectResponse;
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

        $id = (int)$this->request()->getValue('id');
        $review = ( $id ? Review::getOne($id) : new Review());

        $review->setTitle($this->request()->getValue('title'));
        $review->setContent($this->request()->getValue('content'));
        $review->setAuthorId($this->request()->getValue('authorId'));

        $formErrorsTitle = $this->formErrorsTitle();
        $formErrorsContent = $this->formErrorsContent();

        //kontrola
        if ((count($formErrorsTitle) +
            count($formErrorsContent)) > 0) {
            return $this->html(
                [
                    'review' => $review,
                    'errorsTitle' => $formErrorsTitle,
                    'errorsContent' => $formErrorsContent
                ], 'create.form'
            );
        } else {
            $review->save();
            return $this->redirect($this->url('reviews.index'));
        }
    }

    public function create(): Response {
        $errors = [];
        return $this->html(
            [
                'review' => new Review(),
                'errors' => $errors
            ], 'create.form'
        );
    }

    public function edit(): Response {
        $id = $this->request()->getValue('id');
        $reviewToEdit = Review::getOne($id);
        $errors = [];
        return $this->html(
            [
                'review' => $reviewToEdit,
                'errors' => $errors
            ], 'create.form'
        );

    }

    private function formErrorsTitle(): array {
        $errors = [];
        $title = trim($this->request()->getValue('title'));
        if (empty($title)) {
            $errors[] = "Title can't be empty.";
        }
        if (strlen($title) >= 100) {
            $errors[] = "Title must be shorter than 100 characters.";
        }
        return $errors;
    }

    private function formErrorsContent(): array {
        $errors = [];
        $content = trim($this->request()->getValue('content'));
        if (empty($content)) {
            $errors[] = "Content can't be empty.";
        }
        return $errors;
    }



}