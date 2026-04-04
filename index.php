<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>PHP Calculator</title>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
        <!-- htmlspecialchars is a function that doesn't allow the user to inject html/javascript -->
        <input type="number" name="one" placeholder="num" step="any">
        <select name="operator">
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <input type="number" name="two" placeholder="num" step="any">
        <button type="submit">calculate</button>

        <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Grab data from inputs
            $num01 = filter_input(INPUT_POST, "one", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $num02 = filter_input(INPUT_POST, "two", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $operator = htmlspecialchars($_POST["operator"]);

            $errors = false;

            // Error handlers
            if ($num01 === "" || $num02 === "") {
                echo "<p class='calc-error'> Fill in all fields! </p>";
                $errors = true;
            }

            if (!$errors) {

                $value = match ($operator) {
                    "add"      => $num01 + $num02,
                    "subtract" => $num01 - $num02,
                    "multiply" => $num01 * $num02,
                    "divide"   => ($num02 == 0) ? null : $num01 / $num02,
                    default    => null,
                };

                if ($value === null) {
                    $errors = true;
                    echo "<p class='calc-error'>" . ($operator === "divide" ? "You cannot divide by zero!" : "Something went wrong!") . "</p>";
                }

                if (!$errors) {
                    echo "<p class='calc-result'> Result = " . $value . "</p>"; 
                }
            }
        }
        ?>
    </form>
</body>
</html>