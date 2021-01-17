<?php
 include ("dbConn.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <?php
if (isset($_GET['id'])){

    $sql = "SELECT * FROM moviedb.movie WHERE id =" . $_GET['id'];
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
        while ($row = $result->fetch_assoc()) {
           $id = $row['id'];
           $name = $row ['name'];
           $year = $row ['year'];
           $units = $row ['stockUnits'];
           $price = $row ['price'];
    
        }
    } else {
        echo "0 results"; 
}

}else if (isset($_POST['id'],$_POST['name'],$_POST['year'],$_POST['units'],$_POST['price'])){
    $id = $_POST['id'];
    $name = $_POST ['name'];
    $year = $_POST ['year'];
    $units = $_POST ['units'];
    $price = $_POST ['price'];
}
?>
    <form method = "POST" action = "update.php">
        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" name="name" class="form-control" id="nome" aria-describedby="emailHelp" value="<?php echo $name?>">
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Any</label>
            <input type="text" name="year" class="form-control" id="year"value="<?php echo $year?>">
        </div>
        <div class="mb-3">
            <label for="units" class="form-label">Units</label>
            <input type="text" name="units" class="form-control" id="units"value="<?php echo $units?>">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" name="price" class="form-control" id="price"value="<?php echo $price?>">
        </div>
        <input type="hidden" name="id" class="form-control" id="id"value="<?php echo $id?>">
        <button type="submit" class="btn btn-primary">UPDATE</button>
</form>
  <?php
        if (isset($_POST['id'],$_POST['name'],$_POST['year'],$_POST['units'],$_POST['price'])){
            //  $conn = openConn('moviedb');
             $sql2 = "UPDATE movie SET name =  '".$name."', stockUnits = ".$units.", price = ".$price.", year = ".$year."   WHERE id= ".$id;
            //  $sql = "UPDATE moviedb.movie SET name = '". $_POST['name']. "', year= '" . $_POST['year'] . "', stockUnits= '". $_POST['units']. "', price= '". $_POST['price']. "', WHERE id =" . $_POST['id'];
              $result = $conn->query($sql2);
          
              if($result)
                  echo "<br> Se ha ejectudado el delete correctamente";
                  
              else
                  echo "<br> Error al ejecutar el comando";
          
             // closeConn($conn);
          header("Location: index.php");
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

