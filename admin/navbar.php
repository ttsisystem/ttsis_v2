<div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="dashboard.php">Administrator</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="indicator"></span><i class="fas fa-fw fa-bell"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <?php
                                            $sql = "SELECT * from admin_notif ORDER BY id DESC";
                                            $query = $dbh -> prepare($sql);
                                            $query->execute();
                                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                                            $cnt=1;
                                            if($query->rowCount() > 0)
                                            {
                                            foreach($results as $result)
                                            {
                                            ?>
                                          <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img">
                                                        <i class="fas fa-envelope fa-3x"></i>
                                                    </div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name"><?php echo htmlentities($cnt);?></span><?php echo htmlentities($result->Subject);?>
                                                        <div class="notification-date"><?php echo htmlentities($result->creationdate);?></div>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php } } ?>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="view_all_notification.php">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                    
                        <li>
                            <a class="dropdown-item" href="profile.php"><i class="fas fa-user mr-2"></i>Account</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>

