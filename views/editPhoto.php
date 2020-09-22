<?php include("includes/header.php"); ?>

<?php

    if(empty($_GET['id'])) {
        redirect("photos.php");
    } else {
        $photo = Photo::findSingle($_GET['id']);

        if(isset($_POST['update'])) {
            if($photo) {
                $photo->title = $_POST['title'];   
                $photo->caption = $_POST['caption'];   
                $photo->altText = $_POST['altText'];   
                $photo->description = $_POST['description'];
                
                $photo->save();
            }
        }
    }

?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            
            <?php include("includes/top_nav.php") ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            
            <?php include("includes/sidebar.php"); ?>

            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Photos
                        <small>Subheading</small>
                    </h1>
                    
                    <!-- action="<3?= $_SERVER['PHP_SELF'] ?>" -->
                    <form method="POST" enctype="multipart/form-data">
                        
                        <div class="col-md-8">

                            <div class="form-group">
                                <input type="text" name="title" class="form-control" value="<?= $photo->title ?>" />

                            </div>

                            <div class="form-group">

                                <a href="" class="thumbnail">
                                    <img src="<?= $photo->picPath(); ?>" alt="<?= $photo->altText ?>" />
                                </a>

                            </div>

                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" name="caption" class="form-control" value="<?= $photo->caption ?>" />

                            </div>

                            <div class="form-group">
                                <label for="altText">Alternate text</label>
                                <input type="text" name="altText" class="form-control" value="<?= $photo->altText ?>" />

                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" id="mytextarea" cols="30" rows="15"><?= $photo->description ?></textarea>

                            </div>

                        </div>

                        <div class="col-md-4" >
                            <div  class="photo-info-box">
                                <div class="info-box-header">
                                <h4>Save <span id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                                </div>
                                <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                    <span class="glyphicon glyphicon-calendar"></span> Uploaded on: April 22, 2030 @ 5:26
                                    </p>
                                    <p class="text ">
                                        Photo Id: <span class="data photo_id_box"><?= $photo->id ?></span>
                                    </p>
                                    <p class="text">
                                        Filename: <span class="data"><?= $photo->filename ?></span>
                                    </p>
                                    <p class="text">
                                    File Type: <span class="data"><?= $photo->type ?></span>
                                    </p>
                                    <p class="text">
                                    File Size: <span class="data"><?= $photo->size ?></span>
                                    </p>
                                </div>
                                <div class="info-box-footer clearfix">
                                    <div class="info-box-delete pull-left">
                                        <a  href="delete_photo.php?id=<?php echo $photo->id; ?>" class="btn btn-danger btn-lg ">Delete</a>   
                                    </div>
                                    <div class="info-box-update pull-right ">
                                        <input type="submit" name="update" value="Update" class="btn btn-primary btn-lg ">
                                    </div>   
                                </div>
                                </div>          
                            </div>
                        </div>
                    
                    </form>


                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>