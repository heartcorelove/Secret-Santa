<?php
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
    
    $sql = "SELECT id,name FROM ** YOUR SECRET SANTA TABLE **";
    
    $result = mysql_query($sql) or die ("Fatale error bij query uitvoering: ".mysql_error());
    
     while($data = mysql_fetch_assoc($result)){
        $row[] = $data["name"];
    }
    
    $newRow = array();
    $sql = array();
    
    $first_chosen = $row[rand(0, count($row)-1)];
		for($i = 0; $i < count($row); $i++){
		    if($row[$i]!=$first_chosen){
		        $newRow[] = $row[$i];
		    }
		}
	$row = $newRow;
    
    $assignee = $row[rand(0, count($row)-1)];
    
    $sql[] = "UPDATE ** your secret santa table ** SET who='".$assignee."' WHERE name='".$first_chosen."'";
    
    while(count($row) > 1){
        unset($newRow);
        for($j = 0; $j < count($row); $j++){
		    if($row[$j]!=$assignee){
		        $newRow[] = $row[$j];
		    }
		}
		$row = $newRow;
		
		$new_assignee = $row[rand(0, count($row)-1)];
		
		$sql[] = "UPDATE ** YOUR SECRET SANTA TABLE ** SET who='".$new_assignee."' WHERE name='".$assignee."'";
		
		$assignee = $new_assignee;
    }
    
	$sql[] = "UPDATE ** YOUR SECRET SANTA TABLE **  SET who='".$first_chosen."' WHERE name='".$assignee."'";
	
	foreach ($sql as $value){
	    mysql_query($value) or die ("Fatale error bij query uitvoering: ".mysql_error());
	}
    
?>

<script language="javascript" type="text/javascript">
// Print a message
alert('We inputted the data and will redirect you now!');
// Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
window.location = 'http://hopedesign.be/secretSanta/';
</script>