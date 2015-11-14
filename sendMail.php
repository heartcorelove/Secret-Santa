<?php
    $field_name = 'SECRET SANTA - Hopedesign.be';
    $field_mail = 'secretsanta@hopedesign.be';
    $field_subject = 'YOUR SECRET SANTA HAS BEEN REVEALED!!!';
    $person = 'Person their name';
    
    $mail_to = 'person their mail adress';
    $subject = 'Message from: ' . $field_name . ' with subject: ' . $field_subject;
    
    $body_message = 'From: '.$field_name."\n";
    $body_message .= 'E-mail: '.$field_mail."\n";
    
    $headers = "From: $field_mail\r\n";
    $headers .= "Reply-To: $field_mail\r\n";

    $servername = ** INPUT YOUR SERVER NAME **;
    $use = ** INPUT YOUR SERVER USERNAME **;
    $pas = ** INPUT YOUR SERVER PASSWORD **;
    
    // Create connection
    $db=mysql_connect($servername, $use, $pas);
    mysql_select_db($use, $db);
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    
    $sql = "SELECT who FROM ** INPUT YOUR TABLE NAME ** WHERE name = '".$person."'";
    
    $result = mysql_query($sql) or die ("Fatale error bij query uitvoering: ".mysql_error());
    
    while($data = mysql_fetch_assoc($result)){
        $santa = $data["who"];
    }
    
    $field_message = "Hi ".$person."!\nYou have been chosen to make ".$santa." a very happy person!\n";
    $field_message .= "The average of all inputted data is 5&euro;!\nNow it's up to you to spend that amount or more!\nLet us be creative and have some fun!\n\n\n";
    $field_message .= "Kind regards\nSanta's Little Helper\n Linkle";
    $body_message .= 'Message: '.$field_message;

$mail_status = mail($mail_to, $subject, $body_message, $headers);

if ($mail_status) { ?>
<script language="javascript" type="text/javascript">
// Print a message
alert('Thank you for the message. We hope you have fun.');
// Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
window.location = 'http://hopedesign.be/secretSanta/';
</script>
<?php
}
else { ?>
<script language="javascript" type="text/javascript">
// Print a message
alert('Message failed. Please, contact the owner');
// Redirect to some page of the site. You can also specify full URL, e.g. http://template-help.com
window.location = 'http://hopedesign.be/secretSanta/';
</script>
<?php
}
?>