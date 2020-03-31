<?php
class OrderModel
{
    function addOrder($panier,$id,$totalOrder)
    {

        $Database =new Database();
        $query= 'INSERT INTO orders(orderDate,idUser,orderTotal) VALUES(NOW(),?,?)';
        $lastId= $Database->executeSql($query,[$id,$totalOrder]);

        $querydetails= 'INSERT INTO orderDetails(idMeal,idOrder,quantity) VALUES(?,?,?)';
        foreach($panier as $command){
            $Database->executeSql($querydetails,[$command["id"],$lastId,$command["quantity"]]);
        }
        return $lastId;
    }
    function displayOrders($id)
    {
        $Database =new Database();
        $query=
            'Select orders.id,photo,orderDate,orderTotal,idUser,orderDetails.id,idMeal,idOrder,quantity,name,salePrice
              From  users
              INNER JOIN orders ON users.id =  orders.idUser
              INNER JOIN orderDetails ON orders.id= orderDetails.idOrder
              INNER JOIN Meal ON orderDetails.idMeal = Meal.id
               Where orders.id=?';

        return $Database->query($query,[$id]);


    }
}
