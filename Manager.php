<?php

class Manager
{
    private $talks;
    private $tracks = [];
    private $timeAcc = 540;
    private $x = 60;
    private $morningTime = 0;
    private $afternoonTime = 0;


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
            $this->processTime($talk);
        }
    }

    public function processTime($time) 
    {
        // Morning meetings
        $this->arrangeMorningTime($time);

        // Afternoon meetings
        $this->arrangeAfternoonTime($time);

    }

    public function arrangeMorningTime($time)
    {
        while($this->morningTime < 180) { // 3 hours in the morning
            $this->morningTime = $this->morningTime + $time->getLength();

            if($this->timeAcc === 540) { // 540 is 9:00 AM in minutes
                $this->buildHour($this->timeAcc);
                $p = $this->buildHour($this->timeAcc);
                print($p . " " .  $time->getName() ."\n");
                $this->checkIfItsNoon($time);
            }
        }

    }

    public function checkIfItsNoon($time)
    {
        $this->timeAcc = $this->timeAcc + $time->getLength();
        
        if($this->timeAcc === 720) { 
            $this->buildHour($this->timeAcc);
            $p = $this->buildHour($this->timeAcc);
           print($p . " " .  $time->getName() ."\n");
            return;
        } else {
            $p = $this->buildHour($this->timeAcc);
            print($p . " " .  $time->getName() ."\n");
        }

    }  

    public function arrangeAfternoonTime($time)
    {
         while($this->afternoonTime <  240 && $this->x < 300) {
            $this->afternoonTime = $this->afternoonTime + $time->getLength();
            
            if($this->x === 60) { // 60 is 1:00 PM in minutes
                $this->buildHour($this->x);
                $p = $this->buildHour($this->x);
                print($p . " " .  $time->getName() ."\n");
            }

            $this->x = $this->x + $time->getLength();
            $p = $this->buildHour($this->x);
            print($p . " " .  $time->getName() ."\n");
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
            //shuffle($this->talks);
            $this->arrangeSchedule($this->talks);
            $n = count($this->talks);
        } while($n > 0);
    }


}

