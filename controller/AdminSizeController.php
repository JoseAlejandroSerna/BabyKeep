<?php
class AdminSizeController extends ControladorBase{
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
    
            $sizeModel                  = new SizeModel($this->adapter);
            $info_admin_size            = $sizeModel->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminSize",array(
                "info_admin_size"=>$info_admin_size,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_SIZE
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        $sizeModel                  = new SizeModel($this->adapter);
        $sizeModel->vSize           = $_POST["hdn_vSize_new"];
        
        $sizeModel->create();

        $this->redirect(CONTROLADOR_ADMIN_SIZE, "index");
        
    }

    public function update(){

        $sizeModel                  = new SizeModel($this->adapter);
        $sizeModel->idSize          = $_POST["hdn_idSize"];
        $sizeModel->vSize          = $_POST["hdn_vSize"];
        
        $sizeModel->update();

        $this->redirect(CONTROLADOR_ADMIN_SIZE, "index");
    }

    public function delete(){

        $sizeModel                  = new SizeModel($this->adapter);
        $sizeModel->idSize          = $_POST["hdn_idSize_delete"];
        
        $sizeModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_SIZE, "index");
    }
}
?>
