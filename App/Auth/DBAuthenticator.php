<?php

namespace App\Auth;

use App\Core\IAuthenticator;
use App\Models\User;

class DBAuthenticator implements IAuthenticator
{

    public function __construct()
    {
        session_start();
    }

    /**
     * Verify, if the user is in DB and has his password is correct
     * @param $login
     * @param $password
     * @return bool
     * @throws \Exception
     */
    function login($login, $password): bool
    {
        $user = User::getAll("loginName = ?", [$login]);

        if (count($user) == 1) {
            $user = $user[0];
            if (password_verify($password, $user->getPassword())) {
                $_SESSION['user'] = $user;
                $_SESSION['id'] = $user->getId();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function logout(): void
    {
        if (isset($_SESSION['user'])) {
            unset($_SESSION['user']);
            session_destroy();
        }
    }

    /**
     * Get the name of the logged-in user
     * @return string
     */
    function getLoggedUserName(): string
    {
        return $_SESSION['user']->getLoginName() ?? throw new \Exception("User not logged in");
    }

    /**
     * Return the id of the logged-in user
     * @return mixed
     */
    function getLoggedUserId(): mixed
    {
        return $_SESSION['user']->getId() ?? throw new \Exception("User not logged in");
    }

    /**
     * Get the context of the logged-in user
     * @return string
     */
    function getLoggedUserContext(): mixed
    {
        return $_SESSION['user'] ?? throw new \Exception("User not logged in");
    }

    /**
     * Return if the user is authenticated or not
     * @return bool
     */
    function isLogged(): bool
    {
        return isset($_SESSION['user']) && $_SESSION['user'] != null;
    }
}