<?php

    $user = new User();

    if(isset($_POST['btnInsert'])) {

        $user->username = $_POST['username'];
        $user->first_name = $_POST['first_name'];
        $user->last_name = $_POST['last_name'];
        $user->password = $_POST['password'];

        $user->set_file($_FILES['userImg']);

        $user->uploadAvatar();
        $user->save();

        $session->message("The user {$user->username} has been added");
        redirect("index.php?page=users");

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
                    
                    <!-- action="<3?= $_SERVER['PHP_SELF'] ?>" -->
                    <form method="POST" enctype="multipart/form-data">
                        
                        <div class="col-md-6 col-md-offset-3">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control"  />

                            </div>

                            <div class="form-group">
                                <label for="userImg">Avatar</label>
                                <input type="file" name="userImg" />

                            </div>

                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" name="first_name" class="form-control" />

                            </div>

                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" name="last_name" class="form-control" />

                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" />

                            </div>

                            <input type="submit" class="btn btn-primary pull-right" value="Insert" name="btnInsert" />

                            <!-- <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="mytextarea" cols="30" rows="15"></textarea>

                            </div> -->

                        </div>

                    
                    </form>


                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->