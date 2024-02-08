<?php

namespace App\Controllers;

use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Models\User;

class UsersController extends AControllerBase
{

    public function index(): Response
    {
        $errors = [];
        return $this->html(
            [
                'user' => new User(),
                'errors' => $errors
            ], 'create.form'
        );
    }

    public function store() {
        $user = new User();

        $user->setLoginName($this->request()->getValue('loginName'));
        $user->setPassword(password_hash($this->request()->getValue('password'), PASSWORD_DEFAULT));

        $formErrorsLoginName = $this->formErrorsLoginName();
        $formErrorsPassword = $this->formErrorsPassword();

        //kontrola
        if ((count($formErrorsLoginName) +
             count($formErrorsPassword)) > 0) {
            return $this->html(
                [
                    'user' => $user,
                    'errorsLoginName' => $formErrorsLoginName,
                    'errorsPassword' => $formErrorsPassword
                ], 'create.form'
            );
        } else {
            $user->save();
            return $this->redirect($this->url("reviews.index"));
        }
    }

    private function formErrorsLoginName(): array {
        $errors = [];
        $loginName = trim($this->request()->getValue('loginName'));
        $user = User::getAll("loginName = ?", [$loginName]);

        if (empty($loginName)) {
            $errors[] = "Login can't be empty.";
        }
        if (count($user) != 0) {
            $errors[] = "Login name already exists.";
        }


        return $errors;
    }

    private function formErrorsPassword(): array {
        $errors = [];
        $password = trim($this->request()->getValue('password'));
        if (empty($password)) {
            $errors[] = "Password can't be empty.";
        }
        return $errors;
    }


}

