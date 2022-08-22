<?php
class AdminBranchPhoneController extends ControladorBase{
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
    
            $idBranch = "0";
            $vBranch = "";
            if (isset($_SESSION['idBranch_view'])) {   $idBranch = $_SESSION['idBranch_view'];     }
            if (isset($_SESSION['vBranch_view'])) {     $vBranch = $_SESSION['vBranch_view'];     }

            $branchPhoneModel       = new BranchPhoneModel($this->adapter);
            $branchPhoneModel->idBranch = $idBranch;
            $info_branch_phone      = $branchPhoneModel->get_by_branch();

            $notificationsModel     = new NotificationsModel($this->adapter);
            $info_notifications     = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("adminBranchPhone",array(
                "info_branch_phone"=>$info_branch_phone,
                "vBranch"=>$vBranch,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_BRANCH_PHONE
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){
        
        session_start();

        $idBranch = "0";
        if (isset($_SESSION['idBranch_view'])) {    $idBranch = $_SESSION['idBranch_view'];     }
        
        $branchPhoneModel                        = new BranchPhoneModel($this->adapter);
        $branchPhoneModel->idBranch              = $idBranch;
        $branchPhoneModel->vBranchPhone          = $_POST["name_new"];
        $branchPhoneModel->iBranchPhone          = $_POST["phone_new"];
        
        $branchPhoneModel->create();

        $this->redirect(CONTROLADOR_ADMIN_BRANCH_PHONE, "index");
    }

    public function update(){

        session_start();

        $idBranch = "0";
        if (isset($_SESSION['idBranch_view'])) {   $idBranch = $_SESSION['idBranch_view'];     }

        $branchPhoneModel                        = new BranchPhoneModel($this->adapter);
        $branchPhoneModel->idBranchPhone         = $_POST["hdnId"];
        $branchPhoneModel->idBranch              = $idBranch;
        $branchPhoneModel->vBranchPhone          = $_POST["name"];
        $branchPhoneModel->iBranchPhone          = $_POST["phone"];
        
        $branchPhoneModel->update();

        $this->redirect(CONTROLADOR_ADMIN_BRANCH_PHONE, "index");
        
    }

    public function delete(){

        $branchPhoneModel                           = new BranchPhoneModel($this->adapter);
        $branchPhoneModel->idBranchPhone            = $_POST["hdn_id_delete"];
        
        $branchPhoneModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_BRANCH_PHONE, "index");
    }
}
?>
