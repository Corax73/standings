<?php

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
