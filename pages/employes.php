<?= tab_menu($menu, "Employes", null) ?>
<div class="tab-content">
	<div class="tab-pane fade in active" id="cars-data">
		<h4>EMPLOYES</h4>
		<div class="row">
							<div class="col-md-12">
								<div class="panel panel-info">
									<div class="panel-heading"><b>Employes form</b></div>
									<div class="panel-body">
										<form action="<?=setLink('employeeproses').appendLink('oldPage', $_GET['page']).appendLink('action','insert') ?>" method="post" class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label for="user">Username</label>
												<input type="text" name="user" id="user" class="form-control" required>
											</div>
											<div class="form-group">
												<label for="pass">Password</label>
												<input type="password" name="pass" id="pass" class="form-control required" >
											
											</div>
											<div class="form-group">
												<label for="nama">Nama</label>
												<input type="text" name="nama" id="nama" class="form-control required" >
											
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label for="address">Address</label>
												<input type="text" name="address" id="address" class="form-control required" >
											
											</div>
											<div class="form-group">
												<label for="phone">Phonenumber</label>
												<input type="text" name="phone" id="phone" class="form-control required" >
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-success form-control">SUBMIT</button>
											</div>
										</div>
										</form>
									</div>
								</div>
							</div>
							
						<div class="row">
							<div class="col-md-12">
								<table class="table data-table">
									<thead>
										<tr>
											<th>Username</th>
											<th>Nama</th>
											<th>Address</th>
											<th>Phonenumber</th>
										</tr>
									</thead>
									<tbody>
									
										<?php
										$data = selectFrom("tb_employes");
										while ($row = mysqli_fetch_object($data)){
											echo "
										<tr>
											<td>".$row->Username."</td>
											<td>".$row->Name."</td>
											<td>".$row->Address."</td>
											<td>".$row->PhoneNumber."</td>
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
	</div>
</div>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
	</div>
</div>