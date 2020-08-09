<?php


if(isset($_POST["form_post"]))
{
  include('connection.php');

  function validateFormData($formData)
  {
    $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
            return $formData;
  }

  if(!$_POST["fName"])
  {
     $fnameError = "Please enter first name";
  }
  else
  {
    $fName = validateFormData($_POST["fName"] );
  }

print("post is set");

  if(!$_POST["lName"])
  {
     $lnameError = "Please enter last name";
  }
  else
  {
    $lName = validateFormData($_POST["lName"] );
  }

  if(!$_POST["email"])
  {
     $emailError = "Please enter email";
  }
  else
  {
    $email = validateFormData($_POST["email"] );
  }
  if(!$_POST["uName"])
  {
     $unameError = "Please enter user name";
  }
  else
  {
    $uName = validateFormData($_POST["uName"] );
  }
  if(!$_POST["psw"])
  {
     $pswdError = "Please enter password";
  }
  else
  {
    $psw = validateFormData($_POST["psw"] );
  }
//INSERT INTO `my_users` (`id`, `firstName`, `lastName`, `signup_date`, `password`, `email`, `username`) VALUES

  $sql = "INSERT INTO my_users (id, firstName, lastName, signup_date, password, email, username)
  VALUES (NULL, '$fName', '$lName',  CURRENT_TIMESTAMP ,'$psw', '$email', '$uName')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
}
else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
}


mysqli_close($conn);
print("closed connection");
}
?>

 <!DOCTYPE html>
<html>
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
   <link rel="stylesheet" href="style.css"/>
  </head>
  <body class="container">
 <?php include('headernav.html'); ?>
  <form method="post" action="Register.php">
    <small class="text-danger">* <?php echo $fnameError; ?> </small>
    <input type="text" placeholder="First Name" name="fName" required> <br><br>
    <small class="text-danger">* <?php echo $lnameError; ?> </small>
    <input type="text" placeholder="Last Name" name="lName" required> <br><br>
    <small class="text-danger">* <?php echo $emailError; ?> </small>
    <input type="email" placeholder="Email address" name="email" required> <br><br>
    <small class="text-danger">* <?php echo $unameError; ?> </small>
    <input type="text" placeholder="Username" name="uName" required> <br><br>
    <small class="text-danger">* <?php echo $pswdError; ?> </small>
    <input type="password" placeholder="Password" name="psw" required><br><br>
    <input type="submit" name="form_post" > <br>
  </form>

  <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>

        <!-- Bootstrap JS -->
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>

</html>
