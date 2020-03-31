<?php
    class MealModel
    {
        function getAll()
        {
            $database= new Database();

            $query="Select *From Meal";
            return $database->query($query);
        }
        function getOne($id)
        {
            $database= new Database();
            $query= "Select * From Meal Where id=?";
            return $database->queryOne($query,[$id]);

        }
    }
