<?php 
include 'conectar.php';
$registros=mysqli_query($con,"select * from usuarios where documento='$_REQUEST[inputusuario]' and clave='$_REQUEST[inputPassword]'");
if($reg=mysqli_fetch_array($registros)){
if($reg['privilegios']=="ADMINISTRADOR"){
session_start();
$_SESSION['nombre_usuario']= $reg['nombre'];
$_SESSION['id_usuario']=$reg['ind'];

$direc="libros.php";
}

echo "<script>alert('Bienvenido ".$reg['nombre']." (".$reg['privilegios'].")');document.location.href = '".$direc."';</script>";
}else{
echo "<script>alert('Datos incorrectos, Vuelva a intentarlo');document.location.href = 'login.html';
</script>";
}
?>