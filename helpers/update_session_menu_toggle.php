<?php
session_start();
if(isset($_GET['value'])) {
    $_SESSION['menu-toggle'] = ($_GET['value'] === 'true');
}
?>
