<?php

class Manager
{
    private $talks;
    private $morningHours = 180;
    private $afternoonHours = 240;
    private $morningTalks = [];
    private $afternoonTalks = [];
    private $tracks = [];


    public function __construct($talks)
    {
        $this->talks = $talks;
    }


    public function arrangeMorningSchedule()
    {
        foreach($this->talks as $key => $value) {
            if($this->talks[$key]->getLength() <= $this->morningHours) {
                $this->morningHours = $this->morningHours - $this->talks[$key]->getLength();
                $this->morningTalks[] = $this->talks[$key];
                unset($this->talks[$key]);
            }
        }      
    }

    public function arrangeAfternoonSchedule()
    {
        foreach($this->talks as $key => $value) {
            if($this->talks[$key]->getLength() <= $this->afternoonHours) {
                 $this->afternoonHours = $this->afternoonHours - $this->talks[$key]->getLength();
                 $this->afternoonTalks[] = $this->talks[$key]; 
                 unset($this->talks[$key]);
            }            
        }
    }

    public function arrangeTracks()
    {
        do {
            $this->arrangeMorningSchedule();
            $this->arrangeAfternoonSchedule();
 
        }while($n > 0);
    }

    public function calculateTime()
    {


    }
}

