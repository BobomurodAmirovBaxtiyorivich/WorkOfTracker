<?php

require "DB.php";

require "WorkTime.php";

$db = new DB();

const WORK_TIME = 8;


if (isset($_POST['sub'])) {
    if (!empty($_POST['arrived_at']) && !empty($_POST['leaved_at'])) {
        $start = new DateTime($_POST['arrived_at']);
        $end = new DateTime($_POST['leaved_at']);
        $difference = $start->diff($end);

        $hour = $difference->h;
        $minut = $difference->i;
        $secund = $difference->s;

        $total = (WORK_TIME * 3600) - (($hour * 3600) + ($minut * 60));

        $name = $_POST['name'];
        $arrived_at = $start->format("d.m.Y H:i");
        $leaved_at = $end->format("d.m.Y H:i");

        $query = new WorkTime($db->pdo);

        $query->store($name, $arrived_at, $leaved_at, $total);

        header("location: index.php");
    } else {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}
