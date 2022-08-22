<?php
class CatalogController extends ControladorBase{
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
        
        ///////////////// LENGUAGE
        $languages                      = new LanguagesModel($this->adapter);
        $languages->idLanguage          = $_SESSION['idLanguage'];
        $alllenguages                   = $languages->getAll();
        $info_menu                      = $languages->get_info_menu();
        $info_car                       = $languages->get_info_car();
        $info_catalog                   = $languages->get_info_catalog();

        ///////////////// PRODUCTS
        $productModel                   = new ProductModel($this->adapter);
        $info_admin_product             = $productModel->get_product_sale();

        $stockProductModel              = new StockProductModel($this->adapter);
        $info_admin_stock_product       = $stockProductModel->getAll();

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

        ///////////////// REDES SOCIALES
        $socialNetworksModel            = new SocialNetworksModel($this->adapter);
        $info_admin_socialNetworks      = $socialNetworksModel->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("catalog",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
            "catalog"=>$info_catalog,
			"info_admin_product" => $info_admin_product,
			"info_admin_stock_product" => $info_admin_stock_product,
            "info_admin_branch" => $info_admin_branch,
			"info_admin_type_product" => $info_admin_type_product,
			"info_admin_type_purchase" => $info_admin_type_purchase,
			"info_admin_color" => $info_admin_color,
			"info_admin_size" => $info_admin_size,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_CATALOG
        ));
    }

    public function product_detail(){
        
        session_start();

        $idProduct_detail = $_POST["idProduct"];

        if(intval($idProduct_detail) > 0)
        {
            $_SESSION['idProduct_detail'] = $idProduct_detail;
        
            $this->redirect(CONTROLADOR_PRODUCT, "index");
        }        else{
            $this->redirect(CONTROLADOR_CATALOG, "index");
        }
    }

    public function pay()
    {
        session_start();
        
        $_SESSION['hdn_cart']           = $_POST["hdn_cart"];
        $_SESSION['hdn_idUser']         = $_POST["hdn_idUser"];
        $_SESSION['hdn_idAdmin']        = $_POST["hdn_idAdmin"];
        $_SESSION['hdn_iCommission']    = $_POST["hdn_iCommission"];
        $_SESSION['hdn_iSending']       = $_POST["hdn_iSending"];
        $_SESSION['hdn_iSubtotal']      = $_POST["hdn_iSubtotal"];
        $_SESSION['hdn_iTotal']         = $_POST["hdn_iTotal"];
        $_SESSION['hdn_vDateCreation']  = $_POST["hdn_vDateCreation"];
        $_SESSION['hdn_idTypePayment']  = $_POST["hdn_idTypePayment"];
        $_SESSION['hdn_iStatus']        = $_POST["hdn_iStatus"];

        $this->redirect(CONTROLADOR_PAY, "index");
        
    }
    
}
?>