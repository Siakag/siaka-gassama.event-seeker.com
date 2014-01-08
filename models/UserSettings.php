<?php

class UserSettings {

  private $id, $userID = -1, $city = '', $zip = '';

  public __construct($userID = -1, $city = '', $zip = '')
  {
    if($user != -1)
    {
      $this->userID = $userID;
      $this->city = $city;
      $this->zip = $zip;
    }
  }

}

// File: UserSettings.php
// Location: ../models/