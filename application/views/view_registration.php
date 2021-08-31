<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MEPHI | Registration</title>
        <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/favicon.png">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="login-logo">
                <?php echo anchor('home', img(array('src'=>"assets/images/favicon.png", 'style'=>"width:50px;height:50px;", 'alt'=>"",  'class'=>"logo-container-img-nav")));?>
                <a href="home"><b>MEPHI</b></a>
            </div>
            <div class="card">
                <div class="card-body register-card-body">
                    <p class="login-box-msg">Register new User</p>
                    <form action="register" method="post" enctype="multipart/form-data">
                        <div class="d-flex justify-content-between">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" required id="firstName" name="firstName" placeholder="First name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" required id="lastName" name="lastName" placeholder="Last name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" required id="email" name="email" placeholder="Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" required id="userName" name="userName" placeholder="Username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" required id="password" name="password" placeholder="Password">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" required id="rePassword" name="rePassword" placeholder="Retype password" onkeyup="rePasswordEntered()">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input class="form-control" style="display:none;" id="errorMessage" readonly />
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" required id="idNumber" name="idNumber" placeholder="ID Number">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-id-card"></span>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" required id="mobileNo" name="mobileNo" placeholder="Mobile No.">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-phone"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between">
                            <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option selected="selected" disabled>Select Gender</option>
                                    <option value="FEMALE">FEMALE</option>
                                    <option value="MALE">MALE</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Date of Birth:</label>
                                <div class="input-group date" id="appointmentDate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="dob" data-target="#dob"/>
                                    <div class="input-group-append" data-target="#dob" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        <div class="d-flex justify-content-between">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" required id="location" name="location" placeholder="Location">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-location-arrow"></span>
                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" required id="address" name="address" placeholder="Address">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="fas fa-address-card"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <textarea class="form-control" name="underlyingCondition" id="underlyingCondition" cols="30" rows="5" placeholder="Underlying Condition"></textarea>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-pencil-alt"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" required id="userImage" name="userImage">
                                    <label class="custom-file-label" for="userImage">Select User Image</label>
                                </div>
                            </div>
                        </div>                        
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" required id="agreeTerms" name="terms" value="agree" onClick="enableRegisterButton();">
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button disabled id="register" type="submit" class="btn btn-primary btn-block">Register</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <a href="login" class="text-center">Already registered?</a>
                </div>
                <!-- /.form-box -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery -->
        <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
        <script>
            function enableRegisterButton()
            {
                var btn = document.getElementById("register");

                if(btn.disabled)
                {
                    btn.disabled = false;
                }
                else
                {
                    btn.disabled = true;
                }
            }
        </script>

        <script>
            function rePasswordEntered(){
                var passwd = document.getElementById("password");
                var repasswd = document.getElementById("rePassword");
                var errmsg = document.getElementById("errorMessage");
                //var btn = document.getElementById("register");

                errmsg.value = ''
                errmsg.style.display = 'none';
                //btn.disabled = false;

                if(passwd.value != repasswd.value)
                {
                    errmsg.style.display = 'block';
                    errmsg.style.color = 'red';
                    errmsg.value = 'Passwords do not Match!';
                    //btn.disabled = true;
                }
            }            
        </script>
    </body>
</html>