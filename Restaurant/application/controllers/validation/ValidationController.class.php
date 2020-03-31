<?php

class ValidationController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        $OrderModel= new OrderModel();
        $order= $OrderModel->displayOrders($_GET['id']);
        return ["order"=>$order];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();
    }
}