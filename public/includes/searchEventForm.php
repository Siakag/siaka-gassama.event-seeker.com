<form action='../controllers/EventSearchController.php' method='GET' id='searchEvent'>
  <p>Search events in your area!</p>
  <label for='searchTerms' >Keywords</label>
  <input type='text' name='searchTerms'  style='margin-right: 5%;' id='searchTerms'>
  <label for='cityOrZip'>City / Zip Code</label>
  <input type='text' name='cityOrZip' id='cityOrZip' >
  <input type='submit' value='search' id='searchEvents'>
</form>