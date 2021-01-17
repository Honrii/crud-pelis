<?php 

require_once ("dbConn.php");

?>

<!doctype html>
<html lang="en">
  <head>
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Movies CRUD</title>
  </head>
  <body>

    <form method="post" action="insert.php">
        Insert<input type="text" name="aaa">
        <input type="number" name="bbb">
        <input type="number" name="ccc">
        <input type="number" name="ddd">
        <input type="submit" value="click" name="btn"> 
    </form>

    <form method="get" action="index.php">
        Search<input type="text" name="anyoBusqueda">
        <input type="submit" value="click" name="find"> 
    </form>
    <div class="container" style="background-color: white;">      <!-- Fondo para leer mejor -->
    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Year</th>
      <th scope="col">Units</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody>
  <?php

$sql="";
if(isset($_GET['anyoBusqueda'])){
  $year = $_GET['anyoBusqueda'];
  
  $sql ="SELECT * FROM movie WHERE year= ".$year ;
}else{
  $sql = "SELECT * FROM movie";
}



$result = $conn->query($sql);



if ($result->num_rows > 0) {
  
    while ($row = $result->fetch_assoc()) {

        echo "<tr><td> " . $row ['id'] . " |</td>";
        echo "<td> " . $row ['name'] . " | </td>";
        echo "<td> " . $row ['year'] . " | </td>";
        echo "<td> " . $row ['stockUnits'] . " | </td>";
        echo "<td> " . $row ['price'] . " | </td>";
        echo "<td> <a href='delete.php?id=".$row['id']."'>Borrar</a> | </td>";
        echo "<td> <a href='update.php?id=".$row['id']."'>Editar</a> | </td>";
        echo "</tr>";

    
    }
} else {
    echo "0 results";
}

?>
  </tbody>
</table>
</div>

    <?php

    if (isset($_POST['btn'])) {
        $name = $_POST['aaa'];
        $year = $_POST['bbb'];
        $stockUnits = $_POST['ccc'];
        $price = $_POST['ddd'];

        var_dump($name);

        $sql = "INSERT INTO `movie` (`id`, `name`, `year`, `stockUnits`, `price`) VALUES (500, $name, $year, $stockUnits, $price) " ;
        var_dump($sql);
        $result = $conn->query($sql);
        if ($conn->query($sql) === TRUE) {
            echo "New records created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }

    if (isset($_POST['find'])) {
        $name = $_POST['name'];

        var_dump($name);

        echo "<h1> FILTRO</h1>";

        $sql = "SELECT * FROM movie	WHERE year < $name";
        var_dump($sql);
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            echo "<br>";
            while ($row = $result->fetch_assoc()) {
                echo "<table><tr>";
                echo "<tr><td> " . $row ['id'] . " |</td>";
                echo "<td> " . $row ['name'] . " | </td>";
                echo "<td> " . $row ['year'] . " | </td>";
                echo "<td> " . $row ['stockUnits'] . " | </td>";
                echo "<td> " . $row ['price'] . " | </td>";
                echo "<td> <a href='delete.php?id=".$row['id']."&año=".$row['year']."'>Borrar</a> | </td>";
                echo "<td> <a href='update.php?id=".$row['id']."&año=".$row['year']."'>Editar</a> | </td>";
                echo "</tr></table>";
                echo "<br>";
            }
        } else {
            echo "0 results";
        }
        $conn->close();
    }

    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>