<?php
class ReservationModel
{
    function addReservation($formFields)
    {
        $reservationData=[$_SESSION["id"],$formFields['date'],$formFields['heure'],$formFields['number']];
        $Database =new Database();

        $query= 'INSERT INTO Reservation(id_user,date,heure,number) VALUES(?,?,?,?)';
        return $Database->executeSql($query,$reservationData);
    }
}