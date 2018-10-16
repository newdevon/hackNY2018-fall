<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = $facebookErr = $instagramErr = $snapchatErr = $linkedinErr = $shareErr = $numErr = "";
$name = $email = $share = $facebook = $instagram = $snapchat = $linkedin = $comment = $website = $number = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    //$emailErr = "Email is required";

  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
    
  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["sharing"])) {
    $shareErr = "Sharing types are required";
  } else {
    $share = test_input($_POST["sharing"]);
  }
}

$facebook = test_input($_POST["facebook"]);
$instagram = test_input($_POST["instagram"]);
$snapchat = test_input($_POST["snapchat"]);
$linkedin = test_input($_POST["instagram"]);
$number = test_input($_POST["number"]);


function test_input($data) {
  //$data = trim($data);
  //$data = stripslashes($data);
  //$data = htmlspecialchars($data);
  return $data;
}


?>

<h1>Ook: Sharing Contact Info with One Scan</h1>
<!-- <p><span class="error">* required field</span></p> !-->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name" value="<?php echo $name;?>">
  <span class="error">* <?php echo $nameErr;?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error"> <?php echo $emailErr;?></span>
  <br><br>
  Number: <input type="text" name="number" value="<?php echo $number;?>">
  <span class="error"><?php echo $numErr;?></span>
  <br><br>
  Website: <input type="text" name="website" value="<?php echo $website;?>">
  <span class="error"><?php echo $websiteErr;?></span>
  <br><br>
  Facebook: <input type="text" name="facebook" value="<?php echo $facebook;?>">
  <span class="error"><?php echo $facebookErr;?></span>
  <br><br>
  Instagram: <input type="text" name="instagram" value="<?php echo $instagram;?>">
  <span class="error"><?php echo $instagramErr;?></span>
  <br><br>
  Snapchat: <input type="text" name="snapchat" value="<?php echo $snapchat;?>">
  <span class="error"><?php echo $snapchatErr;?></span>
  <br><br>
  LinkedIn: <input type="text" name="linkedin" value="<?php echo $linkedin;?>">
  <span class="error"><?php echo $linkedinErr;?></span>
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
  <br><br>


<?php
echo "<h2>Your Profile:</h2>";
echo "Name: "; echo $name;
echo "<br>";
echo "Number: "; echo $number;
echo "<br>";
echo "Email: ";echo $email;
echo "<br>";
echo "Website: ";echo $website;
echo "<br>";
echo "Facebook: ";echo $facebook;
echo "<br>";
echo "Instagram: ";echo $instagram;
echo "<br>";
echo "Snapchat: ";echo $snapchat;
echo "<br>";
echo "Comment: ";echo $comment;
echo "<br>";
?>


  <h1>Select Sharing Info</h1>
  <!--
  <input type="radio" name="share" <?php if (isset($share) && $share=="facebook") echo "checked";?> value="facebook">Facebook
  <input type="radio" name="share" <?php if (isset($share) && $share=="instagram") echo "checked";?> value="instagram">Instagram
  <input type="radio" name="share" <?php if (isset($share) && $share=="snapchat") echo "checked";?> value="snapchat">Snapchat 
  <input type="radio" name="share" <?php if (isset($share) && $share=="linkedin") echo "checked";?> value="linkedin">LinkedIn 
  <span class="error">* <?php echo $genderErr;?></span>
  <input type="submit" name="submit" value="Submit">  
  <br><br>
!-->
  <p><input type="checkbox" name="sharing[]" value="Number"/>Number</p>
  <p><input type="checkbox" name="sharing[]" value="Website"/>Website</p>
  <p><input type="checkbox" name="sharing[]" value="Facebook"/>Facebook</p>
  <p><input type="checkbox" name="sharing[]" value="Instagram"/>Instagram</p>
  <p><input type="checkbox" name="sharing[]" value="Snapchat"/>Snapchat</p>
  <p><input type="checkbox" name="sharing[]" value="Linkedin"/>LinkedIn</p>
  <p><input type="submit" name="submit" value="Generate QR Code"></p> 
  <span class="error"> <?php echo $shareErr;?></span>
</form>



<?php
  echo '<h2>You have selected to share</h2>';
  echo $name;
  echo "<br>";

  $display = "display";

  foreach ($_POST['sharing'] as $sharing) {
    if($sharing == 'Website'){
      $display = $website;
    }

    if($sharing == 'Facebook'){
      $display = $facebook;
    }

    if($sharing == 'Instagram'){
      $display = $instagram;
    }

    if($sharing == 'Snapchat'){
      $display = $snapchat;
    }


    if($sharing == 'Linkedin'){
      $display = $linkedin;
    }

    if($sharing == 'Number'){
      $display = $number;
    }

    echo $sharing;
    echo " : ";
    echo $display;
    echo "<br>";

    //echo '<p>'.$sharing.' :  </p>';
  }
//}

?>

</body>
</html>