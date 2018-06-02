<?= tab_menu($menu, "Cars Brand", null) ?>
<div class="tab-content">
	<div class="tab-pane fade in active" id="cars-data">
		<br>
		<div class="panel panel-info">
			<div class="panel-heading"><b>Transaction form</b></div>
			<div class="panel-body">
				<form action="cars-data-process.php" method="post" class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="brand">Brand Name</label>
							<input type="text" name="brandname" id="brandname" class="form-control" placeholder="">
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="cost">Cost</label>
							<input type="text" name="cost" id="cost" class="form-control" placeholder="">
						</div>
					</div>
					<div class="col-md-12 text-right">
						<button type="submit" class="btn btn-success">SUBMIT</button>
					</div>
				</form>
			</div>
		</div>
		<div class="panel panel-success">
			<div class="panel-heading">DATA</div>
			<div class="panel-body">
				
			<div class="row">
				<div class="col-md-12">
					<table class="table data-table">
									<thead>
										<tr>
											<th>No.</th>
											<th>Name Sample</th>
											<th>Value Sample 1</th>
											<th>Value sample 2</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
										<tr>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</tbody>
								</table>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>