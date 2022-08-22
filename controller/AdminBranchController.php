<?php
class AdminBranchController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        session_start();
        
        if ($_SESSION['idPermissions'] != "1" || $_SESSION['idPermissions'] != null) {
    
            $branchModel            = new BranchModel($this->adapter);
            $info_branch            = $branchModel->getAll();

            $notificationsModel     = new NotificationsModel($this->adapter);
            $info_notifications     = $notificationsModel->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminBranch",array(
                "info_branch"=>$info_branch,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_BRANCH
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){
        
        $idSocialNetworks = "1";
        $dir = "assets/images/branch/";

        if(!empty($_FILES["vImage_new"]["tmp_name"]))
        {
            $vImage                             = basename($_FILES["vImage_new"]["name"]);

            $branchModel                        = new BranchModel($this->adapter);
            $branchModel->idSocialNetworks      = $idSocialNetworks;
            $branchModel->vBranch               = $_POST["name_new"];
            $branchModel->vAddress              = $_POST["address_new"];
            $branchModel->vCP                   = $_POST["cp_new"];
            $branchModel->vLatitude             = $_POST["latitude_new"];
            $branchModel->vLongitude            = $_POST["longitude_new"];
            $branchModel->vEmail                = $_POST["email_new"];
            $branchModel->vImage                = $vImage;
            
            $branchModel->create();
    
            if (!is_dir($dir)){ mkdir($dir, 0777);  }

            $targetFilePath                 = $dir.$vImage;
            move_uploaded_file($_FILES["vImage_new"]["tmp_name"], $targetFilePath);
            

            $this->redirect(CONTROLADOR_ADMIN_BRANCH, "index");
        }
    }

    public function update(){

        $idSocialNetworks = "1";
        $dir = "assets/images/branch/";

        if(!empty($_FILES["vImage"]["tmp_name"]))
        {
            $vImage                         = basename($_FILES["vImage"]["name"]);

            if (!is_dir($dir)){ mkdir($dir, 0777);  }

            $targetFilePath                 = $dir.$vImage;
            move_uploaded_file($_FILES["vImage"]["tmp_name"], $targetFilePath);
        }else{
            $vImage                         = $_POST["hdnImage"];
        }

        $branchModel                        = new BranchModel($this->adapter);
        $branchModel->idBranch              = $_POST["hdnId"];
        $branchModel->idSocialNetworks      = $idSocialNetworks;
        $branchModel->vBranch               = $_POST["name"];
        $branchModel->vAddress              = $_POST["address"];
        $branchModel->vCP                   = $_POST["cp"];
        $branchModel->vLatitude             = $_POST["latitude"];
        $branchModel->vLongitude            = $_POST["longitude"];
        $branchModel->vEmail                = $_POST["email"];
        $branchModel->vImage                = $vImage;
        
        $branchModel->update();

        $this->redirect(CONTROLADOR_ADMIN_BRANCH, "index");
        
    }

    public function delete(){

        $branchModel                        = new BranchModel($this->adapter);
        $branchModel->idBranch              = $_POST["hdn_id_delete"];
        
        $branchModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_BRANCH, "index");
    }

    public function view_phone(){

        session_start();

        $_SESSION['idBranch_view']      = $_POST["hdn_id_view"];
        $_SESSION['vBranch_view']       = $_POST["hdn_vBranch_view"];
        
        $this->redirect(CONTROLADOR_ADMIN_BRANCH_PHONE, "index");
    }
}
?>
