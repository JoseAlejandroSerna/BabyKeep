<?php
class MessagePayController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        session_start();

        $vMessagePay = "";

        if (isset($_SESSION['vMessagePay'])) {   $vMessagePay = $_SESSION['vMessagePay'];     }
        else{                                   $_SESSION['vMessagePay'] = ""; }

        if ($_SESSION['idPermissions'] != "1" || $_SESSION['idPermissions'] != null) {
            

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("messagePay",array(
                "vMessagePay" => $vMessagePay,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_MESSAGE_PAY
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

}
?>
