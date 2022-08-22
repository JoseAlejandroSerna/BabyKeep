<?php
class AdminQuizController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        session_start();
        
        if ($_SESSION['idPermissions'] != "1" || isset($_SESSION['idPermissions'])) {
    
            $quizModel                  = new QuizModel($this->adapter);
            $info_quiz                  = $quizModel->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();
            
            //Cargamos la vista index y le pasamos valores
            $this->view("adminQuiz",array(
                "info_quiz"=>$info_quiz,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_QUIZ
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function create(){

        $quizModel                  = new QuizModel($this->adapter);
        $quizModel->vQuiz           = $_POST["hdn_vQuiz_create"];
        $quizModel->idBranch        = $_POST["hdn_idBranch_create"];
        $quizModel->iStatus         = $_POST["hdn_iStatus_create"];
        
        $quizModel->create();

        $this->redirect(CONTROLADOR_ADMIN_QUIZ, "index");
    }

    public function update(){

        $quizModel                  = new QuizModel($this->adapter);
        $quizModel->idQuiz          = $_POST["hdn_idQuiz_update"];
        $quizModel->idBranch        = $_POST["hdn_idBranch_update"];
        $quizModel->vQuiz           = $_POST["hdn_vQuiz_update"];
        $quizModel->iStatus         = $_POST["hdn_iStatus_update"];
        
        $quizModel->update();

        $this->redirect(CONTROLADOR_ADMIN_QUIZ, "index");
    }

    public function delete(){

        $quizModel                  = new QuizModel($this->adapter);
        $quizModel->idQuiz          = $_POST["hdn_idQuiz_delete"];
        
        $quizModel->delete();
        ////
        $questionsModel             = new QuestionsModel($this->adapter);
        $questionsModel->idQuiz     = $_POST["hdn_idQuiz_delete"];
        
        $questionsModel->delete_by_Quiz();

        $this->redirect(CONTROLADOR_ADMIN_QUIZ, "index");
    }

    public function view_questions(){

        session_start();

        $_SESSION['idQuiz_view']    = $_POST["hdn_idQuiz_view"];
        $_SESSION['vQuiz_view']     = $_POST["hdn_vQuiz_view"];
        

        $this->redirect(CONTROLADOR_ADMIN_QUESTIONS, "index");
    }
}
?>
