 <section class="content">
        <div class="container-fluid">
            <!-- Body Copy -->
            <?php if (isset($_GET['msg'])) {
    echo '<div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'.base64_decode(urldecode($_GET['msg'])).'</div>';
} ?>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-red">
                            <a href="#" data-toggle="modal" data-target="#create" class="btn btn-info pull-right">CREATE</a>
                            <h2>Hospital Cards
                            </h2>
                            </div>
                        <div class="body">
                                   
                            <div class="row clearfix">
                                <div class="col-sm-12">

                              <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
        <tr>
                        <th>Card ID</th>
                        <th>Hospital</th>
                        <th>Fullname</th>
                        <th>Date</th>
          </tr>
        </thead>  
        <tbody>
            <?php foreach ($hospital_cards as $key => $value) { ?>
        <tr>
          <th><a href="<?php echo URL?>card_details?card_id=<?php echo urlencode(base64_encode($value['card_id'])); ?>">KC<?= date('Ym') ?>0<?php echo $value['card_id'] ?></a></th>
          <th><?php echo $value['hospital'] ?></th>
          <th><?php echo $value['fullname'] ?></th>
          <th><?php echo DATE($value['datetime']) ?></th>

          </tr>
          <?php } ?>
        </tbody>
      </table>
       </div>
          </div>
        </div>
        </div>
        </div>
  </div>
</div>
</div>
</section>
<div class="modal fade" id="create" role = "dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
<div class="modal-header">
<h3 class="modal-title" style="color: #e25041;" align="center">CREATE HOSPITAL CARD</h3>
</div>
<div class="modal-body">
 <form action="patient_hospital_cards/create_new_card" method="POST">
                                             <div class="row clearfix">
                                                <div class="col-sm-12">
                                                <div class="input-group">
                                            <label>Select Hospital:</label>
                                           <select  class="form-control show-tick" data-live-search="true" name="hospital_id" required>
        <option value="">Select Hospital</option>
            <?php foreach ($hospital as $key => $value) { ?>
                            <option value="<?php echo $value['hospital_id'] ?>"><?php echo $value['hospital'] ?></option>
                            <?php } ?>
                        </select>
                                        </div>

                                        
                                <div class="form-group">
                                    <div class="form-line">
                  <input type="text" class="form-control" name="business_address">
                                        <label class="form-label">Business Address</label>
                                    </div>                  
                                        </div>
                                    
                                        <div class="input-group">
                                            <label>Date Of Birth:</label>
                            <div class="demo-masked-input">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input type="text" id="dob" name="dob" class="form-control date" placeholder="Ex: 30/07/2016">
                                            </div>
                                        </div>
                                        </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Age:</label>
                                          <input type="text" readonly name="age" id="age" class="form-control">
                                        </div>
                                                          
                                     <div class="input-group">
                                            <label>State Of Origin:</label>
      <select type="text" class="form-control" name="state_of_origin" required>
          <?php foreach ($state as $key => $value) { ?>
                            <option value="<?php echo $value['state'] ?>"><?php echo $value['state'] ?></option>
                            <?php } ?>
                                         </select>
                                        </div>
                                        
                                <div class="form-group">
                                    <div class="form-line">
                  <input type="text" class="form-control" name="tribe">
                                        <label class="form-label">Tribe</label>
                                    </div>          
                                        </div>
                                   
                                <div class="form-group">
                                    <div class="form-line">
      <input type="text" class="form-control" name="nok" required>
                                        <label class="form-label">Next Of Kin (NOK)</label>
                                    </div>          
                                        </div>
                                        
                                <div class="form-group">
                                    <div class="form-line">
                  <input type="text" class="form-control" name="nok_phone" required>
                                        <label class="form-label">NOK Phone</label>
                                    </div>          
                                        </div>
                                   
                                     <div class="input-group">
                                            <label>Relationship With Next Of Kin:</label>
      <select class="form-control show-tick" name="nok_relationship" required>
          <option selected>...</option>
          <option value="Brother">Brother</option>
          <option value="Father">Father</option>
          <option value="Mother">Mother</option>
          <option value="Sister">Sister</option>
          <option value="Other">Other</option>
                                         </select>
                                        </div>
                                        
                                <div class="form-group">
                                    <div class="form-line">
                  <input type="text" class="form-control" name="nok_address" required>
                                        <label class="form-label">NOK Address</label>
                                    </div>                            
                                        </div>
                                            <input type="submit" class="btn btn-danger" name="submit" value="Submit"><br>
                                   <p><font color="red">Please note that it takes a minimum of 24 hours for hospital cards to be activated. Thank you</font></p>
                                   </div>
                                    </div>
                            </form>       
</div>
<div class="modal-footer">
   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<script src="public/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
$( document ).ready(function() {
    $('#dob').on('change',function(){
       var date1 = new Date();
    var dob = $(this).val();
    var date2 = new Date(dob);
    var pattern = /^\d{1,2}\/\d{1,2}\/\d{4}$/;
    //Regex to validate date format (dd/mm/yyyy)
        var y1 = date1.getFullYear();
        //getting current year            
        var y2 = date2.getFullYear();
        //getting dob year            
        var age = y1 - y2;
        //calculating age                       
        document.getElementById("age").value = age;
});

$(function () {

     //Masked Input ============================================================================================================================
    var $demoMaskedInput = $('.demo-masked-input');

    //Date
    $demoMaskedInput.find('.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
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