<!DOCTYPE html>
<html>
<head>

<?php 
define("KEY", "12345");
$menu = array(
	"Transaction" => "../pages/#home",
	"Cars Data" => "../pages/?page=cars-data",
	"Employes" => "../pages/?page=employes",
	"Employes 2" => "../pages/?page=employes"
);

$link = array(
	"../vendor/datatables/css/dataTables.bootstrap.min.css" => "style"
);

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
							<div class="col-md-4">
								<div class="panel panel-info">
									<div class="panel-heading"><b>Transaction form</b></div>
									<div class="panel-body">
										<form action="" method="post" class="col-md-12">
											<div class="form-group">
												<label for="customer">Customer</label>
												<input type="text" name="customer" id="customer" class="form-control" placeholder="Select customer from lists on right side" onclick="alert('Select customer from lists on right side!')">
											</div>
											<div class="form-group">
												<label for="car">Car</label>
												<input type="text" name="car" id="car" class="form-control" placeholder="Select car from lists on right side" onclick="alert('Select car from lists on right side');">
												<p><div class="input-group">
													<input type="number" id="cost" class="form-control" disabled>
													<span class="input-group-addon"><b>/ Day</b></span>
												</div></p>
											</div>
											<div class="form-group">
												<label for="range">Rent Range</label>
												<div class="input-group">
													<input type="number" id="range" name="range" class="form-control" placeholder="">
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
											<div class="form-group">
												<label for="pay">Payment</label>
												<div class="input-group">
													<span class="input-group-addon">IDR</span>
													<input type="number" id="pay" name="pay" class="form-control" placeholder="Must more than total cost">
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<!-- Customers data -->
							<div class="col-md-4">
								<div class="panel panel-success">
									<div class="panel-heading">Select Customer here</div>
									<div class="panel-body" style="margin:0;">
										<div style="
										position: relative;
										top: 0;
										max-height: 420px;
										overflow-y: auto;
										width: 100%;
										height: 100%;
										margin: 0;">
											<ul class="menu nav in">
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<!-- Cars data -->
							<div class="col-md-4">
								<div class="panel panel-info">
									<div class="panel-heading">Select Car here</div>
									<div class="panel-body" style="margin:0;">
										<div style="
										position: relative;
										top: 0;
										max-height: 420px;
										overflow-y: auto;
										width: 100%;
										height: 100%;
										margin: 0;">
											<ul class="menu nav in">
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
												<li>skjhdhwuied wjegduywe - wedgwuegduyw </li>
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
