<?php

class DeconnectController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        session_destroy();
        $http->redirectTo('/');
    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}
