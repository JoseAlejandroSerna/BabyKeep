<?php
class ThankyouController extends ControladorBase{
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
        $info_thankyouContact=$languages->get_info_thankyouContact();

        //Informacion de redes sociales de DB
        $socialNetworksModel = new SocialNetworksModel($this->adapter);
        $info_admin_socialNetworks = $socialNetworksModel->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("thankyou",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
            "info_thankyouContact"=>$info_thankyouContact,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_THANKYOU
        ));
    }

}
?>
