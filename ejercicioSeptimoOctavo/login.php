<?php include "header_estilo.inc.php";?>

<div class="contenidoLogin">
<form method="POST" action="validar.php">
    <h2>FORMULARIO DE LOGIN</h2>
    <label for="nombre">Nombre de Usuario:</label>
    <input type="text" name="username"><br>
    <label for="contrasena">Contraseña:</label>
    <input type="password" name="clave"><br>
    <input type="submit" value="Ingresar">
</form>
</div>
<?php include "footer_estilo.inc.php";?>
