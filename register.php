<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<?php include('head.php') ?>

<body>
    <div class="header">
        <?php include('nav.php'); ?>
        
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
               <h2>Register</h2>
                <form method="post" action="register.php">
                    <?php include('errors.php'); ?>
                    <div class="form-group">
                        <label>Business Name</label><br>
                        <input class="form-control" type="text" name="orgName" value="" placeholder=" Enter name of Business">
                    </div>
                    <div class="form-group">
                        <label>Business Type</label><br>
                        <input class="form-control" type="int" name="orgTypeID" value="" placeholder="Enter 1,2 or 3">
                    </div>
                    <div class="form-group">
                        <label>Email</label><br>
                        <input class="form-control" type="email" name="email" value="" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label>Password</label><br>
                        <input class="form-control" type="password" name="password_1" placeholder=" Enter Password">
                    </div>
                    <div class="form-group">
                        <label>Confirm password</label>
                        <br>
                        <input class="form-control" type="password" name="password_2" placeholder="Confirm Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn" name="reg_user">Register</button>
                    </div>
                    <p>
                        Already a member? <a href="login.php">Sign in</a>
                    </p>
                </form>
            </div>
        </div>
    </div>


</body>

</html>