<?php include "header_estilo.inc.php";?>

<div class="formo">
<?php
    include("conexion.inc.php");

    $id = $_GET["nro_cuenta"];
    $opcion = $_GET["opcion"];
    $iduser = $_GET["iduser"];
    
    $sql = "SELECT * FROM cuentas WHERE nro_cuenta='$id'";
    $resultado=mysqli_query($conn, $sql);
    $fila=mysqli_fetch_array($resultado);

    if ($opcion == "editar") {
        echo "<form method='GET' action='editar.php'>
                nro cuenta:
                <input type='number' name='nro_cuenta' value='" . $id . "' readonly/><br>
                monto de cuenta:
                <input type='number' name='monto' step='0.01' value='" . $fila['monto_cuenta'] . "'/><br>
                tipo de cuenta:
                <input type='text' name='tipo' value='" . $fila['tipo_cuenta'] . "'/><br>
                tasa de interes:
                <input type='text' name='tasa' value='" . $fila['tasainteres_cuenta'] . "'/><br>
                estado de cuenta:
                <input type='text' name='estado' value='" . $fila['estado_cuenta'] . "' readonly/><br> 
                id usuario:
                <input type='number' name='iduser' value='" . $iduser . "' readonly/><br>
                <input type='submit' value='Actualizar'> 
                </form>";
    } else {
        echo "<form method='GET' action='agregar.php'>
                nro cuenta:
                <input type='number' name='nrodecuenta' value='0' readonly/><br> 
                monto de cuenta:
                <input type='number' name='monto' step='0.01' value='" . $fila['monto_cuenta'] . "'/><br> 
                tipo de cuenta:
                <input type='text' name='tipo' value='" . $fila['tipo_cuenta'] . "'/><br> 
                tasa de interes:
                <input type='text' name='tasa' value='" . $fila['tasainteres_cuenta'] . "'/><br> 
                estado de cuenta:
                <input type='text' name='estado' value='" . $fila['estado_cuenta'] . "' readonly/><br> 
                id usuario:
                <input type='number' name='iduser' value='" . $iduser . "' readonly/><br>
                <input type='submit' value='Agregar'> 
                </form>";
    }
    
    
    //header("Location: usuario.php?username=".$username);
    //exit();
?>
</div>
<?php include "footer_estilo.inc.php";?>