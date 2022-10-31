<?php 
session_start();

?>
<?php 
include "../app/includes/top.php";
include "../app/includes/navbar.php";
?>

<br>
<!-- Begin Main -->
<br>
<div class="row">
    <div class="col-1"></div>
    <div class="col-7 border p-3">
        <b>Info :</b>
        <hr>
        Name : <?php echo $data[0][0]['name'];?><br>
        Name : <?php echo $data[0][0]['name'];?>
    </div>
    <div class="col-1"></div>
    <div class="col-2 border p-3">
        <b>Players :</b>
        <hr>
        <div style="height: 200px; overflow: auto">
            <?php for($i = 0; $i < count($data[1]); $i++) {?>
                <?php echo $data[1][$i];?><br>
            <?php }?>
        </div>
    </div>
    <div class="col-1"></div>
</div>
<br>
<div class="row">
    <div class="col-1"></div>
    <div class="col-6 border p-3">
        <b>Games :</b>
        <hr>
        <div style="height: 300px; overflow: auto">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Team</th>
                        <th class="float-right">Goals</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for($i = 0; $i < count($data[2]); $i++) {?>
                    <?php if($data[2][$i]['teamId'] != 3) { ?>
                        <tr>
                            <td><?php echo $data[2][$i]['gameId'];?></td>
                            <td><?php echo $data[2][$i]['teamName'];?></td>
                            <td class="float-right">3</td>
                        </tr>
                    <?php }?>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-1"></div>
    <div class="col-3 border">t</div>
    <div class="col-1"></div>
</div>
<?php
    // var_dump($data);

?>
<!-- End Main -->
<?php 
include "../app/includes/footer.php";
include "../app/includes/bottom.php";
?>