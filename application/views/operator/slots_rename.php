<?php 
$res=$this->db->get_where('location',array('id'=>$data));
foreach ($res->result() as $row){
?>
<?php echo form_open('verify_operator/slot_edit/'.$data,array('class'=>'slots'));?>
<table class="table table-condensed alert alert-info">
    <tr><td><label>Name of slot</label><?php echo form_error('nsl','<div class="error">','</div>');?><input type="text" name="nsl" class="form-control pull-right" value="<?php echo $row->name_slot;?>"></td></tr>
        <tr><td><label>Slot category</label><?php echo form_error('slotc','<div class="error">','</div>');?><select class="form-control pull-right" name="slotc">
                    <option><?php echo $row->category;?></option>
                    <option>Normal</option>
                    <option>VIP</option>
                    <option>Manager</option>
                </select></td></tr>
        <tr class="kiasi"><td><label>Amount</label><?php echo form_error('amnt','<div class="error">','</div>');?><input type="text" name="amnt" class="form-control pull-right" value="<?php echo $row->amount;?>"></td></tr>
        <tr><td><label>Slot location</label><?php echo form_error('slocation','<div class="error">','</div>');?><select class="form-control pull-right" name="slocation">
                    <option><?php echo $row->location;?></option>
                    <option>Terminal one</option>
                    <option>Terminal two</option>
                    <option>Terminal three</option>
                </select></td></tr>
        <tr><td><input type="submit" class="btn btn-success btn-sm pull-right" value="update slot" name="save"></td></tr>
        </table>
        <?php echo form_close();?>
<?php
}
?>
<script>
    $('.slots').submit(function(e){
        e.preventDefault();
        var formdata=$(this).serializeArray();
        var url=$(this).attr('action');
        formdata.push({"name": "save", "value": ""});
        $.post(url,formdata,function(sms){
            $('.zig').html(sms);
        });
    });
</script>
     



