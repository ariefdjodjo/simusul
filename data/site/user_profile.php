<?php
	$load_user_s 	= mysqli_query($db, "SELECT * FROM mst_user a INNER JOIN mst_satker b ON a.id_satker=b.id_satker WHERE a.id_user='$akses_user[id_user]'");
	$user_s 		= mysqli_fetch_array($load_user_s);
?>
<div class="panel panel-primary">
	<div class="panel-heading">
		<h2 class="panel-title"><b>DETAIL DATA USER</b></h2>
	</div>
	<div class="panel-body">
		<table class="table table-bordered">
				<tr>
					<td class="col-sm-3">Nama User</td>
					<td class="col-sm-8"><?php echo "$user_s[nama_user]"; ?></td>
				</tr>
				<tr>
					<td class="col-sm-3">Satuan Kerja</td>
					<td class="col-sm-8"><?php echo "$user_s[nama_satker]"; ?></td>
				</tr>
				<tr>
					<td class="col-sm-3">Username</td>
					<td class="col-sm-8"><?php echo "$user_s[username]"; ?></td>
				</tr>
				<tr>
					<td class="col-sm-3">Type User</td>
					<td class="col-sm-8"><?php echo type("$user_s[type_user]"); ?></td>
				</tr>
		</table>
	</div>
</div>  