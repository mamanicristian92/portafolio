<?php
    require_once 'head.php';
    require_once 'header.php';
?>
<body>
    <h1>Agregando Proyecto</h1>
    <div>
        <form action="store_proyect.php" method="POST">
            <label for="name">Nombre del Proyecto:</label><br>
            <input type="text" id="name" name="name" required><br>
            <label for="description">Descripción:</label><br>
            <textarea id="description" name="description" required></textarea><br>
            <label for="name">Estado:</label><br>
            <input type="checkbox" id="state" name="state" value=1 cheked required><br>
            <input type="submit" value="Guardar Proyecto">
        </form>
    </div>
</body>
</html>