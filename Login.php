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
        connection.open('GET', 'http://localhost:8888/usuarios/public/usuarios/login.json?nombre=' + usuarioNombre + '&' + "pass=" + passUsuario);
        
        connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            connection.send();
      }
      function response() {
        if(connection.readyState == 4) {
          var response = JSON.parse(connection.responseText);
          document.getElementById('code').innerHTML = response.code;
          document.getElementById('message').innerHTML = response.message;
          document.getElementById('usuario').innerHTML = response.nombre;
        }
      }
    </script>
    <title>Login</title>
  </head>
  <body>
    <h1>Login</h1>
    <p>
    <p>Nombre</p>
      <input id='nombre' type='text'>
    </p>
    <p>Contraseña</p>
      <input id='pass' type='password'>
    </p>
    <button onclick='ajax()'>Acceder</button>

  </body>
</html>

