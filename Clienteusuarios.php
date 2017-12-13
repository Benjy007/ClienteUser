<?php
 	//url contra la que atacamos
	$ch = curl_init("http://localhost:8888/usuarios/public/usuarios/usuarios.json");
 	//a true, obtendremos una respuesta de la url, en otro caso, 
 	//true si es correcto, false si no lo es
 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 	//establecemos el verbo http que queremos utilizar para la petición
 	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
 	//obtenemos la respuesta
 	$response = curl_exec($ch);
 	// Se cierra el recurso CURL y se liberan los recursos del sistema
 	curl_close($ch);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <script type="text/javascript">
      function ajax(id) {
      
        connection = new XMLHttpRequest();
       
        // Preparando la función de respuesta
        connection.onreadystatechange = response;
       
        // Realizando la petición HTTP con método POST
        connection.open('POST', 'http://localhost:8888/usuarios/public/usuarios/delete.json');
        
        connection.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            connection.send("id=" + id);
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
    <title>usuarios</title>
  </head>
  <body>

	<?php $response = json_decode($response, true) ?>
	
	
 	<?php foreach ($response['data'] as $key => $usuarios)
 		{?>
 		<p>
 		<?php echo $usuarios['nombre'] ?><button onclick='ajax(<?php echo $usuarios['id'];?>)'>Borrar</button></p>
 	<?php } ?>
 	  

 	  <p id="code"></p>
        <p id="message"></p>
        </p>

 	<a href="NuevoUsuario.php">Nuevo Usuario</a>
</body>
</html>