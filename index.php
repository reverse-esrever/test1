<?php 
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Ценниковый калькулятор</h1>
        <form action="/app/calculation.php" method="POST">
            <div class="mb-3">
                <label for="dateInput" class="form-label">Выберите дату:</label>
                <input type="date" class="form-control" id="dateInput" name="date" value="<?php echo $_SESSION['date'] ?? null ?>" required>
                <small class="error-message" id="dateError">
                    <?php echo $_SESSION['message'] ?? '' ?>
                </small>
            </div>
            <button type="submit" class="btn btn-primary">Применить</button>
        </form>
        <div id="resultSection" class="mt-4">
            <h3>Результат:</h3>
            <p><strong>Остаток на складе:</strong> <span id="stockSpan"><?php echo $_SESSION['product']['count'] ?? '' ?></span></p>
            <p><strong>Текущая цена:</strong> <span id="priceSpan"><?php echo $_SESSION['product']['price'] ?? '' ?></span></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

<?php
unset($_SESSION['date']);
unset($_SESSION['message']);
unset($_SESSION['product']);