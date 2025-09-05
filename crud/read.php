<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio de Cristian</title>
</head>
<body>
    <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            require_once 'connect.php';
            $sql = "SELECT name FROM proyectos WHERE id = $id";
            $result = $con->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo $row["name"];
            } else {
                echo "Proyecto no encontrado";
            }
        } else {
            echo "ID no proporcionado";
        }
    ?>
    <h3>Read</h3>
    <a href="create.php">Create</a>
    <h3>Tecnologías usadas:</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    require_once 'connect.php';
                    $sql = "SELECT name FROM proyectos WHERE id = $id";
                    $result = $con->query($sql);
                    if ($result->num_rows > 0) {
                        $proyecto = $result->fetch_assoc();
                        //echo $proyecto["name"];
                        //consultamos en la tabla proyectos_tecnologias
                        $sql = "SELECT * FROM proyectos_tecnologias inner join tecnologias on proyectos_tecnologias.tecnologia_id=tecnologias.id WHERE proyecto_id = $id";
                        $result = $con->query($sql);
                        echo $result->num_rows;
                        //echo $result;
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                
                                echo "<tr>";
                                echo $row;
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["name"] . "</td>";
                                echo "<td>" . $row["description"] . "</td>";
                                //echo "<td><a href='read.php?id=" . $row["id"] . "'>Ver</a> | <a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='3'>Proyectos sin teconologías(?</td></tr>";
                        }
                        $con->close();
                    } else {
                        echo "Proyecto no encontrado";
                    }
                } else {
                    echo "ID no proporcionado";
                }
            ?>
        </tbody>
    </table>
</body>
</html>