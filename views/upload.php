

        <?php 

            $message = "";
        
            if(isset($_FILES['file'])) {
                $photo = new Photo();
                $photo->title = $_POST['title'];
                $photo->set_file($_FILES['file']);

                if($photo->save()) {
                    $message = "Photo uploaded Successfully";
                } else {
                    $message = join("<br/>", $photo->customErrors);
                }
            }
        ?>


        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Upload
                    </h1>

                    <div class="row">
                        <div class="col-md-6">

                            <?= $message ?>
                        
                            <form action="index.php?page=upload" method="POST" enctype="multipart/form-data">

                                <div class="form-group">
                                    <input type="text" name="title" id="" class="form-control" />
                                </div>

                                <div class="form-group">
                                    <input type="file" name="file" id="" />
                                </div>

                                <input type="submit" value="Submit" name="submit" />

                            </form>
                            
                        </div>
                    
                    </div> <!-- End of Row -->

                    <div class="row">
                        <div class="col-md-12">
                            <form action="<?= $_SERVER['PHP_SELF'] ?>" class="dropzone">

                            </form>
                        </div>
                    </div>


                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->