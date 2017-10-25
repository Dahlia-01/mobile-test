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
                            <h2><?php echo $unread; ?>&nbsp;Unread Message(s)
                            </h2>
                            </div>
                        <div class="body">
                                   
                            <div class="row clearfix">
                                <div class="col-sm-12">

                              <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
        <tr>
                        <th>Subject</th>
                        <th>Sender</th>
                        <th>Date</th>
          </tr>
        </thead>  
        <tbody>
            <?php foreach ($new_msg as $key => $value) { ?>
        <tr>
          <th><a href="<?php echo URL?>patient_readmail?msg_id=<?php echo urlencode(base64_encode($value['msg_id'])); ?>"><?php echo $value['subject'] ?></a></th>
          <th><?php echo $value['sender'] ?></th>
          <th><?php echo $value['datetime'] ?></th>

          </tr>
          <?php } ?>
        </tbody>
      </table>
       </div>
          </div>
        </div>
        </div>
        </div>
          <div class="card">
                        <div class="header bg-red">
                            <h2> Older Messages
                            </h2>
                            </div>
                        <div class="body">
                                   
                            <div class="row clearfix">
                                <div class="col-sm-12">
                              <div class="table-responsive">
                              <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
        <tr>
                        <th>Subject</th>
                        <th>Sender</th>
                        <th>Date</th>
          </tr>
        </thead>  
        <tbody>
            <?php foreach ($old_msg as $key => $value) { ?>
        <tr>
          <th><a href="<?php echo URL?>patient_readmail?msg_id=<?php echo urlencode(base64_encode($value['msg_id'])); ?>"><?php echo $value['subject'] ?></a></th>
          <th><?php echo $value['sender'] ?></th>
          <th><?php echo $value['datetime'] ?></th>

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