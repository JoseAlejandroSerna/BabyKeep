<?php
class DesignerController extends ControladorBase{
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

        //Informacion de menu,car
        $info_menu=$languages->get_info_menu();
        $info_car=$languages->get_info_car();

        //Informacion de designer de DB
        $designerModel = new DesignerModel($this->adapter);
        $info_admin_designer = $designerModel->getAll();

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
        $this->view("designer",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
			"info_admin_designer" => $info_admin_designer,
            "info_user" => $info_user,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_DESIGNER
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
        $this->redirect(CONTROLADOR_DESIGNER, "index");
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
        
        $_SESSION['idLanguage'] = $_POST["idLanguage_menu"];

        $this->redirect(CONTROLADOR_DESIGNER, "index");
    }

}
?>
