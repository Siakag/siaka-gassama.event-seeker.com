<?php

if( isset($_SESSION['username']))
{
  $username = $_SESSION['username'];

  $welcomeUser = <<< WELCOMEUSER
    <form action="../controllers/UsersController.php" method='POST' id='logoutForm'>
      <input type="submit" value='logout' id='logoutUser'>
    </form>

    Welcome <span id='username'>$username</span>!<br>

WELCOMEUSER;

  // var_dump($user);
  echo $welcomeUser;
  include 'searchEventForm.php';
  include 'searchResults.php';
}
else
{
  $ekko = 'user is not set.';
}