<?php
// Incluir los controladores
require_once './../controllers/PacienteController.php';
require_once './../controllers/HomeController.php';
require_once './../controllers/CitaController.php';
require_once './../controllers/DoctorController.php';
require_once './../controllers/AgendaMedicaController.php';


// Obtener el controlador y la acción desde la URL
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'cita';    // controlador por defecto
$action = isset($_GET['action']) ? $_GET['action'] : 'index';               // acción por defecto

// Enrutador para múltiples controladores
switch ($controller) {

    case 'home':
        $home = new HomeController();
        switch ($action) {
            case 'index':
                $home->index();
                break;
            default:
                http_response_code(404);
                include '../views/error/404.php';  // Mostrar la página 404
        }
        break;
      

    case 'paciente':
        $pacienteController = new PacienteController();
        switch ($action) {
            case 'index':
                $pacienteController->index();
                break;
            case 'findById':
                $id= intval($_GET['id']);
                $pacienteController->findById($id);
                break;
            case 'create':
                $pacienteController->create();
                break;
            default:
                http_response_code(404);
                include '../views/error/404.php';  // Mostrar la página 404
        }
        break;

    case 'doctor':
        $doctorController = new DoctorController();
        switch ($action) {
            case 'index':
                $doctorController->index();
                break;
            case 'create':
                $doctorController->create();
                break;

            case 'findAll':
                $doctorController->findAll();
                break;

            default:
                http_response_code(404);
                include '../views/error/404.php';  // Mostrar la página 404
        }
        break;

    case 'agendamedica':
        $agendaMedica = new AgendaMedicaController();
        switch ($action) {
            case 'find':
                $id= intval($_GET['input_busqueda']);
                $agendaMedica->find($id);
                break;
           
            case 'findByDoctorId':
                $id= intval($_GET['id']);
                $fecha= $_GET['fecha'];
                $agendaMedica->findByDoctorId($id, $fecha);
                break;
        }
        break;

    case 'cita':
        $citaController= new CitaController();
        switch ($action) {
            case 'index':
                $citaController->index();
                break;
            case 'create':
                $citaController->create();
                break;
            case 'store':
                $citaController->store();
                break;
            case 'cancel':
                $id= intval($_GET['id']);
                $citaController->cancel($id);
                break;
            case 'findAll':
                $citaController->findAll();
                break;
            case 'findByDoctorId':
                $id= intval($_GET['input_busqueda']);
                $fecha= $_GET['fecha'];
                $citaController->findByDoctorMedicalShift($id, $fecha);
                break;
            case 'findByPatientId':
                $id= intval($_GET['input_busqueda']);
                $fecha= $_GET['fecha'];
                $citaController->findByPatientId($id, $fecha);
                break;

            default:
                http_response_code(404);
                include '../views/error/404.php';  // Mostrar la página 404
        }
        break;

    default:
        // Mostrar la página de error 404 si el controlador no existe
        http_response_code(404);
        include '../views/error/404.php';  // Mostrar la página 404
}

?>
