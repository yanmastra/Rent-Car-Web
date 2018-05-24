<?= tab_menu($menu, "Cars Data", null) ?>
<div class="tab-content">
	<div class="tab-pane fade in active" id="cars-data">
		<br>
		<div class="panel panel-info">
			<div class="panel-heading"><b>Transaction form</b></div>
			<div class="panel-body">
				<form action="cars-data-process.php" method="post" class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="plat">Plat Number</label>
							<input type="text" name="plat" id="plat" class="form-control" placeholder="XX-1234-XYZ">
						</div>
						<div class="form-group">
							<label for="year">Year</label>
							<select name="year" id="year" class="form-control">
								<?php
								for ($i=2008; $i < 2018 ; $i++) {
									echo "<option value=\"$i\">$i</option>";
								 } 
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="car-brand">Car Brand</label>
							<select name="brand" id="brand" class="form-control">
								<?php
								$res = selectFrom("tb_cars_brand", null);

								while($row = mysqli_fetch_object($res)) {
									echo "<option value=\"".$row->_ID."\">".$row->BrandName."</option>";
								 } 
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="color">Total Cost</label>
							<select name="color" id="color" class="form-control">
								<option value="Black">Black</option>
								<option value="White">White</option>
								<option value="Silver">Silver</option>
								<option value="Red">Red</option>
							</select>
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