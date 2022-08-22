<?php
class AdminCalendarController extends ControladorBase{
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

            $scheduleModel              = new ScheduleModel($this->adapter);
            $info_schedule              = $scheduleModel->getAll();

            $productModel               = new ProductModel($this->adapter);
            $info_admin_product         = $productModel->getAll();

            $stockProductModel          = new StockProductModel($this->adapter);
            $info_admin_stock_product   = $stockProductModel->getAll();

            $branchModel                = new BranchModel($this->adapter);
            $info_admin_branch          = $branchModel->getAll();
    
            $typeProductModel           = new TypeProductModel($this->adapter);
            $info_admin_type_product    = $typeProductModel->getAll();
    
            $typePurchaseModel          = new TypePurchaseModel($this->adapter);
            $info_admin_type_purchase   = $typePurchaseModel->getAll();
    
            $colorModel                 = new ColorModel($this->adapter);
            $info_admin_color           = $colorModel->getAll();
    
            $sizeModel                  = new SizeModel($this->adapter);
            $info_admin_size            = $sizeModel->getAll();

            $hourModel                  = new HourModel($this->adapter);
            $info_admin_hour            = $hourModel->getAll();

            $users                      = new UserModel($this->adapter);
            $all_user                   = $users->getAll();

            $notificationsModel         = new NotificationsModel($this->adapter);
            $info_notifications         = $notificationsModel->getAll();

            //Cargamos la vista index y le pasamos valores
            $this->view("adminCalendar",array(
                "info_schedule" => $info_schedule,
                "info_admin_product" => $info_admin_product,
                "info_admin_stock_product" => $info_admin_stock_product,
                "info_admin_branch" => $info_admin_branch,
                "info_admin_type_product" => $info_admin_type_product,
                "info_admin_type_purchase" => $info_admin_type_purchase,
                "info_admin_color" => $info_admin_color,
                "info_admin_size" => $info_admin_size,
                "info_admin_hour" => $info_admin_hour,
                "info_notifications"=>$info_notifications,
                "all_user"=>$all_user,
                "view" => CONTROLADOR_ADMIN_CALENDAR
            ));
        }
        else{
            $this->redirect(CONTROLADOR_MAIN, "index");
        }
    }

    public function update(){

        session_start();

        $scheduleModel                      = new ScheduleModel($this->adapter);
        $scheduleModel->idSchedule          = $_POST["hdn_idSchedule"];
        $scheduleModel->vAdvance            = $_POST["hdn_vAdvance"];
        $scheduleModel->iStatus             = $_POST["hdn_iStatus"];
        
        $vAdvance = intval($_POST["hdn_vAdvance"]);
        
        $info_schedule = $scheduleModel->get_by_id();

        foreach($info_schedule as $schedule) {
            $vAdvance += intval($schedule->vAdvance);
        }

        $scheduleModel->vAdvance            = $vAdvance;
        
        $scheduleModel->update_status();

        $this->redirect(CONTROLADOR_ADMIN_CALENDAR, "index");
    }
}
?>
