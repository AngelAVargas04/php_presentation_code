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
            // Grab data from inputs [cite: 4, 5]
            $num01 = filter_input(INPUT_POST, "one", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $num02 = filter_input(INPUT_POST, "two", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $operator = htmlspecialchars($_POST["operator"]);

            $errors = false;

            // Error handlers [cite: 8, 9, 10]
            if ($num01 === "" || $num02 === "" || $num01 === false || $num02 === false) {
                echo "<p class='calc-error'> Fill in all fields! </p>";
                $errors = true;
            }

            if (!$errors) {
                $value = 0;
                switch ($operator) {
                    case "add": $value = $num01 + $num02; break;
                    case "subtract": $value = $num01 - $num02; break; 
                    case "multiply": $value = $num01 * $num02; break; 
                    case "divide": 
                        if ($num02 == 0) {
                            echo "<p class='calc-error'> You cannot divide by zero! </p>";
                            $errors = true;
                        } else {
                            $value = $num01 / $num02;
                        }
                        break;
                    default:
                        echo "<p class='calc-error'> Something went wrong! </p>"; 
                        $errors = true;
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