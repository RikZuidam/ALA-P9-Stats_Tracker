<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" style="margin-bottom: 20px">
        <a class="navbar-brand" href="../home/">StatTrackers</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

<?php if(!isset($_SESSION['id'])) {?>
    <!-- Not logged in -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav mr-right">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../account/login">Login</a>
                </li>
            </ul>
        </div>
<?php } elseif(isset($_SESSION['admin'])) {?>
    <!-- Admin -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../account/request">Requests</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-right">
                <li class="nav-item">
                    <a class="nav-link text-white" href="../account/logout">Logout</a>
                </li>
            </ul>
        </div>
<?php } else { ?>
    <!-- Logged in -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto"></ul>
        <ul class="navbar-nav mr-right">
            <li class="nav-item active">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Rik
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../account/detail/<?php echo $_SESSION['id'];?>">Profile</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="../account/logout">Logout</a>
                </div>
            </li>
        </ul>
    </div>
<?php } ?>
    </nav>
    <div class="blanc" style="width: 100%; height: 100px"></div>
<div class="container-fluid">
    <div class="row">
        <div class="col-1 blanc"></div>
        <div class="col-10 main p-5">