<?php include("./view/nav.php"); ?>

  <div class="paintballCaroselWrapper">
    <div class="paintballCarosel">
      <img id="caroselPic" src="images/paintFace.jpg" alt="">
      <img id="caroselPic" src="images/dive.jpg" alt="">
      <img id="caroselPic" src="images/victory.jpg" alt="">
    </div>
  </div>
  <!-- Jquery -->
  <script src="./3rd_Party_Libraries/jquery-3.1.1.js"></script>
  <!-- Slick Carosel JS-->
  <script type="text/javascript" src="./3rd_Party_Libraries/slick/slick.min.js"></script>
  <!-- Here is the Slick Logic-->
  <script type="text/javascript">
    $(document).ready(function(){
      $('.paintballCarosel').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true,
        arrows: true
      });
    });
  </script>
  <div class="homeDiscription">
    <h1>We have the Gear you need!</h1>
    <h3>John Paintson</h3>
    <h4>Local Customer/National Champ</h4>
    <div id="customerReview">
      <img src="images/player.jpg" alt="" />
      <p>I'm John Paintson and I've been playing paintball since I was 3 years old.</p>
      <p>Super Doot Paintball has been an amazing supplier of the gear I need to win.</p>
      <p>Super Doot has earned my trust and they deserve yours aswell.</p>

    </div>
  </div>


<?php include("./view/footer.php"); ?>
