 <script data-require="jquery@*" data-semver="2.0.3" src="http://code.jquery.com/jquery-2.0.3.min.js"></script>
      <!-- page title -->
      <section class="page-title">
        <div class="grid-row clearfix">
          <h1>Messages</h1>
          
          <nav class="bread-crumbs">
            <a href="">Messages</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;
            <a href="#">Read mail</a>
          </nav>
        </div>
      </section>
      <!--/ page title -->
      
      <!-- page content -->
      <main class="page-content">
        <div class="grid-row">
          <!-- photo tour -->
          <section id="photo-tour" class="widget photo-tour photo-tour-2">  
            <div class="widget-title">Patient Messages</div>

            <?php foreach ($msg as $key => $value) { ?>
                    <div class="card">
                        <div class="header bg-teal">
                            <h2>
                                From: <?php echo $value['sender'] ?><small style="float: right;"><?php echo $value['datetime'] ?></small>
                            </h2>
                        </div>
                        <div class="body">
                        Subject: <?php echo $value['subject'] ?>
                        <br>
                        <?php echo $value['message'] ?>
                        <br><br><br><a href="<?php echo URL?>patient_mailbox" class="button">Back To Mailbox</a>
                        <form method="POST" action="patient_readmail/mark_as_read">
                        <input type="hidden" name="msg_id" value="<?php echo base64_decode(urldecode($_GET['msg_id'])) ?>">
                        <input type="submit" name="submit" class="button" value="Mark As Read"></form><br><br>
                            </div>
                            </div>
                            <?php } ?>
                       
          </section>
          <!--/ photo tour -->
        </div>
      </main>
      <!--/ page content -->

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