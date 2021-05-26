<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><?php echo anchor('dashboard', 'Home');?></li>
                        <li class="breadcrumb-item active">Patient Profile</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img src="<?php echo base_url(); ?>patient-images/<?php echo $patient[0]['PatientImage'];?>" 
                                    class="profile-user-img img-fluid img-circle" 
                                    alt="User Image">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $patient[0]['FirstName'].' '.$patient[0]['LastName'];?></h3>
                            <p class="text-muted text-center"><?php echo $patient[0]['PatientType'];?></p>
                            <p class="text-muted text-center"><?php echo $patient[0]['Gender'];?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Account Created</b> <a class="float-right"><?php echo $patient[0]['CreatedDate'];?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"><?php echo $patient[0]['Email'];?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>ID Number</b> <a class="float-right"><?php echo $patient[0]['IDNumber'];?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mobile No.</b> <a class="float-right"><?php echo $patient[0]['MobileNo'];?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Date of Birth</b> <a class="float-right"><?php echo $patient[0]['DOB'];?></a>
                                </li>
                            </ul>                            
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Underlying Condition</strong>
                            <p class="text-muted">
                                <?php echo $patient[0]['UnderlyingCondition'];?>
                            </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted">
                                <?php echo $patient[0]['Location'];?></p>
                            <hr>
                            <strong><i class="fas fa-address-book mr-1"></i> Address</strong>
                            <p class="text-muted">
                                <?php echo $patient[0]['Address'];?></p>
                            </p>
                            <hr>
                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>
                            <textarea class="form-control" name="" id="" cols="30" rows="5"></textarea>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                            <a href="#" class="btn btn-primary btn-block"><b>Update</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>