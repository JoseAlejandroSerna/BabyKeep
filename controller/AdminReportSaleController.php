<?php
class AdminReportSaleController extends ControladorBase{
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
    
            $purchaseHistoryModel       = new PurchaseHistoryModel($this->adapter);
            $info_admin_purchase_history = $purchaseHistoryModel->getAll();

            $users                      = new UserModel($this->adapter);
            $all_user                   = $users->getAll();

            $branchModel                = new BranchModel($this->adapter);
            $info_admin_branch          = $branchModel->getAll();

            $productModel               = new ProductModel($this->adapter);
            $info_admin_product         = $productModel->getAll();

            $stockProductModel          = new StockProductModel($this->adapter);
            $info_admin_stock_product   = $stockProductModel->getAll();
    
            $typePaymentModel           = new TypePaymentModel($this->adapter);
            $info_admin_type_payment    = $typePaymentModel->getAll();

            $colorModel                 = new ColorModel($this->adapter);
            $info_admin_color           = $colorModel->getAll();

            $sizeModel                  = new SizeModel($this->adapter);
            $info_admin_size            = $sizeModel->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("adminReportSale",array(
                "info_admin_purchase_history" => $info_admin_purchase_history,
                "all_user" => $all_user,
                "info_admin_branch" => $info_admin_branch,
                "info_admin_product" => $info_admin_product,
                "info_admin_stock_product" => $info_admin_stock_product,
                "info_admin_type_payment" => $info_admin_type_payment,
                "info_admin_color" => $info_admin_color,
                "info_admin_size" => $info_admin_size,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_REPORT_SALE
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function update(){

        $purchaseHistoryModel                       = new PurchaseHistoryModel($this->adapter);
        $purchaseHistoryModel->idPurchaseHistory    = $_POST["hdn_idPurchaseHistory_update"];
        $purchaseHistoryModel->iStatus              = $_POST["hdn_iStatus"];
        
        $purchaseHistoryModel->update();

        $this->redirect(CONTROLADOR_ADMIN_REPORT_SALE, "index");
    }

    public function delete(){

        $purchaseHistoryModel                       = new PurchaseHistoryModel($this->adapter);
        $purchaseHistoryModel->idPurchaseHistory    = $_POST["hdn_idPurchaseHistory_delete"];
        
        $purchaseHistoryModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_REPORT_SALE, "index");
    }
}
?>
