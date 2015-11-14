<?php
    $_name = $_POST['txtName'];
    $_cost = $_POST['txtCost'];

    $servername = ** your db server name **;
    $use = ** your db username **;
    $pas = ** your db pass **;
    
    // Create connection
    $db=mysql_connect($servername, $use, $pas);
    mysql_select_db($use, $db);
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    
    var_dump($_name);
    var_dump($_cost);
    
    $sql = "INSERT INTO ** YOUR SECRET SANTA TABLE **(name, cost, picked) VALUES ('".$_name."','".$_cost."','false')";
    
    $result = mysql_query($sql) or die ("Fatale error bij query uitvoering: ".mysql_error());
?>

<script language="javascript" type="text/javascript">
// Print a message
alert('We inputted the data and will redirect you now!');
// Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
window.location = 'http://hopedesign.be/secretSanta/';
</script>