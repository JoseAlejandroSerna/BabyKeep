<?php
class AdminKidByCardController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        session_start();
        
        $idCard = "0";
        $vUser = "";
        if (isset($_SESSION['idCard_view'])) {   $idCard = $_SESSION['idCard_view'];     }

        if (isset($_SESSION['vUser_view'])) {   $vUser  = $_SESSION['vUser_view'];     }

        if ($_SESSION['idPermissions'] != "1" || $_SESSION['idPermissions'] != null) {
    
            $kidByCardModel             = new KidByCardModel($this->adapter);
            $kidByCardModel->idCard     = $idCard;
            $info_kidByCard             = $kidByCardModel->get_by_id();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();

            $users = new UserModel($this->adapter);
            $all_user = $users->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminKidByCard",array(
                "info_kidByCard"=>$info_kidByCard,
                "all_user"=>$all_user,
                "idCard"=>$idCard,
                "vUser"=>$vUser,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_KID_BY_CARD
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        session_start();
        
        $idCard = "0";
        $iNumberPurchases = "0";
        $iTotalPurchases = "0";
        if (isset($_SESSION['idCard_view'])) {   $idCard = $_SESSION['idCard_view'];     }
        
        $kidByCardModel                     = new KidByCardModel($this->adapter);
        $kidByCardModel->idCard             = $idCard;
        $kidByCardModel->vName              = $_POST["name_new"];
        $kidByCardModel->iAge               = $_POST["age_new"];
        $kidByCardModel->iNumberPurchases   = $iNumberPurchases;
        $kidByCardModel->iTotalPurchases    = $iTotalPurchases;
        
        $kidByCardModel->create();

        $this->redirect(CONTROLADOR_ADMIN_KID_BY_CARD, "index");
    }

    public function update(){

        session_start();
        
        $idCard = "0";
        if (isset($_SESSION['idCard_view'])) {   $idCard = $_SESSION['idCard_view'];     }
        
        $kidByCardModel                     = new KidByCardModel($this->adapter);
        $kidByCardModel->idKidByCard        = $_POST["hdn_idKidByCard"];
        $kidByCardModel->idCard             = $idCard;
        $kidByCardModel->vName              = $_POST["name"];
        $kidByCardModel->iAge               = $_POST["age"];
        $kidByCardModel->iNumberPurchases   = $_POST["iNumberPurchases"];
        $kidByCardModel->iTotalPurchases    = $_POST["iTotalPurchases"];
        
        $kidByCardModel->update();

        $this->redirect(CONTROLADOR_ADMIN_KID_BY_CARD, "index");
    }

    public function delete(){

        $kidByCardModel                 = new KidByCardModel($this->adapter);
        $kidByCardModel->idKidByCard    = $_POST["hdn_idKidByCard_delete"];
        
        $kidByCardModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_KID_BY_CARD, "index");
    }
}
?>
