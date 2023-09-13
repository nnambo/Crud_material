<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Material</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-+qdLaIRZfNu4cVPK/PxJJEy0B0f3Ugv8i482AKY7gwXwhaCroABd086ybrVKTa0q" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <h2>
            <center>List Material</center>
        </h2>
        <a class="btn btn-success btn-lg rounded-pill" href="/material/create.php" role="button">New material</a>
        <br>
        <table class="table">
            <thead>
                <tr>

                    <th>ID</th>
                    <th>Date</th>
                    <th>User</th>
                    <th>Number Part</th>
                    <th>Serial</th>
                    <th>Location</th>
                    <th>SRC</th>
                    <th>PEN</th>
                    <th>Step</th>
                    <th>Defect</th>
                    <th>Shift</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                //coneccion
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "materialncm";

                //crear coneccion
                $connection = new mysqli($servername, $username, $password, $database);

                //checar conneccion
                if ($connection->connect_error) {
                    die("failed connection: " . $connection->connect_error);
                }

                //enseña todos los datos
                $sql = "SELECT * FROM material";
                $res = $connection->query($sql);

                if (!$res) {
                    die("query invalido:" . $connection->error);
                }

                //lectura de datos
                while ($row = $res->fetch_assoc()) {
                    echo "
                <tr>
                <td>$row[id]</td>
                <td>$row[Fecha]</td>
                <td>$row[Usuario]</td>
                <td>$row[Numero]</td>
                <td>$row[Serial]</td>
                <td>$row[Celda]</td>
                <td>$row[SRC]</td>
                <td>$row[PEN]</td>
                <td>$row[Step]</td>
                <td>$row[Defecto]</td>
                <td>$row[Turno]</td>
                <td>
                   <a class='btn btn-warning btn-sm' href= '/material/edit.php?id=$row[id]'>Edit</a>
                   <a class='btn btn-danger btn-sm' href= '/material/delete.php?id=$row[id]'>Delete</a>
                </td>
            </tr>
                ";
                }
                ?>

            </tbody>

        </table>
    </div>
</body>

</html>