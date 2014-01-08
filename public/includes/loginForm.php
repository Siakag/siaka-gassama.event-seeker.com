<?php
$loginForm = <<< FORM
<form action='../controllers/UsersController.php' method='POST' id='loginForm'>
  <input type="text" name='username'>
  <input type="text" name='password'>
  <input type="submit" value='Submit' name='loginUser' id='loginUser'>
</form>
FORM;
echo $loginForm;