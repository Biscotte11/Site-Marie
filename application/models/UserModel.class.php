<?php

class UserModel {
  public function signUp($post) {
    $database = new Database();
    $user = $database->queryOne
    (
      'SELECT Id from users WHERE Email = ?', [ $post['email']]
    );
    if ($user !== false) {
      var_dump("Ce n'est pas le bon Email");
    } else {
      $sql = 'INSERT INTO users
      ( nomgroupe,
        firstname,
        lastname,
        email,
        password,
      role) VALUES (?, ?, ?, ?, ?, "user")';
        $passwordHash= $this->hashPassword($post['password']);
        var_dump($passwordHash);
        $database->executeSql($sql, [
          $post['nomgroupe'],
          $post['firstname'],
          $post['lastname'],
          $post['email'],
          $passwordHash
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

       if($this->verifyPassword($post['password'], $user['Password']) == false)
       {
           var_dump('Le mot de passe spécifié est incorrect');
       } else {
           $_SESSION['user']['id'] = $user['Id'];
           $_SESSION['user']['nomgroupe'] = $user['nomgroupe'];
           $_SESSION['user']['firstname'] = $user['firstname'];
           $_SESSION['user']['lastname'] = $user['lastname'];
           $_SESSION['user']['email'] = $user['email'];
           $_SESSION['user']['role'] = $user['role'];
       }
       //var_dump($_SESSION);
     }

       public function changeUserRole($id, $role)
   {
        $database = new Database();

        $sql = 'UPDATE users SET role=? WHERE Id=?';
        $database->executeSql($sql, [$role, $id]);
   }

   public function nomGroupe ($post) {
        $database = new Database();

        $sql= 'SELECT
             groupeid,
         FROM
             groupe'
     );

 $query->execute();

 $authors = $query->fetchAll(PDO::FETCH_ASSOC);


   }

  }
  ?>
