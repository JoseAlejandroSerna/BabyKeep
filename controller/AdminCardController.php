<?php
class AdminCardController extends ControladorBase{
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
    
            $cardModel                  = new CardModel($this->adapter);
            $info_cardModel             = $cardModel->getAll();

            $users                      = new UserModel($this->adapter);
            $all_user                   = $users->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminCard",array(
                "info_cardModel"=>$info_cardModel,
                "all_user"=>$all_user,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_CARD
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        $cardModel                      = new CardModel($this->adapter);
        $cardModel->idUser              = $_POST["hdn_idUser_new"];
        $cardModel->vCardNumber         = $_POST["cardNumber_new"];
        $cardModel->iNumberPurchases    = $_POST["hdn_iNumberPurchases_new"];
        $cardModel->vStartDate          = $_POST["hdn_dateStart_new"];
        $cardModel->vEndDate            = $_POST["hdn_dateEnd_new"];
        
        $cardModel->create();

        $this->redirect(CONTROLADOR_ADMIN_CARD, "index");
    }

    public function update(){

        $cardModel                      = new CardModel($this->adapter);
        $cardModel->idCard              = $_POST["hdn_idCard"];
        $cardModel->idUser              = $_POST["hdn_idUser"];
        $cardModel->vCardNumber         = $_POST["cardNumber"];
        $cardModel->iNumberPurchases    = $_POST["hdn_iNumberPurchases"];
        $cardModel->vStartDate          = $_POST["hdn_dateStart"];
        $cardModel->vEndDate            = $_POST["hdn_dateEnd"];
        
        $cardModel->update();

        $this->redirect(CONTROLADOR_ADMIN_CARD, "index");
    }

    public function delete(){

        $cardModel                  = new CardModel($this->adapter);
        $cardModel->idUser          = $_POST["hdn_idUser_delete"];
        
        $cardModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_CARD, "index");
    }

    public function view_kidByCard(){

        session_start();

        $_SESSION['idCard_view']    = $_POST["hdn_idCard_view"];
        $_SESSION['vUser_view']     = $_POST["hdn_vUser_view"];
        

        $this->redirect(CONTROLADOR_ADMIN_KID_BY_CARD, "index");
    }
}
?>
