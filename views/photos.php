


        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Photos
                    </h1>

                    <p class="bg-success"><?= $message ?></p>
                    
                    <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Photo</th>
                                    <th>Id</th>
                                    <th>File Name</th>
                                    <th>Title</th>
                                    <th>Size</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $photos = Photo::getAll();
                                    // var_dump($photos);

                                    foreach($photos as $photo):?>

                                <tr>

                                    <!-- IMG_PATH . /<3?= $photo->filename ?> NEMAMO DOZVOLU KA FOLDERU -->

                                    <td>
                                        <img class="adminPhoto" src="<?= $photo->picPath() ?>" alt="<?= $photo->title ?>" />
                                        
                                        <div class="picLink">
                                            <a href="index.php?page=deletePhoto&id=<?= $photo->id ?>" class="deleteLink">Delete</a>
                                            <a href="index.php?page=editPhoto&id=<?= $photo->id ?>">Edit</a>
                                            <a href="../index.php?page=photo&id=<?= $photo->id ?>">View</a>
                                        </div>
                                    </td>
                                    <td><?= $photo->id ?></td>
                                    <td><?= $photo->filename ?></td>
                                    <td><?= $photo->title ?></td>
                                    <td><?= $photo->size?></td>
                                    <td>
                                        <a href="index.php?page=commentPhoto&id=<?= $photo->id ?>">
                                            View comments (<?= count(Comment::findComments($photo->id)); ?>)
                                        </a>
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