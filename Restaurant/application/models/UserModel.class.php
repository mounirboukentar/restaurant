<?php
class UserModel
{
    function addUser($formFields)
    {
        $userData=[$formFields['nom'],$formFields['prenom'],$formFields['naissance'],$formFields['adresse'],$formFields['ville'],$formFields['codepostal'],$formFields['numero'],$formFields['mail'],$formFields['passeword']];
        $Database =new Database();
        $query= 'INSERT INTO users(nom,prenom,naissance,adresse,ville,codepostal,numero,mail,passeword) VALUES(?,?,?,?,?,?,?,?,?)';
        return $Database->executeSql($query,$userData);
    }
}