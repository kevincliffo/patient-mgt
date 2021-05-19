        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add Task</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Add Task</li>
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
                                <h3 class="card-title">Add Task Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="add-task" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="taskNumber">Task Number</label>
                                        <input type="text" class="form-control" id="taskNumber" name="taskNumber" placeholder="Task Number">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="client">Client</label>
                                            <select class="form-control" id="client" name="client">
                                                <option selected="selected" disabled>Select Client</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Task">Task</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="taskType">Task Type</label>
                                            <select class="form-control" id="taskType" name="taskType">
                                                <option selected="selected" disabled>Select Task Type</option>
                                                <option value="Internal">Internal</option>
                                                <option value="External">External</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="taskFile">Task File</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="taskFile" name="taskFile">
                                                <label class="custom-file-label" for="taskFile">Select Task File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" cols="20" rows="3" placeholder="Task Description"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="assignedTo">Assigned To</label>
                                            <select class="form-control" id="assignedTo" name="assignedTo">
                                                <option selected="selected" disabled>Select Task Leader</option>
                                                <option value="Not Started">Not Started</option>
                                                <option value="Started">Started</option>
                                                <option value="Halted">Halted</option>
                                                <option value="Cancelled">Cancelled</option>
                                                <option value="Finished">Finished</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="taskType">Task Type</label>
                                            <select class="form-control" id="taskType" name="taskType">
                                                <option selected="selected" disabled>Select Task Type</option>
                                                <option value="Internal">Internal</option>
                                                <option value="External">External</option>
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