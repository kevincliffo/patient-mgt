        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Documents</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                                <li class="breadcrumb-item active">Documents</li>
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
                    <div class="row icons-display">
                        <?php foreach($this->session->userdata('files') as $file){;?>
                            <div class="col-md-2">
                                <div class="">
                                    <div class="">
                                        <i style="font-size:50px;<?php echo $file->getIconColour();?>" class="<?php echo $file->getIconClass();?>"></i>
                                        <?php if($file->getIsFile()){?>
                                            <div>
                                                <a href="<?php echo $file->getUrl();?>" target="_new"><span class="sm" style="font-family:segoe ui;color:black;"><?php echo $file->getName();?></span></a>
                                            </div>
                                        <?php } else {?>
                                            <div>
                                                <?php
                                                    $key = uniqid("");
                                                    $this->session->set_userdata($key, $file->getUrl());                                                    
                                                    echo anchor('folder-structure-list-json/'.$key, $file->getName());
                                                ?>
                                                <!-- <a href="javascript:void(0)" onclick="location.href='folder-structure'"><span class="sm" style="font-family:segoe ui;color:black;"><?php echo $file->getName();?></span></a> -->
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <!-- /.row -->
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->