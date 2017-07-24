<?php

require_once("Talk.php");

$input = "
Writing Fast Tests Against Enterprise Rails 60min

Overdoing it in Python 45min

Lua for the Masses 30min

Ruby Errors from Mismatched Gem Versions 45min

Common Ruby Errors 45min

Rails for Python Developers lightning

Communicating Over Distance 60min

Accounting-Driven Development 45min

Woah 30min

Sit Down and Write 30min

Pair Programming vs Noise 45min

Rails Magic 60min

Ruby on Rails: Why We Should Move On 60min

Clojure Ate Scala (on my project) 45min

Programming in the Boondocks of Seattle 30min

Ruby vs. Clojure for Back-End Development 30min

Ruby on Rails Legacy App Maintenance 60min

A World Without HackerNews 30min

User Interface CSS in Rails Apps 30min";

$talks = explode(PHP_EOL, $input);

foreach($talks as $talk) {
    if(! empty($talk)) {
        $result[] = new Talk($talk);
    }
}

print_r($result);


//$talk =  new Talk($input);
