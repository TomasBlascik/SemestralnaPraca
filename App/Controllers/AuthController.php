<?php

namespace App\Controllers;

use App\Config\Configuration;
use App\Core\AControllerBase;
use App\Core\Responses\Response;
use App\Core\Responses\ViewResponse;

/**
 * Class AuthController
 * Controller for authentication actions
 * @package App\Controllers
 */
class AuthController extends AControllerBase
{
    /**
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->redirect(Configuration::LOGIN_URL);
    }

    /**
     * Login a user
     * @return Response
     */
    public function login(): Response
    {
        $formData = $this->app->getRequest()->getPost();
        $logged = null;
        if (isset($formData['submit'])) {
            $logged = $this->app->getAuth()->login($formData['login'], $formData['password']);
            if ($logged) {
                return $this->redirect($this->url("reviews.index"));
            }
        }

        if ($logged === false) {
            $errorsMessage = "Wrong login or password.";
            $formErrorsLogin = $this->formErrorsLogin();
            $formErrorsPassword = $this->formErrorsPassword();
            return $this->html(
                [
                    'errorsMessage' => $errorsMessage,
                    'errorsLogin' => $formErrorsLogin,
                    'errorsPassword' => $formErrorsPassword
                ], 'login'
            );
        } else {
            return $this->html([]);
        }
    }

    /**
     * Logout a user
     * @return ViewResponse
     */
    public function logout(): Response
    {
        $this->app->getAuth()->logout();
        return $this->redirect($this->url('reviews.index'));
    }

    private function formErrorsLogin(): array {
        $errors = [];
        $login = trim((string)($this->request()->getValue('login')));

        if (empty($login)) {
            $errors[] = "Login can't be empty.";
        }
        return $errors;
    }

    private function formErrorsPassword(): array {
        $errors = [];
        $password = trim((string)($this->request()->getValue('password')));
        if (empty($password)) {
            $errors[] = "Password can't be empty.";
        }
        return $errors;
    }
}
