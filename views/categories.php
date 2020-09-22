

        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    
                    <h1 class="page-header">
                        Categories
                    </h1>

                    <p class="bg-success"><?= $message ?></p>

                    <a href="index.php?page=addCategory" class="btn btn-primary">Add category</a>
                    
                    <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $categories = Category::getAll();
                                    // var_dump($categories);

                                    foreach($categories as $category):?>

                                <tr>
                                    
                                    <td><?= $category->id ?></td>

                                    <td><?= $category->name ?>
                                        <div class="actionLink">
                                            <!-- <a href="deleteuser.php?id=<?= $category->id ?>">Delete</a>
                                            <a href="edituser.php?id=<?= $category->id ?>">Edit</a> -->

                                            <a href="index.php?page=deleteUser&id=<?= $category->id ?>">Delete</a>

                                            <a href="index.php?page=editUser&id=<?= $category->id ?>">Edit</a>
                                        </div>
                                    </td>

                                    <td>
                                        <img src="<?= $category->getImgPath(); ?>" alt="Image <?= $category->name?>" class="little-img" />
                                    </td>
                  
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
