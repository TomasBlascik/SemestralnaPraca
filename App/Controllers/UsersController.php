<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class UsersController extends AControllerBase
{

    public function index(): Response
    {
        return $this->html(new User(), viewName: 'create.form');
    }

    public function store() {
        $user = new User();

        $user->setLoginName($this->request()->getValue('loginName'));
        $user->setPassword($this->request()->getValue('password'));
        $user->save();
        return $this->redirect($this->url('reviews.index'));
    }
}