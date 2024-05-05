<?php
    session_start();
    include("conexion.inc.php");
    //$username = $_GET["username"];
    //$nro_cuenta = $_GET["nro_cuenta"];
    $monto = $_GET["monto"];
    $tipo = $_GET["tipo"];
    $tasa = $_GET["tasa"];
    $estado = $_GET["estado"];
    $iduser = $_GET["iduser"];
    $usuario=$_SESSION['username'];

    $sql = "INSERT INTO cuentas VALUES (NULL, $monto, '$tipo', '$tasa', '$estado', $iduser)";
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
    //exit();
?>