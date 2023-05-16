<?php
spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.php';
});

$teams = [
    'team1',
    'team2',
    'team3',
    'team4',
    'team5',
    'team6',
    'team7',
    'team8',
    'team9',
    'team10',
    'team11',
    'team12'
];

$fabric = new GamesFactory;
$games = $fabric -> createGamesCollection($teams);

$stadiums = [
    'stadium1',
    'stadium2',
    'stadium3',
    'stadium4',
    'stadium5'
];

$start = '1.05.2023'; 
$interval = 'P1D'; 
$end = '31.07.2023 23:59';

$fabric = new DatesFactory();
$dates = $fabric -> createDatesCollection($start, $interval, $end);

$fabric = new MatchFactory();
$matches = $fabric -> createMatchCollection($games, $dates, $stadiums);
