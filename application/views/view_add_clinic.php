        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add Clinic</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Add Clinic</li>
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
                                <h3 class="card-title">Add Clinic Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="add-clinic" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Name:</label>
                                        <input type="text" class="form-control" name="name" id="name" required placeholder="Clinic Name"/>                                   
                                    </div>
                                    <div class="form-group">
                                        <label for="manager">Manager:</label>
                                        <input type="text" class="form-control" name="manager" id="manager" required placeholder="Manager Name"/>                                   
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneNumber">Phone Number:</label>
                                        <input type="number" class="form-control" name="phoneNumber" id="phoneNumber" required placeholder="Phone Number"/>                                   
                                    </div>
                                    <div class="form-group">
                                        <label for="location">Location</label>
                                        <textarea class="form-control" id="location" name="location" placeholder="Location"></textarea>
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