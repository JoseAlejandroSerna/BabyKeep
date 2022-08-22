<?php
class UserController extends ControladorBase{
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
        $info_user=$languages->get_info_user();


        $productModel = new ProductModel($this->adapter);
        $info_admin_product = $productModel->getAll();

        $branchModel = new BranchModel($this->adapter);
        $info_admin_branch = $branchModel->getAll();

        $scheduleModel = new ScheduleModel($this->adapter);
        $scheduleModel->idUser = $_SESSION['idUser'];
        $info_schedule_pending = $scheduleModel->get_schedule_pending_by_id();

        $hourModel = new HourModel($this->adapter);
        $info_admin_hour = $hourModel->getAll();

        //Informacion de redes sociales de DB
        $socialNetworksModel = new SocialNetworksModel($this->adapter);
        $info_admin_socialNetworks = $socialNetworksModel->getAll();

        //Cargamos la vista index y le pasamos valores
        $this->view("user",array(
			"alllenguages" => $alllenguages,
			"menu" => $info_menu,
			"car" => $info_car,
			"user" => $info_user,
			"info_admin_product" => $info_admin_product,
			"info_admin_branch" => $info_admin_branch,
			"info_schedule_pending" => $info_schedule_pending,
			"info_admin_hour" => $info_admin_hour,
			"info_admin_socialNetworks" => $info_admin_socialNetworks,
			"view" => CONTROLADOR_USER
        ));
    }

    public function update(){

        $userModel                  = new UserModel($this->adapter);
        $userModel->idUser          = $_POST["hdn_user_idUser"];
        $userModel->idPermissions   = $_POST["hdn_user_idPermissions"];
        $userModel->vUser           = $_POST["hdn_user_name"];
        $userModel->vEmail          = $_POST["hdn_user_email"];
        $userModel->vPassword       = $_POST["hdn_user_password"];
        $userModel->vPhone          = $_POST["hdn_user_phone"];
        $userModel->vAddress        = $_POST["hdn_user_address"];
        $userModel->vCP             = $_POST["hdn_user_cp"];
        $userModel->vComent         = $_POST["hdn_user_coment"];
        $userModel->iStatus         = $_POST["hdn_user_iStatus"];
        
        $userModel->update();

        if($userModel->exist())
        {
            $arrUser = $userModel->get_login();

            foreach($arrUser as $user) {

                session_start();

                $_SESSION['idUser']         = $user->idUser;
                $_SESSION['idPermissions']  = $user->idPermissions;
                $_SESSION['vUser']          = $user->vUser;
                $_SESSION['vEmail']         = $user->vEmail;
                $_SESSION['vPassword']      = $user->vPassword;
                $_SESSION['vPhone']         = $user->vPhone;
                $_SESSION['vAddress']       = $user->vAddress;
                $_SESSION['vCP']            = $user->vCP;
                $_SESSION['vComent']        = $user->vComent;
                $_SESSION['iStatus']        = $user->iStatus;

                $this->redirect(CONTROLADOR_USER, "index");
            }
        }
        else{
            $this->redirect(CONTROLADOR_ACCOUNT, "index");
        }
    }

    public function logout()
    {
        session_start();
        $_SESSION['idUser']         = "0";
        $_SESSION['idPermissions']  = "0";
        $_SESSION['vUser']          = "";
        $_SESSION['vEmail']         = "";
        $_SESSION['vPassword']      = "";
        $_SESSION['vPhone']         = "";
        $_SESSION['vAddress']       = "";
        $_SESSION['vCP']            = "";
        $_SESSION['vComent']        = "";
        $_SESSION['iStatus']        = "";

        $this->redirect(CONTROLADOR_MAIN, "index");
    }

}
?>
