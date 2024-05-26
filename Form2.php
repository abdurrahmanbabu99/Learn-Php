<!DOCTYPE HTML>  
<html>
<head>
  
</head>
<body>  

<?php
// define variables and set to empty values
$name = $email = $gender = $comment = $website = "";
$error_name = $error_email = $error_gender = $error_website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
  if (empty($_POST["name"])) {
    $error_name = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
  }
  if (empty($_POST["email"])) {
    $error_email = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
  if (empty($_POST["website"])) {
    $error_website = "Required";
  } else {
    $website = test_input($_POST["website"]);
  }
  if (empty($_POST["gender"])) {
    $error_gender = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>PHP Form Validation Example</h2>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Name: <input type="text" name="name"> 
 <span class="error" style= "color: red";>*  <?php $error_name; ?></span>
  <br><br>
  E-mail: <input type="text" name="email">
  <span class="error" style = "color:red";>* <?php $error_email; ?></span> 
  <br><br>
  Website: <input type="text" name="website">
  <span class="error" style="color:red";>* <?php $error_website; ?></span> 
  <br><br>
  Comment: <textarea name="comment" rows="5" cols="40"></textarea>
  <br><br>
  Gender:
  <input type="radio" name="gender" value="female">Female
  <input type="radio" name="gender" value="male">Male
  <input type="radio" name="gender" value="other">Other
  <span class="error" style = "color:red";>* <?php $error_gender; ?></span><br> <br>
  <input type="submit" name="submit" value="submit">  
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>
</body>
</html>