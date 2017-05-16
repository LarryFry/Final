<?php
//Determine the opposite of the current $access for the "admin/customer" toggle button.

/*Remember, it is refered to as '$access' because we're in takeMeAway()
which is the func. in index.php that includes pages based on $action.*/
if($access == "customer"){
  $accessOpposite = "admin";
}
if($access == "admin"){
  $accessOpposite = "customer";
}
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" type="text/css" href="./3rd_Party_Libraries/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="./3rd_Party_Libraries/slick/slick-theme.css"/>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Trocchi" rel="stylesheet">


  </head>
  <body>
    <div class="nav">
      <form class="" action="." method="post" style="text-align:right;">
        <input type="hidden" name="accessType" value="<?php echo $accessOpposite ?>">
        <input type="hidden" name="action" value="<?php echo $action?>">
        <input type="hidden" name="fromNav" value="yes">
        <input type="submit" name="" value="<?php echo"Switch to $accessOpposite view"?>" style="padding:12px 20px 12px 20px; margin-right:1vw;">
      </form>
      <img class="logo" src="./images/logo.png" alt="Logo" />
      <h2 style="display:inline; font-size:250%; position:relative; bottom:100px;">Super Doot Paintball</h2>
        <ul class="nav-bar">
          <div class="pre-red"></div><!-- Pretty Little Color Thing.-->
          <li><a href="?action=home&accessType=<?php echo $access?>"><h2>Home</h2></a></li>
          <li class="right-nav"><a href="?action=products_page&accessType=<?php echo $access?>"><h2>Products</h2></a></li>
          <li class="right-nav"><a href="?action=about_page&accessType=<?php echo$access?>"><h2>About Us</h2></a></li>
          <li class="right-nav"><a href="?action=cart&fromNav=yes&accessType=<?php echo$access?>"><h2>Cart</h2></a></li>
        </ul>
    </div>
