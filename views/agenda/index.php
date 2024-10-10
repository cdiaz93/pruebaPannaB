<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Aplicativo | Prueba Tecnica  </title>

    
    <!-- Bootstrap 5  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Bootstrap Icons  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link href="./../../public/css/dashboard.css" rel="stylesheet">
</head>
<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-3" href="#"> Sist. de control  citas Medicas </a>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3 fs-5">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#"> <i class="bi bi-clipboard2-pulse-fill"></i>  Agenda Medica </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="http://localhost/ProyectoPHP/views/citas/index.php"> <i class="bi bi-hospital"></i> Citas </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

                <div class="row">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div class="row">
                            <h3>Gestión de Agenda medica </h3>
                        </div>
                       
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Agenda medica </li>
                        </ol>
                    </nav>
                </div>


                <div class="my-5">
                    <form id="form_consultar_agenda">
                        <div class="mb-3 row">
                            <div class="col-12 fs-6">
                                <div class="row">
                                    <label class="col-12 col-md-2 col-form-label py-0"> Consultar por medico: </label>
                                </div>
                               
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-8 col-sm-9 col-md-6">
                                <div class="row">
                                    <div class="col-12">
                                        <input  type="text"  id="input_busqueda"  name="input_busqueda" class="form-control" placeholder="Ingrese el ID del medico a consultar" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2">
                                <button type="submit" class="btn btn-primary" onclick="buscarAgendaMedica()">Buscar </button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="mb-3 row fs-6">
                    <label for="staticEmail" class="col-sm-12 col-md-2 col-form-label"> Nombre: </label>
                    <div class="col-md-4">
                        <input  type="text"  id="nombre_medico" class="form-control" readonly>
                    </div>
                </div>
                <div class="mb-3 row fs-6">
                    <label for="staticEmail" class="col-sm-12 col-md-2 col-form-label"> Especialidad: </label>
                    <div class="col-md-4">
                        <input  type="text"  id="especialidad_medico" class="form-control" readonly>
                    </div>
                </div>
                <div class="mb-3 row fs-6">
                    <label for="staticEmail" class="col-sm-12 col-md-2 col-form-label"> Telefono: </label>
                    <div class="col-md-4">
                        <input  type="text"  id="telefono_medico" class="form-control" readonly>
                    </div>
                </div>
                <div class="mb-3 row fs-6">
                    <label for="staticEmail" class="col-sm-12 col-md-2 col-form-label"> Correo: </label>
                    <div class="col-md-4">
                        <input  type="text"  id="correo_medico" class="form-control" readonly>
                    </div>
                </div>

                
                <div class="table-responsive my-5">
                    <table id="table_agendamedica" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"># Turno </th>
                            <th scope="col">Dia semana</th>
                            <th scope="col">Hora Inicio</th>
                            <th scope="col">Hora Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr> 
                            <td class="text-center" colspan="4"> Inicie una consulta para mostrar datos </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Scrip Axios - peticiones HTTP  -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <script>

        //Evento de escucha del formulario para cnsultar una cita
        document.getElementById('form_consultar_agenda').addEventListener('submit', function(event) {
            event.preventDefault(); 
            const formData = new FormData(this);
            buscarAgendaMedica(formData); 
        });

        //Funcion que busca la informacion de citas medicas por medico o por paciente dependiendo el radibuton seleccionado
        function buscarAgendaMedica(formData){

            //Se crea objeto URLSearchParams a partir de formData
            const params = new URLSearchParams();

            //Se itera sobre los datos del FormData
            formData.forEach((value, key) => {
                params.append(key, value);
            });
            const queryData = params.toString();

            //Se genera una URL con los parámetros
            const url= `http://localhost/ProyectoPHP/public/index.php?controller=agendamedica&action=find&${queryData}`;
            axios.get(url)
            .then(function (response) {

                const agendas = response.data.data; 
                const medico = response.data.medico_unico
                const responseStatus= response.data.success

                const tbody = document.querySelector('#table_agendamedica tbody');
                tbody.innerHTML = ''; // Limpiar la tabla antes de agregar nuevos datos

                //Limpiar datos basicos del medico
                document.getElementById('nombre_medico').value = '';
                document.getElementById('especialidad_medico').value = '';
                document.getElementById('telefono_medico').value = '';
                document.getElementById('correo_medico').value = '';

                if(responseStatus === true){

                    document.getElementById('nombre_medico').value = medico.nombre;
                    document.getElementById('especialidad_medico').value = medico.especialidad;
                    document.getElementById('telefono_medico').value = medico.telefono;
                    document.getElementById('correo_medico').value = medico.correo;
                    

                    agendas.forEach(function(agenda) {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${agenda.id_turno}</td>
                            <td>${agenda.dia_semana}</td>
                            <td>${agenda.hora_inicio}</td>
                            <td>${agenda.hora_fin}</td>`
                        ;
                        tbody.appendChild(row);
                    });
                
                }else{
                    const row = document.createElement('tr');
                    row.innerHTML = `<td colspan="7" style="text-align: center;"> ${response.data.message} </td>`
                    tbody.appendChild(row);
                
                }
            })
            .catch(function (error) {
                console.error('Error al cargar los datos de la agenda medica:', error);
            });
        }

    </script>


</body>
</html>