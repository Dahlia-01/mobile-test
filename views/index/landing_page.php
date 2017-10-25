<script src="public/js/jquery-1.7.2.js"></script>
<script>
$( document ).ready(function() {
var total_cards = document.getElementById("card1").value;
if (total_cards<1) {
if(confirm("You have no hospital cards. Would you like to create a card now?") == true) {
  window.location = '<?php echo URL?>create_card'; } 
  else {  
    window.location = '<?php echo URL?>index'; }
} else {
  if(confirm("Would you like to book an appointment now?") == true) {
  window.location = '<?php echo URL?>patient_appointment'; } 
  else {  
    window.location = '<?php echo URL?>index'; }
}
});</script>
   <!-- <script>
   if(confirm("You have no hospital cards. Would you like to create a card now?") == true) { 
                       window.location = '<?php echo URL?>create_card'; } else {  window.location = '<?php echo URL?>patient_dashboard'; } </script> -->
			<!-- page title -->
			<section class="page-title">
				<div class="grid-row clearfix">
					<h1>Dashboard</h1>
					
					<nav class="bread-crumbs">
						<a href="#">Hello, <?php echo $username; ?></a>
					</nav>
				</div>
			</section>
			<!--/ page title -->
			
			<!-- page content -->
			<main class="page-content">
				<div class="grid-row">
					<!-- photo tour -->
					<section id="photo-tour" class="widget photo-tour photo-tour-2">	
					
						
											
						<div class="grid">
							<div class="item item2">
								<div class="pic">
									<img src="public/pic/dash6.png" style="width: 100%;" alt="Pending Appointments">
									<div class="links">
										<ul>
											<li><a href="#" data-toggle="modal" data-target="#appointments" class="fa fa-link"></a></li>										
										</ul>
									</div>
								</div>
								<h3>Appointments</h3>
								<p>Pending Appointments: <?php echo $total_pending_appointment; ?></p>
							</div>
							
							<div class="item item1">
								<div class="pic">
									<img src="public/pic/dash2.jpg"  style="width: 100%;" alt="Awaiting Consultations">
									<div class="links">
										<ul>
											<li><a href="#" data-toggle="modal" data-target="#consultations" class="fa fa-link"></a></li>										
										</ul>
									</div>
								</div>
								<h3>Consultations (Home Based)</h3>
								<p>Pending Consultations: <?php echo $total_pending_consultation; ?></p>
							</div>
							
							<div class="item item2" style="padding-bottom: 60px !important;">
								<div class="pic">
									<center><img src="public/pic/dash7.png"  style="width: 100%;" alt="Patient Profile"></center>
									<div class="links">
										<ul>
											<li><a data-toggle="modal" data-target="#profile" class="fa fa-link"></a></li>										
										</ul>
									</div>
								</div>
								<h3>Profile</h3>
								<p>View</p>
							</div>

							<div class="item item1">
								<div class="pic">
									<img src="public/pic/dash5.png"  style="width: 100%;" alt="Hospital Cards">
									<div class="links">
										<ul>
											<li><a data-toggle="modal" data-target="#cards" class="fa fa-link"></a></li>										
										</ul>
									</div>
								</div>
								<h3>Hospital Cards</h3>
								<p>Valid Hospital Cards: <input type="hidden" id="card1" value="<?php echo $total_hospital_card; ?>"><?php echo $total_hospital_card; ?></p>
							</div>
						
					</section>
					<!--/ photo tour -->
				</div>
			</main>
			<!--/ page content -->

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
                              <table class="table table-hover">
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
      <td><form action="patient_dashboard/delete_appointment" method="post"><input type="hidden" name="appointment_id" value="<?php echo $value['appointment_id'] ?>">
                
                  <button onclick="this.form.submit()"><i class="fa fa-trash"></i></button>&nbsp;&nbsp;</form></td>
    </tr>
    <?php } ?>
  </tbody>
</table>
 </div>
 <br>
<h4>Past Appointments</h4>
 <div class="table-responsive">
                       <table class="table">
  <thead style="background: #69bfed; color: #fff;">
    <tr>
      <th>Hospital</th>
      <th>Time</th>
      <th>Date</th>
      <th>Doctor</th>
    </tr>
  </thead>
    <tbody>
            <?php foreach ($past_appointment as $key => $value) { ?>
    <tr>
      <td><?php echo $value['hospital'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['time'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['date'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['doctor'] ?>&nbsp;&nbsp;</td>   
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
</div>
<div class="modal-footer">
   <button type="button" class="wpb_button wpb_btn-alt wpb_btn-arrow-right wpb_btn-small" data-dismiss="modal">Close</button>
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
                       <table class="table">
  <thead style="background: #69bfed; color: #fff;">
    <tr>
      <th>Hospital</th>
      <th>Time</th>
      <th>Date</th>
      <th>Doctor</th>
      <th>Address</th>
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
      <td><?php echo $value['address'] ?>&nbsp;&nbsp;</td>   
      <td><?php echo $value['status'] ?>&nbsp;&nbsp;</td>   
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    <br>
<h4>Past Consultations</h4>

                              <div class="table-responsive">
                       <table class="table">
  <thead style="background: #69bfed; color: #fff;">
    <tr>
      <th>Hospital</th>
      <th>Doctor</th>
      <th>Address</th>
      <th>Status</th>
    </tr>
  </thead>
    <tbody>
            <?php foreach ($past_consultation as $key => $value) { ?>
    <tr>
      <td><?php echo $value['hospital'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['doctor'] ?>&nbsp;&nbsp;</td>   
      <td><?php echo $value['address'] ?>&nbsp;&nbsp;</td>   
      <td><?php echo $value['status'] ?>&nbsp;&nbsp;</td>   
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
</div>
<div class="modal-footer">
   <button type="button" class="wpb_button wpb_btn-alt wpb_btn-arrow-right wpb_btn-small" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


<div class="modal fade" id="profile" role = "dialog">
    <div class="modal-dialog modal-lg">
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
<a data-dismiss="modal" class="wpb_button wpb_btn-alt wpb_btn-mini" data-toggle="modal" href="#updateProfile">Update Profile</a>
</div>
<div class="modal-footer">
   <button type="button" class="wpb_button wpb_btn-alt wpb_btn-arrow-right wpb_btn-small" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="updateProfile" role = "dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content" style="">
<div class="modal-header">
<h3 class="modal-title" style="color: #e25041;" align="center">UPDATE PROFILE</h3>
</div>
<div class="modal-body">
<form method="post" action="patient_dashboard/updateProfile">
<label>Fullname: </label>
<div class="form-group"><input class="form-control" type="text" name="fullname" value="<?php echo $value['fullname'] ?>"></div>

<label>Username: </label><div class="form-group"><input class="form-control" type="text" name="username" value="<?php echo $value['username'] ?>"></div>

<label>Password: </label><div class="form-group"><input class="form-control" type="password" name="password" value="<?php echo $value['password'] ?>"></div>

<label>Home Address: </label><div class="form-group"><input class="form-control" type="text" name="home_address" value="<?php echo $value['home_address'] ?>"></div>

<label>Occupation: </label><div class="form-group"><input class="form-control" type="text" name="occupation" value="<?php echo $value['occupation'] ?>"></div>

<label>Marital Status: </label><div class="form-group"><input class="form-control" type="text" name="marital_status" value="<?php echo $value['marital_status'] ?>"></div>

<label>Email Address: </label><div class="form-group"><input class="form-control" type="text" name="email" value="<?php echo $value['email'] ?>"></div>

<label>Phone: </label><div class="form-group"><input class="form-control" type="text" name="phone" value="<?php echo $value['phone'] ?>"></div><br>
<input type="submit" name="submit" class="wpb_button wpb_btn-alt wpb_btn-mini" value="Update">
</form>
<?php } ?>
</div>
<div class="modal-footer">
   <button type="button" class="wpb_button wpb_btn-alt wpb_btn-arrow-right wpb_btn-small" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<div class="modal fade" id="cards" role = "dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content" style="">
<div class="modal-header">
<h3 class="modal-title" style="color: #e25041;" align="center">PATIENT CARDS</h3>
</div>
<div class="modal-body">
                              <div class="table-responsive">
               <table class="table">
  <thead style="background: #69bfed; color: #fff;">
    <tr>
      <th>Hospital</th>
      <th>Name</th>
      <th></th>
    </tr>
  </thead>
    <tbody>
            <?php foreach ($hospital_card as $key => $value) { ?>
    <tr>
      <td><?php echo $value['hospital'] ?>&nbsp;&nbsp;</td>
      <td><?php echo $value['fullname'] ?>&nbsp;&nbsp;&nbsp;</td>
      <td><a href="<?php echo URL?>card_details?card_id=<?php echo urlencode(base64_encode($value['card_id'])) ?>">DETAILS</a></td>     
    </tr>
    <?php } ?>
  </tbody>
</table>
    </div>
    <br><br>
        <a href="<?php echo URL?>create_card" class="wpb_button wpb_btn-alt wpb_btn-small">Create Card</a>
</div>
<div class="modal-footer">
   <button type="button" class="wpb_button wpb_btn-alt wpb_btn-arrow-right wpb_btn-small" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
        <script type="text/javascript" src="public/js/jquery.min.js"></script>