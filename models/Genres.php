<?php

class Genres
{
    /**
     * Returns total genres list
     */
    public static function getGenresList()
    {
        $db = Db::getConnection();
        
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
}