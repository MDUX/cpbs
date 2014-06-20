<?php include_once 'header.php';?>
<div class="col-lg-4 col-lg-offset-1" style="padding-top: 10px;">
        <div class="panel-default">
            <div class="panel-heading">
                <label>Create account</label>
            </div>
            <div class="panel-body">
      <?php echo form_open('pages/view',array('class'=>'form-horizontal'));?>
       <div class=" form-group">
       <div class="col-md-4">
      <label for="username">Username</label>
               </div>
               <div class=" col-md-8">
          <?php echo form_error('username');?>
         <input type="text" name="username" placeholder="Mati2" class="form-control">
           </div>
       </div>
     <div class=" form-group">
        <div class="col-md-4">
            <label for="email">Email</label>
        </div>
         <div class=" col-md-8">
    <?php echo form_error('email');?>
    <input type="text" name="email" placeholder="johndoe@gmati2.com"  class="form-control">
         </div>
     </div>
    <div class=" form-group">
        <div class="col-md-4">
          <label for="Phone Number">Phone Number</label>  
        </div>
        <div class=" col-md-8">
    <?php echo form_error('phonenumber');?>
    <input type="text" name="phonenumber" class="form-control">
        </div>
    </div>
    <div class=" form-group">
        <div class="col-md-4">
           <label for="password">Password</label> 
        </div>
        <div class=" col-md-8">
    <font color="red"><?php echo form_error('password');?></font>
    <input type="password" name="password" required="required" class="form-control">
        </div>
    </div>
    <div class=" form-group">
        <div class="col-md-4">
            <label for="verify">Verify Password</label>
        </div>
        <div class=" col-md-8">
       <?php echo form_error('password2');?>
    <input type="password" name="password2" required="required" class="form-control">
        </div>
    </div>
    <input type="submit" value="submit" name="submit" class="field btn btn-primary">
        
      <?php echo form_close();?>
            </div>
        </div>
    </div>


<?php include_once 'footer.php';?>
    
