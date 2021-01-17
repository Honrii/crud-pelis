<?php

include ("dbConn.php");


if (isset($_GET['id'])){
  //  $conn = openConn('moviedb');
    $sql = "DELETE FROM moviedb.movie WHERE id =" . $_GET['id'];
    $result = $conn->query($sql);

    if($result)
        echo "<br> Se ha ejectudado el delete correctamente";
    else
        echo "<br> Error al ejecutar el comando";

   // closeConn($conn);
}
header("Location: index.php")

?>
