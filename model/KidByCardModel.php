<?php
class KidByCardModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_KID_BY_CARD;
        
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

    public $idKidByCard = "0";
    public $idCard = "0";
    public $vName = "";
    public $iAge = "0";
    public $iNumberPurchases = "0";
    public $iTotalPurchases = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idCard = $this->idCard");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_by_kid(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idKidByCard = $this->idKidByCard");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idKidByCard");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function reset_kid()
    {
        $query="UPDATE $this->table 
                SET
                iNumberPurchases = $this->iNumberPurchases,
                iTotalPurchases = $this->iTotalPurchases
                WHERE
                idKidByCard = $this->idKidByCard";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idKidByCard,idCard,vName,iAge,iNumberPurchases,iTotalPurchases) 
                VALUES(NULL,
                        $this->idCard,
                        '$this->vName',
                        $this->iAge,
                        $this->iNumberPurchases,
                        $this->iTotalPurchases);";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                idCard = $this->idCard, 
                vName = '$this->vName',
                iAge = $this->iAge,
                iNumberPurchases = $this->iNumberPurchases,
                iTotalPurchases = $this->iTotalPurchases
                WHERE
                idKidByCard = $this->idKidByCard";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update_CountPurchase()
    {
        $query="UPDATE $this->table 
                SET
                iNumberPurchases = $this->iNumberPurchases,
                iTotalPurchases = $this->iTotalPurchases
                WHERE
                idKidByCard = $this->idKidByCard";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idKidByCard = $this->idKidByCard";

        $this->db()->query($query);
        
    }
}
?>
