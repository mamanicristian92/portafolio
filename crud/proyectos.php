<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portafolio de Cristian</title>
</head>
<body>
    <h3>Read</h3>
    <a href="create_proyect.php">Create</a>
    <h3>Proyectos</h3>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require_once 'connect.php';
                $sql = "SELECT * FROM proyectos";
                $result = $con->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["name"] . "</td>";
                        echo "<td>" . $row["description"] . "</td>";
                        if ($row["state"] == 1) {
                            $row["state"] = "Activo";
                        } else {
                            $row["state"] = "Inactivo";
                        }
                        echo "<td>" . $row["state"] . "</td>";
                        echo "<td><a href='read.php?id=" . $row["id"] . "'>Ver</a> | <a href='edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='delete.php?id=" . $row["id"] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No records found</td></tr>";
                }
                $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>