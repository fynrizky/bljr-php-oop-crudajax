<?php 

class Products{
    private $mysqli;

    public function __construct($conn) //koneksi dr class Database yg di instansiasi ditampung sbgai parameter construct spy di load pertama
    {
        //memanggil property $this->mysqli
        $this->mysqli = $conn;  //kemudian ditampung di property
    }

    public function show($id = null){
        $db = $this->mysqli->connects;
        $sql = "SELECT * FROM products";
        
        if($id != null){
            $sql .= " WHERE id=".$id ;
        }
        
        $query = $db->query($sql) or die ($db->error);
        return $query;
    }
    public function addData($product,$stock,$price,$pict){
        $db = $this->mysqli->connects;
        $sql = "INSERT INTO products(product,stock,price,picture) VALUES('$product','$stock','$price','$pict')";
        $db->query($sql) or die ($db->error);
    }
    public function deleteData($id){
        $db = $this->mysqli->connects;
        $sql = "DELETE FROM products WHERE id ='$id'";
        $db->query($sql) or die ($db->error);
    }
    public function updateData($id,$product,$stock,$price,$picture=null){
        $db = $this->mysqli->connects;
        $sql = "UPDATE products SET product = '$product', stock = '$stock', price = '$price'" ;
        if($picture != null){
            $sql .= ", picture = '$picture' WHERE id=".$id;
        }else{
            $sql .= " WHERE id=".$id;
        }
        $db->query($sql) or die ($db->error);
    }
}