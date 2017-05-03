<?php include("./view/nav.php") ?>

  <h1>About Us (Customer View)</h1>
  <p>
    We are devoted to delivering only the finest paintball gear on the market to our valued cusomters.
    When you shop at Super Doot Paintball, expect the finest service and best gear of any online paintball retailer.
  </p>

  <h1>Our Beloved Staff</h1>
  <div class="employeeList">
    <?php foreach($employees as $employee) : ?>
      <div class="employee">
        <img src='images/<?php echo $employee['ImageCode'] ?>'/>
        <h2><?php echo $employee['FirstName'] ." ". $employee['LastName']; ?></h2>
        <h3><?php echo $employee['Title'] ?></h3>
      </div>
    <?php endforeach ?>
  </div>


<?php include("./view/footer.php"); ?>
