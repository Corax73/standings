<?php

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

$games = [];

for ($i = 0; $i < count($teams); $i++) {
    for ($ii = 1; $ii < count($teams); $ii++) {        
        if ($i + $ii < count($teams)) {            
            $games[] = $teams[$i] . ' vs ' . $teams[$i + $ii];        
        }    
    }
}

//print_r($games);

$stadiums = [
    'stadium1',
    'stadium2',
    'stadium3',
    'stadium4'
];

class Matches
{
    private string $date;
    private string $teams;
    private string $stadium;

    public function __construct(string $date, string $teams, string $stadium)
    {
        $this -> date = $date;
        $this -> teams = $teams;
        $this -> stadium = $stadium;
    }

    public function getDate(): string
    {
        return $this -> date;
    }

    public function getTeams(): string
    {
        return $this -> teams;
    }

    public function getStadium(): string
    {
        return $this -> stadium;
    }
}

$period = new DatePeriod(

    new DateTime('1.05.2023'),

    new DateInterval('P1D'),

    new DateTime('31.07.2023 23:59')

);



$dates = [];

foreach ($period as $key => $value) {

   $dates[] = $value -> format('d.m.Y');     

}

$matches = [];

for ($i = 0; $i < count($games); $i++) {
    $index = mt_rand(0, count($dates) - 1);
    $date = $dates[$index];
    $matches[] = new Matches($date, $games[$i], $stadiums[mt_rand(0, 3)]);
    unset($dates[$index]);
    $dates = array_values($dates);
}

$names = [];

foreach ($matches as $match) {
    $names[] = strtotime($match -> getDate());
}

array_multisort($names, SORT_ASC, $matches);
