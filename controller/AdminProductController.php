<?php
class AdminProductController extends ControladorBase{
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
    
            $productModel               = new ProductModel($this->adapter);
            $info_admin_product         = $productModel->getAll();

            $typeProductModel           = new TypeProductModel($this->adapter);
            $info_admin_type_product    = $typeProductModel->getAll();
            
            $typePurchaseModel          = new TypePurchaseModel($this->adapter);
            $info_admin_type_purchase   = $typePurchaseModel->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("adminProduct",array(
                "info_admin_product" => $info_admin_product,
                "info_admin_type_product" => $info_admin_type_product,
                "info_admin_type_purchase" => $info_admin_type_purchase,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_PRODUCT
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        if(!empty($_FILES["imageEdit_new"]["tmp_name"]))
		{
            $imageName                          = $_POST["key_new"]."_".basename($_FILES["imageEdit_new"]["name"]);
            $idProduct                          = $_POST["hdnIdProduct"];
            $dir                                = "assets/images/products/";
            $targetFilePath                     = $dir . $imageName;

            $productModel                       = new ProductModel($this->adapter);
            $productModel->idTypePurchase       = $_POST["typePurchase_new"];
            $productModel->idTypeProduct        = $_POST["typeProduct_new"];
            $productModel->vProduct             = $_POST["name_new"];
            $productModel->vDescription         = $_POST["description_new"];
            $productModel->vDescriptionDetail   = $_POST["descriptionDetail_new"];
            $productModel->vClave               = $_POST["key_new"];
            $productModel->vImage               = $imageName;
            $productModel->iStatus              = $_POST["hdnIsatus_new"];
            
			$productModel->create();

            if (!is_dir($dir))
            {
                mkdir($dir, 0777);
            }

            move_uploaded_file($_FILES["imageEdit_new"]["tmp_name"], $targetFilePath);

            $this->redirect(CONTROLADOR_ADMIN_PRODUCT, "index");

		}
    }

    public function update(){
        $newImage = false;
        if(basename($_FILES["imageEdit"]["name"]) != ""){ $newImage = true;}


        if($newImage)
        {
            $imageName                      = $_POST["key"]."_".basename($_FILES["imageEdit"]["name"]);
        }
        else{
            $imageName                      = $_POST["hdnImage"];
        }

        $idProduct                          = $_POST["hdnIdProduct"];
        $dir                                = "assets/images/products/";
        $targetFilePath                     = $dir . $imageName;


        $productModel                       = new ProductModel($this->adapter);
        $productModel->idProduct            = $_POST["hdnIdProduct"];
        $productModel->idTypePurchase       = $_POST["typePurchase"];
        $productModel->idTypeProduct        = $_POST["typeProduct"];
        $productModel->vProduct             = $_POST["name"];
        $productModel->vDescription         = $_POST["description"];
        $productModel->vDescriptionDetail   = $_POST["descriptionDetail"];
        $productModel->vClave               = $_POST["key"];
        $productModel->vImage               = $imageName;
        $productModel->iStatus              = $_POST["hdnIsatus"];

        $productModel->update();

        if (!is_dir($dir))
        {
            mkdir($dir, 0777);
        }
        if($newImage)
        {
            move_uploaded_file($_FILES["imageEdit"]["tmp_name"], $targetFilePath);
        }

        $this->redirect(CONTROLADOR_ADMIN_PRODUCT, "index");
        
    }

    public function delete(){

        $productModel                       = new ProductModel($this->adapter);
        $productModel->idProduct            = $_POST["hdnIdProduct_delete"];
        
        $productModel->delete();

        
        $stockProductModel                  = new StockProductModel($this->adapter);
        $stockProductModel->idProduct       = $_POST["hdnIdProduct_delete"];
        
        $stockProductModel->delete_by_product();

        $this->redirect(CONTROLADOR_ADMIN_PRODUCT, "index");
    }
}
?>
