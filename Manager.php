<?php

class Manager
{
    private $talks;
    private $tracks = [];


    public function __construct($talks)
    {
        $this->talks = $talks;
    }

    public function arrangeMorningSchedule($talks)
    {
        $morningHours = 180;
        foreach($talks as $key => $value) {
            if($talks[$key]->getLength() <= $morningHours) {
                $morningHours = $morningHours - $talks[$key]->getLength();
                $morningTalks[] = $talks[$key];
                unset($this->talks[$key]);
            }
        }
        return $morningTalks;      
    }

    public function arrangeAfternoonSchedule($talks)
    {
        $afternoonHours = 240;
        foreach($talks as $key => $value) {
            if($talks[$key]->getLength() <= $afternoonHours) {
                 $afternoonHours = $afternoonHours - $talks[$key]->getLength();
                 $afternoonTalks[] = $talks[$key]; 
                 unset($this->talks[$key]);
            }            
        }
        return $afternoonTalks;
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
        print_r($talks);       

    }

    public function arrangeTracks()
    {
        do {
            //$this->arrangeMorningSchedule($this->talks);
            //$this->arrangeAfternoonSchedule($this->talks);

            $this->arrangeSchedule($this->talks);
            print_r($this->tracks);
            exit;
            $n = count($this->talks);
        } while($n > 0);
    }


}

