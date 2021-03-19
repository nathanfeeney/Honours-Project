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
                        <h2>Login</h2>
                        <form method="post" action="login.php">
                            <?php include('errors.php'); ?>
                                <div class="form-group">
                                    <label>Name of Business</label>
                                    <input class="form-control" type="text" name="orgName" placeholder="Enter name of business"> </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control"  type="password" name="password" placeholder="Enter password"> </div>
                                <div class="form-group">
                                    <button  type="submit" class="btn" name="login_user">Login</button>
                                </div>
                                <p> Not yet a member? <a href="register.php">Sign up</a> </p>
                        </form>
                    </div>
                </div>
            </div>
        </body>

    </html>