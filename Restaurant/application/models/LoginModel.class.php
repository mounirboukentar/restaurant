<?php
class LoginModel
{
    function getLogin($formFields)
    {
        $loginData=[$formFields['mail'],$formFields['passeword']];
        $Database =new Database();
        $query= 'SELECT * FROM users WHERE mail= ? AND passeword = ?';
        return $Database->queryOne($query,$loginData);
    }
}