<?php 
include "../app/includes/top.php";
?>

<link rel="stylesheet" href="../../public/css/form.css"/>

<div class="container p-5 main" style="margin-top: 100px">

    <div class="text-center">
        <h4 class="mt-1 mb-5 pb-1">StatTrackers</h4>
    </div>

    <p>Please create your own account</p>
    <form action="" method="post">
        <div class="form-outline mb-4">
            <input type="text" value="<?php if(isset($data['name'])) { echo $data['name']; }?>" name="name" class="form-control" placeholder="Name" />
        </div>
        <div class="form-outline mb-4">
            <input type="email" <?php if(isset($data['email'])) { echo $data['email']; }?> name="email" class="form-control" placeholder="Email Address" />
        </div>

        <div class="form-outline mb-4">
            <input type="password" name="pwd" class="form-control" placeholder="Password" />
        </div>
        <span class="text-danger error"><?php if(isset($data['error'])) { echo $data['error']; }?></span>
        <div class="text-center pt-1 mb-5 pb-1">
            <button name="btnRegister" class="btn btn-secondary btn-block fa-lg gradient-custom-2 mb-3">Create Account</button>
        </div>
    </form>

    <div class="d-flex align-items-center justify-content-center pb-4">
        <p class="mb-0 me-2">Already have an account?
        <a href="login" class="btn btn-outline-dark">Login</a></p>
    </div>
</div>
<?php 
include "../app/includes/bottom.php";
?>