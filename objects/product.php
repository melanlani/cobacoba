<?php
class Product{
  
    // database connection and table nama
    private $conn;
    private $table_nama = "tbtest";
  
    // object properties
    public $id_test;
    public $nama;
    public $produk;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function create(){
  
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_nama . "
            SET
                nama=:nama, produk=:produk";
  
    // prepare query
    $stmt = $this->conn->prepare($query);
  
    // sanitize
    $this->nama=htmlspecialchars(strip_tags($this->nama));
    $this->produk=htmlspecialchars(strip_tags($this->produk));
  
    // bind values
    $stmt->bindParam(":nama", $this->nama);
    $stmt->bindParam(":produk", $this->produk);
  
    // execute query
    if($stmt->execute()){
        return true;
    }
  
    return false;
      
}
}

?>