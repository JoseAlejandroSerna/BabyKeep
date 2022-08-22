<?php
class ColorModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_COLOR;
        
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

    public $idColor = "0";
    public $vColor = "";
    public $vColorCode = "";
    public $vImage = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idColor = $this->idColor");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idColor");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idColor,vColor,vColorCode,vImage) 
                VALUES(NULL,
                       '$this->vColor',
                       '$this->vColorCode',
                       '$this->vImage');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                vColor = '$this->vColor', 
                vColorCode = '$this->vColorCode',
                vImage = '$this->vImage'
                WHERE
                idColor = $this->idSize";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idColor = $this->idColor";

        $this->db()->query($query);
        
    }
}
?>
