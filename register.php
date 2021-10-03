<?php
include_once 'header.php';
include_once 'functions/f-users.php';

if (isset($_POST['register'])){
    $info = $_POST['info'];
    register_user($info);
    $result = 'ok_register_user';
    header("location: register.php?op={$result}");
}
?>
<body>
<form class="position_form" method="post" action="#">
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Help</h4>
        <p>number1</p>
        <hr>
        <p class="mb-0">number2</p>
    </div>
    <?php
    if (isset($_GET['op'])):
        if ($_GET['op'] == 'ok_register_user') :
    ?>
            <div class="alert alert-success" role="alert">
                Register Success !!
            </div>
    <?php endif; ?>
    <?php endif; ?>

    <?php
    if (isset($_GET['op'])):
        if ($_GET['op'] == 'registred') :
            ?>
            <div class="alert alert-danger" role="alert">
                Register Is done !!
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <h3>Register</h3>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Username</label>
        <input type="text" class="form-control" name="info[username]" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Please enter the username" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="info[password]" id="exampleInputPassword1" placeholder="Please enter the password" minlength="8" maxlength="16" required>
    </div>
    <input type="submit" class="btn btn-primary" name="register" value="Register">
</form>
</body>
</html>