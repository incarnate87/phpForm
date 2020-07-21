<?php
include('connection.php');
if(isset($_REQUEST['edit_id']))
{
  $ed=$_REQUEST['edit_id'];
  $sel="select * from user_info where u_id='$ed'";
  $ex=$con->query($sel);
  $res=$ex->fetch_object();
  if(isset($_REQUEST['update']))
  {
    $u=$_REQUEST['uname'];
    $e=$_REQUEST['email'];
    $p=$_REQUEST['pass'];
    $g=$_REQUEST['gender'];
    $c=$_REQUEST['city'];
    $h=implode(",",$_REQUEST['chk']);
    $up="update user_info set u_name='$u',email='$e',pass='$p',gender='$g',city_id='$c',hobby='$h' where u_id='$ed'";
    $ex=$con->query($up);
    header('location:show.php');
  }
}
?>
<!DOCTYPE html>
<head>
  <title>Form</title>
</head>
<body bgcolor="#98FB98">
  <h3><center>Update Form</center></h3><hr/>
  <form method="post">
    <table align="center" border="1">
      <tr>
        <td>Username</td>
        <td><input type="text" name="uname" value="<?php echo $res->u_name;?>"/></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="email" name="email" value="<?php echo $res->email;?>"/></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input type="password" name="pass" value="<?php echo $res->pass;?>"/></td>
      </tr>
      <tr>
        <td>Gender</td>
        <td><input type="radio" name="gender" value="male"
         <?php
         if($res->gender=='male')
         {
           echo "checked='checked'";
         }
         ?>
          />Male
            <input type="radio" name="gender" value="female"
            <?php
            if($res->gender=='female')
            {
              echo "checked='checked'";
            }
            ?>
            />Female
            <input type="radio" name="gender" value="other"
            <?php
            if($res->gender=='other')
            {
              echo "checked='checked'";
            }
            ?>
            />Other
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
                if($fc->city_id==$res->city_id)
                {
                ?>
                <option value ="<?php echo $fc->city_id;?>" selected="selected"><?php echo $fc->city_name;?></option>
                  <?php
              }
              else {
               ?>
               <option value="<?php echo $fc->city_id; ?>"><?php echo $fc->city_name;?></option>
             <?php }
           } ?>
             </select>
      </td>
    </tr>
    <?php
    $t=$res->hobby;
    $h=explode(",",$t);
     ?>
      <tr>
        <td>Hobby</td>
        <td><input type="checkbox" name="chk[]" value="reading"
         <?php
         if(in_array('reading',$h))
         {
           echo "checked='checked'";
         }
          ?>
          />Reading
            <input type="checkbox" name="chk[]" value="playing"
            <?php
            if(in_array('playing',$h))
            {
              echo "checked='checked'";
            }
             ?>
            />Playing
            <input type="checkbox" name="chk[]" value="music"
            <?php
            if(in_array('music',$h))
            {
              echo "checked='checked'";
            }
             ?>
            />Music
            <input type="checkbox" name="chk[]" value="other"
            <?php
            if(in_array('other',$h))
            {
              echo "checked='checked'";
            }
             ?>
            />Other
        </td>
      </tr>
      <td align="center" colspan="2">
        <input type="submit" name="update" value="Update"/>
      </td>
    </tr>
    </table>
  </form>
</body>
</html>
