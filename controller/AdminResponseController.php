<?php
class AdminResponseController extends ControladorBase{
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
        $vHourTest = "";
        if (isset($_SESSION['idQuiz_view'])) {      $idQuiz = $_SESSION['idQuiz_view'];     }

        if (isset($_SESSION['vHourTest'])) {        $vHourTest  = $_SESSION['vHourTest'];     }

        if ($_SESSION['idPermissions'] != "1" || $_SESSION['idPermissions'] != null) {
    
            $userTestModel              = new UserTestModel($this->adapter);
            $userTestModel->idQuiz      = $idQuiz;
            $userTestModel->vHourTest   = $vHourTest;
            $info_userTest              = $userTestModel->get_by_Quiz_Hour();
            
            $quizModel                  = new QuizModel($this->adapter);
            $info_quiz                  = $quizModel->getAll();
            
            $questionsModel             = new QuestionsModel($this->adapter);
            $info_questions             = $questionsModel->getAll();
            
            $users                      = new UserModel($this->adapter);
            $all_user                   = $users->get_user_test();
            
            $commentTestModel               = new CommentTestModel($this->adapter);
            $commentTestModel->idQuiz       = $idQuiz;
            $commentTestModel->vHourTest    = $vHourTest;
            $info_commentTest               = $commentTestModel->get_by_Quiz_Hour();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminResponse",array(
                "info_userTest"=>$info_userTest,
                "info_quiz"=>$info_quiz,
                "idQuiz"=>$idQuiz,
                "vHourTest"=>$vHourTest,
                "info_questions"=>$info_questions,
                "all_user" => $all_user,
                "info_commentTest" => $info_commentTest,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_RESPONSE
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }
}
?>
