<?php include_once 'operatorheader.php';?>
<div class="container">
	<div class="col-lg-9">
  <div class="breadcrumb">
      <a href="<?php echo site_url('verify_operator/manage');?>" class="btn btn-info btn-xs"><span class=" fa fa-plus-circle"></span> Add slots</a>
      <a href="<?php echo site_url('verify_operator/manageparking');?>" class="btn btn-info btn-xs"><span class="fa fa-cog"></span> Manage parking</a>
      <a href="" class="btn btn-info btn-xs"><span class="fa fa-refresh"></span> View slots available</a>
  </div>
</div>
    <div class="col-lg-5">
        <?php
        if(isset($delete)){
            echo ''.$delete;
        }
        ?>
        <table class="table table-condensed table-striped alert alert-success table-bordered" id="location">
            <thead>
                <tr><th>Slot name</th><th>Location</th><th class="text-center">Action<b class="fa fa-caret-down"></b></tr>
            </thead> 
            <tbody>
                <?php
                if(isset($num)){
                    foreach ($num->result() as $row){
                        echo '<tr><td>'.$row->name_slot.'</td><td>'.$row->location.'</td>'
                                . '<td><button class="btn btn-success btn-xs" onclick="EditSlot(\''.$row->id.'\')"><span class="fa fa-edit"></span> Update</button>'
                                .anchor('verify_operator/deleteslot/'.$row->id,'<button class="btn btn-danger btn-xs pull-right"><span class="fa fa-trash-o"></span> Delete</button>',array('onclick'=>"return confirm('Are you sure you want to delete this slot .?')")).'</td></tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-lg-3">
        <div class="zig">
        </div>
    </div>
</div>
<script>
    function EditSlot(id){
        var url="<?php echo site_url('verify_operator/Editparking');?>";
        var url2=url+'/'+id;
        $.get(url2,function(data){
          $('.zig').html(data);  
        });
    }
</script>
<?php include_once 'footer.php';?>