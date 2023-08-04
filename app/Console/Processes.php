<?php
use Illuminate\Support\Facades\Process;

$result=Process::run('php artisan make:job RonBakerStats');

var_dump($result->successful());