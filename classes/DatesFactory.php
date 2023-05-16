<?php

class DatesFactory
{
     /**
     * @param string $start
     * @param string $interval
     * @param string $interval
     * @return array
     * creating a collection of games
     */
    public function createDatesCollection(string $start, string $interval, string $end): array
    {
        $period = new DatePeriod(

            new DateTime($start),
        
            new DateInterval($interval),
        
            new DateTime($end)
        
        );
        
        $dates = [];
        
        foreach ($period as $key => $value) {
        
           $dates[] = $value -> format('d.m.Y');     
        
        }
        return $dates;
    }
}
