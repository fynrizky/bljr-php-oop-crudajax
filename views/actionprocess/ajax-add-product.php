<?php
include_once '../../config/koneksi.php';
include_once '../../models/m_database.php';
include_once '../../models/m_products.php';
$connection = new Databases($host,$user,$password,$db);
$products = new products($connection);
// Create
$product=$_POST['product'];
$stock=$_POST['stock'];
$price=$_POST['price'];

$picture = $_FILES['pict']['name'];
$extension = explode('.', $_FILES['pict']['name']);
$pict = 'pict-'.round(microtime(true)).'.'.end($extension);
$resource = $_FILES['pict']['tmp_name'];
$upload = move_uploaded_file($resource, '../../assets/img/'.$pict);

if($upload){
    $query = $products->addData($product,$stock,$price,$pict);
}
