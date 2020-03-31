<?php

class OrderController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
        session_start();
        $mealModel= new MealModel();
        $meals= $mealModel->getAll();
        return ["meals"=>$meals];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

    }
}