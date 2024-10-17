<div class="wrap">
<h1 class="wp-heading-inline">
Member</h1>

 <a href="admin.php?page=view-all-member" class="page-title-action">View All Members</a>

<hr class="wp-header-end">



<form action="" method="POST">

<table class="form-table" role="presentation">

    <tbody>
          <tr>
            <th scope="row"><label for="">Name</label></th>
            <td><input name="name" type="text" id="" value="" class="regular-text"></td>
          </tr>
<!--            <tr>
            <th scope="row"><label for="">Image</label></th>
            <td><button type="file" class="browser button button-hero" id="__wp-uploader-id-1" style="position: relative; z-index: 1;" aria-labelledby="__wp-uploader-id-1 post-upload-info">Select Files</button></td>
           </tr> -->
          <tr>
              <th scope="row"><label for="">Email</label></th>
              <td><input name="email" type="email" id="" value="" class="regular-text"></td>
          </tr>
          <tr>
              <th scope="row"><label for="">Phone</label></th>
              <td><input name="phone" type="text" id="" value="" class="regular-text"></td>
          </tr>
          <tr>
              <th scope="row"><label for="">Address</label></th>
              <td><input name="address" type="address" id="" value="" class="regular-text"></td>
          </tr>

    </tbody>
</table>
<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Save Changes"></p>

</form>
<?php
if (isset($_POST['submit'])) {
    $data['name'] = $_POST['name'];
    // $data['image'] = $_POST['image'];
    $data['email'] = $_POST['email'];
    $data['phone'] = $_POST['phone'];
    $data['address'] = $_POST['address'];

    global $wpdb;

    $inserted = $wpdb->insert(
        "{$wpdb->prefix}member_list_table",
        $data,
        [
            '%s', 
            '%s', 
            '%s', 
            '%s' 
        ]
    );

    if ($inserted) {
        echo "<div class='success-message'>Successfully Submitted</div>";
    } else {
        echo "<div class='error-message'>Error: " . esc_html($wpdb->last_error) . "</div>";
    }
}
?>

