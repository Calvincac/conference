<?php

class Manager
{
    private $talks;
    private $morningTime = 0;
    private $afternoonTime = 0;
    private $morningArr = [];
    private $afternoonArr = [];
    private $nineOclock = 540;
    private $oneOclock = 60; 


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
        $this->doSomething($tracks);
    }

    public function doSomething($talks)
    {
        $return = array_map(array($this, 'process'), $talks);
        unset($this->morningArr);
        unset($this->afternoonArr);
    }

    public function process($talk)
    {  
        if($this->morningTime <= 180) {
            if(! empty($this->checkTime($this->morningTime, $talk))) {
                $this->checkTime($this->morningTime, $talk);
            }
            $this->morningTime += $talk->getlength();            
            $this->nineOclock = $this->nineOclock + $talk->getLength();
            print($this->convertToHoursMins($this->nineOclock) ." " . $talk->getName() . "\n" );
        } else if($this->afternoonTime <= 240){
            $this->checkTime($this->afternoonTime, $talk);
            $this->afternoonTime += $talk->getlength();
            $this->oneOclock = $this->oneOclock + $talk->getLength();
            print($this->convertToHoursMins($this->oneOclock) ." " . $talk->getName() . "\n" );           
        }
             
    }

    public function checkTime($time, $talk)
    {

        if($time === 540) {
            return print($this->convertToHoursMins($this->nineOclock) ." " . $talk->getName() . "\n" );             
        }

        if($time === 60) {
            return print($this->convertToHoursMins($this->nineOclock) ." " . $talk->getName() . "\n" );
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
            shuffle($this->talks);            
            $this->arrangeSchedule($this->talks);
            $n = count($this->talks);
        } while($n > 0);
    }


}

