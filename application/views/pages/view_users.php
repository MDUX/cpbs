
<section>
    <nav id="left">
        <strong>Operator</strong></br>
        <a href="">View Users list</a></br>
        <a href="">Logout</a>
    </nav>
    <nav id="right">
        <table class="table table-stripped tableborder">
        <?php if(isset($records)){ 
             echo '<tr><th>No:</th><th>FIRST NAME</th><th>LAST NAME</th><th>USERNAME</th><th>ACTION<b class="caret"></b></th></tr>';
         foreach ($records->result() as $row){
             
            echo '<tr><td>'.$row->id.'</td><td>'.$row->fname.'</td><td>'.$row->lname.'</td><td>'.$row->username.'</td><td></td></tr>';
         }
        }?>
            </table>
    </nav>
</section>