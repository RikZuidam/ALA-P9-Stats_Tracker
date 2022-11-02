<?php
session_start();
include "../app/includes/top.php";
include "../app/includes/navbar.php";
?>

<!-- Begin Main -->
<div class="container-fluid">
    <div class="row">
        <div class="col-1 blanc"></div>
        <div class="col-10 main">
            <div style="height: 500px; overflow: auto">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Player</th>
                            <th>Team</th>
                            <th class="text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if($data["requests"]) {?>
                        <?php for($i = 0; $i < count($data['requests']); $i++){?>
                        <tr>
                            <td><?php echo $data['requests'][$i]['id'];?></td>
                            <td><?php echo $data['requests'][$i]['uname'];?></td>
                            <td><?php echo $data['requests'][$i]['tname'];?></td>
                            <form action="" method="post">
                                <td class="float-right">
                                    <button value="<?php echo $data['requests'][$i]['id'];?>" name="acceptRequest" style="background: none; border: none; cursor: pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                        </svg>
                                    </button>
                                    <button value="<?php echo $data['requests'][$i]['id'];?>" name="declineRequest" style="background: none; border: none; cursor: pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
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
        </div>
        <div class="col-1 blanc"></div>
    </div>
</div>
<!-- End Main -->

<?php 
include "../app/includes/footer.php";
include "../app/includes/bottom.php";
?>