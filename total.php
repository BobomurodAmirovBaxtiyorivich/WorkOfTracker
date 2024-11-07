<?php

require "DB.php";

require "WorkTime.php";

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $db = new DB();

    $query = new WorkTime($db->pdo);

    $result = $query->total_required_of($name);

    $total = 0;

    foreach ($result as $key => $value) {
        $total += $value['required_of'];
    }
    ?>
    <h1 align="center"><?= $name?>'s total required of is <?= date("H", $total)?> hours and <?= date("i", $total)?> minuts</h1>
    <?php
}
