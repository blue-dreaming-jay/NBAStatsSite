<?php
namespace App\Http\Controllers;

// return [
//     'queries'=>
//         ['insert_playerids' => "INSERT INTO playerids(ID, firstname, lastname) VALUES(:id, :first_name, :last_name)",
//         'select_playerids' => "SELECT "
//         ], 
// ]

// function insert_query($table, $columns, $assoc){
//     $values=[];
//     foreach ($assoc as $asso){
//         $values[]=":{$asso}";
//     }

//     return "INSERT INTO {$table}({implode(',', $columns)}) VALUES({implode(',', $values)})";
// }

function select_query($table, $columns){
    return "SELECT {implode(',', $columns)} FROM {$table}";
}

?>