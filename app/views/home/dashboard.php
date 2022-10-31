<?php 
session_start();
if(!isset($_SESSION["id"])) { header("location: ../home/"); }
?>
<?php 
include "../app/includes/top.php";
include "../app/includes/navbar.php";
?>
<?php if(isset($_SESSION["admin"])){ ?>
<!-- Begin Main -->
<form action="" method="post">
    <div class="input-group mb-3">
        <input id="input" class="form-control mr-sm-2" name="input" type="text" placeholder="Search" aria-label="Search" value="<?php if(isset($data['input'])){ if($data['input']) { echo $data['input']; }}?>">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" name="searchEnter">Zoek</button>
        </div>
    </div>
</form>
<!--<h1>Item list</h1>-->
<!--<a href="../account/create">Add an item</a>-->
<div style="height: 500px; overflow: auto">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if($data["items"]) {?>
            <?php foreach($data["items"] as $items) { ?>
            <tr>
                <td><?php echo $items["id"];?></td>
                <td><?php echo $items["name"];?></td>
                <td><?php echo $items["email"];?></td>
                <form action="" method="post">
                    <td class="float-right">
                        <button value="<?php echo $items["id"]?>" name="editItem" style="background: none; border: none; cursor: pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                                <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                            </svg>
                        </button>
                        <button value="<?php echo $items["id"];?>" name="deleteItem" style="background: none; border: none; cursor: pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                            </svg>
                        </button>
                    </td>
                </form>
            </tr>
            <?php }} else { ?>
            <tr>
                <td class="text-danger">No data found!</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<!-- End Main -->
<?php } else {?>
<?php if(isset($data['error'])) {?>
<div class="alert alert-danger w-25 m-auto text-center" role="alert">
    <?php echo $data['error'];?>
</div>
<?php } ?>
<?php if(isset($data['success'])) {?>
<div class="alert alert-success w-25 m-auto text-center" role="success">
    <?php echo $data['success'];?>
</div>
<?php } ?>
<!-- Begin Main -->
<?php // var_dump($data);?>
<br>
<h1 class="text-center">Play Game</h1>
<br>
<div style="height: 500px; overflow: auto">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th class="text-right">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if($data["teams"]) {?>
            <?php for($i = 0; $i < count($data['teams']); $i++) { ?>
            <tr>
                <td><?php echo $data['teams'][$i]['name'];?></td>
                <form action="" method="post">
                    <td class="float-right">
                        <button value="<?php echo $data['teams'][$i]['id']?>" name="selectTeam" style="background: none; border: none; cursor: pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-lg" viewBox="0 0 16 16">
                                <path d="m9.708 6.075-3.024.379-.108.502.595.108c.387.093.464.232.38.619l-.975 4.577c-.255 1.183.14 1.74 1.067 1.74.72 0 1.554-.332 1.933-.789l.116-.549c-.263.232-.65.325-.905.325-.363 0-.494-.255-.402-.704l1.323-6.208Zm.091-2.755a1.32 1.32 0 1 1-2.64 0 1.32 1.32 0 0 1 2.64 0Z"/>
                            </svg>
                        </button>
                        <!--<button value="<?php // echo $data['teams'][$i]['id'];?>" name="joinTeam" style="background: none; border: none; cursor: pointer">Join</button>-->
                    </td>
                </form>
            </tr>
            <?php }} else { ?>
            <tr>
                <td class="text-danger">No data found!</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
<!-- End Main -->
<?php }?>


<?php 
include "../app/includes/footer.php";
include "../app/includes/bottom.php";
?>
