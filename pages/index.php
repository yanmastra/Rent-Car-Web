<!DOCTYPE html>
<html>
<head>

<?php 
define("KEY", "12345");
//untuk menambahkan menu tab
$menu = array(
	"Transaction" => "../pages/#home",
	"Cars Data" => "../pages/?page=cars-data", //cars-data ini harus sama dengan nama file 
	"Customers" => "../pages/?page=costumer", 
	"Employes" => "../pages/?page=employes", 
	"Cars Colors" => "../pages/?page=cars-colors",
	"Cars Brand" => "../pages/?page=cars-brand-data"
);

$link = array(
	"../vendor/datatables/css/dataTables.bootstrap.min.css" => "style"
);
include 'connection.php';
include 'componen.php';
headerProperty(null, "yanmastra", $link);
?>
    <title>RENT PRO</title>
</head>
<body>
<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-primary" style="margin: 10px">
			<div class="panel-heading">
				<b>RENT PRO</b>
			</div>
			<div class="panel-body">
				<?php
					if(isset($_GET['page'])) include $_GET['page'].".php";
					else{ ?>

				<?= tab_menu($menu, "Transaction", null) ?>
				<div class="tab-content">
					<div class="tab-pane fade in active" id="home">
						<br>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-info">
									<div class="panel-heading"><b>Transaction form</b></div>
									<div class="panel-body">
										<form action="<?=setLink('transaction-process').appendLink('oldPage','#home')?>" method="post" class="col-md-12">
											<div class="row">
												<div class="col-md-4">
													<div class="form-group">
														<label for="customer">Customer</label>
														<input type="text" name="customer" id="customer" class="form-control" placeholder="Select customer from lists on right side" onclick="alert('Select customer from lists on right side!')" required>
													</div>
													<div class="form-group">
														<label for="car">Car</label>
														<input type="text" name="car" id="car" class="form-control" placeholder="Select car from lists on right side" onclick="alert('Select car from lists on right side');" required>
														<p><div class="input-group">
															<input type="number" id="cost" class="form-control" disabled>
															<span class="input-group-addon"><b>/ Day</b></span>
														</div></p>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="range">Rent Range</label>
														<div class="input-group">
															<input type="number" id="range" name="range" class="form-control" placeholder="" required onchange="countTotal()">
															<span class="input-group-addon">Day</span>
														</div>
													</div>
													<div class="form-group">
														<label for="total">Total Cost</label>
														<div class="input-group">
															<span class="input-group-addon">IDR</span>
															<input type="number" id="total" class="form-control" disabled>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="form-group">
														<label for="pay">Payment</label>
														<div class="input-group">
															<span class="input-group-addon">IDR</span>
															<input type="number" id="pay" name="pay" class="form-control" placeholder="Must more than total cost" onchange="countCashBack()">
														</div>
													</div>
													<div class="form-group">
														<label for="cash-back">Cash Back</label>
														<div class="input-group">
															<span class="input-group-addon">IDR</span>
															<input type="number" id="cash-back" name="cash-back" disabled class="form-control">
														</div>
													</div>
													<div class="form-group">
														<button class="btn btn-success form-control" type="submit">Submit</button>
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- Customers data -->
							<div class="col-md-6">
								<div class="panel panel-success">
									<div class="panel-heading">Select Customer here</div>
									<div class="panel-body" style="margin:0;">
										<div style="
										position: relative;
										top: 0;
										max-height: 300px;
										overflow-y: auto;
										width: 100%;
										height: 100%;
										margin: 0;">
											<ul class="menu nav in">
												<?php 
												$res = selectFrom("tb_customers");
												while ($row = mysqli_fetch_array($res)) {
													echo "<li onclick=\"setCustomer('".$row['IDCardNumber']."')\">".$row['IDCardNumber']." - ".$row['Name']."</li>";
												}
												?>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- Cars data -->
							<div class="col-md-6">
								<div class="panel panel-info">
									<div class="panel-heading">Select Car here</div>
									<div class="panel-body" style="margin:0;">
										<div style="
										position: relative;
										top: 0;
										max-height: 300px;
										overflow-y: auto;
										width: 100%;
										height: 100%;
										margin: 0;">
											<ul class="menu nav in">
												<?php 
												$res = selectFrom("vw_cars");
												while ($row = mysqli_fetch_array($res)) {
													echo "<li onclick=\"setCar('".$row['Plat Number']."','".$row['Cost per Day']."')\">".$row['Plat Number']." - ".$row['Brand']." ".$row['Color']."</li>";
												}
												?>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<table class="table data-table">
									<thead>
										<tr>
											<?= getHeaderTable("vw_transaction") ?>
										</tr>
									</thead>
									<tbody>
										<?php
										$res = selectFrom("vw_transaction");
										while ($row = mysqli_fetch_assoc($res)) {
											echo "<tr>";
											print_cells($row);
											echo "</tr>";
										 } 
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<script type="text/javascript">
					function setCustomer(id){
						document.getElementById('customer').value = id;
					}

					function setCar(id, cost){
						document.getElementById('car').value = id;
						document.getElementById('cost').value = cost;
					}
					function countTotal(){
						var cost = document.getElementById('cost').value;
						var range = document.getElementById('range').value;
						document.getElementById('total').value = (range * cost);
					}
					function countCashBack(){
						var total = document.getElementById('total').value;
						var pay = document.getElementById('pay').value;
						document.getElementById('cash-back').value = (pay - total);
					}
				</script>
					<?php }
				?>
			</div>
		</div>
	</div>
</div>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
