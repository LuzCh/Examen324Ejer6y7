 <?php
$username=$_POST['username'];
$contra=$_POST['clave'];
include("conexion.inc.php");
$sql = "SELECT * FROM usuarios
        WHERE nombre_usuario = '$username' AND contrasena_usuario = '$contra';";
$resultado = mysqli_query($conn, $sql);
$num=mysqli_num_rows($resultado);
$fila = mysqli_fetch_array($resultado);

if ($num>0){
    session_start();
    $_SESSION['username']=$username;
    $_SESSION['iduser']=$fila["id_usuario"];
    $_SESSION['rol']=$fila["rol_usuario"];

    if ($_SESSION['rol']=="DIRECTOR BANCARIO")
    {
        header("Location: usuariodirector.php?usuario=".$username);
    }
    elseif ($_SESSION["rol"]== "CAJERO")
    {
        header("Location: usuariocajero.php?usuario=".$username);
    }
    elseif ($_SESSION["rol"]== "ASESOR")
    {
        header("Location: usuarioasesor.php?usuario=".$username);
    }
    else
    {
        header("Location: usuariocliente.php?usuario=".$username);
    }
    
}
else{
    echo "Error";
}
//mysqli_free_result($resultado);
//mysqli_close($conn);
?>