
<?php
include('connect.php');	
$phenotype_id = $_POST['phenotype_id'];
$num_var = $_POST['num_var'];
$beta_shape1 = $_POST['beta_shape1'];
$true_df = $_POST['true_df'];
$variant_id = $_POST['variant_id'];
$tss_distance = $_POST['tss_distance'];
$maf = $_POST['maf'];
$ref_factor = $_POST['ref_factor'];
$slope = $_POST['slope'];
$group_id = $_POST['group_id'];
// query
$sql = "INSERT INTO mydb VALUES (:sno,:sas,:asas,:asafs,:offff,:statttt,:dot,:mf,:rd,:ft,:gd)";
$q = $db->prepare($sql);
$q->execute(array(':sno'=>'',':sas'=>$phenotype_id,':asas'=>$num_var,':asafs'=>$beta_shape1,':offff'=>$true_df,':statttt'=>$variant_id,':dot'=>$tss_distance,':mf'=>$maf,':rd'=>$ref_factor,':ft'=>$slope,':gd'=>$group_id));
header("location: index.php");
?>