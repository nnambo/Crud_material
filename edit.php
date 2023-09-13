<?php
//connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "materialncm";

$connection = new mysqli($servername, $username, $password, $database);

$id = "";
$Fecha = "";
$Usuario = "";
$Numero = "";
$Serial = "";
$Celda = "";
$SRC = "";
$PEN = "";
$Step = "";
$Defecto = "";
$Turno = "";

$errorM = "";
$doneM = "";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (!isset($_GET["id"])) {
        header("location: /material/principal.php");
        exit;
    }
    $id = $_GET["id"];

    // lectura de la base de datos
    $sql = "SELECT * FROM material WHERE id=$id";
    $res = $connection->query($sql);
    $row = $res->fetch_assoc();

    if (!$row) {
        header("location: /material/principal.php");
        exit;
    }

    $Fecha = $row["Fecha"];
    $Usuario = $row["Usuario"];
    $Numero = $row["Numero"];
    $Serial = $row["Serial"];
    $Celda = $row["Celda"];
    $SRC = $row["SRC"];
    $PEN = $row["PEN"];
    $Step = $row["Step"];
    $Defecto = $row["Defecto"];
    $Turno = $row["Turno"];
} else {
    $id = $_POST["id"];
    $Fecha = $_POST["fecha"];
    $Usuario = $_POST["usuario"];
    $Numero = $_POST["numero"];
    $Serial = $_POST["serial"];
    $Celda = $_POST["celda"];
    $SRC = $_POST["SRC"];
    $PEN = $_POST["PEN"];
    $Step = $_POST["step"];
    $Defecto = $_POST["defecto"];
    $Turno = $_POST["turno"];

    do {
        if (empty($Fecha) || empty($Usuario) || empty($Numero)  || empty($Serial)  || empty($Celda)  || empty($SRC)  || empty($PEN)  || empty($Step) || empty($Defecto) || empty($Turno)) {

            $errorM = "revisa algo salio mal";
            break;
        }
        $sql = "UPDATE material
        SET fecha = '$Fecha', 
        usuario = '$Usuario', 
        numero = '$Numero', 
        serial = '$Serial', 
        celda = '$Celda', 
        SRC = '$SRC', 
        PEN = '$PEN', 
        step = '$Step', 
        defecto = '$Defecto', 
        turno = '$Turno'
        WHERE id = $id";

        $res = $connection->query($sql);

        if (!$res) {
            $errorM = "query invalido: "  . $connection->error;
            break;
        }

        $doneM = "Material add succeful";

        header("location: /material/principal.php");
        exit;
    } while (true);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container my-3">
        <h2>
            <center>ADD NEW MATERIAL</center>
        </h2>
        </br>
        <?php
        if (!empty($errorM)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorM</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"><strong>Fecha</strong></label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" name="fecha" value="<?php echo $Fecha; ?>">
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"><strong>Usuario</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="usuario" value="<?php echo $Usuario; ?>">
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"><strong>Numero</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="numero" value="<?php echo $Numero; ?>">
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"><strong>Serial</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="serial" value="<?php echo $Serial; ?>">
                </div>
            </div>

            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"><strong>SRC</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="SRC" value="<?php echo $SRC; ?>">
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"><strong>PEN</strong></label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="PEN" value="<?php echo $PEN; ?>">
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"><strong>Defecto</strong></label>
                <div class="col-sm-2">
                    <select class="form-select" aria-label="Default select example" name="defecto">

                        <option value="logico">logico</option>
                        <option value="fisico">fisco</option>

                    </select>
                </div>
            </div>

            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"><strong>Step</strong></label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="step" value="<?php echo $Step; ?>">
                </div>
            </div>
            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"><strong>Celda</strong></label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="celda" value="<?php echo $Celda; ?>">
                </div>
            </div>

            <div class="row mb-2">
                <label class="col-sm-3 col-form-label"><strong>Turno</strong></label>
                <div class="col-sm-1">
                    <select class="form-select" aria-label="Default select example" name="turno">

                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                    </select>
                </div>
            </div>

            <?php
            if (!empty($doneM)) {
                echo "
                <div class= 'row mb-3'>
                <div class ='offset-sm-3 col-sm-6'>
                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>$doneM</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
                </div>
                </div>
                ";
            }
            ?>
            </br>
            <div class="row mb-2">
                <div class="offset-sm-2 col-sm-2 d-grid">
                    <button type="submit" class="btn btn-success">Save</button>
                </div>
                <div class="col-sm-2 d-grid">
                    <a class="btn btn-danger" href="/material/principal.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>