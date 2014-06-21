<div class="panel panel-default">
    <div class="panel-heading"><p>User reserve slot</p></div>
    <div class="panel-body">
        <ul class=" nav nav-tabs nav-justified">
            <li class="<?php if(isset($active)){ echo'active';}?>"><a href="#datz" data-toggle="tab">Book</a></li>
            <li class="<?php if(isset($active1)){ echo'active';}?>"><a href="#pay" data-toggle="tab">Contribute</a></li>
        </ul>
        <div class="tab-content" style="display: block">
            <?php
                $res=$this->db->get_where('location',array('id'=>$id));
                foreach ($res->result() as $row){
                ?>
            <div class="in tab-pane <?php if(isset($active)){ echo 'active';}?>" id="datz">
                <?php echo form_open('verify/userregister/'.$id,array('id'=>'slots'));?>
                <table class="table table-condensed table-striped table-hover">
                    <tr><td>You are: </td><td class=" text-success"><?php echo $this->session->userdata('username');?></td></tr>
                    <tr><td>Amount per day</td><td class=" text-success"><?php echo $row->amount;?></td></tr>
                    <tr><td>Date From:</td><td><?php echo form_error('datefrom','<div class="error">','</div>');?><input type="text" name="datefrom" class="datepicker form-control"></td></tr>
                    <tr><td>Date End</td><td><?php echo form_error('dateend','<div class="error">','</div>');?><input type="text" name="dateend" class="datepicker form-control"></td></tr>
                    <tr><td></td><td><button class="btn btn-success btn-sm" name="save">Register <span class=" fa fa-fast-forward"></span></button></td></tr>
                </table>
                <?php echo form_close();?>
                
            </div>
            <div class="in tab-pane <?php if(isset($active1)){ echo 'active';}?>" id="pay">
                
                <?php echo form_open('verify/addNest/'.$id,array('id'=>'close'));?>
                <?php
                 $result=$this->db->get_where('booking',array('loc_id'=>$id));
                 if($result->num_rows()===1){
                 foreach ($result->result() as $pet){
                ?>
                <table class="table">
                    <tr><td><label>Car plate No:</label><?php echo form_error('carplate','<div class="error">','</div>');?><input type="text" name="carplate" class="form-control" placeholder="STK4567"></td></tr>
                    <tr><td><label>Total Amount</label><span class="badge pull-right "><?php echo $pet->amount;?></span></td></tr>
                    <tr><td><label>Receipt code</label><input type="text" name="codez" class="form-control tdz"><span class="load pull-right"></span><br></td></tr>
                    
                    <tr class="ths"><td><button class="btn btn-success btn-sm" name="save">Reserve slot</button></td></tr>
                </table>
                <div class="room"></div>
                <?php echo form_close();?>
                <?php
                 }
                 }else {
                     echo '<p class="alert alert-warning"><span class="fa fa-warning"></span>You didnt specify the time for your slots </p>';  
                 }
                ?>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<script>
    $('.datepicker').datepicker();
</script>
<script>
    $('#slots').submit(function(e){
        e.preventDefault();
        var formdata=$(this).serializeArray();
        var url=$(this).attr('action');
        formdata.push({"name": "save", "value": ""});
        $.post(url,formdata,function(sms){
            $('.book').html(sms);
        });
    });
    $('#close').submit(function(e){
        e.preventDefault();
        var formdata=$(this).serializeArray();
        var url=$(this).attr('action');
        formdata.push({"name": "save", "value": ""});
        $.post(url,formdata,function(sms){
            $('.book').html(sms);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('.ths').hide();
       $('.tdz').keyup(function(){
           $('.load').html('<img src="<?php echo base_url('images/load.gif');?>">');
           var neno=$(this).val();
           var url="<?php echo site_url('verify/checkajax');?>";
           var url2=url+'/'+neno;
           $.get(url2,function(sms){
               setTimeout(function(){
               $('.load').html(sms);
               },2000);
           });
       }); 
    });
</script>

