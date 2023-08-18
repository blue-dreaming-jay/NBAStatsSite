<!DOCTYPE html>
<html lang="en">
    <head>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <div id="chartDiv"></div>
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>

    <script type="module">
        import {chart_gen} from "/js/stats.js";
        import {add_anchor} from "/js/players.js";
        window.chartGen=chart_gen;
        window.addAnchor=add_anchor;

        var data=<?php echo json_encode($raw) ?>;
        console.log(data[0]['PlayerID']);
        const sub_pointer=data.length;
        console.log(sub_pointer);

        const keys=Object.keys(data[0]);

        const main_pointer=keys.length-2;

        chart_gen(main_pointer, keys, sub_pointer, data);

        for (var i=2; i<=main_pointer; i++){

            const ref=`chartDiv${i}`

            const name=keys[i];
            
            add_anchor(name, `#${ref}`, 'chartDiv');
        };
    </script>

    </head>
    <body>
        <?php
        foreach ($average as $key=>$value){
            echo "Average {$key}: {$value}" . "</br>";
        }
        ?>
    </body>
</html>
