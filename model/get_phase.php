<?php
class PhaseDB {

    #This function gets the database and creates and returs an array of the phases in the database
    public function getPhases() {
        $db = Database::getDB();
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
        $db = Database::getDB();
        $query = "SELECT * FROM phases
                  WHERE phaseID = '$phase_id'";
        try {
            $statement = $db->query($query);
            if ($statement === false) {
                // Handle query execution error
                throw new Exception("Query execution failed");
            }
            $row = $statement->fetch();
            if ($row === false) {
                // Handle no results found
                throw new Exception("No phase found with ID $phase_id");
            }
            $phase = new Phase();
            $phase->setID($row['phaseID']);
            $phase->setName($row['phase_name']);
            return $phase;
        } catch (Exception $e) {
            // Handle exception
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

    public function getDesc($phase_id){
        $db = Database::getDB();
        $query = "SELECT * FROM phases
                  WHERE phaseID = '$phase_id'";
        try {
            $statement = $db->query($query);
            if ($statement === false) {
                // Handle query execution error
                throw new Exception("Query execution failed");
            }
            $row = $statement->fetch();
            if ($row === false) {
                // Handle no results found
                throw new Exception("No phase found with ID $phase_id");
            }
            $phase = new Phase();
            $phase->setID($row['phaseID']);
            $phase->setName($row['phase_name']);
            $phase->setDesc($row['description']);
            return $phase;
        } catch (Exception $e) {
            // Handle exception
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }

}
?>