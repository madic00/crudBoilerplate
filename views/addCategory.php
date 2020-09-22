<?php

    $cat = new Category();

    if(isset($_POST['btnInsert'])) {

        $cat->name = $_POST['catName'];

        $cat->setFile($_FILES['catImg']);

        if($cat->save()) {
            $message = "Category inserted Successfully";
        }

        // $session->message("The category {$cat->name} has been added");
        // redirect("index.php?page=categories");

        var_dump($cat);

    }

?>


        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Category
                        <small>Subheading</small>
                    </h1>
                    
                    <!-- action="<3?= $_SERVER['PHP_SELF'] ?>" -->
                    <form method="POST" enctype="multipart/form-data">
                        
                        <div class="col-md-6 col-md-offset-3">

                            <div class="form-group">
                                <label for="username">Category name</label>
                                <input type="text" name="catName" class="form-control"  />

                            </div>

                            <div class="form-group">
                                <label for="catImg">Image</label>
                                <input type="file" name="catImg" />

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