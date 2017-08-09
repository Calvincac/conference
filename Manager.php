<?php

class Manager
{
    private $talks;
    private $tracks = [];
    private $timeAcc = 540;
    private $morningTime = 0;


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
        $this->morningTime = $this->morningTime + $time;

        if($this->morningTime <= 180) {

            if($this->timeAcc === 540) {
                $this->buildHour($this->timeAcc);
                $p = $this->buildHour($this->timeAcc);
                print($p . "\n");
            }

            $this->timeAcc = $this->timeAcc + $time;
            $p = $this->buildHour($this->timeAcc);
            print($p . "\n");
        }

    }    

    public function buildHour($time)
    {
                
        return $this->convertToHoursMins($time);                                                
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

