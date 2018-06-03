<?= tab_menu($menu, "Cars Colors", null) ?>
<div class="tab-content">
	<div class="tab-pane fade in active" id="cars-data">
		<br>
		<div class="panel panel-info">
			<div class="panel-heading"><b>Cars Colors </b></div>
			<div class="panel-body">
				<form action="<?=setLink("cars-colors-process").appendLink("oldPage", $_GET['page']) ?>" method="post" class="row">
					<div class="col-md-5">
						<div class="form-group">
							<label for="name">Name Colors</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="Black etc">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="maincost">Maint Cost</label>
							<input type="text" name="maincost" id="maincost" class="form-control" placeholder="1000000">
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
										</tr>
									</thead>
									<tbody>
										<?php
										$colCars = selectFrom("tb_color"); //memilih data dari tabel database, dengan nilai kembalian berupa mysqli result 
										while ($row = mysqli_fetch_object($colCars)){ //fetch_object : mengubah setiap row dari result menjadi sebuah object
											echo "
										<tr>
											<td>".$row->_ID."</td>
											<td>".$row->Name."</td>
											<td>".$row->MaintCost."</td>
											
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