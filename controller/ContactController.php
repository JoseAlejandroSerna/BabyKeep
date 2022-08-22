<?php
class ContactController extends ControladorBase{
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
    
        //Busca lenguaje
        $languages=new LanguagesModel($this->adapter);
        $languages->idLanguage = $_SESSION['idLanguage'];

        $alllenguages=$languages->getAll();

        $info_menu=$languages->get_info_menu();
        $info_car=$languages->get_info_car();
        $info_contact=$languages->get_info_contact();

        $branchModel = new BranchModel($this->adapter);
        $info_admin_branch = $branchModel->getAll();

        $branchPhoneModel = new BranchPhoneModel($this->adapter);
        $info_admin_branch_phone = $branchPhoneModel->getAll();

        $socialNetworksModel = new SocialNetworksModel($this->adapter);
        $info_admin_socialNetworks = $socialNetworksModel->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("contact",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
			"contact" => $info_contact,
			"info_admin_branch" => $info_admin_branch,
			"info_admin_branch_phone" => $info_admin_branch_phone,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_CONTACT
        ));
    }
    
    public function sendEmail(){

        $msg = $_POST["message"];
        $msg = wordwrap($msg,10);

        mail($_POST["hdn_email_branch"],"Sucursal:".$_POST["hdn_vBranch"],$msg);
        
        $this->redirect(CONTROLADOR_THANKYOU, "index");
      
    }

}
?>
