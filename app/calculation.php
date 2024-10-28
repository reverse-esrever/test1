<?php
require_once '../database/products.php';
require_once 'date.php';
require_once 'validationDate.php';


$_SESSION['date'] = $_POST['date'];
$date = validateDate($_POST['date']);
$date = date_create($date);
$diffDays = date_diff($date, getOriginDate())->days;

$product = $products['leviNosok'];
$purchases = [
    'today' => 1,
    'yesterday' => 0,
];
for($i = 0; $i <= $diffDays; $i++){
    $product['count'] =  $product['count'] - $purchases['today'];
    if($product['count'] < 0){
        $product['count'] = 0;
        break;
    }
    $today = $purchases['today'] + $purchases['yesterday'];
    $purchases['yesterday'] = $purchases['today'];
    $purchases['today'] = $today;
}
$product['price'] *= MARGIN;
$_SESSION['product'] = $product;

header('Location: /');
die();
