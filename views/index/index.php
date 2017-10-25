
    <link href="public/css/bootstrap2.css" rel="stylesheet">
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-sm-6 col-md-6">
                                    <div class="thumbnail" style="border: none !important;">
									<img src="public/pic/dash6.png" style="width: 100%; height: 265px;" alt="Pending Appointments">
                                        <div class="caption">
                                        <center>
                <h3><a href="#" data-toggle="modal" data-target="#appointments">Appointments</a></h3>
                <p>Pending Appointments: <?php echo $total_pending_appointment; ?></p>
                </center>
									</div>
								</div>
							</div>
							
                                <div class="col-sm-6 col-md-6">
                                    <div class="thumbnail" style="border: none !important;">
									<img src="public/pic/dash2.jpg"  style="width: 100%; height: 265px;" alt="Awaiting Consultations">
                                        <div class="caption"><center>
                <h3><a href="#" data-toggle="modal" data-target="#consultations">Consultations (Home Based)</a></h3>
                <p>Pending Consultations: <?php echo $total_pending_consultation; ?></p>
                </center>
									</div>
								</div>
							</div>
              </div>
							
            <div class="row">
                <div class="col-md-6 col-sm-6">
                                    <div class="thumbnail" style="border: none !important;">
									<center><img src="public/pic/dash7.png"  style="width: 100%; height: 265px;" alt="Patient Profile"></center>
                                        <div class="caption"><center>
                <h3>Profile</h3>
                <p><a data-toggle="modal" data-target="#profile">View</a></p>
                </center>
									</div>
								</div>
							</div>

                <div class="col-md-6 col-sm-6">
                                    <div class="thumbnail" style="border: none !important;">
									<img src="public/pic/records.jpg"  style="width: 100%; height: 265px;" alt="Medical Records">
                                        <div class="caption"><center>
                <h3><a data-toggle="modal" data-target="#med_records">Medical Records</a></h3>
                <p>Medical Records: <?php echo $total_medical_record; ?></p>
                </center>
									</div>
								</div>
							</div>
              </div>

              </div>
              </div>
              </div>
						
					</section>

<!-- modal for appointments -->
<div class="modal fade" id="appointments" role = "dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content" style="color: #7c7c7c;">
<div class="modal-header">
<h3 class="modal-title" style="color: #e25041;" align="center">APPOINTMENTS</h3>
</div>
<div class="modal-body">
<h4>Pending Appointments</h4>
                              <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
  <thead style="background: #69bfed; color: #fff;">
    <tr>
      <th>Hospital</th>
      <th>Time</th>
      <th>Date</th>
      <th>Doctor</th>
      <th>Status</th>
      <th></th>
    </tr>
  </thead>
    <tbody>
    
            <?php foreach ($pending_appointment as $key => $value) { ?>
    <tr>

      <td><?php echo $value['hospital'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><?php echo $value['time'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><?php echo $value['date'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><?php echo $value['doctor'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>
      <td><?php echo $value['status'] ?>&nbsp;&nbsp;&nbsp;&nbsp;</td>   
      <td>
      <form action="patient_dashboard/delete_appointment" method="POST">
      <input type="hidden" name="appointment_id" value="<?php echo $value['appointment_id'] ?>">
                
                  <button onclick="this.form.submit()" style="display: inline !important;"><i class="fa fa-trash"></i></button>&nbsp;&nbsp;</form></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
 </div>
 <br>
<h4>Past Appointments</h4>
 <div class="table-responsive">
                       <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
  <thead style="background: #69bfed; color: #fff;">
    <tr>
      <th>Hospital</th>
      <th>Time</th>
      <th>Date</th>
      <th>Doctor</th>
      <th>Status</th>
    </tr>
  </thead>
    <tbody>
            <?php foreach ($past_appointment as $key => $value) { ?>
    <tr>
      <td><?php echo $value['hospital'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['time'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['date'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['doctor'] ?>&nbsp;&nbsp;</td>   
      <td><?php echo $value['status'] ?>&nbsp;&nbsp;</td>   
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!-- modal for consultations -->
<div class="modal fade" id="consultations" role = "dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content" style="">
<div class="modal-header">
<h3 class="modal-title" style="color: #e25041;" align="center">CONSULTATIONS</h3>
</div>
<div class="modal-body">
<h4>Pending Consultations</h4>
                              <div class="table-responsive">
                       <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
  <thead style="background: #69bfed; color: #fff;">
    <tr>
      <th>Hospital</th>
      <th>Time</th>
      <th>Date</th>
      <th>Doctor</th>
      <th>Status</th>
    </tr>
  </thead>
    <tbody>

            <?php foreach ($pending_consultation as $key => $value) { ?>
    <tr>
      <td><?php echo $value['hospital'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['time'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['date'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['doctor'] ?>&nbsp;&nbsp;</td>   
      <td><?php echo $value['status'] ?>&nbsp;&nbsp;</td>   
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    <br>
<h4>Past Consultations</h4>

                              <div class="table-responsive">
                       <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
  <thead style="background: #69bfed; color: #fff;">
    <tr>
      <th>Hospital</th>
      <th>Doctor</th>
      <th>Status</th>
    </tr>
  </thead>
    <tbody>
            <?php foreach ($past_consultation as $key => $value) { ?>
    <tr>
      <td><?php echo $value['hospital'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['doctor'] ?>&nbsp;&nbsp;</td>  
      <td><?php echo $value['status'] ?>&nbsp;&nbsp;</td>   
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


<div class="modal fade" id="profile" role = "dialog">
    <div class="modal-dialog">
    <div class="modal-content" style="">
<div class="modal-header">
<h3 class="modal-title" style="color: #e25041;" align="center">PROFILE</h3>
</div>
<div class="modal-body">
            <?php foreach ($patient_info as $key => $value) { ?>
Fullname: <?php echo $value['fullname'] ?><br>
Username: <?php echo $value['username'] ?><br>
Gender: <?php echo $value['gender'] ?><br>
Home Address: <?php echo $value['home_address'] ?><br>
Occupation: <?php echo $value['occupation'] ?><br>
Marital Status: <?php echo $value['marital_status'] ?><br>
Email Address: <?php echo $value['email'] ?><br>
Phone: <?php echo $value['phone'] ?><br>
<br>
<a data-dismiss="modal" class="btn-danger btn" data-toggle="modal" href="#updateProfile">Update Profile</a>
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


            <div class="modal fade" id="updateProfile" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="largeModalLabel"><center>Update Profile</center></h4>
                        </div>
                        <div class="modal-body">
<form method="post" action="patient_dashboard/updateProfile">
<label>Fullname: </label>
<div class="form-group"><input class="form-control" type="text" name="fullname" value="<?php echo $value['fullname'] ?>"></div>

<label>Username: </label><div class="form-group"><input class="form-control" type="text" name="username" value="<?php echo $value['username'] ?>"></div>

<label>Home Address: </label><div class="form-group"><input class="form-control" type="text" name="home_address" value="<?php echo $value['home_address'] ?>"></div>

<label>Occupation: </label><div class="form-group"><input class="form-control" type="text" name="occupation" value="<?php echo $value['occupation'] ?>"></div>

<label>Marital Status: </label><div class="form-group"><input class="form-control" type="text" name="marital_status" value="<?php echo $value['marital_status'] ?>"></div>

<label>Email Address: </label><div class="form-group"><input class="form-control" type="text" name="email" value="<?php echo $value['email'] ?>"></div>

<label>Phone: </label><div class="form-group"><input class="form-control" type="text" name="phone" value="<?php echo $value['phone'] ?>"></div><br>
<input type="submit" name="submit" class="btn btn-warning" value="Update">
</form>
<?php } ?>
                        </div>
                        <div class="modal-footer" style="background-color: #2196F3;">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>


<div class="modal fade" id="med_records" role = "dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content" style="">
<div class="modal-header">
<h3 class="modal-title" style="color: #e25041;" align="center">MEDICAL RECORDS</h3>
</div>
<div class="modal-body">
                              <div class="table-responsive">
               <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
  <thead>
    <tr>
      <th>Doctor</th>
      <th>Record</th>
      <th>Details</th>
      <th>File</th>
    </tr>
  </thead>
    <tbody>
            <?php foreach ($medical_record as $key => $value) { ?>
    <tr>
      <td><?php echo $value['doctor'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['record'] ?>&nbsp;&nbsp;&nbsp;</td>
      <td><?php echo $value['details'] ?>&nbsp;&nbsp;&nbsp;</td>
      <td><a href="<?php echo URL?>public/medical_records/<?php echo $value['file'] ?>" download="medRec00<?php echo $value['record_id'] ?>"><?php echo $value['file'] ?></a>&nbsp;&nbsp;&nbsp;</td>
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    <br>
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

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