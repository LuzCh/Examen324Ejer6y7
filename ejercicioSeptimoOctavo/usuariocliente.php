<?php include "header_estilo.inc.php";?>
<?php
    session_start();
    include("conexion.inc.php");
    $username=$_SESSION['username'];
    $sql = "SELECT c.nro_cuenta, c.monto_cuenta, c.tipo_cuenta, c.tasainteres_cuenta, c.estado_cuenta, c.id_usuario
            FROM cuentas c, usuarios u 
            WHERE c.estado_cuenta LIKE 'DISPONIBLE' AND u.nombre_usuario = '$username' AND u.id_usuario = c.id_usuario;";

    $resultado = mysqli_query($conn, $sql);
?>


<a href=cerrarsession.php>Cerrar sesion</a>

<div class="contenidoCliente">
<h3>Se muestran todas las cuentas existentes:</h3>
<table border="1px">
    <tr>
    <th>NRO CUENTA</th>
    <th>MONTO CUENTA</th>
    <th>TIPO CUENTA</th>
    <th>TASA DE INTERES</th>
    <th>ESTADO DE CUENTA</th>
    <th>ID USUARIO</th>
    <th>NOMBRE USUARIO</th>
    </tr>

<?php
while($row = mysqli_fetch_array($resultado))
    {
            echo "<tr>
            <td>".$row["nro_cuenta"]."</td>
            <td>".$row["monto_cuenta"]."</td>
            <td>".$row["tipo_cuenta"]."</td>
            <td>".$row["tasainteres_cuenta"]."</td>
            <td>".$row["estado_cuenta"]."</td>
            <td>".$row["id_usuario"]."</td>
            <td>".$username."</td>
            </tr>";
    }
?>

</table>
</div>
<?php include "footer_estilo.inc.php";?>