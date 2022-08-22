<?php
class MainController extends ControladorBase{
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

        //Informacion de menu,car y cont Main 
        $info_menu=$languages->get_info_menu();
        $info_car=$languages->get_info_car();
        $info_main=$languages->get_info_main();

        //Informacion de main de DB
        $mainModel = new MainModel($this->adapter);
        $info_admin_main = $mainModel->getAll();

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
        $this->view("index",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
			"main" => $info_main,
			"info_admin_main" => $info_admin_main,
            "info_user" => $info_user,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_MAIN
        ));
    }
    
    public function crear(){
        if(isset($_POST["nombre"])){
            
            //Creamos un usuario
            $usuario=new Usuario();
            $usuario->setNombre($_POST["nombre"]);
            $usuario->setApellido($_POST["apellido"]);
            $usuario->setEmail($_POST["email"]);
            $usuario->setPassword(sha1($_POST["password"]));
            $save=$usuario->save();
        }
        $this->redirect(CONTROLADOR_MAIN, "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $usuario=new Usuario();
            $usuario->deleteById($id); 
        }
        $this->redirect();
    }
    

    public function getLanguage(){
        session_start();
        $_SESSION['idLanguage'] = $_POST["idLanguage_menu"];

        $this->redirect(CONTROLADOR_MAIN, "index");
    }

}
?>
