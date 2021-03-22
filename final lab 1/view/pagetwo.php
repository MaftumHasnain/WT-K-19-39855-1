<?php
session_start(); 

include('../control/updatecheck.php');


if(empty($_SESSION["username"])) // Destroying All Sessions
{
header("Location: ../control/login.php"); // Redirecting To Home Page
}

?>

<!DOCTYPE html>
<html>
<body>
<h2>Profile Page</h2>

 <h3>Hii, <?php echo $_SESSION["username"];?></h3>

<?php
$radio1=$radio2=$radio3="";
$firstname=$email=$address=$dob=$interests = $username=$password="";
$connection = new db();
$conobj=$connection->OpenCon();

$userQuery=$connection->CheckUser($conobj,"student",$_SESSION["username"],$_SESSION["password"]);

if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $firstname=$row["firstname"];
      $email=$row["email"];
      $username=$row["username"];
      $password=$row["password"];
      $address=$row["address"];
      $dob=$row["dob"];
      $interests=$row["interests"];
      $intt = explode("+",$interests);
      
      if(  $row["gender"]=="male" )
      { $radio1="checked"; }
      else if($row["gender"]=="female")
      { $radio2="checked"; }
      else{$radio3="checked";}
      
     

  } 
}
  else {
    echo "0 results";
  }


?>
<form action='' method='post'>
  firstname : <input type='text' name='firstname' value="<?php echo $firstname; ?>" >
  <br><br>
  email : <input type='text' name='email' value="<?php echo $email; ?>" >
  <br><br>
  Username : <input type='text' name='username' value="<?php echo $username; ?>" >
  <br><br>
  password : <input type='text' name='password' value="<?php echo $password; ?>" >
  <br><br>
  Adress : <input type='text' name='address' value="<?php echo $address; ?>" >
  <br><br>
  Dob : <input type='date' name='dob' value="<?php echo $dob; ?>" >
  <br><br>



  Gender:
     <input type='radio' name='gender' value='male'<?php echo $radio1; ?>>Male
     <input type='radio' name='gender' value='female' <?php echo $radio2; ?> >Famale
     <input type='radio' name='gender' value='other'<?php  $radio3; ?> > Other <br><br>

     Interests:
      <input type="checkbox" name="interest[]" value="cyclaing" <?php echo (in_array("cyclaing", $intt)?'checked':''); ?>>
      <label for="interest[]">cycaling</label>
      <input type="checkbox" name="interest[]" value="sports" <?php echo (in_array("sports", $intt)?'checked':''); ?>>
      <label for="interest[]"> sports</label>
      <input type="checkbox" name="interest[]" value="swimming" <?php echo (in_array("swimming", $intt)?'checked':''); ?> >
      <label for="interest[]"> Swimming</label><br><br>

    <input name='update' type='submit' value='Update'>  

     <?php echo $error; ?>
<br>
<br>
<a href="../view/pageone.php">Back </a>&nbsp

<a href="../control/logout.php"> logout</a>

</body>
</html>