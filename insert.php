<?php

require 'dbConn.php';


if(isset($_POST['btn'])){
   
    $name = $_POST['aaa'];
    $year = $_POST['bbb'];
    $units = $_POST['ccc'];
    $price = $_POST['ddd'];

    //$sql= 'INSERT INTO movie (name, year, stockUnits, price) VALUES ('".$name."', ".$year.", ".$units.", ".$price.");';
    $sql = "INSERT INTO movie (name, year, stockUnits, price)VALUES ('.$name.', '.$year.', '.$units.', '.$price.');";
    $result = $conn->query($sql);
          
        if($result)
            echo "<br> Se ha ejectudado el delete correctamente";
                  
        else
            echo "<br> Error al ejecutar el comando";
          
             // closeConn($conn);
       //   header("Location: index.php");
          
}


?>