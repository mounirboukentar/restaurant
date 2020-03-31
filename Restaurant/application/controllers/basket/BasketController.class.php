<?php
class BasketController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        session_start();

        $orderModel= new OrderModel();
        $orderID = $orderModel->addOrder($formFields["panier"],$_SESSION["id"],$formFields["totalOrder"]);
        $http->sendJSONResponse($orderID);
    }
}