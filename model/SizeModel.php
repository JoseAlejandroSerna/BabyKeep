<?php
class SizeModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_SIZE;
        
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

    public $idSize = "0";
    public $vSize = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idSize = $this->idSize");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idSize");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idSize,vSize) 
                VALUES(NULL,
                       '$this->vSize');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                vSize = '$this->vSize'
                WHERE
                idSize = $this->idSize";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idSize = $this->idSize";

        $this->db()->query($query);
        
    }
}
?>
