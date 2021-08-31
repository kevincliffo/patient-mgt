            <footer class="main-footer">
                <strong>Copyright &copy; <?php echo date('Y');?> <a href="dashboard">MEPHI Dashboard</a>.</strong>
                    All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>Version</b> 1.0.0
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- jQuery -->
            <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                $.widget.bridge('uibutton', $.ui.button)
            </script>
            <!-- Bootstrap 4 -->
            <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- ChartJS -->
            <script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
            <!-- Sparkline -->
            <script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
            <!-- JQVMap -->
            <script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
            <!-- jQuery Knob Chart -->
            <script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
            <!-- daterangepicker -->
            <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
            <!-- Tempusdominus Bootstrap 4 -->
            <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
            <!-- Summernote -->
            <script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
            <!-- overlayScrollbars -->
            <script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
            <!-- AdminLTE App -->
            <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
            <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

            <script>
                $(function () {
                    $("#example1").DataTable({
                        "responsive": true,
                        "autoWidth": false,
                    });
                    $('#example2').DataTable({
                        "paging": true,
                        "lengthChange": false,
                        "searching": false,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                        "responsive": true,
                    });
                });
            </script>
            <script type="text/javascript">
                function togglePatientsDropDown()
                {

                    var patientType = document.getElementById("patientType");
                    if(patientType.value == 'New')
                    {
                        var patients_div = document.getElementById('patients-div');
                        patients_div.style.display= "none";
                    }
                    else
                    {
                        var patients_div = document.getElementById('patients-div');
                        patients_div.style.display= "block";
                    }
                }
            </script>
            <script type="text/javascript">
                function userSelected()
                {
                    var patient = document.getElementById("patients");
                    var base_url = "<?php echo base_url(); ?>";
                    var firstName = document.getElementById("firstName");
                    var lastName = document.getElementById("lastName");
                    var mobileNo = document.getElementById("mobileNo");
                    var idNumber = document.getElementById("idNumber");
                    var gender = document.getElementById("gender");
                    var dob = document.getElementById("dateOfBirth");
                    var address = document.getElementById("address");
                    var location = document.getElementById("location");
                    var underlyingCondition = document.getElementById("underlyingCondition");
                    var patientIdentifier = document.getElementById("patientIdentifier");
                    
                    $.ajax({
                        url: base_url + 'patients/getPatientOverPatientId/',
                        type: 'post',
                        data: {PatientId : patient.value},
                        dataType: 'json',
                        success:function(response) {
                            patientIdentifier.value = response[0].PatientIdentifier;
                            firstName.value = response[0].FirstName;
                            lastName.value = response[0].LastName;
                            mobileNo.value = response[0].MobileNo;
                            idNumber.value = response[0].IDNumber;
                            gender.value = response[0].Gender;
                            dob.value = response[0].DOB;
                            address.value = response[0].Address;
                            location.value = response[0].Location;
                            underlyingCondition.value = response[0].underlyingCondition;
                        }
                    });
                }
            </script>
            <script>
                $(function () {
                    $('#appointmentDate').datetimepicker({
                        format: 'DD-MM-YYYY'
                    });
                    $('#dob').datetimepicker({
                        format: 'DD-MM-YYYY'
                    });
                    $('#finishDate').datetimepicker({
                        format: 'L'
                    });
                });
            </script>          
            <script type="text/javascript">
                function radioClick(key)
                {
                    console.log(key);
                    var inputFirstName = document.getElementById("firstName");
                    var inputLastName = document.getElementById("lastName");
                    var inputMobile = document.getElementById("mobileNo");
                    var inputIDNumber = document.getElementById("idNumber");
                    var gender = document.getElementById("gender");
                    var dob = document.getElementById("dateOfBirth");
                    var address = document.getElementById("address");
                    var location = document.getElementById("location");
                    var underlyingCondition = document.getElementById("underlyingCondition");
                    var patientIdentifier = document.getElementById("patientIdentifier");

                    inputFirstName.value = '';
                    inputLastName.value = '';
                    inputMobile.value = '';
                    inputIDNumber.value = '';
                    gender.value = '';
                    dob.value = '';
                    address.value = '';
                    location.value = '';
                    underlyingCondition.value = '';
                    patientIdentifier.value = '';

                    switch (key) {
                        case "radioSelf":
                            inputFirstName.value = "<?php echo $this->session->userdata('firstName');?>"
                            inputLastName.value = "<?php echo $this->session->userdata('lastName');?>"
                            inputMobile.value = "<?php echo $this->session->userdata('mobileNo');?>"
                            inputIDNumber.value = "<?php echo $this->session->userdata('idNumber');?>"
                            gender.value = "<?php echo $this->session->userdata('gender');?>"
                            dob.value = "<?php echo $this->session->userdata('dob');?>"
                            address.value = "<?php echo $this->session->userdata('address');?>"
                            location.value = "<?php echo $this->session->userdata('location');?>"
                            underlyingCondition.value = "<?php echo $this->session->userdata('UnderlyingCondition');?>"
                            break;
                    
                        case "radioOther":
                            break;
                    }
                }                
            </script>        
            <script>
                // $(function () {
                //     //Initialize Select2 Elements
                //     $('.select2').select2()

                //     //Initialize Select2 Elements
                //     $('.select2bs4').select2({
                //         theme: 'bootstrap4'
                //     })

                //     //Datemask dd/mm/yyyy
                //     $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
                //     //Datemask2 mm/dd/yyyy
                //     $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
                //     //Money Euro
                //     $('[data-mask]').inputmask()

                //     //Date range picker
                //     $('#reservationdate').datetimepicker({
                //         format: 'L'
                //     });
                //     $('#startDate').datetimepicker({
                //         format: 'L'
                //     });
                //     $('#finishDate').datetimepicker({
                //         format: 'L'
                //     });
                //     //Date range picker
                //     $('#reservation').daterangepicker()
                //     //Date range picker with time picker
                //     $('#reservationtime').daterangepicker({
                //     timePicker: true,
                //     timePickerIncrement: 30,
                //     locale: {
                //         format: 'MM/DD/YYYY hh:mm A'
                //     }
                //     })
                //     //Date range as a button
                //     $('#daterange-btn').daterangepicker(
                //     {
                //         ranges   : {
                //         'Today'       : [moment(), moment()],
                //         'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                //         'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                //         'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                //         'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                //         'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                //         },
                //         startDate: moment().subtract(29, 'days'),
                //         endDate  : moment()
                //     },
                //     function (start, end) {
                //         $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
                //     }
                //     )

                //     //Timepicker
                //     $('#timepicker').datetimepicker({
                //     format: 'LT'
                //     })
                    
                //     //Bootstrap Duallistbox
                //     $('.duallistbox').bootstrapDualListbox()

                //     //Colorpicker
                //     $('.my-colorpicker1').colorpicker()
                //     //color picker with addon
                //     $('.my-colorpicker2').colorpicker()

                //     $('.my-colorpicker2').on('colorpickerChange', function(event) {
                //     $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                //     });

                //     $("input[data-bootstrap-switch]").each(function(){
                //     $(this).bootstrapSwitch('state', $(this).prop('checked'));
                //     });
                // })
            </script>
        </div>
    </body>
</html>
