<?php
    session_start();
    include("conexion.inc.php");
    $id = $_GET["nro_cuenta"];
    $username=$_GET["username"];
    $usuario=$_SESSION['username'];
    $sql = "UPDATE cuentas SET estado_cuenta='CONGELADA' WHERE nro_cuenta='$id'";
    mysqli_query($conn, $sql);

    $rol = $_SESSION['rol'];

    if ($_SESSION['rol']=="DIRECTOR BANCARIO")
    {
        header("Location: usuariodirector.php?usuario=".$usuario);
    }
    elseif ($_SESSION["rol"]== "CAJERO")
    {
        header("Location: usuariocajero.php?usuario=".$usuario);
    }
    elseif ($_SESSION["rol"]== "ASESOR")
    {
        header("Location: usuarioasesor.php?usuario=".$usuario);
    }
    else
    {
        header("Location: usuariocliente.php?usuario=".$usuario);
    }

    exit();
?>
