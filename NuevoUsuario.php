<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript">
      function ajax() {
        var usuarioNombre = document.getElementById('nombre').value;
        console.log(usuarioNombre);

        var passUsuario = document.getElementById('pass').value;
        console.log(passUsuario)
        // De esta forma se obtiene la instancia del objeto XMLHttpRequest
        
        connection = new XMLHttpRequest();
       
        // Preparando la función de respuesta
        connection.onreadystatechange = response;
       
        // Realizando la petición HTTP con método POST
        connection.open('POST', 'http://localhost:8888/usuarios/public/usuarios/create.json');
        
        connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            connection.send("nombre=" + usuarioNombre + '&' + "pass=" + passUsuario);
      }
     
      function response() {
        if(connection.readyState == 4) {
          var response = JSON.parse(connection.responseText);
          document.getElementById('code').innerHTML = response.code;
          document.getElementById('message').innerHTML = response.message;
          document.getElementById('usuario').innerHTML = response.data;
        }
      }
    </script>
	<title>Nuevo Usuario</title>
  </head>
  <body>
    <h1 >Añadir Usuario</h1>
        <input id='nombre' type='text'>
    <h1>Añadir Pass</h1>
        <input id="pass" type="password">
    <br>
    <br>
    <button onclick='ajax()'>Crear</button>
        <p id="code"></p>
        <p id="message"></p>
        <p id="usuario"></p>
    <a href="http://localhost:8888/Clienteusuarios/Clienteusuarios.php">Usuarios Creados</a>
  </body>
</html>

