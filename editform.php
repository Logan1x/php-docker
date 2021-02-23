<?php
	include('connect.php');
	$Sno=$_GET['Sno'];
	$result = $db->prepare("SELECT * FROM mydb WHERE Sno= :sn");
	$result->bindParam(':sn', $Sno);
	$result->execute();
	for($i=0; $rows = $result->fetch(); $i++){
?>
<form action="edit.php" method="POST">
<input type="hidden" name="Sno" value="<?php echo $Sno; ?>" />
Phenotype Id: <input type="text" name="phenotype_id" value="<?php echo $rows['phenotype_id']; ?>" /><br><br>
Number Var: <input type="text" name="num_var" value="<?php echo $rows['num_var']; ?>" /><br><br>
Beta Shape1: <input type="text" name="beta_shape1" value="<?php echo $rows['beta_shape1']; ?>" /><br><br>
True DF: <input type="text" name="true_df" value="<?php echo $rows['true_df']; ?>" /><br><br>
Variant Id: <input type="text" name="variant_id" value="<?php echo $rows['variant_id']; ?>" /><br><br>
TSS Distance: <input type="text" name="tss_distance" value="<?php echo $rows['tss_distance']; ?>" /><br><br>
MAF: <input type="text" name="maf" value="<?php echo $rows['maf']; ?>" /><br><br>
REF Factor: <input type="text" name="ref_factor" value="<?php echo $rows['ref_factor']; ?>" /><br><br>
slope: <input type="text" name="slope" value="<?php echo $rows['slope']; ?>" /><br><br>
Group Id: <input type="text" name="group_id" value="<?php echo $rows['group_id']; ?>" /><br><br>
<input type="submit" value="Update" />
</form>
<?php
	}
?>