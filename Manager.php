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
       $this->process($tracks);
    }

    public function process($talks)
    {
        
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
            $n = count($this->talks);
        } while($n > 0);
    }


}

