<?php
class BranchPhoneModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_BRANCH_PHONE;
        
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

    public $idBranchPhone = "0";
    public $idBranch = "0";
    public $vBranchPhone = "";
    public $iBranchPhone = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idBranchPhone = $this->idBranchPhone");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_by_branch(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idBranch = $this->idBranch ORDER BY vBranchPhone");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idBranch");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create(){
        $query="INSERT INTO $this->table (idBranchPhone,idBranch,vBranchPhone,iBranchPhone)
                VALUES(NULL,
                        $this->idBranch,
                        '$this->vBranchPhone',
                        '$this->iBranchPhone');";
        $create=$this->db()->query($query);
        return $create;
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                idBranch = $this->idBranch,
                vBranchPhone = '$this->vBranchPhone',
                iBranchPhone = '$this->iBranchPhone'
                WHERE
                idBranchPhone = $this->idBranchPhone";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idBranchPhone = $this->idBranchPhone";

        $this->db()->query($query);
        
    }
}
?>
