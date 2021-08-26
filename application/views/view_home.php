        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><?php echo anchor('dashboard', 'Home');?></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3><?php echo $users_count;?></h3>
                                    <p>Users</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <?php
                                    $obj = array('class'=>'small-box-footer');
                                    echo anchor('users', 'More info <i class="fas fa-arrow-circle-right"></i>', $obj);
                                ?>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3><?php echo $consultants_count;?></h3>
                                    <p>Consultants</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-stalker"></i>
                                </div>
                                <?php
                                    $obj = array('class'=>'small-box-footer');
                                    echo anchor('consultants', 'More info <i class="fas fa-arrow-circle-right"></i>', $obj);
                                ?>
                            </div>
                        </div>
                        <!-- ./col -->
                        <?php if($this->session->userdata('userType') == 'Admin'){?> 
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h3><?php echo $patients_count;?></h3>
                                        <p>Patient Registrations</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-add"></i>
                                    </div>
                                    <?php
                                        $obj = array('class'=>'small-box-footer');
                                        echo anchor('patients', 'More info <i class="fas fa-arrow-circle-right"></i>', $obj);
                                    ?>
                                </div>
                            </div>
                        
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h3><?php echo $appointments_count;?></h3>
                                        <p>Appointments</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-stalker"></i>
                                    </div>
                                    <?php
                                        $obj = array('class'=>'small-box-footer');
                                        echo anchor('appointments', 'More info <i class="fas fa-arrow-circle-right"></i>', $obj);
                                    ?>
                                </div>
                            </div>
                        <?php } else {?>
                            <div class="col-lg-3 col-6">
                                <!-- small box -->
                                <div class="small-box bg-purple">
                                    <div class="inner">
                                        <h3><?php echo $clinics_count;?></h3>
                                        <p>Clinics</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-medkit"></i>
                                    </div>
                                    <?php
                                        $obj = array('class'=>'small-box-footer');
                                        echo anchor('clinics', 'More info <i class="fas fa-arrow-circle-right"></i>', $obj);
                                    ?>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <?php if($this->session->userdata('userType') == 'Admin'){?>
                    <div class="row">
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3><?php echo $clinics_count;?></h3>
                                    <p>Clinics</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-medkit"></i>
                                </div>
                                <?php
                                    $obj = array('class'=>'small-box-footer');
                                    echo anchor('clinics', 'More info <i class="fas fa-arrow-circle-right"></i>', $obj);
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php }?> 
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-7 connectedSortable">
                        </section>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">
                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->