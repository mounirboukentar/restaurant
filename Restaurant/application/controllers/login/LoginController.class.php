<?php

class LoginController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $login = new LoginModel();
        $loginUser = $login->getLogin($formFields);
        if ($loginUser)
        {
            session_start();
            var_dump($loginUser);
            $_SESSION["nom"] = $loginUser["nom"];
            $_SESSION["email"] = $loginUser["mail"];
            $_SESSION["id"] = $loginUser["id"];
            $_SESSION["prenom"] = $loginUser["prenom"];
            $_SESSION["adresse"] = $loginUser["adresse"];
            $_SESSION["codepostal"] = $loginUser["codepostal"];
            $_SESSION["ville"] = $loginUser["ville"];
            $http->redirectTo('/');
        }
        else
        {
            $http->redirectTo('/login');
        }
    }
}