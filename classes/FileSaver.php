<?php

namespace Table\Classes;

class FileSaver
{
    /**
     * save result in csv
     * @param array $matches
     */
    public function saveResult(array $matches): string
    {
        $file = 'output/' . date('Y-m-d-H-i-s') . '.csv';
        foreach ($matches as $match) {
            file_put_contents($file, $match -> getDate() . ' ' . $match -> getTeams() . ' ' . $match -> getStadium() . "\n", FILE_APPEND | LOCK_EX);
        }
        return $file;
    }
}
