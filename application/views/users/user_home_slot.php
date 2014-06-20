<?php include_once 'userheader.php';?>
<div class="container">
    <div class="col-lg-9 well well-sm">
        <label>Mwlm NyMerere International Airport (JNIA) Parking.</label>
    </div>
    <div class="col-lg-6 col-lg-offset-2">
        <p>Enter your car plate no in the field below to reserve slot.In the second field below choose whether you book
           for today or tomorrow.</p>
        <?php echo form_open("verify/user_add");?>
        <div class="form-group">
            <div class="col-md-8">
             <?php
                //echo form_label("Plate no:");
                $data=array(
                "name"=>"plateno",
                "id"=>"email",
                "placeholder"=>"STJ1234",
                "value"=>"",
                "class"=>"form-control");
                echo form_input($data).br(1); 
             ?>
            </div>
             </div>
            <div class="form-group">
            <div class="col-md-8">
                <select name="myselect" class="form-control">
                <option value="Today" <?php echo set_select('myselect', 'Today', TRUE); ?> >Today</option>
                <option value="Tomorrow" <?php echo set_select('myselect', 'tomorrow'); ?> >Tomorrow</option>
                </select>
            </div>
            </div>
        <div class="col-md-8" style="padding-top: 20px;">
          <div><input type="submit" name="book" value="BOOK" class="btn btn-primary"></div>
             <?php echo form_close(); ?>
                <?php echo'<font color="red">' .validation_errors().'</font>'?>
                   <div style="padding-top:20px;">
                <?php if(!empty($success)){ echo $success;}?>
                  </div>
           </div>
        
    </div>
        
    </div>
</div>
<?php include_once 'footer.php';?>







