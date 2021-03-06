

        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Comments
                    </h1>
                    
                    <div class="col-md-12">

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Body</th>
                            
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $comments = Comment::getAll();
                                    // var_dump($comments);

                                    foreach($comments as $comment):?>

                                <tr>
                                    
                                    <td><?= $comment->id ?></td>


                                    <td><?= $comment->author ?>
                                        <div class="actionLink">
                                            <a href="deleteComment.php?id=<?= $comment->id ?>">Delete</a>
                                            <!-- <a href="editcomment.php?id=<3?= $comment->id ?>">Edit</a> -->
                                        </div>
                                    </td>
                                    <td><?= $comment->body ?></td>
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