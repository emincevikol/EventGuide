
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
                <a class="navbar-brand" href="index.php">CBU Events Yönetim Paneli</a>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
              <form  class="navbar-form navbar-right">

                <input type="button" class="btn btn-info " onclick="location.href='../../userprofile.php';" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']; ?>">

                <input type="button" onclick=<?php echo $profile ?> style=" min-width: 100px;" class="btn btn-success" value="Ana Sayfa">

                <input type="button" onclick=<?php echo $logout ?> style=" min-width: 100px; margin-right: 20px;" class="btn btn-danger" value="<?php if($loginstatus){
                                                            echo "Çıkış";
                                                          }else {
                                                            echo "Giriş";}
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
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-graduation-cap"></i> Öğrenci <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="communities.php">Topluluklar</a>
                            </li>
                            <li>
                                <a href="clubs.php">Klüpler</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="events.php"><i class="fa fa-fw fa-calendar"></i> Etkinlikler</a>
                    </li>


                  </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
