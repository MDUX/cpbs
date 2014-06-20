<div class="form">
    <?php
       if(isset($sms)){
           echo ''.$sms;
       }
    ?>
     <?php echo form_open('verify_operator/slot_insert',array('class'=>'slots'));?>
    <table class="table table-bordered table-striped">
        <tr><td><label>Name of slot</label><?php echo form_error('nsl','<div class="error">','</div>');?><input type="text" name="nsl" class="form-control pull-right"></td></tr>
        <tr><td><label>Slot category</label><?php echo form_error('slotc','<div class="error">','</div>');?><select class="form-control pull-right" name="slotc">
                    <option class="empty"></option>
                    <option class="normal">Normal</option>
                    <option class="vip">VIP</option>
                    <option class="mang">Manager</option>
                </select></td></tr>
        <tr class="kiasi"><td><label>Amount</label><?php echo form_error('amnt','<div class="error">','</div>');?><input type="text" name="amnt" class="form-control pull-right"></td></tr>
        <tr><td><label>Slot location</label><?php echo form_error('slocation','<div class="error">','</div>');?><select class="form-control pull-right" name="slocation">
                    <option></option>
                    <option>Terminal one</option>
                    <option>Terminal two</option>
                    <option>Terminal three</option>
                </select></td></tr>
        <tr><td><input type="submit" class="btn btn-success btn-sm pull-right" value="add slot" name="save"></td></tr>
        </table>
        <?php echo form_close();?>
    
</div>
<script>
    $(document).ready(function(){
        $('.kiasi').hide();
        $('.normal').click(function(){
            $('.kiasi').show();
        });
        $('.vip').click(function(){
            $('.kiasi').show();
        });
        $('.mang').click(function(){
            $('.kiasi').show();
        });
        $('.empty').click(function(){
            $('.kiasi').hide();
        });
    });
</script>
<script>
    $('.slots').submit(function(e){
        e.preventDefault();
        var formdata=$(this).serializeArray();
        var url=$(this).attr('action');
        formdata.push({"name": "save", "value": ""});
        $.post(url,formdata,function(sms){
            $('.load').html(sms);
        });
    });
</script>

