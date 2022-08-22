<?php
class QuizModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_QUIZ;
        
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

    public $idQuiz = "0";
    public $idBranch = "0";
    public $vQuiz = "";
    public $iStatus = "0";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idQuiz = $this->idQuiz");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idQuiz,idBranch,vQuiz,iStatus) 
                VALUES(NULL,
                        $this->idBranch,
                       '$this->vQuiz',
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
                    idBranch = $this->idBranch,
                    vQuiz = '$this->vQuiz', 
                    iStatus = $this->iStatus 
                WHERE
                idQuiz = $this->idQuiz";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idQuiz = $this->idQuiz";

        $this->db()->query($query);
        
    }

}
?>
