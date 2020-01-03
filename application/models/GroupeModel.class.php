<?php

class GroupeModel {

  public function nomGroupe() {

      $database = new Database();
      $sql= 'SELECT * FROM groupe';


      $groupes = $database->query($sql);
      return $groupes;
  }

  public function getOneGroupe($id) {
        $database = new Database();
        $sql = 'SELECT * FROM groupe WHERE groupeid= ?';

        return $database->queryOne($sql, [$id]);
      }


  public function updateGroupe($id, $post, $photo) {
        // var_dump($id);
        // var_dump($post);
        // var_dump($photo);

        $database = new Database();
        $sql = 'UPDATE groupe SET nomgroupe=?, Photo=?
        WHERE groupeid = ?'
        ;

        $database->executeSql($sql,[ $post['nomgroupe'], $photo, intval($id) ]);

}

}
?>
