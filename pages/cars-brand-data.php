<?= tab_menu($menu, "Cars Brand", null) ?>
<div class="tab-content">
	<div class="tab-pane fade in active" id="cars-data">
		<br>
		<div class="panel panel-info">
			<div class="panel-heading"><b>Transaction form</b></div>
			<div class="panel-body">
				<form action="<?=setLink("cars-brand-process").appendLink("oldPage", $_GET['page']) ?>"method="post" class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="brandname">Brand Name</label>
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
					<?php 
						$Cars = selectFrom("tb_cars_brand");

					?>
					<table class="table data-table">
									<thead>
										<tr>
											<th>ID</th>
											<th>Brand Name</th>
											<th>Cost</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($row = mysqli_fetch_object($Cars)){
											echo "
										<tr>
											<td>".$row->_ID."</td>
											<td>".$row->BrandName."</td>
											<td>".$row->Cost."</td>
											<td><button type=\"button\" class=\"btn btn-warning\">EDIT</button></td>
											<td><button type=\"button\" class=\"btn btn-danger\">DELETE</button></td>
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
</div>