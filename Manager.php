<?php

class Manager
{
    private $talks;
    private $morningHours = 180;
    private $afternoonHours = 240;
    private $morningTalks = [];
    private $afternoonTalks = [];


    public function __construct($talks)
    {
        $this->talks = $talks;
    }

    public function arrangeSchedule()
    {
        $length = count($this->talks);
        for($i=0; $i<$length; $i++) {
            if($this->talks[$i]->getLength() <= $this->morningHours) {
                $this->morningHours = $this->morningHours - $this->talks[$i]->getLength();
                $this->morningTalks[] = $this->talks[$i];
                unset($this->talks[$i]);
            }

            if ($this->talks[$i]->getLength() <= $this->afternoonHours) {
                $this->afternoonHours = $this->afternoonHours - $this->talks[$i]->getLength();
                $this->afternoonTalks[] = $this->talks[$i];
                unset($this->talks[$i]);                
            }                              
        }
        print_r($this->talks);             
    }

}

