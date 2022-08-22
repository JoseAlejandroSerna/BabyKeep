<?php
class AdminSaleController extends ControladorBase{
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
    
            $typePaymentModel           = new TypePaymentModel($this->adapter);
            $info_admin_type_payment    = $typePaymentModel->getAll();
    
            $typePurchaseModel          = new TypePurchaseModel($this->adapter);
            $info_admin_type_purchase   = $typePurchaseModel->getAll();
    
            $colorModel                 = new ColorModel($this->adapter);
            $info_admin_color           = $colorModel->getAll();
    
            $sizeModel                  = new SizeModel($this->adapter);
            $info_admin_size            = $sizeModel->getAll();
            
            $users                      = new UserModel($this->adapter);
            $all_user                   = $users->get_user_test();
            
            $promotionModel             = new PromotionModel($this->adapter);
            $info_promotion             = $promotionModel->getAll_active();
            
            $kidByCardModel             = new KidByCardModel($this->adapter);
            $info_kidByCard             = $kidByCardModel->getAll();
            
            $cardModel                  = new CardModel($this->adapter);
            $info_card                  = $cardModel->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("adminSale",array(
                "info_admin_product" => $info_admin_product,
                "info_admin_stock_product" => $info_admin_stock_product,
                "info_admin_branch" => $info_admin_branch,
                "info_admin_type_product" => $info_admin_type_product,
                "info_admin_type_payment" => $info_admin_type_payment,
                "info_admin_type_purchase" => $info_admin_type_purchase,
                "info_admin_color" => $info_admin_color,
                "info_admin_size" => $info_admin_size,
                "all_user" => $all_user,
                "info_promotion" => $info_promotion,
                "info_card" => $info_card,
                "info_kidByCard" => $info_kidByCard,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_SALE
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function pay()
    {
        session_start();

        $idStockProduct = 0;
        $iStock = 0;
        $updateStock = 0;

        $purchaseHistoryModel                   = new PurchaseHistoryModel($this->adapter);
        $purchaseHistoryModel->idUser           = $_POST["hdn_idUser"];
        $purchaseHistoryModel->idUserAdmin      = $_POST["hdn_idAdmin"];
        $purchaseHistoryModel->iCommission      = $_POST["hdn_iCommission"];
        $purchaseHistoryModel->iSending         = $_POST["hdn_iSending"];
        $purchaseHistoryModel->iSubtotal        = $_POST["hdn_iSubtotal"];
        $purchaseHistoryModel->itotal           = $_POST["hdn_iTotal"];
        $purchaseHistoryModel->vDateCreation    = $_POST["hdn_vDateCreation"];
        $purchaseHistoryModel->idTypePayment    = $_POST["hdn_idTypePayment"];
        $purchaseHistoryModel->iStatus          = $_POST["hdn_iStatus"];
        
        //// If purchase is correct
        if(isset($_POST['hdn_strCart'])){

            $json_cart = json_decode($_POST['hdn_strCart']);
            
            foreach($json_cart as $cart) {

                $stockProductModel                  = new StockProductModel($this->adapter);
                $stockProductModel->idProduct       = $cart->idProduct;
                $stockProductModel->idBranch        = $cart->idBranch;
                $stockProductModel->idSize          = $cart->idSize;
                $stockProductModel->idColor         = $cart->idColor;

                $info_stock = $stockProductModel->get_for_sale();

                foreach($info_stock as $stock) {
                    $idStockProduct = $stock->idStockProduct;
                    $iStock = $stock->iStock;
                }

                $purchaseHistoryModel->idProduct            = $cart->idProduct;
                $purchaseHistoryModel->idBranch             = $cart->idBranch;
                $purchaseHistoryModel->iPieces              = $cart->iPieces;
                $purchaseHistoryModel->idStockProduct       = $idStockProduct;
                
                $updateStock                                = $iStock - $cart->iPieces;
                $stockProductModel->idStockProduct          = $idStockProduct;
                $stockProductModel->iStock                  = $updateStock;
                
                $purchaseHistoryModel->create();
                $stockProductModel->update_stock();
                
                //$this->redirect(CONTROLADOR_ADMIN_SALE, "index");
                //echo "<<< idProduct:".$cart->idProduct."|idBranch:".$cart->idBranch."|iPieces:".$cart->iPieces."|idStockProduct:".$idStockProduct.">>>>>>>>";
            }
        }

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
            $iSale   = $notification->iSale + 1;
            $iRent   = $notification->iRent;
            $iMaking = $notification->iMaking;
        }

        $notificationsModel->idNotifications= $idNotifications;
        $notificationsModel->iSale          = $iSale;
        $notificationsModel->iRent          = $iRent;
        $notificationsModel->iMaking        = $iMaking;

        $notificationsModel->update();

        //Message pay
        $vMessagePay = "Pago realizado con exito";
        
        $_SESSION["vMessagePay"] = $vMessagePay;
        $this->redirect(CONTROLADOR_MESSAGE_PAY, "index");
        
        ///////
    }
}
?>