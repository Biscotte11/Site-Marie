<?php

class LogoutController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      session_destroy();
      $http->redirectTo('/user/login');

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP POST
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $formFields contient l'équivalent de $_POST en PHP natif.
    	 */
    }
}
