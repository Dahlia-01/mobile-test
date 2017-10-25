<?php
class patient_appointment extends Controller {

	function __construct() {

		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
        $loggedtype = Session::get('loggedtype');
        
        $this->view->data['username']=Session::get('username');
        $this->view->data['fullname']=Session::get('fullname');
        $this->view->data['pix']=Session::get('pix');
        $this->view->data['patient_id']=Session::get('patient_id');
        $this->view->data['unread']=Session::get('unread');
        
        if ($loggedtype !== "PATIENT") {
         Session::destroy();
         header('location: patient_login');
         exit;
     }
     
 }
 
 function index() 
 {	
    if (isset($_SESSION['patient_id'])){
        $patient_id = $_SESSION['patient_id'];
        $this->view->data['hospital']=$this->model->getHospital($patient_id);
        $this->view->data['total_hospitals']=$this->model->getTotalHospital($patient_id);
        $this->view->data['hospitals']=$this->model->gethospitals($patient_id);
        $this->view->data['specialty']=$this->model->getspecialties();
        $this->view->data['total_specialty']=$this->model->gettotalspecialties();
    }

    $this->view->data['post']=$this->model->get_latest_blog(3);
    $this->view->render('index/appointments', $noinclude=false, 1);
}

function CreateAppointment()
{
    function validate_input($data) {
        $data = trim($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if(isset($_GET['hospital'])){
        $hospital = $_GET['hospital'];
        $appointment_type = $_GET['appointment_type'];
        $date = $_GET['date'];
        $time = $_GET['time'];
        $doctor = $_GET['doctor'];
        $txn_ref = $_GET['txn_ref'];
        $specialty = $_GET['specialty'];
        $patient_id = $_SESSION['patient_id']; 
        if ($appointment_type == 4) {
            $this->model->create_home_appointment($doctor,$hospital,$specialty,$patient_id,$date,$time,$txn_ref);
            header('location: ../index'); 
        }else { 
            $this->model->create_appointment($appointment_type,$hospital,$doctor,$specialty,$date,$time,$patient_id,$txn_ref);
            if (!empty($_GET["doctor"])) {
            $email = $this->model->getDoctorEmail($doctor);
            $fullname = $this->model->getDoctorName($doctor);
            $hospital = $this->model->getHospital2($hospital);
                $message = 'Hello, '.$fullname.'<br><br><br>Please be informed! <br><br>You have been fixed for an appointment for '.$date.', '.$time.' at your hospital. <br>Please <a href="www.kompletecare.com/doctor_login">login</a> to your account to view and confirm/ decline this appointment. <br><br><br>Thank you,<br><br>
                            Dahlia Akhaine | Hospital Administrations Representative | '.$hospital.'<br>
                    KompleteCare ...Healthcare at a CLICK!';  // Our message above including the link

    include("smtptester/class.phpmailer.php"); //you have to upload class files "class.phpmailer.php" and "class.smtp.php"

    $mail = new PHPMailer();

    $mail->IsSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = 'mail.kompletecare.com';

    $mail->Username = 'dahlia.akhaine@kompletecare.com';
    $mail->Password = 'AKHAINE_01'; 

    $mail->From = 'dahlia.akhaine@kompletecare.com';
    $mail->FromName = "Sevenz Healthcare Services Ltd";

    $mail->AddAddress($email, $fullname);
    $mail->Subject = "New Fixed Appointment!";
    $mail->Body = $message;
    $mail->WordWrap = 150;
    $mail->IsHTML(true);
    $str1= "gmail.com";
    $str2=strtolower('dahlia.akhaine@kompletecare.com');
    If(strstr($str2,$str1))
    {
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            echo "<br><br> * Please double check the user name and password to confirm that both of them are correct. <br><br>";
            echo "* If you are the first time to use gmail smtp to send email, please refer to this link :http://www.smarterasp.net/support/kb/a1546/send-email-from-gmail-with-smtp-authentication-but-got-5_5_1-authentication-required-error.aspx?KBSearchID=137388";
        } 
        else {
            header('location: ../index'); 
        }
    }
    else{
        $mail->Port = 25;
        if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
            echo "<br><BR>* Please double check the user name and password to confirm that both of them are correct. <br>";
        } 
        else{ 
            header('location: ../index'); 
        }
    }
            }
            else {

            header('location: ../index'); 
            }

        }}
    }
    

    function getServices()
    {
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        if(isset($_POST["hospital_id"]) && !empty($_POST["hospital_id"])){
            $hospital_id = $_POST['hospital_id'];
            $query = $db->query("SELECT * FROM service_charge serchar left join services ser on serchar.service_id = ser.service_id WHERE hospital_id = '$hospital_id' ORDER BY service ASC");
            
            $rowCount = $query->num_rows;
            
            if($rowCount > 0){
                echo '<option value="">Select Service</option>';
                while($row = $query->fetch_assoc()){ 
                    echo '<option value="'.$row['service_id'].'">'.$row['service'].'</option>';
                }
            }else{
                echo '<option value="">No Registered Services in this Hospital</option>';
            }
        }
    }


    function getServicess()
    {
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        if(isset($_POST["hospital"]) && !empty($_POST["hospital"])){
            $hospital = $_POST['hospital'];
            $query = $db->query("SELECT ser.service_id, ser.service FROM service_charge serchar 
                left join hospitals hosp on serchar.hospital_id = hosp.hospital_id
                left join services ser on serchar.service_id = ser.service_id WHERE hosp.hospital = '$hospital' ORDER BY service ASC");
            
            $rowCount = $query->num_rows;
            
            if($rowCount > 0){
                echo '<option value="">Select Service</option>';
                while($row = $query->fetch_assoc()){ 
                    echo '<option value="'.$row['service_id'].'">'.$row['service'].'</option>';
                }
            }else{
                echo '';
            }
        }
    }



    function getServiceCharge()
    {
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }
        if(isset($_POST["service_id"]) && !empty($_POST["hospital_id"])){
            $hospital_id = $_POST['hospital_id'];
            $service_id = $_POST['service_id'];
            $query = $db->query("SELECT * FROM service_charge WHERE hospital_id = '$hospital_id' AND service_id='$service_id'");
            
            $rowCount = $query->num_rows;
            
            if($rowCount > 0){
                if($service_id == 4){
                    while($row = $query->fetch_assoc()){ 
                        echo '<font color="red"><label>PLEASE NOTE: </label><br><p>All Home Consultations MUST be within the city/state for which your hospital is located. You MUST complete a video call with the selected doctor before consultation will be approved. Also please ensure that your home address is up-to-date on your profile! Thank you.</font></p>
                        
                          <h3 style="font-weight:600; color:red; font-size:17px;">SERVICE CHARGE:&nbsp;N'.$row["charge"].'</h3>
                          <input type="hidden" id="amount" name="amount" value="'.$row["charge"].'">
                          <br>
                      <script src="https://js.paystack.co/v1/inline.js"></script>
                      <button type="button" class="btn btn-danger" onclick="payWithPaystack()"> Pay </button>';
              }
          }else{
            while($row = $query->fetch_assoc()){ 
                echo '
                      <h3 style="font-weight:600; color:red; font-size:17px;">SERVICE CHARGE:&nbsp;N'.$row["charge"].'</h3><input type="hidden" id="amount" name="amount" value="'.$row["charge"].'">
                      <br>
                  <script src="https://js.paystack.co/v1/inline.js"></script>
                  <button type="button" class="btn btn-danger" onclick="payWithPaystack()"> Pay </button> ';
          }
      }}
      else{
        echo '';
    }
}
}

function getServiceCharge2()
{
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_POST["service_id"]) && !empty($_POST["hospital"])){
        $hospital = $_POST['hospital'];
        $service_id = $_POST['service_id'];
        $query = $db->query("SELECT * FROM service_charge serchar left join hospitals hosp on serchar.hospital_id = hosp.hospital_id WHERE hospital = '$hospital' AND service_id = '$service_id'");
        
        $rowCount = $query->num_rows;
        
        if($rowCount > 0){
            if ($service_id == 4){
                while($row = $query->fetch_assoc()){ 
                    echo '<font color="red"><label>PLEASE NOTE: </label><br><p>All Home Consultations MUST be within the city/state for which your hospital is located. You MUST complete a video call with the selected doctor before consultation will be approved. Also please ensure that your home address is up-to-date on your profile! Thank you.</font></p>
                    
                          <h3 style="font-weight:600; color:red; font-size:17px;">SERVICE CHARGE:&nbsp;N'.$row["charge"].'</h3><input type="hidden" id="amount2" name="amount" value="'.$row["charge"].'">
                          <br>
                      <script src="https://js.paystack.co/v1/inline.js"></script>
                      <button type="button" class="btn btn-danger" onclick="payWithPaystack2()"> Pay </button> ';
              }
          }else{
            while($row = $query->fetch_assoc()){ 
                echo '<h3 style="font-weight:600; color:red; font-size:17px;">SERVICE CHARGE:&nbsp;N'.$row["charge"].'</h3><input type="hidden" id="amount2" name="amount" value="'.$row["charge"].'">
                <br>
                  <script src="https://js.paystack.co/v1/inline.js"></script>
                  <button type="button" class="btn btn-danger" onclick="payWithPaystack2()"> Pay </button> ';
          }

      }}
      else{
        echo '';
    }
}
}

function getServiceCharge3()
{
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_POST["service_id"]) && !empty($_POST["hospital"])){
        $hospital = $_POST['hospital'];
        $service_id = $_POST['service_id'];
        $query = $db->query("SELECT * FROM service_charge serchar left join hospitals hosp on serchar.hospital_id = hosp.hospital_id WHERE hospital = '$hospital' AND service_id = '$service_id'");
        
        $rowCount = $query->num_rows;
        
        if($rowCount > 0){
            if ($service_id == 4) {
                while($row = $query->fetch_assoc()){ 
                    echo '<font color="red"><label>PLEASE NOTE: </label><br><p>All Home Consultations MUST be within the city/state for which your hospital is located. You MUST complete a video call with the selected doctor before consultation will be approved. Also please ensure that your home address is up-to-date on your profile! Thank you.</font></p>
                        

                          <h3 style="font-weight:600; color:red; font-size:17px;">SERVICE CHARGE:&nbsp;N'.$row["charge"].'</h3><input type="hidden" id="amount3" name="amount" value="'.$row["charge"].'">
                          <br>
                      <script src="https://js.paystack.co/v1/inline.js"></script>
                      <button type="button" class="btn btn-danger" onclick="payWithPaystack3()"> Pay </button> ';
              }
          }else {
            while($row = $query->fetch_assoc()){ 
                echo '<h3 style="font-weight:600; color:red; font-size:17px;">SERVICE CHARGE:&nbsp;N'.$row["charge"].'</h3><input type="hidden" id="amount3" name="amount" value="'.$row["charge"].'">
                <br>
                  <script src="https://js.paystack.co/v1/inline.js"></script>
                  <button type="button" class="btn btn-danger" onclick="payWithPaystack3()"> Pay </button> ';
          }

      }
  }else{
    echo '';
}
}
}


function chkExistingAppointment()
{
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_POST["date"]) && !empty($_POST["date"])){
        $patient_id = $_SESSION['patient_id'];
        $date = $_POST['date'];
        $query = $db->query("SELECT * FROM appointments WHERE patient_id = '$patient_id' AND date='$date'");
        
        $rowCount = $query->num_rows;
        
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<font color="red">You cannot have more than one appointment in a day!</font>';
            }
        }else{
            echo '';
        }
    }
}


function getdoctors()
{
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_POST["hospital"]) && !empty($_POST["hospital"])){
        $hospital = $_POST['hospital'];
        $query = $db->query("SELECT * FROM doctors docs left join hospitals hosp on docs.place_of_practice = hosp.hospital_id WHERE hosp.hospital = '$hospital' AND docs.practicing_licence_status = 'ACTIVE' ORDER BY doctor ASC");
        
        $rowCount = $query->num_rows;
        
        if($rowCount > 0){
            echo '
            <option value="">Select Doctor</option>';
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['doctor_id'].'">'.$row['doctor'].'</option>';
            }
        }else{
            echo '<option value="">Doctor not available</option>';
        }
    }
}

function getHospital2Id()
{
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_POST["hospital"]) && !empty($_POST["hospital"])){
        $hospital = $_POST['hospital'];
        $query = $db->query("SELECT * FROM hospitals WHERE hospital = '$hospital' AND status = 1");
        
        $rowCount = $query->num_rows;
        
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<input type ="hidden" id="hospitals2" value="'.$row['hospital_id'].'">';
            }
        }else{
            echo '';
        }
    }
}

function getHospital3Id()
{
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_POST["hospital"]) && !empty($_POST["hospital"])){
        $hospital = $_POST['hospital'];
        $query = $db->query("SELECT * FROM hospitals WHERE hospital = '$hospital' AND status = 1");
        
        $rowCount = $query->num_rows;
        
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '<input type ="hidden" id="hospitals3" value="'.$row['hospital_id'].'">';
            }
        }else{
            echo '';
        }
    }
}


function getspecialtydoctors()
{
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_POST["hospital"]) && isset($_POST["specialty"])){
        $hospital = $_POST['hospital'];
        $specialty = $_POST['specialty'];
        $query = $db->query("SELECT * FROM doctors docs left join specialty spec on docs.specialty = spec.specialty_id 
            left join hospitals hosp on docs.place_of_practice = hosp.hospital_id WHERE hosp.hospital = '$hospital' AND spec.specialty_id = '$specialty' ORDER BY doctor ASC");
        
        $rowCount = $query->num_rows;
        
        if($rowCount > 0){
            echo '<option value="">Select Doctor</option>';
            while($row = $query->fetch_assoc()){ 
                echo '<option value="'.$row['doctor_id'].'">'.$row['doctor'].'</option>';
            }
        }else{
            echo '<option value="">Doctor not available</option>';
        }
    }
}

function getDoctorInfo()
{
        $dbHost = 'MYSQL5011.SmarterASP.NET';
        $dbUsername = 'a11d64_care';
        $dbPassword = 'db_a11d64_care';
        $dbName = 'db_a11d64_care';

//Connect and select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    if(isset($_POST["doctor_id"]) && !empty($_POST["doctor_id"])){
        $doctor_id = $_POST['doctor_id'];
        $query = $db->query("SELECT docs.pix, spec.specialty, hosp.hospital, docs.mdcn_reg_no, docs.practicing_licence_status, docs.med_sch_grad_year, docs.add_qual_grad_year FROM doctors docs left join hospitals hosp on docs.place_of_practice = hosp.hospital_id 
            left join specialty spec on docs.specialty = spec.specialty_id WHERE doctor_id = '$doctor_id' AND practicing_licence_status = 'ACTIVE'");
        
        $rowCount = $query->num_rows;
        
        if($rowCount > 0){
            while($row = $query->fetch_assoc()){ 
                echo '
                <img src="public/img/doctors/'.$row['pix'].'" style="width: 210px; height:200px;" alt="Doctor Image"><br><strong>Specialty: </strong> '.$row['specialty'].'<br> <strong>Place Of Practice: </strong> '.$row['hospital'].'<br>
                <strong>MDCN Reg. No: </strong> '.$row['mdcn_reg_no'].'<br><strong>Practicing Licence Status: </strong> '.$row['practicing_licence_status'].'<br><strong>Medical School Grad. Year: </strong> '.$row['med_sch_grad_year'].'<br><strong>Additional Qualifications Grad. Year: </strong> '.$row['add_qual_grad_year'].'<br><br>';
            }
        }else{
            echo '<p>Doctor Info Unavailable</p>';
        }
    }
}

}