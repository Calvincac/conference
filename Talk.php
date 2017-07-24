<?php

class Talk
{
    private $name;
    private $length;

    public function __construct($input)
    {
        $this->processInput($input);
    }

    public function processInput($input)
    {
        preg_match_all("/.+?(?=(\d+min))/", $input, $match);
        $this->name = $match[0][0];
        $length = explode("min", $match[1][0]);
        $this->length = $length[0];                   
    }

    



}