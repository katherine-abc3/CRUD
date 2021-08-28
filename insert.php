<?php

require_once ('Connect.php');
 $email =$_POST['email'];
 $password= $_POST['password'];
 $Nombre=$_POST['Nombre'];


//if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password']) && isset($_POST['Nombre']) && !empty($_POST['Nombre'])){
    $conn = new Connect();
    $connect = $conn->init();
    //$connect->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO user (email, password, Nombre) VALUES (:email,:password,:Nombre)";
    $query = $connect->prepare($sql);
    //$query -> bindParam(":email",$_POST['email']);
    //$query -> bindParam(":password",$_POST['password']);
    //$query -> bindParam(":Nombre",$_POST['Nombre']);
    $query -> bindParam(":email",$email);
    $query -> bindParam(":password",$password);
    $query -> bindParam(":Nombre",$Nombre);
    $query -> execute();
   // print("<script> alert('Regisytro guardado con exito');</script>");
   echo "registro añadido correctamente ";
//} else{
////    echo "problemas al añadir el registro ";
//}

//if($query -> execute()){
//    echo "datos guardados";
//} else{
//    echo "no se guardaron los datos";
//}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<br>
<br>
<a href="index.php" class="btn btn-secondary ml-2">volver</a>
</body>
</html>