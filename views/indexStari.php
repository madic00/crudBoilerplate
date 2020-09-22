<?php include("includes/header.php"); ?>

    <?php if(!$session->isSignedIn()) {
            redirect("login.php");
    } ?>

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
                        Home admin
                        <small>Dashboard</small>
                    </h1>

                    <?php 
                        // $users = User::findAll();

                        // while($row = mysqli_fetch_array($users)) {
                        //     var_dump($row);
                        // }

                        $users = User::findAll();
                        // var_dump($users);

                        // $userOp = User::findSingle(1);
                        // $foundUser = mysqli_fetch_array($userOp);

                        // $user = User::initObj($foundUser);
                        // var_dump($user);

                        $user = User::findSingle(2);
                        // var_dump($user);


                        // $newUser = new User();
                        // $newUser->username = "Kalen";
                        // $newUser->password = "123";
                        // $newUser->first_name = "pera";
                        // $newUser->last_name = "peric";

                        // $newUser->create();


                        // $updateUser = User::findSingle(3);
                        // $updateUser->last_name = "Connaly";

                        // $updateUser->update();

                        // $delUser = User::findSingle(6);
                        // $delUser->delete();

                        // $updateUser = User::findSingle(12);
                        // $updateUser->password = "123";
                        // $updateUser->first_name = "Novi";
                        // $updateUser->last_name = "Korisnik";
                        // $updateUser->save();

                        // $newUser = new User();
                        // $newUser->username = "Novostanje";
                        // $newUser->password = "test123";
                        // $newUser->save();

                        // $photos = Photo::findAll();
                        // var_dump($photos);

                        // $newPhoto = new Photo();
                        // $newPhoto->filename = "Test Insert";
                        // $newPhoto->description = "Test desc";
                        // $newPhoto->filename = "testname.png";
                        // $newPhoto->type = "image";
                        // $newPhoto->size = 12;

                        // $newPhoto->save();

                        // $updatePhoto = Photo::findSingle(2);
                        // $updatePhoto->title="Test insert";
                        // $updatePhoto->save();



                    ?>

                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= $session->count ?></div>
                                            <div>New Views</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                    <span class="pull-left">View Details</span> 
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span> 
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-photo fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= Photo::countAll(); ?></div>
                                            <div>Photos</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="photos.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Photos in Gallery</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>


                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-user fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= User::countAll(); ?>

                                            </div>

                                            <div>Users</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="users.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Users</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-support fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge"><?= Comment::countAll(); ?></div>
                                            <div>Comments</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="comments.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Total Comments</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>


                    </div> <!--First Row-->

                    <div class="row">
                        <div id="piechart" style="width: 900px; height: 500px;"></div>
                    
                    </div>

                    
                </div>
            </div>
            <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views', <?= $session->count; ?>],
          ['Comments', <?= Comment::countAll(); ?>],
          ['Users', <?= User::countAll(); ?>],
          ['Photos', <?= Photo::countAll(); ?>]
        ]);

        var options = {
          legend: "none",
          pieSliceText: "label",
          title: 'Stats',
          backgroundColor: "transparent"

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

  <?php include("includes/footer.php"); ?>