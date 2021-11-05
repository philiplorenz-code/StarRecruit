<?php
class Search {
    private $name;
    private $stadt;
    private $softskills;
    private $hardskills;
    private $sprachen;
    private $gehalt;
    private $wochenstunden;
    private $recruiterid;

    public function getName() {
        return $this->name;
    }

    public function getStadt() {
        return $this->stadt;
    }

    public function getSoftskills() {
        return $this->softskills;
    }

    public function getHardskills() {
        return $this->hardskills;
    }

    public function getSprachen() {
        return $this->sprachen;
    }

    public function getGehalt() {
        return $this->gehalt;
    }

    public function getWochenstunden(){
        return $this->wochenstunden;
    }

    public function getRecruiterid() {
        return $this->recruiterid;
    }


    function __construct($name, $stadt, $softskills, $hardskills, $sprachen, $gehalt, $wochenstunden, $userid){
        $this->name = $name;
        $this->stadt = $stadt;
        $this->softskills = $softskills;
        $this->hardskills = $hardskills;
        $this->sprachen = $sprachen;
        $this->gehalt = $gehalt;
        $this->wochenstunden = $wochenstunden;
        $this->userid = $userid;
    }

}