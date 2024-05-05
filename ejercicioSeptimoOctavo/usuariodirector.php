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

$sqldepartamento = "SELECT 
    SUM(CASE WHEN u.departamento='LA PAZ' THEN c.monto_cuenta END) LA_PAZ,
    SUM(CASE WHEN u.departamento='ORURO' THEN c.monto_cuenta END) ORURO,
    SUM(CASE WHEN u.departamento='COCHABAMBA' THEN c.monto_cuenta END) COCHABAMBA,
    SUM(CASE WHEN u.departamento='POTOSI' THEN c.monto_cuenta END) POTOSI,
    SUM(CASE WHEN u.departamento='TARIJA' THEN c.monto_cuenta END) TARIJA,
    SUM(CASE WHEN u.departamento='BENI' THEN c.monto_cuenta END) BENI,
    SUM(CASE WHEN u.departamento='PANDO' THEN c.monto_cuenta END) PANDO,
    SUM(CASE WHEN u.departamento='SUCRE' THEN c.monto_cuenta END) SUCRE,
    SUM(CASE WHEN u.departamento='SANTA CRUZ' THEN c.monto_cuenta END) SANTA_CRUZ
        FROM cuentas c INNER JOIN usuarios u ON u.id_usuario = c.id_usuario;";

$resultadopropio = mysqli_query($conn, $sqlpropio);
$resultado = mysqli_query($conn, $sql);
$resultadodepartamento = mysqli_query($conn, $sqldepartamento);


function montoDepartamento($resultadodepartamento)
{
    echo "<table border='1px'>";
    echo "<tr>
                    <th>LA PAZ</th>
                    <th>ORURO</th>
                    <th>COCHABAMBA</th>
                    <th>POTOSI</th>
                    <th>TARIJA</th>
                    <th>BENI</th>
                    <th>PANDO</th>
                    <th>SUCRE</th>
                    <th>SANTA CRUZ</th>
                    </tr>";
    while ($row = mysqli_fetch_array($resultadodepartamento)) {
        echo "<tr>
                <td>".$row["LA_PAZ"]."</td>
                <td>".$row["ORURO"]."</td>
                <td>".$row["COCHABAMBA"]."</td>
                <td>".$row["POTOSI"]."</td>
                <td>".$row["TARIJA"]."</td>
                <td>".$row["BENI"]."</td>
                <td>".$row["PANDO"]."</td>
                <td>".$row["SUCRE"]."</td>
                <td>".$row["SANTA_CRUZ"]."</td>
            </tr>";
    }
    echo "</table>";
}




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
                    <a href='eliminar.php?nro_cuenta=".$row["nro_cuenta"]."&iduser=".$row["id_usuario"]."&opcion=eliminar'>Eliminar</a>
                    <a href='formulario.php?nro_cuenta=".$row["nro_cuenta"]."&iduser=".$row["id_usuario"]."&opcion=editar'>Editar</a>
                    <a href='formulario.php?nro_cuenta=".$row["nro_cuenta"]."&iduser=".$row["id_usuario"]."&opcion=agregar'>Agregar</a>
                </td>
              </tr>";
    }
    echo "</table>";
    echo "<br>";
}


echo "<div class='contenidoDirector'>";
echo "<h3> Usted ingreso con el usuario: ".$username."  que tiene por rol el de ".$rol.". <br>Sea bienvenido</h3><br>";

echo "<br>Se muestra el monto total de todas las cuentas por departamento:";

montoDepartamento($resultadodepartamento);
echo "<br>Se muestran todas las cuentas existentes de usted: ";
imprimirTabla($resultadopropio);
echo "Se muestran todas las cuentas existentes de todos los usuarios: ";
imprimirTabla($resultado);

echo "</div>";
 ?>


<?php include "footer_estilo.inc.php";?>
