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
                            <h3>Gestión de Citas medica </h3>
                        </div>
                        <div class="btn-toolbar mb-2  mb-md-0">
                            <a href="http://localhost/ProyectoPHP/views/citas/create.php"class="btn  btn-outline-success"> 
                                <span data-feather="calendar"></span> Nuevo 
                            </a>
                        </div>
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Citas</li>
                        </ol>
                    </nav>
                </div>


                <div class="my-5">
                    <form id="form_consultar_cita">
                        <div class="mb-3 row">
                            <div class="col-12 fs-6">
                                <div class="row">
                                    <label class="col-12 col-md-2 col-form-label py-0"> Consultar por: </label>

                                    <div class="col-12 col-md-8">
                                        <div class="form-check form-check-inline ">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="SEARCH_DOCTOR" required>
                                            <label class="form-check-label" for="inlineRadio1"> Medico </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="SEARCH_PATIENT">
                                            <label class="form-check-label" for="inlineRadio2"> Paciente </label>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <div class="col-8 col-sm-9 col-md-8">
                                <div class="row">
                                    <div class="col-6">
                                        <input  type="text"  id="input_busqueda"  name="input_busqueda" class="form-control" placeholder="Input de busqueda personalizada" required>
                                    </div>
                                    <div class="col-6">
                                        <input  id="fecha"  name="fecha" type="date" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 col-sm-3 col-md-2">
                                <button type="submit" class="btn btn-primary" onclick="buscarCitaPersonalizada()">Buscar </button>
                            </div>
                        </div>
                    </form>

                </div>
                
                <div class="table-responsive my-5">
                    <table id="table_citas" class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Paciente</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Turno</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Hora</th>
                            <th scope="col">Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                    
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

        //Evento al hacer click en alguno de los 2 radiobuttons
        const radioButtons = document.querySelectorAll('input[name="inlineRadioOptions"]');
        const textInput = document.getElementById('input_busqueda');
        radioButtons.forEach(radio => {
            radio.addEventListener('click', function() {
                textInput.placeholder = `Digite ID del ${this.nextElementSibling.innerText}`;
            });
        });

        //Evento de escucha del formulario para cnsultar una cita
        document.getElementById('form_consultar_cita').addEventListener('submit', function(event) {
            event.preventDefault(); 
            const formData = new FormData(this);
            buscarCitaPersonalizada(formData); 
        });



        //Devuelve el listado de medicos disponibles y los carga en el select #id_medico del formulario
        function cargarDatosCitas(){
            axios.get('http://localhost/ProyectoPHP/public/index.php?controller=cita&action=findAll')
            .then(function (response) {
                const citas = response.data; 

                const tbody = document.querySelector('#table_citas tbody');
                tbody.innerHTML = ''; // Limpiar la tabla antes de agregar nuevos datos
                
                citas.forEach(cita => {
                    const row = document.createElement('tr');
                    
                    // Cambia las propiedades según la estructura de tus datos
                    row.innerHTML = `
                        <td>${cita.cita_id}</td>
                        <td>${cita.paciente_nombres + cita.paciente_apellidos}</td>
                        <td>${cita.medico_nombre}</td>
                        <td>${cita.dia_semana}</td>
                        <td>${cita.cita_fecha}</td>
                        <td>${cita.cita_hora}</td>
                        <td>${cita.cita_estado}</td>
                    `;
                    
                    tbody.appendChild(row);
                
                });
            })
            .catch(function (error) {
                console.error('Error al cargar los datos de los médicos:', error);
            });
        }

        //Funcion que busca la informacion de citas medicas por medico o por paciente dependiendo el radibuton seleccionado
        function buscarCitaPersonalizada(formData){


            //Se crea objeto URLSearchParams a partir de formData
            const params = new URLSearchParams();

            //Se itera sobre los datos del FormData pra no incluir los valores del input de radiobuttons
            for (const [key, value] of formData.entries()) {
                console.log(key)
                if (key !== 'inlineRadioOptions') { 
                    params.append(key, value);
                }
            }
            const queryData = params.toString();

            //Se iterar sobre los radiobutons para saber cual fue seleccionado
            const radioButtons = document.querySelectorAll('input[name="inlineRadioOptions"]');
            let selectedValue = null;
            radioButtons.forEach(radio => {
                if (radio.checked) {
                    selectedValue = radio.value; 
                }
            });

            //Se valida cuel fue la seleccion para saber cual ruta GET escoger para realizar la consulta adecuada
            if (selectedValue) {

                //Busqueda por ID Doctor
                if(selectedValue === 'SEARCH_DOCTOR'){

                    //Se genera una URL con los parámetros
                    const url= `http://localhost/ProyectoPHP/public/index.php?controller=cita&action=findByDoctorId&${queryData}`;
                    axios.get(url)
                    .then(function (response) {
                        const citas = response.data; 

                        const tbody = document.querySelector('#table_citas tbody');
                        tbody.innerHTML = ''; // Limpiar la tabla antes de agregar nuevos datos
                        if(citas.length>0){
                            citas.forEach(cita => {
                                const row = document.createElement('tr');
                                row.innerHTML = `
                                    <td>${cita.cita_id}</td>
                                    <td>${cita.paciente_nombres + cita.paciente_apellidos}</td>
                                    <td>${cita.medico_nombre}</td>
                                    <td>${cita.dia_semana}</td>
                                    <td>${cita.cita_fecha}</td>
                                    <td>${cita.cita_hora}</td>
                                    <td>${cita.cita_estado}</td>`
                                ;
                                tbody.appendChild(row);
                            });
                    
                        }else{
                            const row = document.createElement('tr');
                            row.innerHTML = `<td colspan="7" style="text-align: center;"> No hay datos para mostrar </td>`
                            tbody.appendChild(row);
                        }
                       
                    })
                    .catch(function (error) {
                        console.error('Error al cargar los datos de los médicos:', error);
                    });

                }else if(selectedValue === 'SEARCH_PATIENT'){

                    //Busqueda por ID de Paciente
                    const url= `http://localhost/ProyectoPHP/public/index.php?controller=cita&action=findByPatientId&${queryData}`
                    axios.get(url)
                    .then(function (response) {
                        const citas = response.data; 

                        const tbody = document.querySelector('#table_citas tbody');
                        tbody.innerHTML = ''; // Limpiar la tabla antes de agregar nuevos datos
                        if(citas.length>0){
                            citas.forEach(cita => {
                                const row = document.createElement('tr');
                                row.innerHTML = `
                                    <td>${cita.cita_id}</td>
                                    <td>${cita.paciente_nombres + cita.paciente_apellidos}</td>
                                    <td>${cita.medico_nombre}</td>
                                    <td>${cita.dia_semana}</td>
                                    <td>${cita.cita_fecha}</td>
                                    <td>${cita.cita_hora}</td>
                                    <td>${cita.cita_estado}</td>`
                                ;
                                tbody.appendChild(row);
                            });
                    
                        }else{
                            const row = document.createElement('tr');
                            row.innerHTML = `<td colspan="7" style="text-align: center;"> No hay datos para mostrar </td>`
                            tbody.appendChild(row);
                        }
                    })
                    .catch(function (error) {
                        console.error('Error al cargar los datos de los médicos:', error);
                    });
                }

            } else {
                alert("Debes seleccionar primero una opción de busqueda.");
            }

        }


     

        //Ejecutar la funcion apenas se carge la pagina
        window.onload = cargarDatosCitas;
    </script>


</body>
</html>