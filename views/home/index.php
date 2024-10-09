<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Aplicativo | Prueba Tecnica </title>
</head>
<body>
    <h1> Gestión de Home  </h1>
    <p>Bienvenido a la página principal de mi sitio web.</p>

    <a href="http://localhost/ProyectoPHP/views/citas/index.php"> Citas </a>

    <form action="./../public/index.php?controller=cita&action=create" method="POST"> 


        <select id="id_medico" name="id_medico">
            <option>Seleccione un medico</option>
        </select>

        <input type="text" name="id_paciente"  placeholder="id_paciente">
        <input type="date"  id="fecha"  name="fecha"  placeholder="fecha">

        <select id="hora_select" name="hora">
            <option value="09:00">Seleccione un horario </option>
        </select>

        <input type="submit" value="Enviar">

    </form>


    <h1>Lista de Médicos</h1>
    <ul id="listaMedicos"></ul>


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