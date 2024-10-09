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
            case 'crear':
                $pacienteController->crear();
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
            case 'findByDoctorId':
                $id= intval($_GET['id']);
                $fecha= $_GET['fecha'];

                $agendaMedica->findByDoctorId($id, $fecha);
                break;
            case 'create':
                $agendaMedica->create();
                break;
            
            default:
                http_response_code(404);
                include '../views/error/404.php';  // Mostrar la página 404
        }
        break;

    case 'cita':
        $cita= new CitaController();
        switch ($action) {
            case 'index':
                $cita->index();
                break;
            case 'create':
                $cita->create();
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
