<?php
include_once '../../config/koneksi.php';
include_once '../../models/m_database.php';
include_once '../../models/m_products.php';
$connection = new Databases($host,$user,$password,$db);
$products = new Products($connection);

// $id = $_POST['idproduct'];
$id = $_GET['id'];

if(isset($id)){

        $product = $_POST['product'];
        $stock = $_POST['stock'];
        $price = $_POST['price'];

        $pict = $_FILES['pict']['name'];
        $extension = explode('.',$_FILES['pict']['name']);
        $picture = 'pict-'. round(microtime(true)) .'.'.end($extension);
        $resource = $_FILES['pict']['tmp_name'];

        if($pict == ''){
            $products->updateData($id,$product,$stock,$price);
        }else{
            $qry = $products->show($id);
            $data = $qry->fetch_object();
            $pict_last = $data->picture;
            
            unlink('../../assets/img/'.$pict_last);
            move_uploaded_file($resource, '../../assets/img/'.$picture);
            
            $products->updateData($id,$product,$stock,$price,$picture);
        }

}

