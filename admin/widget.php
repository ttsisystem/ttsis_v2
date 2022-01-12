                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card bg-light">
                                    <div class="card-body">

                                        <?php $sql = "SELECT id from tblusers";
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=$query->rowCount();
                                        ?>  

                                        <h5 class="text-muted">Total Users</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo htmlentities($cnt);?></h1>
                                        </div>
                                    </div>
                                    <div class="card-footer" align="center" style="background-color: #2AF598;">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card bg-light">
                                    <div class="card-body">

                                        

                                        <h5 class="text-muted">Page Visits</h5>
                                        <div class="metric-value d-inline-block">
                                        <h1 class="mb-1">
                                                
                                        <?php 
                                        $handle = fopen("../counter.txt", "r");
                                        if(!$handle){ echo "could not open the file" ; 
                                        } 
                                        else {
                                        $counter = ( int ) fread ($handle,20) ;
                                        fclose ($handle) ;
                                        $counter++ ;
                                        echo $counter ;
                                        $handle = fopen("../counter.txt", "w" ) ;
                                        fwrite($handle,$counter) ;
                                        fclose ($handle) ;
                                        }
                                        ?>

                                        </h1>
                                        </div>
                                    </div>
                                    <div class="card-footer" align="center" style="background-color: #2AF598;">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card bg-light">
                                    <div class="card-body">

                                        <?php 
                                        $sql1 = "SELECT BookingId from tblbooking";
                                        $query1 = $dbh -> prepare($sql1);
                                        $query1->execute();
                                        $results1=$query1->fetchAll(PDO::FETCH_OBJ);
                                        $cnt1=$query1->rowCount();
                                        ?>

                                        <h5 class="text-muted">Bookings</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1"><?php echo htmlentities($cnt1);?></h1>
                                        </div>
                                    </div>
                                    <div class="card-footer" align="center" style="background-color: #2AF598;">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card bg-light">
                                    <div class="card-body">
                                        <h5 class="text-muted">Total Ratings</h5>
                                        <div class="metric-value d-inline-block">
                                            <div class="metric-value d-inline-block">
                                                <h1 class="mb-1" id="avgrating"></h1>
                                            </div>
                                        </div>  
                                    </div>
                                    <div class="card-footer" align="center" style="background-color: #2AF598;">
                                        <a href=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>