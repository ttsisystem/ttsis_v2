        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="profile_edit.php?EmailId=">Welcome: <?php echo $_GET['EmailId'] ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                    
                        <li>
                            <a class="dropdown-item" href="profile_edit.php?EmailId=<?php echo $_GET['EmailId'] ?>"><i class="fas fa-user mr-2"></i>Account</a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="../logout.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
