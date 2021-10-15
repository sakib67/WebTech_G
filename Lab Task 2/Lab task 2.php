<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <style type="text/css">
    .red{
      color: red;
    }
  </style>
</head>
<body>

<?php
// define variables and set to empty values
$name = $email = $gender = $dd = $mm = $yyyy = $degree1 = $degree2 = $degree3 = $degree4 = $bg = "";
$nameErr = $emailErr = $genderErr =  $dateErr =$degreeErr = $bgErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
    }
  }

    if (empty($_POST["dd"])) 
    {
    $dd = "";
    } 
    else {
      $dd = test_input($_POST["dd"]);
      if ($dd > 31 || $dd < 1)
      {
      $dateErr = "Days of a month can be 1 - 31";
      }
    }

  

     if (empty($_POST["mm"])) {
    $mm = "";
  } else {
    $mm = test_input($_POST["mm"]);
    if ($mm > 12 || $mm < 1 )
    { 
      $dateErr = "months can be 1 - 12";
    }
  }

     if (empty($_POST["yyyy"])) {
    $yyyy = "";
  } else 
    {
    $yyyy = test_input($_POST["yyyy"]);
    if ($yyyy <= 1970)
      { 
        $dateErr = "only years after 1970 ";
      }
    }


    if (empty($_POST["degree1"])) 
    {
      $degree1 = "";
    }
    else
    {
      $degree1 = test_input($_POST["degree1"]); 
    } 
    

    if (empty($_POST["degree2"])) 
    {
      $degree2 = "";
    }
    else
    {
      $degree2 = test_input($_POST["degree2"]); 
    }


    if (empty($_POST["degree3"])) 
    {
      $degree3 = "";
    }
    else
    {
      $degree3 = test_input($_POST["degree3"]); 
    }


    if (empty($_POST["degree4"])) 
    {
      $degree4 = "";
    } 
    else 
    {
      $degree4 = test_input($_POST["degree4"]);         
    } 
       
    if(empty($_POST["degree1"])&& empty($_POST["degree2"])&& empty($_POST["degree3"]) || empty($_POST["degree2"])&&empty($_POST["degree3"])&&empty($_POST["degree4"]) || empty($_POST["degree1"])&&empty($_POST["degree3"])&&empty($_POST["degree4"]) || empty($_POST["degree1"])&& empty($_POST["degree2"])&& empty($_POST["degree4"]))
    {
        $degreeErr="At least 2 degrees required";
    }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }

  if (empty($_POST["bg"]) || $_POST["bg"]=="") {
    $bgErr = "Please select your blood group";
  } else {
    $bg = test_input($_POST["bg"]);
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>


  <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <table width="300">
      <tr><td>
      <b>NAME<span class="red">*</span><br></b>
      </td></tr>
      <tr> 
      <td><input type="text" name="name" value="<?php echo $name;?>">

      <span class="red"><br>
        <?php 
          if($nameErr) {
        echo $nameErr;
          }
        ?></span><br><br>
    </td></tr>

        <tr><td>
    <b>EMAIL<span class="red">*</span><br></b></td></tr>
    <tr>
    <td> <input type="text" name="email">
      <span class="red"><br>
        <?php 
          if($emailErr) {
        echo $emailErr;
          }
        ?></span><br><br>
      </td></tr>


<tr>
<td><b>DATE OF BIRTH<span class="red">*</span><br></b></td>
</tr>

<tr>
<td><input size="3" type="text" name="dd">&nbsp/&nbsp
  <input size="3" type="text" name="mm">&nbsp/&nbsp
  <input size="6" type="text" name="yyyy">
    <span class="red"><br>
        <?php 
          if($dateErr) {
        echo $dateErr;
          }
        ?></span><br>
      </td></tr>
    

    <tr>
    <br>
    <td><b>GENDER<span class="red">*</span><br></b></td></tr>
    <tr>
    <td>
    <input type="radio" name="gender" value="male">Male
    <input type="radio" name="gender" value="female">Female
    <input type="radio" name="gender" value="other">Other
    <span class="red"><br>
        <?php 
          if($genderErr) {
        echo $genderErr;
          }
        ?></span><br><br>
        </td>
    <br>
  </tr>

  <tr>
<td><b>DEGREE<span class="red">*</span></b><br></td>
</tr>
<tr><td>
<input type ="Checkbox"  name="degree1" value="SSC">SSC<input type ="Checkbox"  name="degree2" value="HSC">HSC<input type ="Checkbox" name="degree3" value="BSc">BSc<input type ="Checkbox" name="degree4" value="MSc">MSc
    <span class="red"><br>
        <?php 
          if($degreeErr) {
        echo $degreeErr;
          }
        ?></span><br><br>
        </td>
    <br>
  </tr>

  <tr>
  <td><b>BLOOD GROUP<span class="red">*</span></b><br>
 
  <select name="bg">
   <option value=""></option>
   <option value="A+">A+</option>
   <option value="B+">B+</option>
   <option value="AB+">AB+</option>
   <option value="O+">O+</option>
   <option value="A-">A-</option>
   <option value="B-">B-</option>
   <option value="AB-">AB-</option>
   <option value="O-">O-</option>
  </select><br>
      <span class="red">
        <?php 
          if($bgErr) {
        echo $bgErr;
          }
        ?></span><br><br>
        </td>
    <br>
  </tr>
  </td>
  </tr>

<tr>
    <td><input type="submit" value="submit"></td>
  </tr>
  </table>

  </form>

</body>
</html>