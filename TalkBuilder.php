<?php

require_once("Talk.php");

class TalkBuilder
{
    private $unformattedTalks;
    private $talks;    
    
    public function __construct($input)
    {
        $this->unformattedTalks = explode(PHP_EOL, $input);
    }

    public function buildTalks()
    {
        foreach($this->unformattedTalks as $talk) {
            if(! empty($talk)) {
                $this->talks[] = new Talk($talk);
            }
        }
        return $this->talks;
    }

}


