<?php
class CardModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_CARD;
        
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

    public $idCard = "0";
    public $idUser = "0";
    public $vCardNumber = "";
    public $iNumberPurchases = "0";
    public $vStartDate = "";
    public $vEndDate = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idCard = $this->idCard");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idCard");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idCard,idUser,vCardNumber,iNumberPurchases,vStartDate,vEndDate) 
                VALUES(NULL,
                        $this->idUser,
                        '$this->vCardNumber',
                        $this->iNumberPurchases,
                        '$this->vStartDate',
                        '$this->vEndDate');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                idUser = $this->idUser, 
                vCardNumber = '$this->vCardNumber',
                iNumberPurchases = $this->iNumberPurchases,
                vStartDate = '$this->vStartDate',
                vEndDate = '$this->vEndDate'
                WHERE
                idCard = $this->idCard";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update_CountPurchase()
    {
        $query="UPDATE $this->table 
                SET
                iNumberPurchases = $this->iNumberPurchases
                WHERE
                idCard = $this->idCard";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idUser = $this->idUser";

        $this->db()->query($query);
        
    }
}
?>
