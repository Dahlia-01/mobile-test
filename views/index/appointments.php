
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                    <div class="body">
                        <div class="alert alert-warning alert-dismissible" role="alert" id="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            Please ensure you have created a hospital card before booking any appointment. Create a hospital card <a href="<?php echo URL?>create_card">HERE</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="body">
                            <ul class="nav nav-tabs tab-col-red" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#showdiv1" data-toggle="tab"> 
                                        <font color="#F44336"><i class="material-icons">location_city</i>HOSPITAL
                                        </font></a>
                                    </li>
                                    <li role="presentation">
                                        <a href="#showdiv2" data-toggle="tab">
                                            <font color="#9C27B0"><i class="material-icons">person</i>DOCTOR
                                            </font></a>
                                        </li>
                                        <li role="presentation">
                                            <a href="#showdiv3" data-toggle="tab">
                                                <font color="#009688"><i class="material-icons">work</i>SPECIALTY
                                                </font></a>
                                            </li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="showdiv1">
                                                <form action="patient_appointment/appointment_by_location" method="post">
                                                 <div class="row clearfix">
                                                    <div class="col-sm-12">
                                                        <div class="input-group">
                                                            <label>Select Hospital:</label>
                                                            <select name="hospital_id" id="hospital1" required class="form-control show-tick">
                                                                <option value="">Select Hospital</option>
                                                                <?php if ($total_hospitals > 0) {foreach ($hospital as $key => $value) { ?>
                                                                <option value="<?php echo $value['hospital_id'] ?>"><?php echo $value['hospital'] ?></option>
                                                                <?php }}else
                                                                {
                                                                    echo'<option value="">No Registered Hospital Cards</option>';

                                                                } ?>
                                                            </select>
                                                        </div>
                                                        <div class="input-group">
                                                            <label>Appointment Type:</label>
                                                            <select name="appointment_type" id="appointment_type" required class="form-control show-tick">
                                                                <option value="">Select Hospital first</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-calendar"></i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" name="date" id="date" class="form-control datepicker" required placeholder="Please choose a date...">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="input-group">
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-clock-o"></i>
                                                                </span>
                                                                <div class="form-line">
                                                                    <input type="text" class="timepicker form-control" id="time" name="time" required placeholder="Please choose a time...">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div id ="check"></div>
                                                        <div id ="charge"></div>
                                                    </div>
                                                </div>
                                            </form>  
                                        </div>

                                        <div role="tabpanel" class="tab-pane fade" id="showdiv2">
                                            <form action="patient_appointment/appointment_by_doctor" method="post">
                                             <div class="row clearfix">
                                                <div class="col-sm-12">
                                                    <div class="input-group">
                                                        <label>Hospital:</label><br>
                                                        <input class="awesomplete" id="hospital2" style="width: 400px !important;" type="text" name="hospitals" list="hospitals" placeholder="Enter Hospital name">
                                                        <datalist id="hospitals">
                                                            <?php foreach ($hospitals as $key => $value) { ?>
                                                            <option value="<?php echo $value['hospital'] ?>"><?php echo $value['hospital'] ?></option>
                                                            <?php } ?>
                                                        </datalist>
                                                    </div>

                                                    <div class="input-group">
                                                        <label>Select Doctor:</label>
                                                        <select name="doctor" id="doctor" required class="form-control show-tick">
                                                            <option value="">Select Hospital first</option>
                                                        </select>
                                                        <div id="hospital2_id"></div>
                                                    </div>

                                                    <div class="input-group">
                                                        <label>Appointment Type:</label>
                                                        <select name="appointment_type" id="appointment_type2" required class="form-control">
                                                            <option value="">Select Hospital first</option>
                                                        </select>
                                                    </div>

                                                    <div id="doc-info"></div>

                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="form-control datepicker" id="date2" name="date" required placeholder="Please choose a date...">
                                                        </div>
                                                    </div>

                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="fa fa-clock-o"></i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="text" class="timepicker form-control" id="time2" name="time" required placeholder="Please choose a time...">
                                                        </div>
                                                    </div>

                                                    <div id ="check2"></div>
                                                    <div id ="charge2"></div>
                                                </div>
                                            </div>
                                        </form>  
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="showdiv3">
                                        <form action="patient_appointment/appointment_by_specialty" method="post" id="contactform3">
                                             <div class="row clearfix">
                                                <div class="col-sm-12">
                                                <div class="input-group">
                                                        <label>Select Specialty:</label>
                                                        <select name="specialty" id="specialty" required class="form-control show-tick">
                                                            <option value="">Select Specialty</option>
                                                            <?php if ($total_specialty > 0) { foreach ($specialty as $key => $value) { ?>
                                                            <option value="<?php echo $value['specialty_id'] ?>"><?php echo $value['specialty'] ?></option>
                                                            <?php }} else { echo "<option value=''>No data in database</option>"; } ?>
                                                        </select>
                                                    </div>

                                                    <div class="input-group">
                                                        <label>Select Hospital:</label><br>
                                                        <input class="awesomplete" id="hospital3" style="width: 400px !important;" type="text" name="hospitals" list="hospitals" placeholder="Enter Hospital name">
                                                        <datalist id="hospitals">
                                                            <?php foreach ($hospitals as $key => $value) { ?>
                                                            <option value="<?php echo $value['hospital'] ?>"><?php echo $value['hospital'] ?></option>
                                                            <?php } ?>
                                                        </datalist>
                                                    </div>

                                                    <div class="input-group">
                                                        <label>Select Doctor:</label>
                                                        <select name="doctor3" id="doctor3" required class="form-control show-tick">
                                                            <option value="">Select Hospital first</option>
                                                        </select>
                                                        </div>

                                                        <div id="hospital3_id"></div>

                                                    <div class="input-group">
                                                        <label>Appointment Type:</label>
                                                        <div class="controls">
                                                            <select name="appointment_type" id="appointment_type3" required class="form-control">
                                                                <option value="">Select Hospital first</option>
                                                            </select>
                                                        </div>
                                                    </div>


                                                <div id="doc-info2"></div>

                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-calendar"></i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" class="form-control datepicker" id="date3" name="date" required placeholder="Please choose a date...">
                                                            </div>
                                                        </div>

                                                        <div class="input-group">
                                                            <span class="input-group-addon">
                                                                <i class="fa fa-clock-o"></i>
                                                            </span>
                                                            <div class="form-line">
                                                                <input type="text" class="timepicker form-control" name="time" id="time3" required placeholder="Please choose a time...">
                                                            </div>
                                                        </div>

                                                <div id ="check3"></div>
                                                <div id ="charge3"></div>
                                                </div>
                                                </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--/ page content -->

        <script src="public/js/jquery-2.1.4.min.js"></script>    

        <script type="text/javascript">
            $( document ).ready(function() {
                $('#hospital1').on('change',function(){
                    var hospital_id = $(this).val();
                    if(hospital_id){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getServices',
                            data:'hospital_id='+hospital_id,
                            success:function(html){
                                $('#appointment_type').html(html);
                            }
                        }); 
                    }else{
                        $('#appointment_type').html('<option value="">Select Hospital first</option>'); 
                    }
                });

                $('#date').on('change',function(){
                    var date = $(this).val();
                    if(date){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/chkExistingAppointment',
                            data:'date='+date,
                            success:function(html){
                                $('#check').html(html);
                            }
                        }); 
                    }else{
                        $('#check').html(''); 
                    }
                });

                $('#appointment_type').on('change',function(){
                    var service_id = $(this).val();
                    var hospital_id = document.getElementById("hospital1").value;
                    if(service_id !== null && hospital_id !== null){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getServiceCharge',
                            data:'service_id='+service_id+'&hospital_id='+hospital_id,
                            success:function(html){
                                $('#charge').html(html);
                            }
                        }); 
                    }else{
                        $('#charge').html(''); 
                    }
                });

                $('#hospital3').on('change',function(){
                    var hospital = $(this).val();
                    var specialty = document.getElementById("specialty").value;
                    if(hospital !== null && specialty !== null){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getspecialtydoctors',
                            data:'hospital='+hospital+'&specialty='+specialty,
                            success:function(html){
                                $('#doctor3').html(html);
                            }
                        }); 
                    }else{
                        $('#doctor3').html('<option value="">Select Hospital first</option>'); 
                    }
                });

                $('#hospital3').on('change',function(){
                    var hospital = $(this).val();
                    if(hospital){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getHospital3Id',
                            data:'hospital='+hospital,
                            success:function(html){
                                $('#hospital3_id').html(html);
                            }
                        }); 
                    }else{
                        $('#hospital3_id').html(''); 
                    }
                });
                $('#doctor3').on('change',function(){
                    var hospital = document.getElementById("hospital3").value;
                    if(hospital){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getServicess',
                            data:'hospital='+hospital,
                            success:function(html){
                                $('#appointment_type3').html(html);
                            }
                        }); 
                    }else{
                        $('#appointment_type3').html('<option value="">Select Hospital first</option>'); 
                    }
                });

                $('#doctor3').on('change',function(){
                    var doctor_id = $(this).val();
                    if(doctor_id){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getDoctorInfo',
                            data:'doctor_id='+doctor_id,
                            success:function(html){
                                $('#doc-info2').html(html);
                            }
                        }); 
                    }else{
                        $('#doc-info2').html(''); 
                    }
                });


                $('#appointment_type3').on('change',function(){
                    var service_id = $(this).val();
                    var hospital = document.getElementById("hospital3").value;
                    if(service_id !== null && hospital !== null){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getServiceCharge3',
                            data:'service_id='+service_id+'&hospital='+hospital,
                            success:function(html){
                                $('#charge3').html(html);
                            }
                        }); 
                    }else{
                        $('#charge3').html(''); 
                    }
                });


                $('#date3').on('change',function(){
                    var date = $(this).val();
                    if(date){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/chkExistingAppointment',
                            data:'date='+date,
                            success:function(html){
                                $('#check3').html(html);
                            }
                        }); 
                    }else{
                        $('#check3').html(''); 
                    }
                });

                $('#hospital2').on('change',function(){
                    var hospital = $(this).val();
                    if(hospital){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getdoctors',
                            data:'hospital='+hospital,
                            success:function(html){
                                $('#doctor').html(html);
                            }
                        }); 
                    }else{
                        $('#doctor').html('<option value="">Select Hospital first</option>'); 
                    }
                });
                $('#hospital2').on('change',function(){
                    var hospital = $(this).val();
                    if(hospital){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getHospital2Id',
                            data:'hospital='+hospital,
                            success:function(html){
                                $('#hospital2_id').html(html);
                            }
                        }); 
                    }else{
                        $('#hospital2_id').html(''); 
                    }
                });

                $('#doctor').on('change',function(){
                    var hospital = document.getElementById("hospital2").value;
                    if(hospital){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getServicess',
                            data:'hospital='+hospital,
                            success:function(html){
                                $('#appointment_type2').html(html);
                            }
                        }); 
                    }else{
                        $('#appointment_type2').html('<option value="">Select Hospital first</option>'); 
                    }
                });

                $('#doctor').on('change',function(){
                    var doctor_id = $(this).val();
                    if(doctor_id){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getDoctorInfo',
                            data:'doctor_id='+doctor_id,
                            success:function(html){
                                $('#doc-info').html(html);
                            }
                        }); 
                    }else{
                        $('#doc-info').html(''); 
                    }
                });


                $('#appointment_type2').on('change',function(){
                    var service_id = $(this).val();
                    var hospital = document.getElementById("hospital2").value;
                    if(service_id !== null && hospital !== null){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/getServiceCharge2',
                            data:'service_id='+service_id+'&hospital='+hospital,
                            success:function(html){
                                $('#charge2').html(html);
                            }
                        }); 
                    }else{
                        $('#charge2').html(''); 
                    }
                });


                $('#date2').on('change',function(){
                    var date = $(this).val();
                    if(date){
                        $.ajax({
                            type:'POST',
                            url:'<?php echo URL?>patient_appointment/chkExistingAppointment',
                            data:'date='+date,
                            success:function(html){
                                $('#check2').html(html);
                            }
                        }); 
                    }else{
                        $('#check2').html(''); 
                    }
                });

            });     
        </script>

        <!--Start of Tawk.to Script-->
        <script type="text/javascript">
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/59bbf8e4c28eca75e462041e/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        <script>
           function payWithPaystack(){
             var appointment_type = document.getElementById("appointment_type").value;
             var hospital = document.getElementById("hospital1").value;
             var doctor = document.getElementById("doctor").value;
             var specialty = document.getElementById("specialty").value;
             var date = document.getElementById("date").value;
             var time = document.getElementById("time").value;
             var amount = document.getElementById("amount").value;
             var handler = PaystackPop.setup({
              key: 'pk_test_2b94fcbb5b56990707491de6f600a22b89b9b094',
              email: '<?= $_SESSION['email']; ?>',
              amount: amount * 100,
          ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
          metadata: {
             custom_fields: [
             {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "<?= $_SESSION['phone']; ?>"
            }
            ]
        },
        callback: function(response){
          alert('Transaction Successful. Your Transaction ref is ' + response.reference);
          window.location.replace('<?php echo URL?>patient_appointment/createAppointment?appointment_type=' + appointment_type +'&hospital=' + hospital +'&doctor=' + doctor +'&specialty=' + specialty +'&date=' + date +'&time=' + time +'&txn_ref=' + response.reference);
      },
      onClose: function(){
          alert('Transaction and Appointment Cancelled');
          window.location.replace("<?php echo URL?>patient_appointment");
      }
    });
             handler.openIframe();
         }


         function payWithPaystack2(){
             var appointment_type = document.getElementById("appointment_type2").value;
             var hospital = document.getElementById("hospitals2").value;
             var doctor = document.getElementById("doctor").value;
             var specialty = document.getElementById("specialty").value;
             var date = document.getElementById("date2").value;
             var time = document.getElementById("time2").value;
             var amount = document.getElementById("amount2").value;
             var handler = PaystackPop.setup({
              key: 'pk_test_2b94fcbb5b56990707491de6f600a22b89b9b094',
              email: '<?= $_SESSION['email']; ?>',
              amount: amount * 100,
          ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
          metadata: {
             custom_fields: [
             {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "<?= $_SESSION['phone']; ?>"
            }
            ]
        },
        callback: function(response){
          alert('Transaction Successful. Your Transaction ref is ' + response.reference);
          window.location.replace('<?php echo URL?>patient_appointment/createAppointment?appointment_type=' + appointment_type +'&hospital=' + hospital +'&doctor=' + doctor +'&specialty=' + specialty +'&date=' + date +'&time=' + time +'&txn_ref=' + response.reference);
      },
      onClose: function(){
          alert('Transaction and Appointment Cancelled');
          window.location.replace("<?php echo URL?>patient_appointment");
      }
    });
             handler.openIframe();
         }


         function payWithPaystack3(){
             var appointment_type = document.getElementById("appointment_type3").value;
             var hospital = document.getElementById("hospitals3").value;
             var doctor = document.getElementById("doctor3").value;
             var specialty = document.getElementById("specialty").value;
             var date = document.getElementById("date3").value;
             var time = document.getElementById("time3").value;
             var amount = document.getElementById("amount3").value;
             var handler = PaystackPop.setup({
              key: 'pk_test_2b94fcbb5b56990707491de6f600a22b89b9b094',
              email: '<?= $_SESSION['email']; ?>',
              amount: amount * 100,
          ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
          metadata: {
             custom_fields: [
             {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "'<?= $_SESSION['phone']; ?>'"
            }
            ]
        },
        callback: function(response){
          alert('Transaction Successful. Your Transaction ref is ' + response.reference);
          window.location.replace('<?php echo URL?>patient_appointment/createAppointment?appointment_type=' + appointment_type +'&hospital=' + hospital +'&doctor=' + doctor +'&specialty=' + specialty +'&date=' + date +'&time=' + time +'&txn_ref=' + response.reference);
      },
      onClose: function(){
          alert('Transaction and Appointment Cancelled');
          window.location.replace("<?php echo URL?>patient_appointment");
      }
    });
             handler.openIframe();
         }
     </script>