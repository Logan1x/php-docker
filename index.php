<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
	background: #0ca3d2;
}
table { border-collapse: separate; background-color: #FFFFFF; border-spacing: 0; width: 85%; color: #666666; text-shadow: 0 1px 0 #FFFFFF; border: 1px solid #CCCCCC; box-shadow: 0; margin: 0 auto;font-family: arial; }
table thead tr th { background: none repeat scroll 0 0 #EEEEEE; color: #222222; padding: 10px 14px; text-align: centre; border-top: 0 none; font-size: 12px;}
table tbody tr td{
    background-color: #FFFFFF;
	font-size: 12px;
    text-align: left;
	padding: 10px 14px;
	border-top: 1px solid #DDDDDD;
}

#log {
	width: 85%;
	color: #FFFFFF;
	text-align: right;
	margin: 20px auto;
	font-family: arial;
}
#log a {
	color: #FFFFFF;
	text-decoration: none;
	font-family: arial;
}
#formdesign {
	background: linear-gradient(to bottom, #FFFFFF 0%, #F6F6F6 100%) repeat scroll 0 0 rgba(0, 0, 0, 0);
    border: 1px solid #D5D5D5;
    padding: 12px;
    position: relative;
	margin: 20px auto;
	width: 83%;
	clear: both;
	height: 34px;
}
#filter {
	-moz-box-sizing: border-box;
    background: url("img/big_search.png") no-repeat scroll 10px 10px #FFFFFF;
    box-shadow: none;
    display: block;
    font-size: 12px;
    height: 34px;
    padding: 9px 140px 9px 28px;display: block;
    font-size: 12px;
    height: 34px;
    padding: 9px 140px 9px 28px;
    width: 85%;
	border: 1px solid #DADADA;
    transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
	padding-top: 6px;
	float: left;
}

#filter2{
	-moz-box-sizing: border-box;
	background: url("img/big_search.png") no-repeat scroll 10px 10px #FFFFFF;
    box-shadow: none;
    display: block;
    font-size: 12px;
    height: 34px;
    padding: 9px 140px 9px 28px;display: block;
    font-size: 12px;
    height: 34px;
    padding: 9px 140px 9px 28px;
    width: 70%;
	border: 1px solid #DADADA;
    transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
	padding-top: 6px;
	float: left;
}


#add {
	float: right;
	width: 4.5%;
	display: block;
    font-size: 12px;
    height: 14px;
    padding: 9px 28px 9px 28px;
	border: 1px solid #DADADA;
}
a#add {
	text-decoration: none;
	color: #666666;
	font-family: arial;
	font-size: 12px;
}
.pagination a
{
	color:black;
	float:left;
	padding:8px 16px;
	text-decoration:none;
	transition:background-color .3s
}

.pagination a.active{
	background-color:#000000;
	color:#fff;
}
.pagination a:hover:not(.active){
	background-color:#ddd;
}
.pagination{
	text-align: center;
	margin-top:20px;
	margin-left: 550px;
}
</style>
<script src="argiepolicarpio.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<!--sa poip up-->
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
   <script src="lib/jquery.js" type="text/javascript"></script>
  <script src="src/facebox.js" type="text/javascript"></script>
  <script type="text/javascript">
    jQuery(document).ready(function($) {
      $('a[rel*=facebox]').facebox({
        loadingImage : 'src/loading.gif',
        closeImage   : 'src/closelabel.png'
      })
    })
  </script>
<div id="log">
GTEx Portal
</div>
<div id="formdesign">
<input type="text" name="filter" value="" id="filter" placeholder="Search Protein..." autocomplete="off" />
<a rel="facebox" href="add.php" id="add">Add New</a>
</div>
<table cellspacing="0" cellpadding="2" id="resultTable">
<thead>
	<tr>
		<th>Sno</th>
		<th>Phenotype</th>
		<th>Num Var</th>
		<th>Beta Shape1</th>
		<th>True DF</th>
		<th>Variant Id</th>
		<th>Tss Distance</th>
		<th>Maf</th>
		<th>Ref Factor</th>
		<th>Slope</th>
		<th>Group Id</th>
		<th>Action</th>
	</tr>
</thead>
<tbody>
	<?php
	if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;
		include('connect.php');		
		
		$total_pages_sql = $db->prepare("SELECT COUNT(*) FROM mydb");
        $total_pages_sql->execute();
        $total_rows = $total_pages_sql->fetch();
        $total_pages = ceil($total_rows['COUNT(*)'] / $no_of_records_per_page);		
		$result = $db->prepare("SELECT * FROM mydb LIMIT $offset, $no_of_records_per_page");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td><?php echo $row['Sno']; ?></td>
		<td><?php echo $row['phenotype_id']; ?></td>
		<td><?php echo $row['num_var']; ?></td>
		<td><?php echo $row['beta_shape1']; ?></td>
		<td><?php echo $row['true_df']; ?></td>
		<td><?php echo $row['variant_id']; ?></td>
		<td><?php echo $row['tss_distance']; ?></td>
		<td><?php echo $row['maf']; ?></td>
		<td><?php echo $row['ref_factor']; ?></td>
		<td><?php echo $row['slope']; ?></td>
		<td><?php echo $row['group_id']; ?></td>
		<td><a rel="facebox" href="editform.php?Sno=<?php echo $row['Sno']; ?>" title="Click To Edit"> Edit </a> | <a href="#" id="<?php echo $row['Sno']; ?>" class="delbutton" title="Click To Delete">Delete</a></td>
	</tr>
	<?php
		}
	?>
</tbody>
</table>
<div class="pagination">
<?php
for($i = 1;$i<=$total_pages;$i++){
	if($i == $pageno)
	echo '<a class="active">'.$i.'</a>';
	else
	echo '<a href="/recordmanagement/main/index.php?pageno='.$i.'">'.$i.'</a>';
}
?>
</div>

<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this update? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "delete.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>