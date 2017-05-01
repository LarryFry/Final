<?php include("./view/nav.php"); ?>
  <div class="paintballCaroselWrapper">
    <div class="paintballCarosel">
      <img src="http://placekitten.com/g/688/144" alt="">
      <img src="http://placekitten.com/g/688/144" alt="">
      <img src="http://placekitten.com/g/688/144" alt="">
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

  
<?php include("./view/footer.php"); ?>
