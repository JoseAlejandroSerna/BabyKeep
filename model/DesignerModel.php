<?php
class DesignerModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_DESIGNER;
        
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

    public $idDesigner = "0";
    public $vVideoSeccion1 = "";
    public $vTitle = "";
    public $vDescription1 = "";
    public $vDescription2 = "";
    public $vFirma = "";
    public $iCheck1 = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idDesigner = $this->idDesigner");

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

    public function create(){
        $query="INSERT INTO $this->table (idDesigner,vVideoSeccion1,vTitle,vDescription1,vDescription2,vFirma)
                VALUES(NULL,
                       '".$this->vVideoSeccion1."',
                       '".$this->vTitle."',
                       '".$this->vDescription1."',
                       '".$this->vDescription2."',
                       '".$this->vFirma."');";
        $create=$this->db()->query($query);
        return $create;
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                vVideoSeccion1 = '$this->vVideoSeccion1',
                vTitle = '$this->vTitle',
                vDescription1 = '$this->vDescription1',
                vDescription2 = '$this->vDescription2',
                vFirma = '$this->vFirma',
                iCheck1 = $this->iCheck1
                WHERE
                idDesigner = $this->idDesigner";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }
}
?>
