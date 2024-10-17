

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member List</title>
</head>
<body>


<div class="wrap" style="padding:20px 0px">
    <h1 class="wp-heading-inline">
    View ALL Member</h1>
    <a href="admin.php?page=add-new-member" class="page-title-action">Add New Member</a>
     <hr class="wp-header-end">
</div>



<table style ="width:80%; text-align:center;">
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Address</th>
  </tr>





<?php

    global $wpdb;
    $member_list = $wpdb->get_results(" SELECT * FROM {$wpdb->prefix}member_list_table ORDER BY id DESC");

    foreach($member_list as $key=>$value){
      ?>
              <tr>
        <td><?php echo $key+1; ?></td>
        <td><?php echo $value->name; ?></td>
        <td><?php echo $value->email; ?></td>
        <td><?php echo $value->phone; ?></td>
        <td><?php echo $value->address; ?></td>
      </tr>
      <?php
    }



?>
</table>

<style>
    table, th, td {
  border: 1px solid;
  border-collapse: collapse;
  padding: 10px;
}
</style>
</body>
</html>


