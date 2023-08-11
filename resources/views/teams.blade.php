<?php
var_dump($data);
foreach ($data as $dat){
    echo "<a href='/teams/{$dat['TeamName']}'>{$dat['TeamName']}</a>";
};
?>