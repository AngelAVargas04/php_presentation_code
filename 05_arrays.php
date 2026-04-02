<?php

// Indexed Array
// $fruits = ["Apple", "Banana", "Cherry"];
// echo $fruits[0] . '<br>';
// $fruits[3] = 'Peach';
// echo '<pre>';
// var_dump($fruits);
// echo '</pre>';

// Mixed Type Array
// $mixedArray = [15, "Apple", true];
// echo '<pre>';
// var_dump($mixedArray);
// echo '</pre>';

// Associative Array
$user = [
    'name' => 'Zura',
    'age' => 32,
    'hobbies' => ['Coding', 'Tennis']
];
echo $user['name'] . '<br>';
echo '<pre>';
var_dump($user);
echo '</pre>';