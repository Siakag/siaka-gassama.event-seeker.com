<?php
session_start();

function __autoload($class_name) {
    include '../models/' . $class_name . '.php';
}

// include '../models/User.php';

// log user in
if( isset( $_POST['username']) && isset( $_POST['purpose']) && $_POST['purpose'] == 'loginForm' )
{
  // $user = new User($_POST);
  $user = new User();
  $u = $_POST['username'];

  if( ! empty($u))
  {
    if( ! $user->logUserIn($u))
    {
      echo 'no such user: ';
    }
    else
    {
      if( ! isset( $_SESSION['username']))
      {
        $_SESSION['username'] = $user->getUserName();
      }
      if( ! isset( $_SESSION['userLocation']) && $userLocation)
      {
        $_SESSION['userLocation'] = $userLocation;
      }
      include '../public/includes/loggedIn.php';
    }
  }
  else
  {
    echo 'empty';
  }
}


// log user out
if( isset( $_POST['purpose'] ) && $_POST['purpose'] == 'logoutForm' )
{
  if( isset($_SESSION['username'] ))
  {
    unset( $_SESSION['username'] );
  }
  include '../public/includes/loginForm.php';
}

// UsersController.php
// Location: controllers/