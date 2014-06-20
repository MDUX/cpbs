<?php include_once 'adminheader.php';?>
<div class="container">
    <div class="col-lg-6 col-lg-offset-1" style="padding-top: 40px;">
      <div class="panel panel-default">
        <div class="panel-heading">Create Operator's account</div>
        <div class="panel-body">
        <?php echo form_open('admin_verify_operator',array('class'=>'form-horizontal'));?>
        <div class=" form-group">
       <div class="col-md-4">
      <label for="username">Username</label>
               </div>
               <div class=" col-md-8">
          <?php echo form_error('username','<div class="error">','</div>');?>
         <input type="text" name="username" placeholder="Mati2" class="form-control">
           </div>
       </div>
     <div class=" form-group">
        <div class="col-md-4">
            <label for="email">Email</label>
        </div>
         <div class=" col-md-8">
    <?php echo form_error('email','<div class="error">','</div>');?>
    <input type="text" name="email" placeholder="johndoe@gmati2.com"  class="form-control">
         </div>
     </div>
    <div class=" form-group">
        <div class="col-md-4">
          <label for="Phone Number">Phone Number</label>  
        </div>
        <div class=" col-md-8">
    <?php echo form_error('phonenumber','<div class="error">','</div>');?>
    <input type="text" name="phonenumber" class="form-control">
        </div>
    </div>
    <div class=" form-group">
        <div class="col-md-4">
           <label for="password">Password</label> 
        </div>
        <div class=" col-md-8">
    <font color="red"><?php echo form_error('password','<div class="error">','</div>');?></font>
    <input type="password" name="password" required="required" class="form-control">
        </div>
    </div>
    <div class=" form-group">
        <div class="col-md-4">
            <label for="verify">Verify Password</label>
        </div>
        <div class=" col-md-8">
       <?php echo form_error('password2','<div class="error">','</div>');?>
    <input type="password" name="password2" required="required" class="form-control">
        </div>
    </div>

    <div class="form-group">
      <div class="col-md-4">
            <label for="verify">Add status</label>
        </div>
         <div class="col-md-8">
        <?php echo form_error('password2','<div class="error">','</div>');?>
        <select type="text" name="myselect" class="form-control" required="required">
       <option value="" <?php echo set_select('myselect', '',TRUE); ?> ></option>
       <option value="Operator" <?php echo set_select('myselect', 'operator',FALSE); ?> >Operator</option>
       </select>
  
        </div>
    </div>

       <input type="submit" value="submit" name="submit" class="btn btn-primary pull-right">
       <?php echo form_close();?>
     </div>
      <div style="padding-top:5px;">
                <?php if(!empty($sms)){ echo $sms;}?>
                  </div>
     </div>
    </div>
</div>
<?php include_once 'footer.php';?>
