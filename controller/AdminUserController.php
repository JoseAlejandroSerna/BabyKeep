<?php
class AdminUserController extends ControladorBase{
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
    
            $users                      = new UserModel($this->adapter);
            $all_user                   = $users->getAll();

            $permissionsModel           = new PermissionsModel($this->adapter);
            $info_permissions           = $permissionsModel->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminUser",array(
                "all_user"=>$all_user,
                "info_permissions"=>$info_permissions,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_USER
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        $userModel                  = new UserModel($this->adapter);
        $userModel->vUser           = $_POST["hdn_name"];
        $userModel->vEmail          = $_POST["hdn_email"];
        $userModel->vPassword       = $_POST["hdn_password"];
        $userModel->vPhone          = $_POST["hdn_phone"];
        $userModel->vAddress        = $_POST["hdn_address"];
        $userModel->vCP             = $_POST["hdn_cp"];
        $userModel->vComent         = $_POST["hdn_coment"];
        $userModel->idPermissions   = $_POST["hdn_idPermissions"];
        
        $userModel->create();

        $this->redirect(CONTROLADOR_ADMIN_USER, "index");
        //echo "vUser:".$_POST["hdn_name"]." |vEmail".$_POST["hdn_email"]." |vPassword:".$_POST["hdn_password"]." |vPhone:".$_POST["hdn_phone"]." |vAddress:".$_POST["hdn_address"]." |vCP:".$_POST["hdn_cp"]." |vComent:".$_POST["hdn_coment"]." |idPermissions:".$_POST["hdn_idPermissions"]." >>>>";
    }

    public function update(){

        $userModel                  = new UserModel($this->adapter);
        $userModel->idUser          = $_POST["hdn_idUser"];
        $userModel->idPermissions   = $_POST["hdn_idPermissions_update"];
        $userModel->vUser           = $_POST["hdn_vUser"];
        $userModel->vEmail          = $_POST["hdn_vEmail"];
        $userModel->vPassword       = $_POST["hdn_vPassword"];
        $userModel->vPhone          = $_POST["hdn_vPhone"];
        $userModel->vAddress        = $_POST["hdn_vAddress"];
        $userModel->vCP             = $_POST["hdn_vCP"];
        $userModel->vComent         = $_POST["hdn_vComent"];
        $userModel->iStatus         = $_POST["hdn_iStatus"];
        
        $userModel->update();

        $this->redirect(CONTROLADOR_ADMIN_USER, "index");
    }

    public function delete(){

        $userModel                  = new UserModel($this->adapter);
        $userModel->idUser          = $_POST["hdn_idUser_delete"];
        
        $userModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_USER, "index");
    }
}
?>
