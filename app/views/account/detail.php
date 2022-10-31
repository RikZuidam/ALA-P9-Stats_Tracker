<?php 
session_start();

?>
<?php 
include "../app/includes/top.php";
include "../app/includes/navbar.php";
?>

<br>
<!-- Begin Main -->
<h1 class="text-center">Profile</h1>
<br>
<form action="" method="post">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-4">
            <label class="text-center w-100" for="">Name: <br><input class="w-100 p-1" type="text" name="name" value="<?php echo $data["item"][0]["name"]?>"></label>
        </div>
        <div class="col-2"></div>
        <div class="col-4 w-100 p-1">
            <label class="text-center w-100" for="">Email: <br><input class="w-100 p-1" type="text" name="email" value="<?php echo $data["item"][0]["email"]?>"></label>
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <input class="w-100 p-1" type="submit" name="btnUpdate" value="Update">
        </div>
        <div class="col-1"></div>
    </div>
    <div class="row"><a class="text-center m-auto" href="../../home/dashboard">Cancel</a></div>
    
</form>
<!-- End Main -->
<?php 
include "../app/includes/footer.php";
include "../app/includes/bottom.php";
?>