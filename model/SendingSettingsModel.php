<?php
class SendingSettingsModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_SENDING_SETTINGS;
        
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

    public $idSendingSettings = "0";
    public $vSending = "0";
    public $vCommission = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idSendingSettings = $this->idSendingSettings");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                vSending = '$this->vSending',
                vCommission = '$this->vCommission'
                WHERE
                idSendingSettings = $this->idSendingSettings";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }
}
?>
