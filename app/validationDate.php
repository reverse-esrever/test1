<?php 
require_once 'date.php';

session_start();

function validateDate(string $date) : string {
    if(strtotime($date) < getOriginDateTime()){
        $_SESSION['message'] = 'Неверно выбрана дата. Выберит дату от ' . ORIGIN_DATE;
        header('Location: /');
        die();
    };

    return $date;
};