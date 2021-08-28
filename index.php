<?php
session_start();

if (!$_SESSION) {
  header("Location:http://localhost/clases_php/crud/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 95px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<h1>Sesión iniciada, Hola 
    <?php echo $_SESSION['email']; ?>
  </h1>

  <!-- BOTON DENTRO DE UN FORM PARA CERRAR SESION https://www.w3schools.com/php/php_sessions.asp-->
  <form action="sessionexit.php" method="post">
  <button type="submit"class="btn btn-outline-dark">sesion exit</button>
  </form>

<div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Lista De Usuarios</h2>
                        <a href="nuevo.php" class="btn btn-outline-primary pull-right"><i class="fa fa-plus"></i>New User</a>
                    </div>
                    



<?php

if(isset($_GET["borrar"])){
    // se agrega la funcion setTimeout de javascript para que despues de 5 segudos se ejecute el funcion cerrar
    echo "<div id='borrar' onclick='cerrar()' class='content alert alert-primary' > Registro eliminado  </div><script>setTimeout(cerrar, 2000)</script>";
    }
			//incluimos el fichero de conexion
			include_once('Connect.php');

            $conn = new Connect();
            $connect = $conn->init();
           /// $query = $connect->prepare("SELECT * FROM user");
			//$query->execute();
           // while ($row = $query->fetch()){
                //echo "id: {$row["id"]} <br>";
                //echo "email: {$row["email"]} <br>";
                //echo "password: {$row["password"]} <br>";
                //echo "Nombre: {$row["Nombre"]} <br><br>";
                echo '<table class="table table-sm table-dark">';
                echo "<thead class>";
                echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Email</th>";
                echo "<th>Password</th>";
                echo "<th>Nombre</th>";
                echo "<th>Accion</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";
         //   }
              $query = $connect->prepare("SELECT * FROM user");
              // Ejecutamos
              $query->execute();
               // Ahora vamos a indicar el fetch mode cuando llamamos a fetch:
               while($row = $query->fetch(PDO::FETCH_OBJ)){
             //  echo "id: " . $row->id . "<br>";
             //  echo "email: " . $row->email . "<br>";
             //  echo "password: " . $row->password . "<br>";
             //  echo "Nombre: " . $row->Nombre . "<br>";
             echo "<tr>";
             echo "<td>" . $row->id . "</td>";
             echo "<td>" . $row->email . "</td>";
             echo "<td>" . $row->password . "</td>";
             echo "<td>" . $row->Nombre . "</td>";
             echo "<td>";
               // echo '<a href="read.php?id='. $row->id .'" class="mr-3" title="Ver perfil" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                echo '<a href="editar.php?id='. $row->id .'" class="mr-3" title="Actualizar perfil" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                echo '<a href="eliminar.php?id='. $row->id .'" title="Borrar perfil" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
            echo "</td>";
            echo "</tr>";
            
              

            }
            
            echo "</table>";
?>
           </div>
       </div>        
   </div>
</div>




    
</body>
</html>