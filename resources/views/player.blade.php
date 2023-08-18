<?php
echo "<p> Name: {$player_data['firstname']} {$player_data['lastname']} </p>" . "<br>";
echo "Team: {$player_data['team']}" . "<br>";
echo "Position: {$player_data['position']}" . "<br>";

foreach ($years as $year){
    echo "<a href='/players/{$player_data['firstname']}-{$player_data['lastname']}/{$year}'>{$year}</a>" . "<br>";
}
//echo "<a href='/players/{$firstname}-{$lastname}/2016'>2016</a>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    </head>
    <body>

    </body>
</html>