

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member List</title>
</head>
<body>





<div class="main">


    <?php

    global $wpdb;
    $member_list = $wpdb->get_results(" SELECT * FROM {$wpdb->prefix}member_list_table ORDER BY id DESC");

    foreach($member_list as $key => $value) {
      ?>
        <div class="card">
          <p class="card__title"><?php echo $value->name; ?></p>
            <div class="card__content">
              <p class="card__title"><?php echo $value->name; ?></p>
              <p class="card__description"><?php echo $value->email; ?></p>
              <p class="card__description"><?php echo $value->phone; ?></p>
              <p class="card__description"><?php echo $value->address; ?></p>
            </div>
       </div>
      <?php
    }



?>

</div>

</body>
</html>





<style type="text/css">

.main{
  display: flex;
  margin: 10px;
  flex-wrap: wrap;
}
.card {
  position: relative;
  width: 300px;
  height: 200px;
  background-color: #f2f2f2;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  overflow: hidden;
  perspective: 1000px;
  box-shadow: 0 0 0 5px #ffffff80;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  margin: 10px;
  background-color: #f5f5f5;

}

.card svg {
  width: 48px;
  fill: #333;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
}

.card__content {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  padding: 20px;
  box-sizing: border-box;
  background-color: #f2f2f2;
  transform: rotateX(-90deg);
  transform-origin: bottom;
  transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}

.card:hover .card__content {
  transform: rotateX(0deg);
}

.card__title {
  margin: 0;
  font-size: 24px;
  color: #333;
  font-weight: 700;
}

.card:hover svg {
  scale: 0;
}

.card__description {
  margin: 10px 0 0;
  font-size: 14px;
  color: #777;
  line-height: 1.4;
}

</style>