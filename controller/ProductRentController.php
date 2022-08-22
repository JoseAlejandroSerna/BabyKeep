<?php
class ProductRentController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        session_start();

        if (isset($_SESSION['idLanguage'])) {   $id_language = $_SESSION['idLanguage'];     }
        else{                                   $_SESSION['idLanguage'] = LENGUAGE_DEFAULT; }

        if (isset($_SESSION['idProduct_detail']))
        {   
            //Busca lenguaje
            $languages                      = new LanguagesModel($this->adapter);
            $languages->idLanguage          = $_SESSION['idLanguage'];
            $alllenguages                   = $languages->getAll();
            $info_menu                      = $languages->get_info_menu();
            $info_car                       = $languages->get_info_car();
            $info_product                   = $languages->get_info_product();
            $info_schedule_lenguage         = $languages->get_info_schedule();
            $info_pay                       = $languages->get_info_pay();

            ///////////////// PRODUCTS
            $productModel                   = new ProductModel($this->adapter);
            $productModel->idProduct        = $_SESSION['idProduct_detail'];
            $info_admin_product             = $productModel->get_by_id();

            $stockProductModel              = new StockProductModel($this->adapter);
            $stockProductModel->idProduct   = $_SESSION['idProduct_detail'];
            $info_admin_stock_product       = $stockProductModel->get_stock_by_idProduct();

            $branchModel                    = new BranchModel($this->adapter);
            $info_admin_branch              = $branchModel->getAll();

            $typeProductModel               = new TypeProductModel($this->adapter);
            $info_admin_type_product        = $typeProductModel->getAll();

            $typePurchaseModel              = new TypePurchaseModel($this->adapter);
            $info_admin_type_purchase       = $typePurchaseModel->getAll();

            $colorModel                     = new ColorModel($this->adapter);
            $info_admin_color               = $colorModel->getAll();

            $sizeModel                      = new SizeModel($this->adapter);
            $info_admin_size                = $sizeModel->getAll();
        
            $scheduleModel                  = new ScheduleModel($this->adapter);
            $info_schedule                  = $scheduleModel->getAll();
    
            $cpModel                        = new CPModel($this->adapter);
            $info_cp                        = $cpModel->getAll();

            ///////////////// REDES SOCIALES
            $socialNetworksModel            = new SocialNetworksModel($this->adapter);
            $info_admin_socialNetworks      = $socialNetworksModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("productRent",array(
                "alllenguages" => $alllenguages,
                "menu" => $info_menu,
                "car" => $info_car,
                "product" => $info_product,
                "schedule" => $info_schedule_lenguage,
                "pay"=>$info_pay,
                "info_admin_product" => $info_admin_product,
                "info_admin_stock_product" => $info_admin_stock_product,
                "info_admin_branch" => $info_admin_branch,
                "info_admin_type_product" => $info_admin_type_product,
                "info_admin_type_purchase" => $info_admin_type_purchase,
                "info_admin_color" => $info_admin_color,
                "info_admin_size" => $info_admin_size,
                "info_schedule" => $info_schedule,
                "info_cp" => $info_cp,
                "info_admin_socialNetworks" => $info_admin_socialNetworks,
                "view" => CONTROLADOR_PRODUCT_RENT
            ));

            
        }
        else{
            $this->redirect(CONTROLADOR_CATALOG, "index");
        }
    }

    public function create(){

        session_start();

        $dirproduct         = "assets/images/users/product/";
        $dirproofAddress    = "assets/images/users/proofAddress/";
        $dirine             = "assets/images/users/ine/";

        $vImageProduct      = "";
        $vImageINE          = "";
        $vImageAddressProof = "";

        $idUserAdmin        = "0";
        $idTypeSchedule     = $_POST['hdn_idTypeSchedule'];
        $vDateCreation      = $_POST['hdn_vDateCreation'];
        $vDateUpdate        = $_POST['hdn_vDateCreation'];
        $vDateEvent         = "";
        $vDateDelivery      = "";
        $idHour             = "0";
        $idProduct          = "0";
        $idColor            = "0";
        $idSize             = "0";
        $vPrice             = "";
        $vAdvance           = "";
        $iAge               = "0";
        $iCheckEvent        = "1";
        $vMinPrice          = "";
        $vMaxPrice          = "";
        $iStatus            = "0";

        if(!empty($_FILES["address_proof"]["tmp_name"])){
            $vImageAddressProof     = $_SESSION['idUser']."_".basename($_FILES["address_proof"]["name"]);
            move_uploaded_file($_FILES["address_proof"]["tmp_name"], $dirproofAddress.$vImageAddressProof);
        }
        if(!empty($_FILES["ine"]["tmp_name"])){
            $vImageINE              = $_SESSION['idUser']."_".basename($_FILES["ine"]["name"]);
            move_uploaded_file($_FILES["ine"]["tmp_name"], $dirine.$vImageINE);
        }
        if(!empty($_FILES["product_example"]["tmp_name"])){
            $vImageProduct          = $_SESSION['idUser']."_".basename($_FILES["product_example"]["name"]);
            move_uploaded_file($_FILES["product_example"]["tmp_name"], $dirproduct.$vImageProduct);
        }

        if($idTypeSchedule == "1")
        {
            $vDateEvent         = $_POST["date_rent"];
            $vDateDelivery      = $_POST["hdn_dateFin"];
            $idProduct          = $_POST["hdn_idProduct"];
            $idColor            = $_POST["hdn_idColor"];
            $idSize             = $_POST["size-modal"];
            $vPrice             = $_POST["hdn_price"];
            $vAdvance           = $_POST["hdn_advance"];
        }
        else if($idTypeSchedule == "2")
        {
            $vDateEvent         = $_POST["date_sale"];
            $idProduct          = $_POST["idProduct_sale"];
        }
        else{
            $vDateEvent         = $_POST["date_making"];
            $idHour             = $_POST["idHour_making"];
            $idColor            = $_POST["idColor_making"];
            $idSize             = $_POST["idSize_making"];
            $iAge               = $_POST["age_making"];
            $vMinPrice          = $_POST["rangeMin_making"];
            $vMaxPrice          = $_POST["rangeMax_making"];
        }

        $scheduleModel                      = new ScheduleModel($this->adapter);
        $scheduleModel->idUser              = $_SESSION['idUser'];
        $scheduleModel->idUserAdmin         = $idUserAdmin;
        $scheduleModel->idBranch            = $_POST["branch-modal"];
        $scheduleModel->idTypeSchedule      = $idTypeSchedule;
        $scheduleModel->idHour              = $idHour;
        $scheduleModel->idProduct           = $idProduct;
        $scheduleModel->idColor             = $idColor;
        $scheduleModel->idSize              = $idSize;
        $scheduleModel->vPrice              = $vPrice;
        $scheduleModel->vAdvance            = $vAdvance;
        $scheduleModel->iCheckEvent         = $iCheckEvent;
        $scheduleModel->iAge                = $iAge;
        $scheduleModel->vMinPrice           = $vMinPrice;
        $scheduleModel->vMaxPrice           = $vMaxPrice;
        $scheduleModel->vDateCreation       = $vDateCreation;
        $scheduleModel->vDateEvent          = $vDateEvent;
        $scheduleModel->vDateDelivery       = $vDateDelivery;
        $scheduleModel->vDateUpdate         = $vDateUpdate;
        $scheduleModel->vImageINE           = $vImageINE;
        $scheduleModel->vImageProduct       = $vImageProduct;
        $scheduleModel->vImageAddressProof  = $vImageAddressProof;
        $scheduleModel->iStatus             = $iStatus;

        $scheduleModel->create();

        // ADD NOTIFICATION
        $idNotifications                    = "1";
        $iSale                              = "0";
        $iRent                              = "0";
        $iMaking                            = "0";
        $notificationsModel                 = new NotificationsModel($this->adapter);
        $info_notifications                 = $notificationsModel->getAll();

        foreach($info_notifications as $notification) {
            $iSale   = $notification->iSale;
            $iRent   = $notification->iRent + 1;
            $iMaking = $notification->iMaking;
        }

        $notificationsModel->idNotifications= $idNotifications;
        $notificationsModel->iSale          = $iSale;
        $notificationsModel->iRent          = $iRent;
        $notificationsModel->iMaking        = $iMaking;

        $notificationsModel->update();

        $this->redirect(CONTROLADOR_THANKYOU, "index");
        
    }
}
?>
