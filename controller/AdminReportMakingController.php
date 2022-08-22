<?php
class AdminReportMakingController extends ControladorBase{
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

            $branchModel                = new BranchModel($this->adapter);
            $info_admin_branch          = $branchModel->getAll();
    
            $colorModel                 = new ColorModel($this->adapter);
            $info_admin_color           = $colorModel->getAll();
    
            $hourModel                  = new HourModel($this->adapter);
            $info_admin_hour            = $hourModel->getAll();

            $productModel               = new ProductModel($this->adapter);
            $info_admin_product         = $productModel->getAll();
            
            $scheduleModel              = new ScheduleModel($this->adapter);
            $info_schedule              = $scheduleModel->getAll();
    
            $sizeModel                  = new SizeModel($this->adapter);
            $info_admin_size            = $sizeModel->getAll();
    
            $typeScheduleModel          = new TypeScheduleModel($this->adapter);
            $info_admin_type_schedule   = $typeScheduleModel->getAll();

            $users                      = new UserModel($this->adapter);
            $all_user                   = $users->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();


            //Cargamos la vista index y le pasamos valores
            $this->view("adminReportMaking",array(
                "info_admin_branch" => $info_admin_branch,
                "info_admin_color" => $info_admin_color,
                "info_admin_hour" => $info_admin_hour,
                "info_admin_product" => $info_admin_product,
                "info_schedule" => $info_schedule,
                "info_admin_size" => $info_admin_size,
                "info_admin_type_schedule" => $info_admin_type_schedule,
                "all_user" => $all_user,
                "info_notifications"=>$info_notifications,
                "view" => CONTROLADOR_ADMIN_REPORT_MAKING
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function update(){

        $vAdvance = "0";
        $scheduleModel                          = new ScheduleModel($this->adapter);
        $scheduleModel->idSchedule              = $_POST["hdn_idSchedule_update"];
        $scheduleModel->iStatus                 = $_POST["hdn_iStatus"];
        $scheduleModel->vAdvance                = $vAdvance;
        
        $scheduleModel->update_status();

        $this->redirect(CONTROLADOR_ADMIN_REPORT_MAKING, "index");
    }

    public function delete(){
        
        $scheduleModel                          = new ScheduleModel($this->adapter);
        $scheduleModel->idSchedule              = $_POST["hdn_idSchedule_delete"];
        
        $scheduleModel->delete();

        $this->redirect(CONTROLADOR_ADMIN_REPORT_MAKING, "index");
    }
}
?>
