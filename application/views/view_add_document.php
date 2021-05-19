        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Add Document</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Add Document</li>
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
                                <h3 class="card-title">Add Document Form</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="add-document" method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="documentName">Document Name</label>
                                        <input type="text" class="form-control" id="documentName" name="documentName" placeholder="Document Name">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label for="owner">Owner</label>
                                            <input type="text" class="form-control" id="owner" name="owner" placeholder="Owner">
                                        </div>
                                        <div class="form-group">
                                            <label for="documentType">Document Type</label>
                                            <select class="form-control" id="documentType" name="documentType">
                                                <option selected="selected" disabled>Select Document Type</option>
                                                <option value="PDF">PDF</option>
                                                <option value="Word">Word</option>
                                                <option value="Excel">Excel</option>
                                                <option value="SVG">SVG</option>
                                                <option value="PNG">PNG</option>
                                                <option value="JPEG">JPEG</option>
                                                <option value="JPG">JPG</option>
                                                <option value="Textfile">Textfile</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="documentFile">File</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="documentFile" name="documentFile">
                                                <label class="custom-file-label" for="documentFile">Select Document File</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" class="form-control" id="description" cols="20" rows="3" placeholder="Document Description"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="uploadedBy">Uploaded By</label>
                                        <input type="text" class="form-control" id="uploadedBy" readonly="readonly" name="uploadedBy" value="<?php echo $uploader;?>">
                                    </div>
                                    <!-- <div class="d-flex justify-content-between">
                                        <div class="form-group">
                                            <label>Uploaded Date:</label>
                                            <div class="input-group date" id="startDate" data-target-input="nearest">
                                                <input type="text" class="form-control datetimepicker-input" name="uploadedDate" data-target="#startDate"/>
                                                <div class="input-group-append" data-target="#startDate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> -->
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