<?php

class MatchFactory
{
    /**
     * @param array $games
     * @param array $dates
     * @param array $stadiums
     * @return array
     * creating a collection of Matches objects with a unique date and teams
     */
    public function createMatchCollection(array $games, array $dates, array $stadiums): array
    {
        for ($i = 0; $i < count($games); $i++) {
            $index = mt_rand(0, count($dates) - 1);
            $date = $dates[$index];
            $matches[] = new Matches($date, $games[$i], $stadiums[mt_rand(0, count($stadiums) - 1)]);
            unset($dates[$index]);
            $dates = array_values($dates);
        }
        $names = [];
        
        foreach ($matches as $match) {
            $names[] = strtotime($match -> getDate());
        }
        
        array_multisort($names, SORT_ASC, $matches);

        return $matches;
    }
}
