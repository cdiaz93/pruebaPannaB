# ProyectoPHP

Este proyecto fue desarrollado en PHP y utiliza XAMPP como entorno de trabajo. A continuación, se detallan las instrucciones para configurar y ejecutar el proyecto correctamente.

## Requisitos

- **PHP**: Este proyecto está construido con PHP (Viene incluido en XAMPP).
- **XAMPP**: Se utiliza para gestionar el servidor local y la base de datos.

## Estructura de Archivos

Para que el proyecto funcione correctamente, debe ser guardado en la siguiente ubicación dentro de la carpeta `htdocs` de XAMPP:

Windows: 
C:\xampp\htdocs\ProyectoPHP

```
ProyectoPHP/ 
├── 0_Documentacion/ 
├── config/ 
├── controllers/ 
├── models/ 
├── public/ 
└── views/
```


Dentro de esta carpeta `ProyectoPHP`, encontrarás las diferentes carpetas del proyecto.

## Conexión a base de datos.
Dentro de la carpeta config/ el archivo database.php maneja las configuraciones para poder conectar con las base de datos. Si requiere hacer cambios en el host, usuarios y contraseña puede hacerlo desde este archivo.

Dentro de la carpeta 0_Documentacion/ esta la información que se me suministro para el desarrollo de la prueba tecnica. aqui tambien esta el archivo .sql base para poder cagar en la base de datos de MySQL.


## Instrucciones para Iniciar XAMPP

1. **Iniciar XAMPP**:
   - Abre el panel de control de XAMPP.
   - Haz clic en los botones "Start" para **Apache** y **MySQL**. Asegúrate de que ambos servicios estén en funcionamiento (deberían aparecer en verde).

2. **Acceder al Proyecto**:
   - Abre tu navegador web preferido.
   - Escribe la siguiente URL en la barra de direcciones:
     ```
     http://localhost/ProyectoPHP/public/
     ```

Esto te llevará a la interfaz del proyecto, donde podrás interactuar con él.

## Notas Adicionales

- Asegúrate de que no haya otros servicios utilizando los puertos 80 (Apache) y 3306 (MySQL) en tu máquina.
- Si encuentras problemas al acceder al proyecto, verifica que los servicios de Apache y MySQL estén funcionando correctamente en el panel de control de XAMPP.

