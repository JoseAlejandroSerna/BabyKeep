<?php
class ScheduleModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_SCHEDULE;
        
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

    public $idSchedule = "0";
    public $idUser = "0";
    public $idUserAdmin = "0";
    public $idBranch = "0";
    public $idTypeSchedule = "0";
    public $idHour = "0";
    public $idProduct = "0";
    public $idColor = "0";
    public $idSize = "0";
    public $vPrice = "";
    public $vAdvance = "";
    public $iCheckEvent = "0";
    public $iAge = "0";
    public $vMinPrice = "";
    public $vMaxPrice = "";
    public $vDateCreation = "";
    public $vDateEvent = "";
    public $vDateDelivery = "";
    public $vImageINE = "";
    public $vImageProduct = "";
    public $vImageAddressProof = "";
    public $iStatus = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idSchedule = $this->idSchedule");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_schedule_pending_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idUser = $this->idUser AND iStatus <> 2");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idSchedule ASC");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idSchedule,idUser,idUserAdmin,idBranch,idTypeSchedule,idHour,idProduct,idColor,idSize,vPrice,vAdvance,iCheckEvent,iAge,vMinPrice,vMaxPrice,vDateCreation,vDateEvent,vDateDelivery,vImageINE,vImageProduct,vImageAddressProof,iStatus) 
                VALUES(NULL,
                        $this->idUser,
                        $this->idUserAdmin,
                        $this->idBranch,
                        $this->idTypeSchedule,
                        $this->idHour,
                        $this->idProduct,
                        $this->idColor,
                        $this->idSize,
                        '$this->vPrice',
                        '$this->vAdvance',
                        $this->iCheckEvent,
                        $this->iAge,
                        '$this->vMinPrice',
                        '$this->vMaxPrice',
                        '$this->vDateCreation',
                        '$this->vDateEvent',
                        '$this->vDateDelivery',
                        '$this->vImageINE',
                        '$this->vImageProduct',
                        '$this->vImageAddressProof',
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
                idUser = $this->idUser,
                idUserAdmin = $this->idUserAdmin,
                idBranch = $this->idBranch,
                idTypeSchedule = $this->idTypeSchedule,
                idHour = $this->idHour,
                idProduct = $this->idProduct,
                idColor = $this->idColor,
                idSize = $this->idSize,
                vPrice = '$this->vPrice',
                vAdvance = '$this->vAdvance',
                iCheckEvent = $this->iCheckEvent,
                iAge = $this->iAge,
                vMinPrice = '$this->vMinPrice',
                vMaxPrice = '$this->vMaxPrice',
                vDateCreation = '$this->vDateCreation',
                vDateEvent = '$this->vDateEvent',
                vDateDelivery = '$this->vDateDelivery',
                vImageINE = '$this->vImageINE',
                vImageProduct = '$this->vImageProduct',
                vImageAddressProof = '$this->vImageAddressProof'
                iStatus = $this->iStatus
                WHERE
                idSchedule = $this->idSchedule";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update_status()
    {
        $query="UPDATE $this->table 
                SET
                vAdvance = '$this->vAdvance',
                iStatus = $this->iStatus
                WHERE
                idSchedule = $this->idSchedule";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idSchedule = $this->idSchedule";

        $this->db()->query($query);
        
    }
}
?>
