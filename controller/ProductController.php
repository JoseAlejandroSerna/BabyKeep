<?php
class ProductController extends ControladorBase{
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
            $languages=new LanguagesModel($this->adapter);
            $languages->idLanguage = $_SESSION['idLanguage'];

            $alllenguages=$languages->getAll();

            $info_menu=$languages->get_info_menu();
            $info_car=$languages->get_info_car();
            $info_product=$languages->get_info_product();

            ///////////////// PRODUCTS

            $productModel = new ProductModel($this->adapter);
            $productModel->idProduct = $_SESSION['idProduct_detail'];
            $info_admin_product = $productModel->get_by_id();

            $stockProductModel = new StockProductModel($this->adapter);
            $stockProductModel->idProduct = $_SESSION['idProduct_detail'];
            $info_admin_stock_product = $stockProductModel->get_stock_by_idProduct();

            $branchModel = new BranchModel($this->adapter);
            $info_admin_branch = $branchModel->getAll();

            $typeProductModel = new TypeProductModel($this->adapter);
            $info_admin_type_product = $typeProductModel->getAll();

            $typePurchaseModel = new TypePurchaseModel($this->adapter);
            $info_admin_type_purchase = $typePurchaseModel->getAll();

            $colorModel = new ColorModel($this->adapter);
            $info_admin_color = $colorModel->getAll();

            $sizeModel = new SizeModel($this->adapter);
            $info_admin_size = $sizeModel->getAll();

            ///////////////// REDES SOCIALES

            $socialNetworksModel = new SocialNetworksModel($this->adapter);
            $info_admin_socialNetworks = $socialNetworksModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("product",array(
                "alllenguages" => $alllenguages,
                "menu" => $info_menu,
                "car" => $info_car,
                "product" => $info_product,
                "info_admin_product" => $info_admin_product,
                "info_admin_stock_product" => $info_admin_stock_product,
                "info_admin_branch" => $info_admin_branch,
                "info_admin_type_product" => $info_admin_type_product,
                "info_admin_type_purchase" => $info_admin_type_purchase,
                "info_admin_color" => $info_admin_color,
                "info_admin_size" => $info_admin_size,
                "info_admin_socialNetworks" => $info_admin_socialNetworks,
                "view" => CONTROLADOR_PRODUCT
            ));

            
        }
        else{
            $this->redirect(CONTROLADOR_CATALOG, "index");
        }
    }

    public function getLanguage(){
        
        $_SESSION['idLanguage'] = $_POST["idLanguage_menu"];

        $this->redirect(CONTROLADOR_PRODUCT, "index");
    }
    
}
?>
