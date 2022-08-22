<?php
class PayController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    private $ApiKey="tuapikeyprivada";
    private $ApiVersion="2.0.0";

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
        $info_pay=$languages->get_info_pay();
        
        ///////////////// REDES SOCIALES

        $socialNetworksModel = new SocialNetworksModel($this->adapter);
        $info_admin_socialNetworks = $socialNetworksModel->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("pay",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
            "pay"=>$info_pay,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_PAY
        ));
    }
}
?>
