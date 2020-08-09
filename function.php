<?php
include('connection.php');

function validateFormData($formData){
  $formData = trim( stripslashes( htmlspecialchars( $formData ) ) );
          return $formData;
}

function Login($uName, $psw){

  $conn = Connect();
  echo $uName;
  echo $pwd;
  $sql = "select * from my_users where username = '$uName' and password = '$psw'";
  $result = mysqli_query($conn, $sql);


  if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      //echo "<br>Hello " . $row[firstName].  "!<br>";
      $userId = $row[id];
    }
}
    else {
        mysqli_free_result($result);
        mysqli_close($conn);
        return "!!ERR:". mysqli_error($conn). "<br>";
    }
    //  echo "Start exploring....";

      mysqli_free_result($result);
      mysqli_close($conn);

      return $userId;
}

function AddProperty($propName, $propAddr, $userId, $propCost, $propImg, $dateOfPurchase){
  $conn = Connect();
  $sql = "INSERT INTO Properties (id, Name, Address, userId, prize, MoneySpent, MoneyEarned, Image, Date_Purchase)
    VALUES (NULL, '$propName', '$propAddr',  '$userId' , '$propCost', 0, 0, '$propImg', '$dateOfPurchase')";

  if (mysqli_query($conn, $sql)) {
    echo "New property added successfully";
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
  }
  mysqli_close($conn);
}

function GetPropertiesForUser($userId){
  $conn = Connect();
  $sql = "select * from Properties where userId = '$userId'";

  $result = mysqli_query($conn, $sql);

  // if (mysqli_num_rows($result) > 0) {
  //   // output data of each row
  //   while($row = mysqli_fetch_assoc($result)) {
  //     echo "<br>Hello " . $row[firstName].  "!<br>";
  //     $userId = $row[id];
  //   }

  $result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) {
    echo "<br> Found the property for " . $uName. "<br>";
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
  }
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_free_result($result);
  mysqli_close($conn);

  return $posts;
}

function AddIncomeSql($propId, $userId, $incmTtl, $incmDate, $incmAmt){
  $conn = Connect();
  $sql = "INSERT INTO Income (Incm_Id, userID, propID, Title, Amount, Incm_Date)
    VALUES (NULL, '$userId', '$propId', '$incmTtl' , '$incmAmt', '$incmDate')";

  if (mysqli_query($conn, $sql)) {
    echo "New income added successfully";
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
  }
  mysqli_close($conn);
}

function AddExpenseSql($propId, $userId, $expTtl, $expDate, $expAmt){
  $conn = Connect();
  $sql = "INSERT INTO Expense (Exp_Id, userID, propID, Title, Amount, Exp_Date)
    VALUES (NULL, '$userId', '$propId', '$expTtl' , '$expAmt', '$expDate')";

  if (mysqli_query($conn, $sql)) {
    echo "New expense added successfully";
  }
  else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
  }
  mysqli_close($conn);
}


?>
