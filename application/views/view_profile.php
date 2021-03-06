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
                        <li class="breadcrumb-item active">User Profile</li>
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
                                <img src="<?php echo base_url(); ?>user-images/<?php echo $this->session->userdata('profileImage');?>" 
                                    class="profile-user-img img-fluid img-circle" 
                                    alt="User Image">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $this->session->userdata('name');?></h3>
                            <p class="text-muted text-center"><?php echo $this->session->userdata('userType');?></p>
                            <p class="text-muted text-center"><?php echo $this->session->userdata('createdDate');?></p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>User Name</b> <a class="float-right"><?php echo $this->session->userdata('userName');?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right"><?php echo $this->session->userdata('email');?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>ID Number</b> <a class="float-right"><?php echo $this->session->userdata('idNumber');?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Mobile No.</b> <a class="float-right"><?php echo $this->session->userdata('mobileNo');?></a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Address</strong>
                            <p class="text-muted">
                                <?php echo $this->session->userdata('address');?>
                            </p>
                            <hr>
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>
                            <p class="text-muted"><?php echo $this->session->userdata('location');?></p>
                            <hr>
                            <strong><i class="fas fa-pencil-alt mr-1"></i> Underlying Conditions</strong>
                            <p class="text-muted">
                                <span class="tag tag-info"><?php echo $this->session->userdata('underlyingCondition');?></span>
                            </p>
                            <hr>
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