<?php
$UserExists = false;

include('function.php');

if(isset($_POST["btnLogIn"]))
{
  if(!$_POST["uName"])
  {
     $fnameError = "Please enter user name";
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

// validate user
$userId = Login($uName, $psw);

   Session_start();
   $_SESSION['userId'] = $userId  ;
   $_SESSION['username'] = $uName;

}

if(isset($_POST["addProp"]))
{
  echo "Adding property";


  if(!$_POST["propName"])
  {
     $nameError = "Please enter property name";
  }
  else
  {
    $propName = validateFormData($_POST["propName"] );
  }


  if(!$_POST["propAddr"])
  {
     $addrError = "Please enter address";
  }
  else
  {
    $propAddr = validateFormData($_POST["propAddr"] );
  }

  if(!$_POST["propCost"])
  {
     $coseError = "Please enter cost";
  }
  else
  {
    $propCost = validateFormData($_POST["propCost"] );
  }

  if(!$_POST["propImg"])
  {
     $imgError = "Please select picture";
  }
  else
  {
    $propImg = validateFormData($_POST["propImg"] );
  }

  if(!$_POST["dateOfPurchase"])
  {
     $dateError = "Please select picture";
  }
  else
  {
    $dateOfPurchase = validateFormData($_POST["dateOfPurchase"] );
  }

/*if($nameError.empty() == false || $addrError.empty() == false )
{
  echo "No valid property name, return to the Add property form";
  return;
}*/
Session_start();
  $userId = $_SESSION['userId'];
  AddProperty($propName, $propAddr, $userId, $propCost, $propImg, $dateOfPurchase);
}

Session_start();
$userId = $_SESSION['userId'];
$uName = $_SESSION['username'];

$posts = GetPropertiesForUser($userId);
 ?>



 <!DOCTYPE html>
 <html>

 <head>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

  <link rel="stylesheet" href="style.CSS"/>
</head>
<body class="container">

  <?php include('headernav.html'); ?>
    <div>
    <button onclick="window.location.href='AddProperty.php'">Add Property</button>
    </div>

    <h1>Your Properties</h1>
    <?php foreach($posts as $post): ?>


          <div class="row property">
            <div class="col-md-6">
            <ul>
              <img src="<?php echo "/Img/".$post['Image']; ?>" alt="Photo" width="100" height="100" > <br>
               <h3><?php echo $post['Name']; ?></h3>
               <small><?php echo $post['Address']; ?></small>
            </ul>
          </div>

         <div class="col-md-6">
           <form method="post" action="AddIncome.php">
             <input type="submit" name="btnAddIncome" value="Add Income">
             <input type="label" value="<?php echo $post['Id'];?>" name="propId"> <br>
          </form>
          <form method="post" action="AddExpense.php">
             <input type="submit" name="btnAddExpense" value="Add Expense">
             <input type="label" value="<?php echo $post['Id'];?>" name="propId"> <br>
          </form>
         </div>

       </div>
<?php endforeach; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>

</html>
