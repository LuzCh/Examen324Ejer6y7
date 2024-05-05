<?php include "header_estilo.inc.php";?>

<a href="cerrarsession.php">Cerrar sesión</a>
<?php
session_start();
include("conexion.inc.php");
$username = $_SESSION['username'];
$rol = $_SESSION['rol'];

$sqlpropio = "SELECT c.nro_cuenta, c.monto_cuenta, c.tipo_cuenta, c.tasainteres_cuenta, c.estado_cuenta, c.id_usuario
            FROM cuentas c
            INNER JOIN usuarios u ON u.id_usuario = c.id_usuario
            WHERE u.nombre_usuario = '$username'";

$sql = "SELECT nro_cuenta, monto_cuenta, tipo_cuenta, tasainteres_cuenta, estado_cuenta, id_usuario
        FROM cuentas";

$resultadopropio = mysqli_query($conn, $sqlpropio);
$resultado = mysqli_query($conn, $sql);

function imprimirTabla($res) {
    echo "<table border='1px'>";
    echo "<tr><th>NRO CUENTA</th>
                <th>MONTO CUENTA</th>
                <th>TIPO CUENTA</th>
                <th>TASA DE INTERES</th>
                <th>ESTADO DE CUENTA</th>
                <th>ID USUARIO</th>
                <th>OPCIONES</th></tr>";
    while ($row = mysqli_fetch_array($res)) {
        echo "<tr>
                <td>".$row["nro_cuenta"]."</td>
                <td>".$row["monto_cuenta"]."</td>
                <td>".$row["tipo_cuenta"]."</td>
                <td>".$row["tasainteres_cuenta"]."</td>
                <td>".$row["estado_cuenta"]."</td>
                <td>".$row["id_usuario"]."</td>
                <td>
                    <a href='transacciones.php?nro_cuenta=".$row["nro_cuenta"]."'>Ver transacciones</a>
                </td>
              </tr>";
    }
    echo "</table>";
    echo "<br>";
}


echo "<div class='contenidoAsesor'>";
echo "<h3> Usted ingreso con el usuario: ".$username."  que tiene por rol el de ".$rol.". <br>Sea bienvenido</h3><br>";

echo "<br>Se muestran todas las cuentas existentes de usted: ";
imprimirTabla($resultadopropio);
echo "Se muestran todas las cuentas existentes de todos los usuarios: ";
imprimirTabla($resultado);

echo "</div>";
 ?>
<?php include "footer_estilo.inc.php";?>
