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
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-3" href="#"> Sistema de control  citas Medicas </a>

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
                            <a class="nav-link" aria-current="page" href="#"> <i class="bi bi-people-fill"></i> Pacientes </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="bi bi-people-fill"></i>  Medicos </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"> <i class="bi bi-clipboard2-pulse-fill"></i>  Agenda Medica </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#"> <i class="bi bi-hospital"></i> Citas </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="row">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <div class="row">
                            <h3> Registrar Cita medica  </h3>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="http://localhost/ProyectoPHP/views/citas/index.php">Citas</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Registar cita</li>
                        </ol>
                    </nav>
                </div>

                <div class="container my-5">
                    <form id="form_create_cita"> 

                        <div class="my-4"> 
                            <h4> Información del paciente </h4> 
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-md-3 col-form-label fs-5"> Digite identificación: </label>
                            <div class="col-8 col-sm-9 col-md-5">
                                <input  type="text"  id="id_paciente"  name="id_paciente" class="form-control" required>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2">
                                <button type="button" class="btn btn-primary" onclick="buscarPaciente()">Buscar </button>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-md-3 col-form-label fs-5"> Nombre completo: </label>
                            <div class="col-md-6">
                                <input  type="text"  id="nombre_paciente" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-md-3 col-form-label fs-5"> Telefono: </label>
                            <div class="col-md-6">
                                <input  type="text"  id="telefono_paciente" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-md-3 col-form-label fs-5"> Correo: </label>
                            <div class="col-md-6">
                                <input  type="text"  id="correo_paciente" class="form-control" readonly>
                            </div>
                        </div>
                        
                        <hr>
                        <div class="my-4"> 
                            <h4> Información de la cita </h4> 
                        </div>

                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-md-3 col-form-label fs-5"> Doctor </label>
                            <div class="col-md-6">
                                <select  id="id_medico" name="id_medico" class="form-select" required>
                                    <option selected> Seleccione un medico </option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputPassword" class="col-sm-12 col-md-3 col-form-label fs-5">Fecha </label>
                            <div class="col-md-6">
                                <input  id="fecha"  name="fecha" type="date" class="form-control" required>
                                <input type="hidden" id="id_turno" name="id_turno">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-12 col-md-3 col-form-label fs-5"> Hora </label>
                            <div class="col-md-6">
                                <select  id="hora_select" name="hora" class="form-select" required>
                                    <option value="" selected> Seleccione una hora  </option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 text-left mt-5">
                            <input type="submit" class="btn btn-success fs-5" value="Registrar Cita">
                        </div>
                        
                    </form>
                </div>

            

            
            
            </main>
        </div>
    </div>



     <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Scrip Axios - peticiones HTTP  -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <script>

        //Evento de escucha para cambio en select #fecha
        const selectElement1 = document.getElementById('fecha');
        selectElement1.addEventListener('change', cargarAgendaMedico);

        //Evento de escucha para cambio en select #id_medico
        const selectElement2 = document.getElementById('id_medico');
        selectElement2.addEventListener('change', limpiarInputs);
        

        //Evento de escucha del formulario pra guardar una cita
        document.getElementById('form_create_cita').addEventListener('submit', function(event) {
            event.preventDefault(); 
            guardarCita(new FormData(this)); 
        });
    

        //Lipia los inputs del formulario para evitar mostrar informacion trucada entre los datos de la cita
        function limpiarInputs(){
            document.getElementById('fecha').value = '';
        
            const select = document.getElementById('hora_select');
            select.innerHTML = '';
            const optionDefault = document.createElement('option');
            optionDefault.value = '';
            optionDefault.textContent = 'Seleccione una hora';
            select.appendChild(optionDefault);
        }


        //Busca si el paciente esta registrado en el sistema y carga sus datos basicos.
        function buscarPaciente(){
            //Se obtienen el id del paciente.
            const inputPaciente= document.getElementById('id_paciente');
            const idPaciente= inputPaciente.value;
            
            if(idPaciente === ''){
                alert("Debe digitar la identificación del paciente.");
            }else{
                //Peticion asincrona para consultar datos necesarios
                axios.get('http://localhost/ProyectoPHP/public/index.php?controller=paciente&action=findById&id='+idPaciente)
                .then(function (response) {
                    const paciente = response.data; 
                    const responseStatus= response.data.success

                    //Se limpian los inputs de la informacion basica de pacientes.
                    document.getElementById('nombre_paciente').value = '';
                    document.getElementById('telefono_paciente').value = '';
                    document.getElementById('correo_paciente').value = '';

                    if(responseStatus === true){
                        //Se cargan los datos ndel paciente en los inputs 
                        document.getElementById('nombre_paciente').value = paciente.data.nombre +' '+ paciente.data.apellido;
                        document.getElementById('telefono_paciente').value = paciente.data.telefono;
                        document.getElementById('correo_paciente').value = paciente.data.correo;
                    }else{
                        alert(response.data.message);
                        document.getElementById('id_paciente').value = '';
                    }
                })
                .catch(function (error) {
                    console.error('Error al cargar los datos de los médicos:', error);
                });
            }
        }


        //Devuelve el listado de medicos disponibles y los carga en el select #id_medico del formulario
        function cargarDatosMedico(){
            axios.get('http://localhost/ProyectoPHP/public/index.php?controller=doctor&action=findAll')
            .then(function (response) {

                const medicos = response.data; 

                //Se vacia input select medicos
                const lista = document.getElementById('id_medico');
                lista.innerHTML = '';

                //Se deja option por defecto
                const optionDefault = document.createElement('option');
                optionDefault.textContent = 'Seleccione un medico';
                optionDefault.value= '';
                lista.appendChild(optionDefault);

                //Se cargan los medicos en options para el select
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
            
            if(idMedico === ''){
                alert("Primero seleccione un medico");
                document.getElementById('fecha').value = '';
            }else{
                //Peticion asincrona para consultar datos necesarios
                axios.get('http://localhost/ProyectoPHP/public/index.php?controller=agendamedica&action=findByDoctorId&id='+idMedico+'&fecha='+fecha)
                .then(function (response) {
                    const horarios = response.data.horarios;
                    const idTurno= response.data.idTurno;
                    const responseStatus = response.data.success;

                    //Se vacian los datos del select #hora_select
                    const lista = document.getElementById('hora_select');
                    lista.innerHTML = '';

                    //Se deja option por defecto
                    const optionDefault = document.createElement('option');
                    optionDefault.textContent = 'Seleccione una hora';
                    optionDefault.value= '';
                    lista.appendChild(optionDefault);

                    if(responseStatus === true){
                        //Se agrega el turno correspondiente a la fecha seleccionada en el input #id_turno
                        document.getElementById('id_turno').value = idTurno;

                        //Se cargan los horarios posibles para asignar a la cita
                        Object.values(horarios).forEach(hora => {
                            const option = document.createElement('option');
                            option.textContent = hora;
                            option.value = hora;
                            lista.appendChild(option);
                        });
                    }else{
                        alert(response.data.message);
                    }
                })
                .catch(function (error) {
                    console.error('Error al cargar los datos de los médicos:', error);
                });
            }
        }

        function guardarCita(formData){
            event.preventDefault(); 
            axios.post('http://localhost/ProyectoPHP/public/index.php?controller=cita&action=store', formData)
            .then(function (response) {
                alert(response.data.message);

                //-----------------------------------------------------------
                //Se vacian todos los campos del formulario
                //Datos paciente
                document.getElementById('id_paciente').value = '';
                document.getElementById('nombre_paciente').value = '';
                document.getElementById('telefono_paciente').value = '';
                document.getElementById('correo_paciente').value = '';

                //Datos de la cita
                document.getElementById('fecha').value = '';
                const medico = document.getElementById('id_medico');
                const optionDefault1 = document.createElement('option');
                medico.innerHTML = '';
                optionDefault1.textContent = 'Seleccione un medico';
                optionDefault1.value= '';
                medico.appendChild(optionDefault1);

                const hora = document.getElementById('hora_select');
                const optionDefault2 = document.createElement('option');
                hora.innerHTML = '';
                optionDefault2.textContent = 'Seleccione una hora';
                optionDefault2.value= '';
                hora.appendChild(optionDefault2);
                //-----------------------------------------------------------

                cargarDatosMedico();
            })
            .catch(function (error) {
                console.error('Error al guardar los datos de la cita:', error);
            });
        }

        //Ejecutar la funcion apenas se carge la pagina
        window.onload = cargarDatosMedico;
    </script>


</body>
</html>