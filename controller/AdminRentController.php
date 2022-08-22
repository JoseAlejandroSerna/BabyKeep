<?php
class AdminRentController extends ControladorBase{
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

            $productModel               = new ProductModel($this->adapter);
            $info_admin_product         = $productModel->getAll();
    
            $stockProductModel          = new StockProductModel($this->adapter);
            $info_admin_stock_product   = $stockProductModel->getAll();
    
            $branchModel                = new BranchModel($this->adapter);
            $info_admin_branch          = $branchModel->getAll();
    
            $typeProductModel           = new TypeProductModel($this->adapter);
            $info_admin_type_product    = $typeProductModel->getAll();
    
            $typePurchaseModel          = new TypePurchaseModel($this->adapter);
            $info_admin_type_purchase   = $typePurchaseModel->getAll();
    
            $colorModel                 = new ColorModel($this->adapter);
            $info_admin_color           = $colorModel->getAll();
    
            $sizeModel                  = new SizeModel($this->adapter);
            $info_admin_size            = $sizeModel->getAll();
    
            $hourModel                  = new HourModel($this->adapter);
            $info_admin_hour            = $hourModel->getAll();
            
            $scheduleModel              = new ScheduleModel($this->adapter);
            $info_schedule              = $scheduleModel->getAll();
            
            $users                      = new UserModel($this->adapter);
            $all_user                   = $users->get_user_test();
    
            $typePaymentModel           = new TypePaymentModel($this->adapter);
            $info_admin_type_payment    = $typePaymentModel->getAll();
            
            $promotionModel             = new PromotionModel($this->adapter);
            $info_promotion             = $promotionModel->getAll_active();
            
            $kidByCardModel             = new KidByCardModel($this->adapter);
            $info_kidByCard             = $kidByCardModel->getAll();
            
            $cardModel                  = new CardModel($this->adapter);
            $info_card                  = $cardModel->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("adminRent",array(
                "info_admin_product" => $info_admin_product,
                "info_admin_stock_product" => $info_admin_stock_product,
                "info_admin_branch" => $info_admin_branch,
                "info_admin_type_product" => $info_admin_type_product,
                "info_admin_type_purchase" => $info_admin_type_purchase,
                "info_admin_type_payment" => $info_admin_type_payment,
                "info_admin_color" => $info_admin_color,
                "info_admin_size" => $info_admin_size,
                "info_admin_hour" => $info_admin_hour,
                "info_schedule" => $info_schedule,
                "all_user" => $all_user,
                "info_promotion" => $info_promotion,
                "info_card" => $info_card,
                "info_kidByCard" => $info_kidByCard,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_RENT
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
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

        $idUser             = $_POST['hdn_idUser'];
        $idUserAdmin        = $_SESSION['idUser'];
        $idTypeSchedule     = $_POST['hdn_idTypeSchedule_rent'];
        $vDateCreation      = $_POST['hdn_vDateCreation'];
        $vDateEvent         = $_POST["date_rent"];
        $vDateDelivery      = $_POST["hdn_dateFin_rent"];
        $idHour             = "0";
        $idProduct          = $_POST["idProduct_rent"];
        $idColor            = $_POST["idColor_rent"];
        $idSize             = $_POST["idSize_rent"];
        $vPrice             = $_POST["hdn_price_rent"];
        $vAdvance           = $_POST["vAdvance"];
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


        $scheduleModel                      = new ScheduleModel($this->adapter);
        $scheduleModel->idUser              = $idUser;
        $scheduleModel->idUserAdmin         = $idUserAdmin;
        $scheduleModel->idBranch            = $_POST["idBranch"];
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
        $scheduleModel->vImageINE           = $vImageINE;
        $scheduleModel->vImageProduct       = $vImageProduct;
        $scheduleModel->vImageAddressProof  = $vImageAddressProof;
        $scheduleModel->iStatus             = $iStatus;

        $scheduleModel->create();

        //Refresh count Card and kid
        
        $idCard                         = $_POST["hdn_idCard"];
        $idKidByCard                    = $_POST["hdn_idKidByCard"];
        $iCountPurchase                 = $_POST["hdn_iCountPurchase"];
        $idPromotion                    = $_POST["hdn_idPromotion"];
        $countPurchaseCard              = "0";
        $countPurchaseCardKid           = "0";
        $iTotalPurchasesKid             = "0";
        $TemCountPurchaseCardKid        = "0";
        $TemTotalPurchase               = "0";
        $iTotalPurchasePromotion        = $_POST["hdn_iTotalPurchase"];
        $iTotalPromotion                = "0";
        
        if(intval($idKidByCard) > 0)
        {

            $cardModel                              = new CardModel($this->adapter);
            $cardModel->idCard                      = $idCard;
            $info_card                              = $cardModel->get_by_id();
    
            foreach($info_card as $card) {
                $countPurchaseCard                  = $card->iNumberPurchases + 1;
            }

            $cardModel->iNumberPurchases            = $countPurchaseCard;
            $cardModel->update_CountPurchase();
    
            $kidByCardModel                         = new KidByCardModel($this->adapter);
            $kidByCardModel->idKidByCard            = $idKidByCard;
            $info_kidByCard                         = $kidByCardModel->get_by_kid();
    
            foreach($info_kidByCard as $kid) {
                if(intval($idPromotion) > 0)
                {
                    if(($kid->iNumberPurchases - intval($iCountPurchase)) > 0)
                    {
                        $TemCountPurchaseCardKid = $kid->iNumberPurchases - intval($iCountPurchase);
                    }

                    if(($kid->iTotalPurchases - intval($iTotalPurchasePromotion)) > 0)
                    {
                        $TemTotalPurchase = $kid->iTotalPurchases - intval($iTotalPurchasePromotion);
                    }
                    $countPurchaseCardKid           = $TemCountPurchaseCardKid;
                    $iTotalPromotion                = $TemTotalPurchase;
                }else{
                    $countPurchaseCardKid           = $kid->iNumberPurchases + 1;
                    $iTotalPromotion                = $kid->iTotalPurchases + intval($iTotalPurchasePromotion);
                }
            }
    
            $kidByCardModel->iNumberPurchases           = $countPurchaseCardKid;
            $kidByCardModel->iTotalPurchases            = $iTotalPromotion;
            $kidByCardModel->update_CountPurchase();

            //echo "<<< idCard:".$card->idCard."|countPurchaseCard:".$countPurchaseCard."|idKidByCard:".$idKidByCard."|idPromotion:".$idPromotion."|iNumberPurchases:".$countPurchaseCardKid."|iTotalPurchases:".$iTotalPurchasesKid.">>>>>>>>";
        }

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

        
        //Message pay
        $vMessagePay = "Renta realizada con exito";
        
        $_SESSION["vMessagePay"] = $vMessagePay;
        $this->redirect(CONTROLADOR_MESSAGE_PAY, "index");
        
    }
}
?>
