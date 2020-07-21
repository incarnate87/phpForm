<?php
include('connection.php');
//insert record
if(isset($_REQUEST['add']))
{
  $u=$_REQUEST['uname'];
  $e=$_REQUEST['email'];
  $p=$_REQUEST['pass'];
  $g=$_REQUEST['gender'];
  $c=$_REQUEST['city'];
  $h=implode(",",$_REQUEST['chk']);
  $ins="insert into user_info (u_name,email,pass,gender,city_id,hobby) values
  ('$u','$e','$p','$g','$c','$h')";
  $ex=$con->query($ins);
  header('location:show.php');
}
?>
<!DOCTYPE html>
<head>
  <title>Form</title>
</head>
<body bgcolor="#ffe5b4">
  <h3><center>Registration Form</center></h3><hr/>
  <form method="post">
    <table align="center" border="1">
      <tr>
        <td>Username</td>
        <td><input type="text" name="uname"/></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="email" name="email"/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="pass"/></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><input type="radio" name="gender" value="male"/>Male
            <input type="radio" name="gender" value="female"/>Female
            <input type="radio" name="gender" value="other"/>Other
        </td>
      </tr>
      <tr>
        <td>City</td>
        <td>
          <?php
            $sel="select * from city_info";
            $ex=$con->query($sel);
           ?>
           <select name="city">
             <option value="select">Select</option>
             <?php
              while($fc=$ex->fetch_object())
              {
                ?>
                <option value ="<?php echo $fc->city_id;?>">
                  <?php echo $fc->city_name;?></option>
                  <?php
              }
               ?>
             </select>
      </td>
    </tr>
      <tr>
        <td>Hobby</td>
        <td><input type="checkbox" name="chk[]" value="reading"/>Reading
            <input type="checkbox" name="chk[]" value="playing"/>Playing
            <input type="checkbox" name="chk[]" value="music"/>Music
            <input type="checkbox" name="chk[]" value="other"/>Other
        </td>
      </tr>
      <td align="center" colspan="2">
        <input type="submit" name="add" value="Add"/>
      </td>
    </tr>
    </table>
  </form>
</body>
</html>
