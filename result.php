<?php
$conn = new PDO("mysql:host=localhost;dbname=work_of_tracker", 'root', 'My$par0l');

const WORK_TIME = 8;


if (isset($_POST['sub'])) {
    $start = new DateTime($_POST['arrived_at']);
    $end = new DateTime($_POST['leaved_at']);
    $difference = $start->diff($end);

    $hour = $difference->h;
    $minut = $difference->i;
    $secund = $difference->s;

    $total = ((WORK_TIME * 3600) - ($hour * 3600) + ($minut * 60));

    $name = $_POST['name'];
    $arrived_at = $start->format("d.m.Y H:i");
    $leaved_at = $end->format("d.m.Y H:i");

    $query = "INSERT INTO work_time(name, arrived_at, leaved_at, required_of) VALUES(:name, :arrived_at, :leaved_at, :required_of)";

    $stmt = $conn->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':arrived_at', $arrived_at);
    $stmt->bindParam(':leaved_at', $leaved_at);
    $stmt->bindParam(':required_of', $total);

    $stmt->execute();

    header("location: index.php");
}
