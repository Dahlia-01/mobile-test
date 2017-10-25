 <section class="content">
        <div class="container-fluid">
            <!-- Body Copy -->
            <div class="row clearfix">
          
                <?php foreach ($hospital_card as $key => $value) { ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                        <div class="header bg-red">
                            <h2>
                            <a href="<?php echo URL?>patient_hospital_cards" class = "btn btn-info pull-right">BACK</a>
                               Hospital Card No. KC<?php echo date('Ym'); ?>0<?php echo $value['card_id'] ?></h2>
          </div>
                        <div class="body">
                         
                        PATIENT ID: <?php echo $value['patient_id'] ?> <br>
                                       
                        FULLNAME: <?php echo $value['fullname'] ?> <br>
                         
                        HOME ADDRESS: <?php echo $value['home_address'] ?> <br>
                         
                        BUSINESS ADDRESS: <?php echo $value['business_address'] ?> <br>
                         
                        DATE OF BIRTH: <?php echo $value['dob'] ?> <br>
                         
                        AGE: <?php echo $value['age'] ?> <br>
                         
                        GENDER: <?php echo $value['gender'] ?> <br>
                         
                        TRIBE: <?php echo $value['tribe'] ?> <br>
                         
                        STATE OF ORIGIN: <?php echo $value['state_of_origin'] ?> <br>
                         
                        OCCUPATION: <?php echo $value['occupation'] ?> <br>
                         
                        MARITAL STATUS: <?php echo $value['marital_status'] ?> <br>
                         
                        RELIGION: <?php echo $value['religion'] ?> <br>
                         
                        PHONE NUMBER: <?php echo $value['phone'] ?> <br>
                         
                        EMAIL ADDRESS: <?php echo $value['email'] ?> <br>
                         
                       NEXT OF KIN (NOK) NAME: <?php echo $value['nok'] ?> <br>
                        
                       NOK PHONE NUMBER: <?php echo $value['nok_phone'] ?> <br>
                        
                       NOK RELATIONSHIP: <?php echo $value['nok_relationship'] ?> <br>
                        
                        NOK ADDRESS: <?php echo $value['nok_address'] ?> <br>
                         
                       ACTIVATED: <?php echo $value['activated'] ?> <br><br>
                
            </div>
                       
          </div>
        </div>
                            <?php } ?>
    </div>
  </div>
</section>
   
<!--end-main-container-part-->
