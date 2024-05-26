<!Doctype html>
<body>

<?php

$eror_name = $error_email = $error_mobile ="";
$name = $email = $mobile  ="";   

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(empty($_POST["name"])){
    $eror_name = "Name required";
    }
    else{
        $name = $_POST["name"]; 
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $error_name = "Only letters and white space allowed";
          }
    }
    if(empty($_POST["email"])){
      $error_email = "Email required";  
    }
    else{
        $email = $_POST["email"];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error_email = "Invalid email format";
          }   
    }
    if(empty($_POST["number"])){
        $error_mobile = "Number required";
    }
    else{
        $mobile = $_POST["number"];
    }
   
  }

?>


<form method = "POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
Name: <input type="text" name="name" placeholder="Enter your name">
<span class=" error" style="color:red";> * <?php echo $eror_name;?></span> <br>

E-mail: <input type="email" name="email" placeholder="Enter your valid email">
<span class="error" style="color:red";>* <?php echo $error_email; ?></span><br>

Mobile: <input type="text" name="number" placeholder="Enter your Mobile">
<span class="error" style="color:red";>* <?php echo $error_mobile;?> </span> <br>
<input type="submit">
</form>

<?php echo $name?> <br>
<?php echo $email?> <br>
<?php echo $mobile?>


</body>

</html>