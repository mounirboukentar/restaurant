<?php
    class MealController{
        function httpGetMethod($http,$queryFields){
            $mealModel= new MealModel();
            $meals= $mealModel->getOne($queryFields["id"]);
            $http->sendJsonResponse($meals);
        }
    }