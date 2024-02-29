<?php 

$inc = include("../../app/config.php");
$consulta = "SELECT id, name, email, role, date_created FROM users";
$resultado = $pdo->query($consulta);

// Muestra los registros por pantalla
if ($resultado) {
    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $role = $row['role'];
        $date_created = $row['date_created'];
        ?>
        <div>
            <h2><?php echo $name; ?></h2>
            <div>
                <p>
                    <b>ID: </b> <?php echo $id; ?> <br>
                    <b>Email: </b> <?php echo $email; ?> <br>
                    <b>Rol: </b> <?php echo $role; ?> <br>
                    <b>Fecha de creación: </b> <?php echo $date_created; ?> <br>
                </p>
            </div>
        </div>
        <?php
    }
} else {
    echo "Error al ejecutar la consulta";
}
?>
