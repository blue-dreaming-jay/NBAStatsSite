
<!DOCTYPE html>
<html>
<head>
<script src="https://code.jscharting.com/latest/jscharting.js"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
</head>

<body>
<?php
echo "Team name: {$team_data['TeamName']}\r\n" . "<br>";
echo "City: {$team_data['City']}\r\n" . "<br>";
echo "Division: {$team_data['Division']}\r\n" . "<br>";
echo "Seasons:" . "<br>";


foreach ($years as $year){
    echo "<a href='/teams/{$team_data['TeamName']}/{$year}'>{$year}</a>\r\n";
}
?>

</body>
</html> 