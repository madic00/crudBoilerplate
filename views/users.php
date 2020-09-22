

        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <h1 class="page-header">
                        Users
                    </h1>

                    <p class="bg-success"><?= $message ?></p>

                    <a href="index.php?page=addUser" class="btn btn-primary">Add user</a>
                    
                    <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Photo</th>
                                    <th>Username</th>
                                    <th>First name</th>
                                    <th>Last name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $users = User::getAll();
                                    // var_dump($users);

                                    foreach($users as $user):?>

                                <tr>
                                    
                                    <td><?= $user->id ?></td>

                                    <td>
                                        <img class="userPhoto" src="<?= $user->userImg() ?>" alt="User <?= $user->username ?>" />
                                        
                                    </td>
                                    <td><?= $user->username ?>
                                        <div class="actionLink">
                                            <!-- <a href="deleteuser.php?id=<?= $user->id ?>">Delete</a>
                                            <a href="edituser.php?id=<?= $user->id ?>">Edit</a> -->

                                            <a href="index.php?page=deleteUser&id=<?= $user->id ?>">Delete</a>

                                            <a href="index.php?page=editUser&id=<?= $user->id ?>">Edit</a>
                                        </div>
                                    </td>
                                    <td><?= $user->first_name ?></td>
                                    <td><?= $user->last_name ?></td>
                                </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    
                    </div>

                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
