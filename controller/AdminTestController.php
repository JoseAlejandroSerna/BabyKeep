<?php
class AdminTestController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        session_start();
        
        $idQuiz = "0";
        $vQuiz = "";

        if (isset($_SESSION['idQuiz_view'])) {   $idQuiz = $_SESSION['idQuiz_view'];     }

        if (isset($_SESSION['vQuiz_view'])) {   $vQuiz  = $_SESSION['vQuiz_view'];     }

        if ($_SESSION['idPermissions'] != "1" || $_SESSION['idPermissions'] != null) {
    
            $questionsModel             = new QuestionsModel($this->adapter);
            $questionsModel->idQuiz     = $idQuiz;
            $info_questions             = $questionsModel->get_by_Quiz();

            $users                      = new UserModel($this->adapter);
            $all_user                   = $users->get_user_test();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminTest",array(
                "info_questions"=>$info_questions,
                "idQuiz"=>$idQuiz,
                "vQuiz"=>$vQuiz,
                "all_user"=>$all_user,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_TEST
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        session_start();
        
        $userTestModel                  = new UserTestModel($this->adapter);
        $userTestModel->idUser          = $_POST["hdn_idUser_create"];
        $userTestModel->vHourTest       = $_POST["hdn_hourTest"];
        $userTestModel->idQuiz          = $_POST["hdn_idQuiz_create"];
        
        $commentTestModel                  = new CommentTestModel($this->adapter);
        $commentTestModel->idQuiz          = $_POST["hdn_idQuiz_create"];
        $commentTestModel->vHourTest       = $_POST["hdn_hourTest"];
        $commentTestModel->vCommentTest    = $_POST["hdn_commentTest"];
        $commentTestModel->create();

        if(isset($_POST['hdn_strTest_create'])){

            $json_test = json_decode($_POST['hdn_strTest_create']);
            
            foreach($json_test as $test) {

                $userTestModel->vUserTest       = $test->vUserTest;
                $userTestModel->idQuestions     = $test->idQuestions;
                $userTestModel->vDate           = $test->vDate;

                $userTestModel->create();
            }
        }

        //Message pay
        $vMessagePay = "¡Gracias! Tu apoyo nos ayuda a crecer.";
        
        $_SESSION["vMessagePay"] = $vMessagePay;
        $this->redirect(CONTROLADOR_MESSAGE_PAY, "index");
    }
}
?>
