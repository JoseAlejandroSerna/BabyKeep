<?php
class AdminColorController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        session_start();
        
        if ($_SESSION['idPermissions'] != "1" || isset($_SESSION['idPermissions'])) {
    
            $colorModel                 = new ColorModel($this->adapter);
            $info_admin_color           = $colorModel->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminColor",array(
                "info_admin_color"=>$info_admin_color,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_COLOR
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        $colorModel                 = new ColorModel($this->adapter);
        $colorModel->vColor         = $_POST["hdn_vColor_new"];
        $colorModel->vColorCode     = $_POST["hdn_vColorCode_new"];
        $colorModel->vImage         = $_POST["hdn_vImage_new"];
        
        $colorModel->create();

        $this->redirect(CONTROLADOR_ADMIN_COLOR, "index");
        
    }

    public function update(){

        $colorModel                 = new ColorModel($this->adapter);
        $colorModel->idColor        = $_POST["hdn_idColor"];
        $colorModel->vColor         = $_POST["hdn_vColor"];
        $colorModel->vColorCode     = $_POST["vColorCode"];
        $colorModel->vImage         = $_POST["hdn_vImage"];
        
        $colorModel->update();

        $this->redirect(CONTROLADOR_ADMIN_COLOR, "index");
    }

    public function delete(){

        $colorModel                 = new ColorModel($this->adapter);
        $colorModel->idColor        = $_POST["hdn_idColor_delete"];
        
        $colorModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_COLOR, "index");
    }
}
?>
