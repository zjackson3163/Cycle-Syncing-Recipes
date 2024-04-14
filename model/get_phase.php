<?php
class PhaseDB {

    #This function gets the database and creates and returs an array of the phases in the database
    public function getPhases() {
        $db = require_once('database.php');
        $query = 'SELECT * FROM phases
                  ORDER BY phaseID';
        $result = $db->query($query);
        $phases = array();
        foreach ($result as $row) {
            $phase = new Phase();
            $phase->setID($row['phaseID']);
            $phase->setName($row['phase_name']);
            $phases[] = $phase;
        }
        return $phases;
    }

    #This function gets the database and searches the database for which phase matches the phaseID given and sets the Phase object to that name and ID
    public function getPhase($phase_id) {
        $db = require_once('database.php');
        $query = "SELECT * FROM phases
                  WHERE phaseID = '$phase_id'";
        $statement = $db->query($query);
        $row = $statement->fetch();
        $phase = new Phase();
        $phase->setID($row['phaseID']);
        $phase->setName($row['phase_name']);
        return $phase;
    }
}
?>