<?php
class BranchModel{
    private $db;
    private $conectar;

    public function __construct($adapter) {
        $this->table=(string) TABLE_BRANCH;
        
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

    public $idBranch = "0";
    public $idSocialNetworks = "0";
    public $vBranch = "";
    public $vAddress = "";
    public $vCP = "";
    public $vLatitude = "";
    public $vLongitude = "";
    public $vEmail = "";
    public $vImage = "";

    public function get_by_id(){
        $query=$this->db->query("SELECT * FROM $this->table WHERE idBranch = $this->idBranch");

        while ($row = $query->fetch_object()) {
           $resultSet[]=$row;
        }
        
        return $resultSet;
    }

    public function get_All(){
        $query=$this->db->query("SELECT 
                            Branch.idBranch,
                            Branch.idSocialNetworks,
                            Branch.vBranch,
                            Branch.vAddress,
                            Branch.vCP,
                            Branch.vLatitude,
                            Branch.vLongitude,
                            Branch.vEmail,
                            Branch.vImage,
                            BranchPhone.vBranchPhone,
                            BranchPhone.iBranchPhone,
                            SocialNetworks.vUrlFacebook,
                            SocialNetworks.vUrlInstagram,
                            SocialNetworks.vUrlTwitter,
                            SocialNetworks.vUrlPinterest
                            FROM $this->table

                            INNER JOIN BranchPhone ON BranchPhone.idBranch = Branch.idBranch
                            INNER JOIN SocialNetworks ON SocialNetworks.idSocialNetworks = Branch.idSocialNetworks");

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
        $query="INSERT INTO $this->table (idBranch,idSocialNetworks,vBranch,vAddress,vCP,vLatitude,vLongitude,vEmail,vImage)
                VALUES(NULL,
                        $this->idSocialNetworks,
                        '$this->vBranch',
                        '$this->vAddress',
                        '$this->vCP',
                        '$this->vLatitude',
                        '$this->vLongitude',
                        '$this->vEmail',
                        '$this->vImage');";
        $create=$this->db()->query($query);
        return $create;
    }

    public function update()
    {
        $query="UPDATE $this->table 
                SET
                idSocialNetworks = $this->idSocialNetworks,
                vBranch = '$this->vBranch',
                vAddress = '$this->vAddress',
                vCP = '$this->vCP',
                vLatitude = '$this->vLatitude',
                vLongitude = '$this->vLongitude',
                vEmail = '$this->vEmail',
                vImage = '$this->vImage'
                WHERE
                idBranch = $this->idBranch";

        $update = mysqli_query($this->db(),$query);
        if(!$update){
            die("QUERY FAILED.".mysqli_error());
        }
        
    }

    public function delete()
    {
        $query="DELETE FROM $this->table 
                WHERE
                idBranch = $this->idBranch";

        $this->db()->query($query);
        
    }
}
?>
