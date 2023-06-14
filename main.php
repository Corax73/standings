<?php

namespace Table\Classes;

use Table\Classes\InputCleaning;
use Table\Classes\GamesFactory;
use Table\Classes\DatesFactory;
use Table\Classes\MatchFactory;
use Table\Classes\FileSaver;

$teams = [];
$stadiums = [];

if (!empty($_POST)) {
    $cleaning = new InputCleaning();

    $teams = $cleaning -> clean($_POST['team']);
    $stadiums = $cleaning -> clean($_POST['stadium']);
}

if (!empty($teams) && !empty($stadiums)) {
    $fabric = new GamesFactory;
    $games = $fabric -> createGamesCollection($teams);

    $start = $_POST['dateStart'];
    $end = $_POST['dateStop'];
    $interval = 'P1D';
    
    $fabric = new DatesFactory();
    $dates = $fabric -> createDatesCollection($start, $interval, $end);
    
    $fabric = new MatchFactory();
    $matches = $fabric -> createMatchCollection($games, $dates, $stadiums);

    $saver = new FileSaver();

    $path = $saver -> saveResult($matches);
} else {
    $teams = [];
    $matches = [];
}
