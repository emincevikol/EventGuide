
        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">

                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CBU Events Admin Panel</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <form  class="navbar-form navbar-right">

                <input type="button" onclick=<?php echo $profile ?> style=" min-width: 100px;" class="btn btn-info" value=" Main Page">

                <input type="button" onclick=<?php echo $logout ?> style=" min-width: 100px; margin-right: 20px;" class="btn btn-danger" value="<?php if($loginstatus){
                                                            echo "Sign Out";
                                                          }else {
                                                            echo "Sign in";}
                                                    ?>">


              </form>
            </div><!--/.navbar-collapse -->

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.php"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-graduation-cap"></i> Student <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="communities.php">Communities</a>
                            </li>
                            <li>
                                <a href="clubs.php">Clubs</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="events.php"><i class="fa fa-fw fa-calendar"></i> Events</a>
                    </li>
                  

                  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
