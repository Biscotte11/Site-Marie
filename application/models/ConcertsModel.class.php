<?php

class ConcertsModel {

  public function addConcert($post) {
    $database = new Database();

    $sql = 'INSERT INTO concerts (event, groupeid, date, heure, adresse, zip, infos) VALUES (?, ?, ?, ?, ?, ?, ?)';

    $database->executeSql($sql, [
                                  $post['event'],
                                  $post['nomgroupe'],
                                  $post['date'],
                                  $post['heure'],
                                  $post['adresse'],
                                  $post['zip'],
                                  $post['infos']
                              ]);
  }

  public function groupeConcert($id) {
    $database = new Database();

    $sql = 'SELECT * FROM concerts WHERE groupeid=?';

    return $database->query($sql, [$id]);
  }


  public function allConcerts() {
    $database = new Database();

    $sql = 'SELECT * FROM concerts';

    return  $database->query($sql, []);
  }

  public function deleteConcert($id) {
        $database = new Database();

        $sql = 'DELETE FROM concerts WHERE Id=?';

        $database->executeSql($sql, [$id]);
  }
}

?>
