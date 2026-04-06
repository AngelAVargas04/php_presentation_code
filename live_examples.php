<?php

function processUser() {
    // =========================
    // INPUT (GET + POST)
    // =========================
    $name = $_GET['name'] ?? "Guest";
    $favNum = $_POST['favNum'] ?? null;

    // =========================
    // VARIABLES + ARRAY
    // =========================
    $user = [
        "name" => $name,
        "role" => "admin",
        "grades" => [90, 85, 88]
    ];

    echo "<h2>Welcome, {$user['name']}!</h2>";

    // =========================
    // FUNCTION (helper)
    // =========================
    function greet($person) {
        return "Hello, $person!";
    }

    echo greet($user['name']) . "<br>";

    // Arrow function
    $square = fn($x) => $x * $x;

    // =========================
    // CONDITIONAL + MATCH
    // =========================
    $access = match($user['role']) {
        "admin" => "Full access",
        "user" => "Limited access",
        default => "No access"
    };

    echo "$access<br>";

    // =========================
    // LOOP
    // =========================
    echo "Grades:<br>";
    foreach ($user['grades'] as $grade) {
        echo $grade . "<br>";
    }

    // =========================
    // FORM HANDLING
    // =========================
    if ($_SERVER["REQUEST_METHOD"] === "POST" && $favNum !== null) {
        echo "Your number squared is: " . $square($favNum) . "<br>";
    }

    // =========================
    // STRING + TYPE JUGGLING
    // =========================
    echo "Uppercase name: " . strtoupper($user['name']) . "<br>";

    $weirdMath = "5" + 10;
    echo "String + int = $weirdMath<br>";

    // =========================
    // PHP + HTML MIXING
    // =========================
    echo "<ul>";
    foreach ($user['grades'] as $grade) {
        echo "<li>$grade</li>";
    }
    echo "</ul>";

    // =========================
    // FORM (USER INPUT UI)
    // =========================
    echo '
    <form method="POST">
        Enter your favorite number:
        <input type="number" name="favNum">
        <input type="submit" value="Submit">
    </form>
    ';
}

// =========================
// RUN THE PROGRAM
// =========================
processUser();

?>