<?php
if( isset($_GET['cityOrZip']) && isset($_GET['purpose']) && $_GET['purpose'] == 'searchEvent' )
{
  $zip = $_GET['cityOrZip'];
  echo 'search results here';

}