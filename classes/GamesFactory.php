<?php

namespace Table\Classes;

class GamesFactory
{
     /**
     * @param array $teams
     * @return array
     * creating a collection of games
     */
    public function createGamesCollection(array $teams): array
    {
        $games = [];
        
        for ($i = 0; $i < count($teams); $i++) {
            for ($ii = 1; $ii < count($teams); $ii++) {
                if ($i + $ii < count($teams)) {
                    $games[] = (string)$teams[$i] . ' vs ' . (string)$teams[$i + $ii];
                }
            }
        }
        return $games;
    }
}
