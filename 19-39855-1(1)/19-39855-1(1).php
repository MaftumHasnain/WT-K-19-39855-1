<?php

// define variables and set to empty values

$idErr = $enameErr = $emailErr = $addressErr = $stateErr  = $countryErr = $phoneErr = $phoneErr = "";
$id = $ename = $email = $address = $state = $country = $phone = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (empty($_POST["id"])) {
        $idErr = "Id is required";
      } else {
        $id = test_input($_POST["id"]);
      }
  if (empty($_POST["ename"])) {
    $enameErr = "Employee Name is required";
  } else {
    $ename = test_input($_POST["eename"]);
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
  }
    
  if (empty($_POST["address"])) {
    $addressErr = "Address required";
  } else {
    $address = test_input($_POST["address"]);
  }
  if (empty($_POST["state"])) {
    $stateErr = "State is required";
  } else {
    $state = test_input($_POST["state"]);
  }
  if (empty($_POST["country"])) {
    $countryErr = "Country is required";
  } else {
    $country = test_input($_POST["country"]);
  }

  if (empty($_POST["phone"])) {
    $phoneErr = "Phone number required";
  } else {
    $phone = test_input($_POST["phone"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Sign up as Equipment Rentee</title>
</head>
<body>	   
		</tr>

		<tr height="100px">
			<td colspan="3" style="font-size: 13">
				<form action="" method="POST">
                   <fieldset>
						
							<b>Employee Regidtration Form</b><br/>

						   
                        <form action="updateuserprofile.php" method='post'  >
    

        <tr>
     <td><input type="submit" name="Submit" value="Submit"></td<br><br>
      <a href="homepage.php" >view all</a>
     
 </tr>

       
          
           


		

		<tr align="center">
			
		</tr>







        <p><span class="error">* required field</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
Employee ID: <input type="number" name="$idErr">
  <span class="error"><?php echo $idErr;?></span>
  
  Employee name: <input type="text" name="ename">
  <span class="error">* <?php echo $enameErr;?></span>
  <br><br>
  E-mail: <input type="email" name="email">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
  Address: <input type="text" name="address">
  <span class="error"><?php echo $addressErr;?></span>
  <br><br>
  State: <input type="number" name="state">
  <span class="error"><?php echo $stateErr;?></span>
  <br><br>
  Country: <input type="text" name="country">
  <span class="error"><?php echo $countryErr;?></span>
  <br><br>
  phone: <input type="number" name="phone">
  <span class="error"><?php echo $phoneErr;?></span>
  <br><br>
  
 
 




	</table>
</body>
</html>