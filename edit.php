<?php
// configuration
include('connect.php');

// new data
$Sno = $_POST['Sno'];
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
$sql = "UPDATE mydb SET phenotype_id=?,num_var=?,beta_shape1=?,true_df=?,variant_id=?,tss_distance=?,maf=?,ref_factor=?,slope=?,group_id=? WHERE Sno=?";
$q = $db->prepare($sql);
$q->execute(array($phenotype_id,$num_var,$beta_shape1,$true_df,$variant_id,$tss_distance,$maf,$ref_factor,$slope,$group_id,$Sno));
header("location: index.php");

?>