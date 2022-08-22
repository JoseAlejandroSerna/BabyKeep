<?php
class AdminStockProductController extends ControladorBase{
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

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("adminStockProduct",array(
                "info_admin_product" => $info_admin_product,
                "info_admin_stock_product" => $info_admin_stock_product,
                "info_admin_branch" => $info_admin_branch,
                "info_admin_type_product" => $info_admin_type_product,
                "info_admin_type_purchase" => $info_admin_type_purchase,
                "info_admin_color" => $info_admin_color,
                "info_admin_size" => $info_admin_size,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_STOCK_PRODUCT
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        if(!empty($_FILES["imageStock_new"]["tmp_name"]))
		{
            $imageName                          = basename($_FILES["imageStock_new"]["name"]);
            $dir                                = "assets/images/products/color/";
            $targetFilePath                     = $dir . $imageName;

            $stockProductModel                          = new StockProductModel($this->adapter);
            $stockProductModel->idProduct               = $_POST["idProduct_new"];
            $stockProductModel->idBranch                = $_POST["idBranch_new"];
            $stockProductModel->idSize                  = $_POST["idSize_new"];
            $stockProductModel->idColor                 = $_POST["idColor_new"];
            $stockProductModel->iStock                  = $_POST["stock_new"];
            $stockProductModel->iPrice                  = $_POST["price_new"];
            $stockProductModel->vImage                  = $imageName;
            $stockProductModel->iStatus                 = $_POST["hdnIsatus_new"];
            
			$stockProductModel->create();

            if (!is_dir($dir))
            {
                mkdir($dir, 0777);
            }

            move_uploaded_file($_FILES["imageStock_new"]["tmp_name"], $targetFilePath);

            $this->redirect(CONTROLADOR_ADMIN_STOCK_PRODUCT, "index");

		}
    }

    public function update(){
        $newImage = false;
        if(basename($_FILES["imageStock"]["name"]) != ""){ $newImage = true;}


        if($newImage)
        {
            $imageName                      = basename($_FILES["imageStock"]["name"]);
        }
        else{
            $imageName                      = $_POST["hdnImage"];
        }

        $dir                                = "assets/images/products/color/";
        $targetFilePath                     = $dir . $imageName;


        $stockProductModel                          = new StockProductModel($this->adapter);
        $stockProductModel->idStockProduct          = $_POST["hdnIdStock"];
        $stockProductModel->idProduct               = $_POST["idProduct"];
        $stockProductModel->idBranch                = $_POST["idBranch"];
        $stockProductModel->idSize                  = $_POST["idSize"];
        $stockProductModel->idColor                 = $_POST["idColor"];
        $stockProductModel->iStock                  = $_POST["stock"];
        $stockProductModel->iPrice                  = $_POST["price"];
        $stockProductModel->vImage                  = $imageName;
        $stockProductModel->iStatus                 = $_POST["hdnIsatus"];

        $stockProductModel->update();

        if (!is_dir($dir))
        {
            mkdir($dir, 0777);
        }
        if($newImage)
        {
            move_uploaded_file($_FILES["imageStock"]["tmp_name"], $targetFilePath);
        }

        $this->redirect(CONTROLADOR_ADMIN_STOCK_PRODUCT, "index");
        
        
    }

    public function delete(){

        $stockProductModel                          = new StockProductModel($this->adapter);
        $stockProductModel->idStockProduct          = $_POST["hdnIdStockProduct_delete"];
        
        $stockProductModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_STOCK_PRODUCT, "index");
    }
}
?>
