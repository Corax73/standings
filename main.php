<?php
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

$teams = [];
$stadiums = [];

if (!empty($_POST)) {
    $cleaning = new InputCleaning();

    $teams = $cleaning -> clean($_POST['team']);
    $stadiums = $cleaning -> clean($_POST['team']);
}

if (!empty($teams) && !empty($stadiums)) {
    $fabric = new GamesFactory;
    $games = $fabric -> createGamesCollection($teams);

    $start = '1.05.2023';
    $interval = 'P1D';
    $end = '31.07.2023 23:59';
    
    $fabric = new DatesFactory();
    $dates = $fabric -> createDatesCollection($start, $interval, $end);
    
    $fabric = new MatchFactory();
    $matches = $fabric -> createMatchCollection($games, $dates, $stadiums);
} else {
    $teams = [];
    $matches = [];
}