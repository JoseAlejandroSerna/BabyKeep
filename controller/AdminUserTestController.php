<?php
class AdminUserTestController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        session_start();
        
        if ($_SESSION['idPermissions'] != "1" || $_SESSION['idPermissions'] != null) {
    
            $quizModel                  = new QuizModel($this->adapter);
            $info_quiz                  = $quizModel->getAll();
            
            $questionsModel             = new QuestionsModel($this->adapter);
            $info_questions             = $questionsModel->getAll();

            $users                      = new UserModel($this->adapter);
            $all_user                   = $users->getAll();

            $userTestModel              = new UserTestModel($this->adapter);
            $info_UserTest              = $userTestModel->get_by_tests();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("adminUserTest",array(
                "info_quiz"=>$info_quiz,
                "info_questions"=>$info_questions,
                "all_user"=>$all_user,
                "info_UserTest"=>$info_UserTest,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_USER_TEST
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function view_questions(){

        session_start();

        $_SESSION['idQuiz_view']    = $_POST["hdn_idQuiz_view"];
        $_SESSION['vQuiz_view']     = $_POST["hdn_vQuiz_view"];
        

        $this->redirect(CONTROLADOR_ADMIN_TEST, "index");
    }

    public function view_test(){

        session_start();

        $_SESSION['idQuiz_view']    = $_POST["hdn_idQuiz_test"];
        $_SESSION['vHourTest']      = $_POST["hdn_vHourTest_test"];
        

        $this->redirect(CONTROLADOR_ADMIN_RESPONSE, "index");
    }

    public function delete(){

        $userTestModel                  = new UserTestModel($this->adapter);
        $userTestModel->vHourTest       = $_POST["hdn_hourTest_delete"];
        $userTestModel->delete_hour();

        $this->redirect(CONTROLADOR_ADMIN_USER_TEST, "index");
    }
}
?>
