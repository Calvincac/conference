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
        $this->arrangeMorningSchedule();
    }


    public function arrangeMorningSchedule()
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
        $length = count($this->talks);
        // vai retornar o primeiro index do elemento que preciso saber para fazer loop e unsetar
        print_r(array_keys($this->talks));
        exit;
        for($i=0; $i<$length; $i++) {
            if($this->talks[$i]->getLength() <= $this->afternoonHours) {

            }
        }

        // $this->afternoonHours = $this->afternoonHours - $this->talks[$i]->getLength();
        // $this->afternoonTalks[] = $this->talks[$i];     
        //print_r($this->afternoonTalks);                
        //print_r($this->morningTalks);
    }
}

