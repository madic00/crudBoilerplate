<?php

    if(!isset($_GET['id'])) {
        redirect("users.php");
    } 
    
    $user = User::getSingle($_GET['id']);
    // var_dump($user);
    
    if(isset($_POST['update'])) {
        $user->id = $_GET['id'];
        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->password = $_POST['password'];

        // var_dump($_FILES['userImg']);

        if($_FILES['userImg']['name'] == "") {
            $res = $user->save();
            // var_dump($res);

            $session->message("The user has been updated");
            redirect("index.php?page=users");

        } else {
            $user->set_file($_FILES['userImg']);
            $user->uploadAvatar();
            $user->save();
            
            $session->message("The user has been updated");
            redirect("editUser.php?id={$user->id}");
            redirect("index.php?page=users");
        }
    

    }
    
?>

        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Users
                        <small>Subheading</small>
                    </h1>

                    <div class="col-md-6 userImageBox">
                        <a href="#" data-toggle="modal" data-target="#photoLibrary"><img class="img-responsive" src="<?= $user->userImg() ?>" alt="User <?= $user->username ?>" /></a>
                    </div>
                    
                    <!-- action="<3?= $_SERVER['PHP_SELF'] ?>" -->
                    <form method="POST" enctype="multipart/form-data">
                        
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" value="<?= $user->username ?>" />

                            </div>

                            <div class="form-group">
                                <label for="userImg">Avatar</label>
                                <input type="file" name="userImg" />

                            </div>

                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" class="form-control" value="<?= $user->first_name ?>" />

                            </div>

                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" class="form-control" value="<?= $user->last_name ?>" />

                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="<?= $user->password ?>" />

                            </div>

                            <input type="submit" class="btn btn-primary pull-right" value="Update" name="update" />

                            <!-- <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="mytextarea" cols="30" rows="15"></textarea>

                            </div> -->

                            <a id="user-id" class="btn btn-danger pull-left" href="deleteuser.php?id=<?= $user->id ?>">Delete</a>
                            


                        </div>

                    
                    </form>


                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include "models/photoModal.php"; ?>

