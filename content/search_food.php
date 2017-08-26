 <?php 
  require ('../mysqli_connect.php');

  function parseToXML($htmlStr)
  {
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
  }


  // Opens a connection to a MySQL server
  $connection=mysql_connect ('localhost', 'root', 'Pandaria05');
  if (!$connection) {
    die('Not connected : ' . mysql_error());
  }

  // Set the active MySQL database
  $db_selected = mysql_select_db('sitename', $connection);
  if (!$db_selected) {
    die ('Can\'t use db : ' . mysql_error());
  }

  // Select all the rows in the markers table
  $query = "SELECT * FROM food";
  $result = mysql_query($query);
  if (!$result) {
    die('Invalid query: ' . mysql_error());
  }

  header("Content-type: text/xml");

  // Start XML file, echo parent node
  echo '<markers>';

  // Iterate through the rows, printing XML nodes for each
  while ($row = @mysql_fetch_assoc($result)){
    $state = $row['state'];
    $state = substr($state, strpos($state, "*") + 1);
    $addy = parseToXML($row['street'])." ".parseToXML($row['city'])." ".parseToXML($state)." ".parseToXML($row['zip']);
    
    // Add to XML document node
    echo '<marker ';
    echo 'name="' . parseToXML($row['name']) . '" ';
    echo 'address="'.$addy.'" ';
    echo 'bio="' . parseToXML($row['bio']) . '" ';
    echo 'yelp="' . parseToXML($row['yelp_link']) . '" ';
    echo 'foodpic="' . parseToXML($row['food_id']) . '" ';
    echo '/>';
  }

  // End XML file
  echo '</markers>'
?>
