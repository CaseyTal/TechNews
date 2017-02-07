<?php

$name = $_POST['name1'];
$email = $_POST['email1'];
$message = $_POST['message1'];
$contact = $_POST['contact1'];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
if (!preg_match("/^[0-9]{10}$/", $contact)) {
echo "<span>* Please Fill Valid Contact No. *</span>";
} else {
$subject = $name;

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From:' . $email. "\r\n";
$headers .= 'Cc:' . $email. "\r\n";
$template = '<div style="padding:50px; color:white;">Hello ' . $name . ',<br/>'
. '<br/>Thank You For Contacting Us!<br/><br/>'
. 'Name:' . $name . '<br/>'
. 'Email:' . $email . '<br/>'
. 'Contact No:' . $contact . '<br/>'
. 'Message:' . $message . '<br/><br/>'
. 'This is an email confirming we have received your message.'
. '<br/>'
. 'We Will Contact You as Soon as Possible .</div>';
$sendmessage = "<div style=\"background-color:#7E7E7E; color:white;\">" . $template . "</div>";

$sendmessage = wordwrap($sendmessage, 70);

mail("casey.talbert@smail.rasmussen.edu", $subject, $sendmessage, $headers);
echo "Your Query has been received, We will contact you soon.";
}
} else {
echo "<span>* invalid email *</span>";
}
?>
