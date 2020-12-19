<?php
require_once 'ConexionBDD.php';
require_once 'Shortened.php';
require_once 'Middleware.php';

$conn = ConexionBDD::conectar();
$sql = 'SELECT * FROM shortened';
$result = $conn->query($sql);

if($result->columnCount() == 0){
    echo "No hay url acortadas";
} else {
    echo "Cargadas url acortasdas";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mx-auto">
                <form action="generarRedireccion.php" class="form-row" method="POST">
                    <div class="col-sm-6">
                        <input type="text" name="url" class="form-control">
                    </div>
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <h1>URL acortadas</h1>
            <?php foreach($result as $row){ ?>
                <a
                href="<?php echo 'Middleware.php?shortened='.$row['shortened']; ?>">                    
                    <?php echo $row['shortened']; ?>
                </a>
            <?php } ?>
        </div>

    </div>
</body>
</html>