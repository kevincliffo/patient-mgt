        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Book Appointment</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><?php echo anchor('dashboard', 'Home');?></li>
                                <li class="breadcrumb-item active">Book Appointment</li>
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
                        <div class="card card-secondary col-md-6">
                            <div class="card-header">
                                <h3 class="card-title">Book Appointment Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="add-appointment" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Appointment Date:</label>
                                        <div class="input-group date" id="appointmentDate" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" name="appointmentDate" data-target="#appointmentDate"/>
                                            <div class="input-group-append" data-target="#appointmentDate" data-toggle="datetimepicker">
                                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                            </div>
                                        </div>                                    
                                    </div>
                                    <div class="form-group d-flex justify-content-between">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="patientType" id="radioSelf">
                                            <label class="form-check-label" for="radioSelf">
                                                Self
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="patientType" id="radioOther" checked>
                                            <label class="form-check-label" for="radioOther">
                                                Other
                                            </label>
                                        </div>                                        
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="firstName">First Name</label>
                                            <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastName">Last Name</label>
                                            <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label for="symptoms">Symptoms</label>
                                        <textarea class="form-control" id="symptoms" name="symptoms" placeholder="Symptoms"></textarea>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->