<?php

class SignupController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

        $usersModel = new UserModel();
        $usersModel->addUser($formFields);
        $http->redirectTo('/');
    }
}