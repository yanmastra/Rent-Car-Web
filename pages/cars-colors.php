<?= tab_menu($menu, "Cars Colors", null) ?>
<?php
if (isset($_GET['id']) && isset($_GET['mode']) && $_GET['mode'] == "edit") {
	$res = selectFrom("tb_color", null, "_ID = '".$_GET['id']."'");
	$row = mysqli_fetch_assoc($res);
	$link = setLink("cars-colors-process")
		.appendLink("id", $_GET['id'])
		.appendLink("mode", $_GET['mode'])
		.appendLink("oldPage", $_GET['page']);
		//saat setelah tombol edit di klik
}else{
	$row = array(
		"Name" => "",
		"MaintCost" => ""
	);
	$link = setLink("cars-colors-process").appendLink("oldPage", $_GET['page']);
	//saat setelah loading normal
}
?>
<div class="tab-content">
	<div class="tab-pane fade in active" id="cars-data">
		<br>
		<div class="panel panel-info">
			<div class="panel-heading"><b>Cars Colors </b></div>
			<div class="panel-body">
				<form action="<?=$link ?>" method="post" class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label for="name">Name Colors</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Black etc" value="<?=$row['Name'] ?>">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="maincost">Maint Cost</label>
							<input type="text" name="maincost" id="maincost" class="form-control" placeholder="1000000" value="<?= $row['MaintCost'] ?>">
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="submit">OK</label>
							<button type="submit" id="submit" class="btn btn-success form-control">SUBMIT</button>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="panel panel-success">
			<div class="panel-heading">Data Colors</div>
			<div class="panel-body">
				
			<div class="row">
				<div class="col-md-12">
					<table class="table data-table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Color</th>
											<th>Maint Cost</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<?php
										$colCars = selectFrom("tb_color"); //memilih data dari tabel database, dengan nilai kembalian berupa mysqli result 
										while ($row = mysqli_fetch_object($colCars)){ //fetch_object : mengubah setiap row dari result menjadi sebuah object
											$edit_link = setLink($_GET['page'])
												.appendLink("mode","edit")
												.appendLink("id", $row->_ID);
											$delete_link = setLink('cars-colors-process')
												.appendLink("mode","delete")
												.appendLink("id", $row->_ID)
												.appendLink("oldPage", $_GET['page']);
											echo "
										<tr>
											<td>".$row->_ID."</td>
											<td>".$row->Name."</td>
											<td>".$row->MaintCost."</td>
											<td><a href=\"$edit_link\" class=\"btn btn-warning btn-xs\">EDIT</a></td>
											<td><button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"onDelete('$delete_link')\">DELETE</button></td>
										</tr>";
										} 
										?>
									</tbody>
								</table>
				</div>
			</div>
			</div>
		</div>
</div>
<script type="text/javascript">
	function onDelete(link){
		var conf = confirm("Are you sure you want to delete this item?");
		if (conf) {
			window.location = link;
		}
	}
</script>