<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">


</head>
<body>
<?php

foreach ($data as $dat){
    echo "<a href='/teams/{$dat['TeamName']}'>{$dat['TeamName']}</a>" . "<br>";
};
?>

</body>
</html>