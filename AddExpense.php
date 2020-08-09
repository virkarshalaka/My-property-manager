<?php
include('function.php');

if(isset($_POST["btnAddExpense"]))
{
  if(!$_POST["propId"])
  {
     $pswdError = "";
  }
  else
  {
    echo "Read prop ID";
    $propId = validateFormData($_POST["propId"] );
  }

  session_start();
  $_SESSION['propId'] = $propId;

}

if(isset($_POST["btnSummitExp"]))
{
  if(!$_POST["expTitle"])
  {
     $fnameError = "Please enter expense title";
  }
  else
  {
    $expTtl = validateFormData($_POST["expTitle"] );
  }


  if(!$_POST["expDate"])
  {
     $pswdError = "Please enter expense date";
  }
  else
  {
    $expDate = validateFormData($_POST["expDate"] );
  }

  if(!$_POST["expAmt"])
  {
     $pswdError = "Please enter expense amount";
  }
  else
  {
    $expAmt = validateFormData($_POST["expAmt"] );
  }
  Session_start();
  $userId = $_SESSION['userId'];
  $propId = $_SESSION['propId'];

   echo "PropID:" .$propId;

   AddExpenseSql($propId, $userId, $expTtl, $expDate, $expAmt);
  // header("Location: welcome.php");
   // exit();
}

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"/>
  </head>


  <body class="text-center">

    <?php include('headernav.html'); ?>


  <form action="AddExpense.php" method="post">
    <label> Expense Title:</label><br>
    <input type="text"  name="expTitle" required> <br>
    <label>Date:</label><br>
    <input type="date" name="expDate" required><br>
    <label>Amount:</label><br>
    <input type="text"  name="expAmt" required> <br><br>
    <input type="submit" name="btnSummitExp" placeholder="Add Expense"><br><br>
  </form>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>

</html>
