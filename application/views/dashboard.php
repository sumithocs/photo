
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Dashboard</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table class="myclass" width="800" style="border: 1px solid #a9c6c9;" align="center">
  <tr>
    <td width="14">&nbsp;</td>
    <td colspan="2" align="center">Welcome to Admin Panel Dashboard</td>
    <td width="17">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="592"><a href="<?php echo base_url(); ?>index.php/student/view_add">Add a New Student</a></td>
    <td width="157"><a href="<?php echo base_url(); ?>index.php/auth/logout">Logout</a></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2"><table width="100%" border="0" cellpadding="5" style="border: 1px solid;">
      <tr>
        <td colspan="5">Student record list</td>
        </tr>
        <tr>
      <td colspan="5" align="center">
	  <?php if($this->session->flashdata('msg')){ echo $this->session->flashdata('msg');} ?></td>
    </tr>
      <tr>
        <td width="18%">Name</td>
        <td width="14%">Address</td>
        <td width="19%">Course</td>
        <td width="13%">Image</td>
        <td width="20%">Manage</td>
      </tr>
      <?php if(isset($students) && !empty($students)){
	  foreach($students as $student){
	  ?>
      <tr>
        <td><?php echo $student['fname']." ".$student['lname'];?></td>
        <td><?php echo $student['address'];?></td>
        <td><?php echo $student['coursename'];?></td>
        <td><img src="<?php echo base_url(); ?>uploads/<?php echo $student['image'];?>" width="100" /></td>
        <td><a href="<?php echo base_url(); ?>index.php/student/view_edit/<?php echo $student['student_id']; ?>">Edit</a> | <a href="<?php echo base_url(); ?>index.php/student/delete/<?php echo $student['student_id']; ?>">Delete</a></td>
      </tr>
      <?php }}else{?>
      
      <tr>
        <td colspan="5" align="center">No records found</td>
        </tr>
      <?php }?>
      
       <tr>
        <td colspan="5" align="center"> </td>
        </tr>
      
    </table></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  
  </table>
</form>
</body>
</html>