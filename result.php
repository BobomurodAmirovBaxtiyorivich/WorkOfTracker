<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row mt-3">
            <?php
            define('WORK_TIME', 8);

            if (isset($_POST['sub'])) {
                $start = new DateTime($_POST['arrived_at']);
                $end = new DateTime($_POST['leaved_at']);
                $difference = $start->diff($end);
            ?>
                <h1 align="center">Arrived at: <?= $_POST['arrived_at'] ?></h1>
                <h1 align="center">Leaved at: <?= $_POST['leaved_at'] ?></h1>
                <h1 align="center">Working time: <?= WORK_TIME ?></h1>
            <?php
                echo "<h1 align='center'>" . "Soat: " . $difference->h . "</h1>";
                echo "<h1 align='center'>" . "Minut: " . $difference->i . "</h1>";
            }

            ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>