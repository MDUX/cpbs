<?php include_once 'operatorheader.php';?>
<div class="container">
	<div class="col-lg-9">
  <div class="breadcrumb">
      <a href="" class="btn btn-info btn-xs"><span class=" fa fa-plus-circle"></span> Add slots</a>
      <a href="<?php echo site_url('verify_operator/manageparking');?>" class="btn btn-info btn-xs"><span class="fa fa-cog"></span> Manage parking</a>
      <a href="" class="btn btn-info btn-xs"><span class="fa fa-refresh"></span> View slots available</a>
  </div>
</div>
    <div class="col-lg-4">
        <label class=" text-info">Add slots</label>
        <table class="table table-striped">
          <tr><td>Mwl Nyerere International Airport:  <button class="btn btn-success btn-xs" onclick="addSlots()">
                      <span class="fa fa-plus"></span> Add slot</button></td></tr>
        </table>
    </div>
    <div class="col-lg-4">
        <div class="load">
            
        </div>
    </div>
</div>
<script>
    function addSlots(){
       var url="<?php echo site_url('verify_operator/slotAdd');?>";
       $.get(url,function(data){
           $('.load').html(data);
       });
    }
</script>
<?php include_once 'footer.php';?>