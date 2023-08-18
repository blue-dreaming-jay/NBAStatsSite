<!DOCTYPE html>
<html lang="en">
    <?php
    echo "Average points: {$average}" . "<br>";
    echo "Wins: {$wins_losses['wins']}" . "<br>";
    echo "Losses: {$wins_losses['losses']}" . "<br>";
    echo "Ties: {$wins_losses['ties']} " . "<br>";
    
    ?>
    <head>
    <div id="chartDiv" style="max-width: 1000px; height: 300px;"></div>
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">


    <script type="module">
        import {chart_gen} from "/js/stats.js";
        window.chartGen=chart_gen;

        var data=<?php echo json_encode($raw) ?>;

        const sub_pointer=data.length;
        console.log(sub_pointer);

        const keys=Object.keys(data[0]);

        const main_pointer=keys.length-2;

        chart_gen(main_pointer, keys, sub_pointer, data);
    </script>

    </head>
</html>
