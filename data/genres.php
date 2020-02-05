<?php
require_once('Db.php');

    function getGenresList()
    {
        $db = getConnection();
        
        $result = $db->query('SELECT id, name_genre FROM genres');

        $genresList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $genresList[$i]['id'] = $row['id'];
            $genresList[$i]['name_genre'] = $row['name_genre'];
            $i++;
        }

        return $genresList;
    }