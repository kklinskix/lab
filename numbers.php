<!DOCTYPE html>
<html>
<head>
    <title>Умножение чисел</title>
</head>
<body>
    <form method="post" action="">
        <label for="num1">Первое число:</label>
        <input type="number" id="num1" name="num1" required><br>

        <label for="num2">Второе число:</label>
        <input type="number" id="num2" name="num2" required><br>

        <input type="submit" value="Умножить">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num1 = $_POST["num1"];
        $num2 = $_POST["num2"];

        $result = $num1 * $num2;

        echo "<h2>Результат умножения:</h2>";
        echo "<pre>";
        echo "$num1\n";
        echo "× $num2\n";
        echo "───────\n";
        echo "$result";
        echo "</pre>";
    }
    ?>
</body>
</html>
