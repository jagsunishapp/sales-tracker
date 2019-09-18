<div class="chat-wrapper">
    <div class="chat-sidebar">
        <div class="chat-sidebar-header">
          <a href="#" data-toggle="dropdown" class="dropdown-link">
            <div class="d-flex align-items-center">
              <span class="tx-color-01 tx-semibold">All People</span>
            </div>
          </a>
        </div><!-- chat-sidebar-header -->

        <!-- start sidebar body -->
        <div class="chat-sidebar-body" style="overflow: scroll;overflow-x: hidden;">

            <div class="flex-fill pd-y-20 pd-x-10 bd-t">
            <p class="tx-10 tx-uppercase tx-medium tx-color-03 tx-sans tx-spacing-1 pd-l-10 mg-b-10">Direct Messages</p>
            <div id="chatDirectMsg" class="chat-msg-list">
            <?php
            foreach ($users_for_msg as $us) {
                if($us['punch_in_date'])
                {
                  $data = array(
                  'emp_code'=>$us['emp_code'],
                  'punch_in_date'=>$us['punch_in_date']
                  );
                  $this->db->where($data);
                  $query = $this->db->get('attendance');
                  $data = $query->result_array();
                  foreach($data as $d)
                  {
                  }
                  if($d['punch_out_date'])
                  {
                    $st = "";
                  }
                  else
                  {
                    $st = "avatar-online";
                  }
                }
                else
                {
                  $st = "";
                }
              ?>
              <a href="#" class="media receiver" id="<?=$us['emp_code']?>" data-id="<?=$st?>">
              <div class="avatar avatar-sm <?=$st?>"><img src="<?=base_url()?>/img/<?=$us['photo']?>" class="rounded-circle" alt="<?=$st?>"></div> <!--class : avatar-online-->
              <div class="media-body mg-l-10">
              <h6 class="mg-b-0"><?=$us['first_name']." ".$us['last_name']?></h6>
              <!-- <small class="d-block tx-color-04">1 hour ago</small> -->
              </div><!-- media-body -->
              <!-- <span class="badge badge-danger">3</span> -->
              </a><!-- media -->
              <?php
            }
            ?>
            </div><!-- media-list -->
            </div>
            </div><!-- chat-sidebar-body -->
    
    </div><!-- chat-sidebar -->

      <div class="chat-content">
   
        <div class="chat-content-body" style="overflow: scroll;overflow-x: hidden;bottom: 0px;">
          <div class="chat-group chats" style="min-height:90%;">


          </div>
        </div><!-- chat-content-body -->
        
        <div class="col-md-12" style="position: absolute;bottom: 0px;">
          <div class="row">
            <!-- message box -->
            <form method="post" style="width:100%;" id="msg_form">

            <div style="width:90%;float: left;">
              <input type="hidden" value="" id="emp_code">
              <input type="hidden" value="" id="sta">
                  <textarea type="text" class="form-control align-self-center bd-0" id="msg" >text your</textarea>
            </div>
            <div style="width:10%;float: left;">
                <button type="submit" class="btn btn-info" style="width: 83%;
    height: 57px;"> <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
            </div>

          </form>
          <!-- message box end -->
          </div>

        </div>
        

      </div><!-- chat-content -->

    </div><!-- chat-wrapper -->

    <script src="<?=base_url()?>lib/jquery/jquery.min.js"></script>
    <script>
      $(function(){
        'use strict'

        if(window.matchMedia('(min-width: 768px)').matches) {
          $('body').addClass('show-sidebar-right');
          $('#showMemberList').addClass('active');
        }
      })
    </script>
  </body>

</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('#msg_form').on('submit',function(e){
      e.preventDefault();
      var msg = $('#msg').val();
      var receiver = $('#emp_code').val();
      $.ajax({
        url:'<?=base_url('sales_tracker/send_messages')?>',
        type:'post',
        dataType:'html',
        data:{msg:msg,receiver:receiver},
        success: function(data)
        {
          $('#msg').val('');
        }
      });
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('.receiver').click(function(){
      var emp_code = $(this).attr('id');
      var sta = $(this).attr('data-id');
      $('#emp_code').val(emp_code);
      $('#sta').val(sta);
      $.ajax({
        url:'<?=base_url('sales_tracker/fetch_messages')?>',
        type:'post',
        dataType:'html',
        data:{emp_code:emp_code,sta:sta},
        success:function(data)
        {
          // console.log(data);
          $('.chats').html(data);
        }
      });
    });
  });
</script>

<script type="text/javascript">
    setInterval(function(){
    var emp_code = $('#emp_code').val();
    var sta = $('#sta').val();
    $.ajax({
        url:'<?=base_url('sales_tracker/fetch_messages')?>',
        type:'post',
        dataType:'html',
        data:{emp_code:emp_code,sta:sta},
        success:function(data)
        {
          // console.log(data);
          $('.chats').html(data);
        }
      });
    },1000); 
</script>