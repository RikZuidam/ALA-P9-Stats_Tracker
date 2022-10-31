<?php if(explode('/', filter_var(rtrim($_GET['url'], '/'), FILTER_SANITIZE_URL)) != ["home"]) { header("location: home/"); }?>
<?php
include "../app/includes/top.php";
include "../app/includes/navbar.php";
?>

<!-- Begin Main -->
<!-- <div class="container-fluid">
    <div class="row">
        <div class="col-1 blanc"></div>
        <div class="col-10 main">test<br>test<br></div>
        <div class="col-1 blanc"></div>
    </div>
</div> -->
<?php phpinfo()?>
<!-- End Main -->

<?php 
include "../app/includes/footer.php";
include "../app/includes/bottom.php";
?>