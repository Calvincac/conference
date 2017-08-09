<?php

class Manager
{
    private $talks;
    private $tracks = [];


    public function __construct($talks)
    {
        $this->talks = $talks;
    }

    public function arrangeSchedule($talks)
    {
        $minutesLeft = 420;
        $track = [];
        foreach($talks as $key => $value) {
            if($talks[$key]->getLength() <= $minutesLeft) {
                 $minutesLeft = $minutesLeft - $talks[$key]->getLength();
                 $tracks[] = $talks[$key];
                 unset($this->talks[$key]);
            }            
        }
        $this->showTracks($tracks);
    }


    public function showTracks($talks)
    {
        foreach($talks as $talk) {
            $this->processTime($talk->getLength());
        }
    }

    public function processTime($time) 
    {
        $acc = 0;
        $acc = $acc + $time;
        if($acc <= 180) {
            $x = 540;
            $x = $x + $time ;
            $p = $this->buildHour($x);
            print($p . "\n");
        }

    }

    public function buildHour($time)
    {
        if($time > 540) {
            return $this->convertToHoursMins($time);            
        }                                      
    }

    public function convertToHoursMins($minutes) 
    {
        $zero    = new DateTime('@0');
        $offset  = new DateTime('@' . $minutes * 60);
        $diff    = $zero->diff($offset);
        return $diff->format('%h:%i AM');
    }

    public function arrangeTracks()
    {
        do {
            $this->arrangeSchedule($this->talks);
            //print_r($this->tracks);
            exit;
            $n = count($this->talks);
        } while($n > 0);
    }


}

