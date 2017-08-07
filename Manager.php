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

    public function arrangeTracks()
    {
        do {
            $this ->tracks[] = array_merge(
                $this->arrangeMorningSchedule($this->talks),
                $this->arrangeAfternoonSchedule($this->talks)
            );

            $n = count($this->talks);
        } while($n > 0);
        $this->showTracks();
    }

    public function calculateTime($track, $numberOfTrack)
    {
        $morning = 0;
        print("\nTrack " . $numberOfTrack . "\n");

        foreach($track as $t) {
            $morning = $morning + $t->getLength();
            if($morning <= 180) {
                print( $t->getLength() . " " . $t->getName(). "\n");
            } else {
                print( $t->getLength() . " " . $t->getName(). "\n");
            }
        }        
    }

    public function showTracks()
    { 
        $i = 0;
        foreach($this->tracks as $track) {
            $i++;
            $this->calculateTime($track, $i);
        }

    }
}

