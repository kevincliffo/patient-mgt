        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add Project</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><?php echo anchor('dashboard', 'Home');?></li>
                                <li class="breadcrumb-item active">Add Project</li>
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
                                <h3 class="card-title">Add Project Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="add-project" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="projectNumber">Project Number</label>
                                        <input type="text" class="form-control" id="projectNumber" value="<?php echo $project_no;?>" name="projectNumber" placeholder="Project Number" readonly="readonly">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="client">Client</label>
                                            <select class="form-control" id="client" name="client">
                                                <option selected="selected" disabled>Select Client</option>
                                                <?php foreach($clients as $client){?>
                                                    <option value=<?php echo $client['CompanyName'];?>><?php echo $client['CompanyName'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="projectType">Project Type</label>
                                            <select class="form-control" id="projectType" name="projectType">
                                                <option selected="selected" disabled>Select Project Type</option>
                                                <option value="Internal">Internal</option>
                                                <option value="External">External</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="projectFile">Project File</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="projectFile" name="projectFile">
                                                <label class="custom-file-label" for="projectFile">Select Project File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" cols="20" rows="3" placeholder="Project Description"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="assignedTo">Assigned To</label>
                                            <select class="form-control" id="assignedTo" name="assignedTo">
                                                <option selected="selected" disabled>Select Project Leader</option>
                                                <?php foreach($users as $user){?>
                                                    <option value=<?php echo $user['FirstName'].' '.$user['LastName'];?>><?php echo $user['FirstName'].' '.$user['LastName'];?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="projectStatus">Project Status</label>
                                            <select class="form-control" id="projectStatus" name="projectStatus">
                                                <option selected="selected" disabled>Select Project Status</option>
                                                <option value="Not Started">Not Started</option>
                                                <option value="Started">Started</option>
                                                <option value="Halted">Halted</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Finished">Finished</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label>Start Date:</label>
                                            <div class="input-group date" id="startDate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="startDate" data-target="#startDate"/>
                                                <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Finish Date:</label>
                                            <div class="input-group date" id="finishDate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="finishDate" data-target="#finishDate"/>
                                                <div class="input-group-append" data-target="#finishDate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
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