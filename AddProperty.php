<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="container">

  <?php include('headernav.html'); ?>

<div>
 <h3><?php echo  "Add follwing details:"?></h3>

<form method="post" action="welcome.php">
 <input type="text" placeholder="Property Name" name="propName" required> <br><br>
 <input type="text" placeholder="Property Address" name="propAddr" required> <br><br>
 <input type="number" placeholder="Property Cost" name="propCost" required> <br><br>
 <input type="file" placeholder="Photo" name="propImg"> <br><br>
 <input type="date" id="birthday" name="dateOfPurchase"> <br><br>
 <input type="submit" name="addProp"> <br><br>
</form>

</div>
<script src="//code.jquery.com/jquery-2.1.4.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  </body>

</html>
