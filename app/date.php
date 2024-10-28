<?php
function getOriginDate() : DateTime{
    $originDate = date_create_from_format('d.m.y' , ORIGIN_DATE);
    $originDate->setTime(0,0);
    return $originDate;
}

function getOriginDateTime() : int{
    return getOriginDate()->getTimestamp();
}

const ORIGIN_DATE = '13.01.21';

