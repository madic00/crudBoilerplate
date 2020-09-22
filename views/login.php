<?php 

    // require_once "includes/init.php";

    if($session->isSignedIn()) {
        redirect("index.php");
    }

    if(isset($_POST['btnSubmit'])) {
        $username = $_POST['username'];
        $pass = $_POST['password'];

        // method to check database user

        $user = User::verify_user($username, $pass);

        if($user) {
            $session->login($user);
            redirect("index.php");
        } else {
            $errMsg = "Your password or username are incorrect";
        }

    } else {
        $username = "";
        $pass = "";
    }

?>


    <div class="col-md-4 col-md-offset-3">

        <h4 class="bg-danger"><?php echo $errMsg ?? ""; ?></h4>
            
        <form id="login-id" action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
            
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>" >

            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" value="<?php echo htmlentities($pass); ?>">
                
            </div>


            <div class="form-group">
            <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">

            </div>


        </form>


    </div>