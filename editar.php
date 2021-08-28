<?php
require_once('Connect.php');

if(!empty($_POST["actualizar"])) {
	$conn = new Connect();
    $connect = $conn->init();
	$pdo_statement=$connect->prepare("update user set email='" . $_POST[ 'email' ] . "', password='" . $_POST[ 'password' ]. "', Nombre ='" . $_POST[ 'Nombre' ]. "' where id=" . $_GET["id"]);
	$result = $pdo_statement->execute();
	if($result) {
		header('location:index.php');
	}
}
$conn = new Connect();
$connect = $conn->init();
$pdo_statement = $connect->prepare("SELECT * FROM user where id=" . $_GET["id"]);
$pdo_statement->execute();
$result = $pdo_statement->fetchAll();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<div class="form-row">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Editar</h2>
                    <p>Por favor editar los campos que desea actualizar.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>email</label>
                            <input type="text" name="email" class="form-control " ></input>
                            
                        </div>
                        <div class="form-group">
                            <label>password</label>
                            <input name="password" class="form-control " ></input>
                            
                        </div>
			
                        <div class="form-group">
                            <label>Nombre </label>
                            <input type="text" name="Nombre" class="form-control ">
                            <span class="invalid-feedback"><?php echo $Nombre_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input name="actualizar" type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>