<?php
class ProductModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_PRODUCT;
        
		$this->conectar = null;
		$this->db = $adapter;
    }
    
    public function getConetar(){
        return $this->conectar;
    }
    
    public function db(){
        return $this->db;
    }
////////////////////////////////////////////

    public $idProduct = "0";
    public $idTypePurchase = "0";
    public $idTypeProduct = "0";
    public $vProduct = "";
    public $vDescription = "";
    public $vDescriptionDetail = "";
    public $vImage = "";
    public $vClave = "";
    public $iStatus = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idProduct = $this->idProduct");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_product_sale(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idTypePurchase = 2 ORDER BY idProduct");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_product_schedule(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idTypePurchase = 1 ORDER BY idProduct");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idProduct");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_product(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE vProduct = '$this->vProduct' AND vClave = '$this->vClave'");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function exist()
    {
        $exist = false;
        
        $query = $this->db->query("SELECT * FROM $this->table WHERE idProduct = $this->idProduct");
        if($query->num_rows > 0)
        {
            $exist = true;
        }

        return $exist;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idProduct,idTypePurchase,idTypeProduct,vProduct,vDescription,vDescriptionDetail,vImage,vClave,iStatus) 
                VALUES(NULL,
                        $this->idTypePurchase,
                        $this->idTypeProduct,
                       '$this->vProduct',
                       '$this->vDescription',
                       '$this->vDescriptionDetail',
                       '$this->vImage',
                       '$this->vClave',
                        $this->iStatus);";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                    idTypePurchase = $this->idTypePurchase, 
                    idTypeProduct = $this->idTypeProduct,
                    vProduct = '$this->vProduct',
                    vDescription = '$this->vDescription',
                    vDescriptionDetail = '$this->vDescriptionDetail',
                    vImage = '$this->vImage',
                    vClave = '$this->vClave',
                    iStatus = $this->iStatus 
                WHERE
                    idProduct = $this->idProduct";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                    idProduct = $this->idProduct";

        $this->db()->query($query);
        
    }
}
?>
