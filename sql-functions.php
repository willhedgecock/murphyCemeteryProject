<?php

    function createSQLStatement() {

        if (!empty($_POST['burial_first_name']) && empty($_POST['burial_last_name'])) {
            $sql = "SELECT * ";
            $sql .= "FROM murphyburials ";
            $sql .= "WHERE burial_first_name = :firstName1 ORDER BY burial_last_name ASC";
        } else if (!empty($_POST['burial_last_name']) && empty($_POST['burial_first_name'])) {
            $sql = "SELECT * ";
            $sql .= "FROM murphyburials ";
            $sql .= "WHERE burial_last_name = :lastName1 ORDER BY burial_first_name ASC";
        } else if (!empty($_POST['burial_first_name']) && !empty($_POST['burial_last_name'])) {
            $sql = "SELECT * ";
            $sql .= "FROM murphyburials ";
            $sql .= "WHERE burial_first_name = :firstName1 AND burial_last_name = :lastName1";
        }
        return $sql;
    }

?>