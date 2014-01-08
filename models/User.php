<?php

require_once '../data/db.php';

class User {

  private $params = [], $id = 0, $password = '', $username = '', $firstname = '', $lastname = '', $settings = [];

  public function __construct($params = [])
  {
    $this->username = isset($params['username']) ? $params['username'] : '';
    $this->password = isset($params['password']) ? $params['password'] : '';
    $this->firstname = isset($params['firstname']) ? $params['firstname'] : '';
    $this->lastname = isset($params['lastname']) ? $params['lastname'] : '';
    $this->city = isset($params['city']) ? $params['city'] : '';
    $this->zip = isset($params['zip']) ? $params['zip'] : '';
  }


  //
  public function createUser($username = '')
  {
    $u = $username;
    if( $this->userExists($u) )
    {
      die( 'User already exists: ' . mysql_error() );
    }
    else
    {
      $registeredDate = date("Y-m-d H:i:s");
      $saveUser = mysql_query("INSERT INTO users (username, password, registered) VALUES ('$this->username', '$this->password', '$registeredDate')" );
      if($saveUser)
      {
        $user = strtolower($this->username);
        $pass = sha1( md5($this->password) );
        mysql_query("INSERT INTO users (username, password, registered) VALUES ('$user', '$pass', '$registeredDate')" );
        return $this;
      }
      die( 'User could not be saved. Please try again: ' . mysql_error() );
    }
  }


  // log user in - return true if the user is found in DB
  public function logUserIn($username = '')
  {
    $exists = false;
    $query = mysql_query("SELECT username FROM users WHERE username='$username'") or die ('Could not connect to db. ' . mysql_error() );
    if($query)
    {
      if( mysql_num_rows($query) > 0 )
      {
        while( $row = mysql_fetch_array($query) )
        {
          $this->username = $row['username'];
        }
        $exists = true;
      }
    }
    return $exists;
  }


  // get username
  public function getUserName()
  {
    return $this->username;
  }


  //
  public function readUser($username)
  {
    if( userExists($username) )
    {
      $getUser = mysql_query("SELECT firstname, lastname, username FROM users WHERE username = $username");
      if( ! $getUser)
      {
        die('Could not retrieve data' . mysql_error() );
      }
      while( $row = mysql_fetch_array($getUser) )
      {
        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->username = $row['username'];
      }
      return $this;
    }
    die('User does not exist');
  }


  //
  public function updateUser($username)
  {
    if( userExists($username) )
    {
      $findUser = mysql_query("SELECT * FROM 'users' WHERE username = " . strtolower($username) );
      if( ! $findUser)
      {
        die( 'User could not be found' . mysql_error() );
      }
      while( $row = mysql_fetch_array($findUser) )
      {
        $this->password = $row['password'];
      }
      $updateQuery = mysql_query( "UPDATE 'users' SET password = $this->password WHERE username = $username" );
      if(! $updateQuery)
      {
        die('User could not be updated');
      }
      $updateQuery;
      return $this;
    }
    die('User does not exist');
  }


  //
  public function deleteUser($username)
  {
    $u = $username;

    if( userExists($u) )
    {

      $deleteQuery = mysql_query("DELETE FROM 'users' WHERE 'username' = '$u'");

      if( ! $deleteQuery)
      {
        die('User could not be deleted');
      }

      while( $row = mysql_fetch_array($deleteQuery) )
      {
        $this->id = $row['id'];
      }

      $deleteQuery;
      return $this->id;
    }
    die('User does not exist');
  }


  //
  private function userExists($username)
  {
    $findUser = mysql_query("SELECT * FROM 'users' WHERE 'username' = " . strtolower($username) );
    if($findUser)
    {
      if( mysql_num_rows($findUser) == 1 )
      {
        return true;
      }
    }
    return false;
  }
}

// User.php
// Location: models/