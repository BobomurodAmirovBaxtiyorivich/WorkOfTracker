<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body{
            background-color: black;
        }

        .row-width{
            width: 50%;
            margin-left: 270px;
            background-color: gold;
            border-radius: 20px;
        }

        .container{
            text-align: center;
        }

        .color{
            color: red;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row row-width mt-3">
            <form class="mb-2" align="center" action="result.php" method="POST">
                <div class="mb-3">
                    <label class="color" for="arrived_at" class="form-label">Arrived at</label>
                    <input type="datetime-local" class="form-control" name="arrived_at" id="arrived_at" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label class="color" for="leaved_at" class="form-label">Leaved at</label>
                    <input type="datetime-local" class="form-control" name="leaved_at" id="leaved_at" aria-describedby="emailHelp">
                </div>
                <button type="submit" name="sub" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>