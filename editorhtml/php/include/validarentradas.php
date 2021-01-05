<?php
function test_input($data) {
 // $data = trim($data);
 // $data = stripslashes($data);
//  $data = htmlspecialchars($data);

  ////$pos=strpos($data,"<");
 // if($pos===false) return "malo";
  return $data;

}

function esvalidoemail($email ){
$email=test_input($email);

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  
} else {
  return 1;
}
list($user, $domain) = explode('@', $email);
if(checkdnsrr($domain,"MX")) {
  return 0;
} else {
  return 1;
}
}

//echo (esvalidoemail("zpit@gañmil.com"));
?>