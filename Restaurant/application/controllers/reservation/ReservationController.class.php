<?php

class ReservationController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();
        $ReservationModel = new ReservationModel();
        $ReservationModel->addReservation($formFields);

        var_dump($_SESSION);
        $http->redirectTo('/');
    }
}