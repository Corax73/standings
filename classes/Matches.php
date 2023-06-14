<?php

namespace Table\Classes;

class Matches
{
    private string $date;
    private string $teams;
    private string $stadium;

    /**
     * @param string $date
     * @param string $teams
     * @param string $stadium
     */
    public function __construct(string $date, string $teams, string $stadium)
    {
        $this -> date = $date;
        $this -> teams = $teams;
        $this -> stadium = $stadium;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this -> date;
    }

    /**
     * @return string
     */
    public function getTeams(): string
    {
        return $this -> teams;
    }

    /**
     * @return string
     */
    public function getStadium(): string
    {
        return $this -> stadium;
    }
}
