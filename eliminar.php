<?php
// Process delete operation after confirmation
//if(isset($_GET["id"]) && !empty($_GET["id"])){
if (isset($_POST["borrar"])){
    // Include config file
    require_once ('Connect.php');
    

    $conn = new Connect();
    $connect = $conn->init();
    
    // Prepare a delete statement
    $sql = "DELETE FROM `user` WHERE id =:id";
    $query = $connect->prepare($sql);
    $query -> bindParam(':id', $id, PDO::PARAM_INT);
    $id=trim($_POST['id']);
    $query -> execute();
    

   
    if($query->rowCount() > 0)
    {
    $count = $query -> rowCount();
    echo "<div class='content alert alert-primary' > 
    
    Gracias: $count registro eliminado  </div>";
    header("Location:http://localhost/clases_php/crud/index.php?borrar=borrar");
}
    else{
        echo "<div class='content alert alert-danger'> No se pudo eliminar el registro  </div>";
    
    print_r($query->errorInfo()); 
    }
} 
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<form action="" method="POST">
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Delete </h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"></input>
                            <p>Desea eliminar el registro selecionado?</p>
                            <p>
                                <input  name="borrar" type="submit" value="Yes" class="btn btn-danger">
                                <a href="index.php" class="btn btn-secondary">No</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</form>
</body>
</html>