<?php

require "DB.php";

require "WorkTime.php";

$db = new DB();

$query = new WorkTime($db->pdo);

$offset = isset($_GET['offset']) ? (int)$_GET['offset'] : 1;

if (isset($_GET['next'])) {
    $offset += 1;
}

if (isset($_GET['previous']) && $offset >= 2) {
    $offset -= 1;
}

$result = $query->panigation($offset);

$pages = $query->countPages();

const WORK_TIME = 8;

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Work of tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 align="center" class="h1-color mt-2">Work of tracker</h1>
    <div class="container">
        <div class="row row-width mt-3">
            <form class="mb-2" align="center" action="result.php" method="POST">
                <div class="mb-3">
                    <label class="color" for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label class="color" for="arrived_at" class="form-label">Arrived at</label>
                    <input type="datetime-local" class="form-control" name="arrived_at" id="arrived_at" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label class="color" for="leaved_at" class="form-label">Leaved at</label>
                    <input type="datetime-local" class="form-control" name="leaved_at" id="leaved_at" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <button type="submit" name="sub" class="btn btn-primary">Submit</button>
                </div>
                <div class="mb-3">
                    <button form="export" type="submit" class="btn btn-success">Export</button>
                </div>
            </form>
            <form action="" id="export" method="POST">
                <input type="text" name="export" value="true" hidden>
            </form>
        </div>
        <h1 align="center" class="text-warning mt-3">Working hour: <?= WORK_TIME ?></h1>
        <div class="row mt-5">
            <table class="table table-info table-striped">
                <thead class="table-secondary">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Arrived at</th>
                        <th scope="col">Leaved at</th>
                        <th scope="col">Required of</th>
                        <th scope="col">Working hour</th>
                        <th scope="col">Total required of</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($result as $value) { ?>
                        <tr>
                            <th scope="row"><?= $value['id'] ?></th>
                            <td><?= $value['name'] ?></td>
                            <td><?= $value['arrived_at'] ?></td>
                            <td><?= $value['leaved_at'] ?></td>
                            <td><?= date("H:i", $value['required_of']) ?></td>
                            <td><?= WORK_TIME ?></td>
                            <td><a href="total.php?name=<?= $value['name'] ?>" class="btn btn-info">Total</a></td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php 
                    $disabled = $offset <= 1 ? "disabled" : "";

                    $disabled2 = $offset >= $pages ? "disabled" : "";
                    ?>
                    <li class="page-item <?= $disabled?>"><a class="page-link" href="view.php?previous=1">Previous</a></li>
                    <?php
                    for ($i = 1; $i <= $pages; $i++) {
                        $active = $offset == $i ? "active" : "";
                        ?>
                        <li class="page-item <?= $active?>"><a class="page-link" href="view.php?offset=<?= $i ?>"><?= $i ?></a></li>
                    <?php }
                    ?>
                    <li class="page-item <?= $disabled2?>"><a class="page-link" href="view.php?next=1">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>