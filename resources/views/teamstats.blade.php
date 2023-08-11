<!DOCTYPE html>
<html lang="en">
    <?php

    dump($average);
    ?>
    <head>
    <div id="chartDiv" style="max-width: 1000px; height: 300px;"></div>
    <script src="https://code.jscharting.com/latest/jscharting.js"></script>

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
