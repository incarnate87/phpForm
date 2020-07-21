<?php
include('connection.php');
//Display Records
$sel="select * from user_info join city_info on user_info.city_id=city_info.city_id order by u_name";
$ex=$con->query($sel);
//delete Record
if(isset($_REQUEST['del_id']))
{
  $d=$_REQUEST['del_id'];
  $del="delete from user_info where u_id='$d'";
  $ex=$con->query($del);
  header('location:show.php');
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>show_Info</title>
  </head>
  <body bgcolor="#FFFFBF">
    <h3><center>View Records</center></h3><hr/>
    <form method="post">
      <table align="center"border="1">
        <tr>
          <th>Userid</th>
          <th>Username</th>
          <th>Email</th>
          <th>Password</th>
          <th>Gender</th>
          <th>City</th>
          <th>Hobby</th>
          <th align="center" colspan="2">Action</th>
        </tr>
        <?php
        while($rw=$ex->fetch_object())
        {
         ?>
         <tr>
           <td><?php echo $rw->u_id; ?></td>
           <td><?php echo $rw->u_name; ?></td>
           <td><?php echo $rw->email; ?></td>
           <td><?php echo $rw->pass; ?></td>
           <td><?php echo $rw->gender; ?></td>
           <td><?php echo $rw->city_name; ?></td>
           <td><?php echo $rw->hobby; ?></td>
           <td><a href="show.php?del_id=<?php echo $rw->u_id; ?>">Delete</a></td>
           <td><a href="edit.php?edit_id=<?php echo $rw->u_id; ?>">Edit</a></td>
         </tr>
       <?php
     }
      ?>
      </table>
    </form>
    </body>
</html>
