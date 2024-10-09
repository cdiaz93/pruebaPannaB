<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link href="./../../public/css/dashboard.css" rel="stylesheet">
</head>
<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#"> Sistema de control <br> citas Medicas </a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
            <a class="nav-link px-3" href="#">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">

    <div class="row">
        <nav id="sidebarMenu" class="mt-5 col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <span data-feather="home"></span>Pacientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span> Medicos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="shopping-cart"></span>  Agenda Medica
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="users"></span> Citas
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"> Registrar Cita medica </h1>
                <div> 
                    <a href="http://localhost/ProyectoPHP/views/home/index.php"> Home </a>
                </div>
            </div>

            <form action="./../public/index.php?controller=cita&action=create" method="POST"> 
                

                <div class="my-3"> 
                    <h4> Información del paciente </h4> 
                </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label fs-5"> Digite identificación: </label>
                    <div class="col-md-5">
                        <input  type="text"  id="id_paciente"  name="id_paciente" class="form-control">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary">Buscar </button>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label fs-5"> Nombre completo: </label>
                    <div class="col-md-6">
                        <input  type="text"  id="nombre_paciente"  name="nombre_paciente" class="form-control" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label fs-5"> Telefono: </label>
                    <div class="col-md-6">
                        <input  type="text"  id="telefono_paciente"  name="telefono_paciente" class="form-control" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label fs-5"> Correo: </label>
                    <div class="col-md-6">
                        <input  type="text"  id="correo_paciente"  name="correo_paciente" class="form-control" readonly>
                    </div>
                </div>
                
                <hr>
                <div class="my-3"> 
                    <h4> Información de la cita </h4> 
                </div>

                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label fs-5"> Doctor </label>
                    <div class="col-md-6">
                        <select  id="id_medico" name="id_medico" class="form-select" aria-label="Default select example">
                            <option selected> Seleccione un medico </option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-3 col-form-label fs-5">Fecha </label>
                    <div class="col-md-6">
                        <input  id="fecha"  name="fecha" type="date" class="form-control" id="inputPassword">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-3 col-form-label fs-5"> Hora </label>
                    <div class="col-md-6">
                        <select  id="hora_select" name="hora" class="form-select" aria-label="Default select example">
                            <option selected> Seleccione una hora  </option>
                        </select>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary btn-lg" value="Registrar">
            </form>

           
        
        </main>
    </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Scrip Axios - peticiones HTTP  -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <script>

        //Evento de escucha para cambio en select #fecha
        const selectElement = document.getElementById('fecha');
        selectElement.addEventListener('change', cargarAgendaMedico);


        //Devuelve el listado de medicos disponibles y los carga en el select #id_medico del formulario
        function cargarDatosMedico(){
            axios.get('http://localhost/ProyectoPHP/public/index.php?controller=doctor&action=findAll')
            .then(function (response) {
                const medicos = response.data;  // Suponemos que el PHP devuelve un array de médicos en JSON
                const lista = document.getElementById('id_medico');
                lista.innerHTML = '';
                medicos.forEach(function(medico) {
                    const option = document.createElement('option');
                    option.textContent = `${medico.nombre} | ${medico.especialidad}`;
                    option.value=medico.id;
                    lista.appendChild(option);
                });
            })
            .catch(function (error) {
                console.error('Error al cargar los datos de los médicos:', error);
            });
        }


        //Dados un medico y una fecha, consulta los horarios disponibles de atencion del medico y los carga en el select #hora_select del formulario
        function cargarAgendaMedico(){

            //Se obtienen el id del medico y la fecha para la cita.
            const selectIdMedico = document.getElementById('id_medico');
            const idMedico= selectIdMedico.value;
            const selectFecha = document.getElementById('fecha');
            const fecha= selectFecha.value;
            
            //Peticion asincrona para consultar datos necesarios
            axios.get('http://localhost/ProyectoPHP/public/index.php?controller=agendamedica&action=findByDoctorId&id='+idMedico+'&fecha='+fecha)
            .then(function (response) {
                const horarios = response.data; 
                console.log(response.data);
                const lista = document.getElementById('hora_select');
                lista.innerHTML = '';
                Object.values(horarios).forEach(hora => {
                    const option = document.createElement('option');
                    option.textContent = hora;
                    option.value = hora;
                    lista.appendChild(option);
                });
            })
            .catch(function (error) {
                console.error('Error al cargar los datos de los médicos:', error);
            });
        }

        //Ejecutar la funcion apenas se carge la pagina
        window.onload = cargarDatosMedico;
    </script>


</body>
</html>