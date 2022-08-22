<?php
class CommentTestModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_COMMENT_TEST;
        
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

    public $idCommentTest = "0";
    public $idQuiz = "0";
    public $vCommentTest = "";
    public $vHourTest = "";


    public function get_by_Quiz_Hour(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table 
                                WHERE vHourTest = '$this->vHourTest' AND idQuiz = $this->idQuiz
                                ORDER BY idCommentTest");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function getAll(){
        $resultSet = array();
        $query=$this->db->query("SELECT * FROM $this->table ORDER BY idCommentTest");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function create()
    {
        $query="INSERT INTO $this->table (idCommentTest,idQuiz,vCommentTest,vHourTest) 
                VALUES(NULL,
                       $this->idQuiz,
                       '$this->vCommentTest',
                       '$this->vHourTest');";

        $save = mysqli_query($this->db(),$query);
        if(!$save){
            die("QUERY FAILED.".mysqli_error());
        }
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idCommentTest = $this->idCommentTest";

        $this->db()->query($query);
        
    }

    public function delete_hour()
    {
        $query="DELETE FROM $this->table 
                WHERE
                vHourTest = '$this->vHourTest'";

        $this->db()->query($query);
        
    }
}
?>
