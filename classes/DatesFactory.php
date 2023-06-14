<?php

namespace Table\Classes;

use DatePeriod;
use DateTime;
use DateInterval;

class DatesFactory
{
     /**
     * @param string $start
     * @param string $interval
     * @param string $interval
     * @return array
     * creating a collection of dates
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
