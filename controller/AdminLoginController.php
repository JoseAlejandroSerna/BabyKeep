<?php
class AdminLoginController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        session_start();
        if (!isset($_SESSION['vEmail_admin'])) {        $_SESSION['vEmail_admin'] = "";         }
        if (!isset($_SESSION['vPassword_admin'])) {     $_SESSION['vPassword_admin'] = "";      }


        if (isset($_SESSION['vEmail']) && isset($_SESSION['vEmail'])) {

            if ($_SESSION['vEmail'] == "babykeepmx@gmail.com" && $_SESSION['vEmail'] == "AdminBabyK33p_2022") {

                //Cargamos la vista index y le pasamos valores
                $this->view("adminLogin",array(
                    "view" => CONTROLADOR_ADMINLOGIN
                ));
            }
            else{
                $this->redirect(CONTROLADOR_MAIN, "index");
            }
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }
}
?>
