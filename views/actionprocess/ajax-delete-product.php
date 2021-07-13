<?php 
include_once '../../config/koneksi.php';
include_once '../../models/m_database.php';
include_once '../../models/m_products.php';
$connection = new Databases($host,$user,$password,$db);
$products = new Products($connection);

$id = $_GET['id'];
if(isset($id)){
    $qry = $products->show($id);
    $data = $qry->fetch_object();
    $last_pict = $data->picture;
    unlink('../../assets/img/'.$last_pict);
    $query = $products->deleteData($id);
}