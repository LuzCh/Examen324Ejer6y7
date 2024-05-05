<?php include "header_estilo.inc.php";?>

<div class="trans">
<?php
    session_start();    
    $username = $_SESSION['username'];
    include("conexion.inc.php");

    $id = $_GET["nro_cuenta"];
    
    $sql = "SELECT * FROM transacciones WHERE nro_cuenta='$id'";
    $resultado=mysqli_query($conn, $sql);
?>

<h3>Se muestran todas las cuentas existentes:</h3>
<table>
    <tr>
    <th>NRO TRANSACCION</th>
    <th>NRO CUENTA</th>
    <th>MONTO TRANSACCION</th>
    <th>DESCRIPCION</th>
    <th>TIPO</th>
    <th>FECHA</th>
    </tr>

<?php
while($row = mysqli_fetch_array($resultado))
    {
            echo "<tr>
            <td>".$row["nro_transaccion"]."</td>
            <td>".$row["nro_cuenta"]."</td>
            <td>".$row["monto_transaccion"]."</td>
            <td>".$row["descripcion"]."</td>
            <td>".$row["tipo"]."</td>
            <td>".$row["fecha"]."</td>
            </tr>";
    }
?>
</div>
<a href="usuarioasesor.php?usuario=".$usuario.)>Volver</a>
<?php include "footer_estilo.inc.php";?>