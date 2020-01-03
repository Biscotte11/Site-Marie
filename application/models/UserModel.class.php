<?php

class UserModel {

  public function signUp($post) {
    var_dump($post);
    $database = new Database();
    $user = $database->queryOne
    (
      'SELECT Id from users WHERE email = ?', [ $post['email']]
    );
    if ($user !== false) {
      var_dump("Ce n'est pas le bon Email");
    } else {
      $sql = 'INSERT INTO users
      ( firstname,
        lastname,
        email,
        password,
        role,
        groupe_id

    ) VALUES (?, ?, ?, ?, "user", ?)';
        $passwordHash= $this->hashPassword($post['password']);
        var_dump($passwordHash);
        $database->executeSql($sql, [
          $post['firstname'],
          $post['lastname'],
          $post['email'],
          $passwordHash,
          $post['nomgroupe']
        ]);
      }
    }


    private function verifyPassword($password, $hashedPassword)
    {
      return crypt($password, $hashedPassword) == $hashedPassword;
    }

    private function hashPassword($password)
    {
      $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

      return crypt($password, $salt);
    }

    public function signIn($post) {
       $database = new Database();
       $user = $database->queryOne
       (
           "SELECT
               *
           FROM users
           WHERE email = ?",
           [ $post['email'] ]
       );

       //var_dump($user);

       if($user === false)
       {
           var_dump('non !');
       }

       if($this->verifyPassword($post['password'], $user['password']) == false)
       {
           var_dump('Le mot de passe spécifié est incorrect');
       } else {
           $_SESSION['user']['Id'] = $user['Id'];
           $_SESSION['user']['firstname'] = $user['firstname'];
           $_SESSION['user']['lastname'] = $user['lastname'];
           $_SESSION['user']['email'] = $user['email'];
           $_SESSION['user']['role'] = $user['role'];
           $_SESSION['user']['groupe_id'] = $user['groupe_id'];
       }
       //var_dump($_SESSION);
     }

     public function connectUser($post) {
           $database = new Database();

   		     $user = $database->queryOne
           ('SELECT * FROM users WHERE email =?', [ $post['email'] ]);
    }



   public function changeUserProfil($post, $id)
    {
        $database = new Database();
        $sql = 'UPDATE users SET firstname=?, lastname=?, email=?, groupe_id=? WHERE Id=?';

         $database->executeSql($sql,
                                [
                                    $post['firstname'],
                                    $post['lastname'],
                                    $post['email'],
                                    $post['nomgroupe'],
                                    $id
                                ]);
    }

    public function listAllUsers()
    {
        $database = new Database();

        $sql = 'SELECT
                    *
                FROM users';

        return $database->query($sql, []);
    }

    public function getOneUser($id) {
      $database = new Database();
      $sql = 'SELECT * FROM users WHERE Id = ?';

      return $database->queryOne($sql, [$id]);
  }


  public function addGroupe($post, $files) {
    $database = new Database();

    $sql = 'INSERT INTO groupe (nomgroupe, photo) VALUES (?, ?)';

    $database->executeSql($sql, [$post['nomgroupe'],
                                $files['photo']['name']
                              ]);

  }

  public function deleteGroupe($id) {

       $database = new Database();

       $sql = 'DELETE FROM groupe WHERE groupeid=?';

       $database->executeSql($sql, [ $id ]);

   }

  public function deleteUser($id) {
        $database = new Database();

        $sql = 'DELETE FROM users WHERE Id=?';

        $database->executeSql($sql, [$id]);
  }

  }
  ?>
