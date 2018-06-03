<?= tab_menu($menu, "Customers", null) ?>
<div class="tab-content">
	<div class="tab-pane fade in active" id="costumer">
		<br>
		<div class="panel panel-info">
			<div class="panel-heading"><b>Transaction form</b> <em id="mode"></em></div>
			<div class="panel-body">
				<form action="<?=setLink('costumer-process').appendLink('oldPage', $_GET['page']).appendLink('action','insert') ?>" method="post" class="row" id="form-data" >
					<div class="col-md-6">
						<div class="form-group">
							<label for="id">ID CARD</label>
							<input type="text" name="id" id="id" class="form-control" placeholder="">
						</div>
						<div class="form-group">
							<label for="name">Name</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="">
						</div>
						<div class="form-group">
							<label for="gender">Gender</label>
							<select name="gender" id="gender" class="form-control" placeholder="">
								<option>Male</option>
								<option>Famale</option>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="almt">Address</label>
							<input type="text" name="almt" id="almt" class="form-control" placeholder="">
						</div>
						<div class="form-group">
							<label for="cp">Contact</label>
							<input type="text" name="cp" id="cp" class="form-control" placeholder="">
						</div>

						<div class="form-group">
							<button type="submit" class="btn btn-success form-control">SUBMIT</button>
						</div>
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
						$Costumer = selectFrom("tb_customers");

					?>
					<table class="table data-table">
									<thead>
										<tr>
											<th>ID CARD</th>
											<th>Name</th>
											<th>Gender</th>
											<th>Address</th>
											<th>Contact</th>
											<th></th>
											<th></th>

										</tr>
									</thead>
									<tbody>
										<?php
										while ($row = mysqli_fetch_object($Costumer)){
											echo "
										<tr>
											<td>".$row->IDCardNumber."</td>
											<td>".$row->Name."</td>
											<td>".$row->Address."</td>
											<td>".$row->Gender."</td>
											<td>".$row->ContactInfo."</td>
											<td><button type=\"button\" class=\"btn btn-warning form-control\">EDIT</button></td>
											<td><button type=\"button\" class=\"btn btn-danger form-control\">DELETE</button></td>
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