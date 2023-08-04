<?php
echo "Name: {$firstname} {$lastname}\n";
echo "Team: {$team}\n";
echo "Position: {$position}\n";
echo "<a href='/players/{$firstname}-{$lastname}/2016'>2016</a>";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Hello</title>
    </head>
    <body>
        <h1>Hello Hello Hello</h1>
        <div id="chartDiv" style="max-width: 500px; height: 300px;"></div>
        <script src="https://code.jscharting.com/latest/jscharting.js"></script>
        <script type="module" src="/js/stats.js"></script>
    </body>
</html>