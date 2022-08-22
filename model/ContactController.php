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

        //Informacion de menu,car y contact
        $info_menu=$languages->get_info_menu();
        $info_car=$languages->get_info_car();
        $info_contact=$languages->get_info_contact();

        //Informacion de designer de DB
        $branchModel = new BranchModel($this->adapter);
        $info_admin_branch = $branchModel->getAll();

        //Informacion de redes sociales de DB
        $socialNetworksModel = new SocialNetworksModel($this->adapter);
        $info_admin_socialNetworks = $socialNetworksModel->getAll();

        //Busca info usuario
        if (isset($_SESSION['idUser'])) {   $id_user = $_SESSION['idUser'];     }
        else{                               $_SESSION['idUser'] = USER_DEFAULT; }

        $userModel = new UserModel($this->adapter);
        $userModel->idUser = $_SESSION['idUser'];

        if($_SESSION['idUser'] > 0){    $info_user = $userModel->get_by_id();   }
        else{                           $info_user = [];                        }


        //Cargamos la vista index y le pasamos valores
        $this->view("contact",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
			"contact" => $info_contact,
			"info_admin_branch" => $info_admin_branch,
            "info_user" => $info_user,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_CONTACT
        ));
    }

    public function getLanguage(){
        
        $_SESSION['idLanguage'] = $_POST["idLanguage_menu"];

        $this->redirect(CONTROLADOR_CONTACT, "index");
    }

    public function sendEmail(){

        // título
        $subject = "Nombre de usuario";
        // mensaje
        $message = $_POST["message"];
        // Cabeceras adicionales
        $headers .= "From: Nombre de usuario <".$_POST["email"].">" . "\r\n";


        $email = "jose.alejandro.serna@hotmail.com";

        if(@mail($email, $subject, $message, $headers))
        {
            $this->redirect(CONTROLADOR_CONTACT, "thankyouContact");
        }else{
            $this->redirect(CONTROLADOR_CONTACT, "index");
        }

    }

    public function thankyouContact(){
        session_start();
        if (isset($_SESSION['idLanguage'])) {   $id_language = $_SESSION['idLanguage'];     }
        else{                                   $_SESSION['idLanguage'] = LENGUAGE_DEFAULT; }
        
        //Busca lenguaje
        $languages=new LanguagesModel($this->adapter);
        $languages->idLanguage = $_SESSION['idLanguage'];

        $alllenguages=$languages->getAll();

        //Informacion de menu,car y contact
        $info_menu=$languages->get_info_menu();
        $info_car=$languages->get_info_car();
        $info_thankyouContact=$languages->get_info_thankyouContact();

        //Informacion de redes sociales de DB
        $socialNetworksModel = new SocialNetworksModel($this->adapter);
        $info_admin_socialNetworks = $socialNetworksModel->getAll();

        //Busca info usuario
        if (isset($_SESSION['idUser'])) {   $id_user = $_SESSION['idUser'];     }
        else{                               $_SESSION['idUser'] = USER_DEFAULT; }

        $userModel = new UserModel($this->adapter);
        $userModel->idUser = $_SESSION['idUser'];

        if($_SESSION['idUser'] > 0){    $info_user = $userModel->get_by_id();   }
        else{                           $info_user = [];                        }

        //Cargamos la vista index y le pasamos valores
        $this->view("thankyouContact",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
			"thankyouContact" => $info_thankyouContact,
            "info_user" => $info_user,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_CONTACT
        ));
    }

}
?>
