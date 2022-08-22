<?php
class PurchaseHistoryModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_PURCHASE_HISTORY;
        
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

    public $idPurchaseHistory = "0";
    public $idUser = "0";
    public $idUserAdmin = "0";
    public $idBranch = "0";
    public $idProduct = "0";
    public $idStockProduct = "0";
    public $idTypePayment = "0";
    public $iPieces = "0";
    public $iCommission = "0";
    public $iSending = "0";
    public $iSubtotal = "0";
    public $itotal = "0";
    public $vDateCreation = "";
    public $iStatus = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idPurchaseHistory = $this->idPurchaseHistory");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idPurchaseHistory");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idPurchaseHistory,idUser,idUserAdmin,idBranch,idProduct,idStockProduct,idTypePayment,iPieces,iCommission,iSending,iSubtotal,itotal,vDateCreation,iStatus) 
                VALUES(NULL,
                        $this->idUser,
                        $this->idUserAdmin,
                        $this->idBranch,
                        $this->idProduct,
                        $this->idStockProduct,
                        $this->idTypePayment,
                        $this->iPieces,
                        $this->iCommission,
                        $this->iSending,
                        $this->iSubtotal,
                        $this->itotal,
                        '$this->vDateCreation',
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
                iStatus = $this->iStatus
                WHERE
                idPurchaseHistory = $this->idPurchaseHistory";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idPurchaseHistory = $this->idPurchaseHistory";

        $this->db()->query($query);
        
    }
}
?>
