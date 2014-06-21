<?php include_once 'userheader.php';?>
<div class="container">
    <div class="col-lg-9 well well-sm">
        <label>Mwlm Nyerere International Airport (JNIA) Parking.</label>
    </div>
    <div class="col-lg-5">
        <table class="table table-condensed table-bordered" id="titye">
            <thead class="alert alert-info"><th>Slot name</th><th>Location</th><th>Category</th><th>Action<b class="fa fa-caret-square-o-down"></b></th></thead>
        <tbody>
            <?php
            if(isset($rec)){
                foreach ($rec->result() as $dat){
                    echo '<tr><td>'.$dat->name_slot.'</td><td>'.$dat->location.'</td><td>'.$dat->category.'</td>'
                            . '<td><button class="btn btn-success btn-sm" onclick="RegisterEdit(\''.$dat->id.'\')"><apan class="fa fa-book"></span> Reserve slot</button></td></tr>';
                }
            }
            ?>
        </tbody>
        </table>
    </div>
    <div class="col-lg-4">
        <div class="book"></div>
    </div>
</div>
<script>
    function RegisterEdit(id){
        var url="<?php echo site_url('verify/zahara');?>";
        var url2=url+'/'+id;
        $.get(url2,function(dada){
            $('.book').html(dada);
        });
    }
</script>
<?php include_once 'footer.php';?>







