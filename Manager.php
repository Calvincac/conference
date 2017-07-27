<?php

class Manager
{
    private $talks;
    private $morningHours = 180;
    private $afternoonHours = 240;
    private $morningTalks = [];

    public function __construct($talks)
    {
        $this->talks = $talks;
        $this->arrangeMorningSchedule();
    }

    protected function arrangeMorningSchedule()
    {
        $length = count($this->talks);
        for($i=0; $i<$length; $i++) {
            if($this->talks[$i]->getLength() <= $this->morningHours) {
                $this->morningHours = $this->morningHours - $this->talks[$i]->getLength();
                $this->morningTalks[] = $this->talks[$i];
                unset($this->talks[$i]);
            }                              
        }             
    }

    public function arrangeAfternoonSchedule()
    {
               

    }
}

