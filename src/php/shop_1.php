<!DOCTYPE html>
<html lang="en">
<head>

    <?php
		//header("refresh: 2");
		session_start();
			if ($_SESSION["login"] != True)
			{
				header("location: ../../home.html");
				exit();
			}
		?>
	<title>FuStore | Shop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../../asset/images/icons/cart.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset/table/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset/table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset/table/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset/table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset/table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../asset/table/css/util.css">
	<link rel="stylesheet" type="text/css" href="../../asset/table/css/main.css">
<!--===============================================================================================-->
    <script type="text/javascript" src="../../asset/js/angular.min.js"> </script>
<!--===============================================================================================--><!--===============================================================================================-->
    <link href="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.css" rel="stylesheet">

	<script src="https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js"></script>
<!--===============================================================================================-->
<style>
	div.sticky {
		position: -webkit-sticky;
		position: sticky;
		top: 0;
		padding-top: 20px;
		background-color: #d1d1d1;
	}
</style>

<!--===============================================================================================-->

</head>
<body>

	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
                <!--FORM CONTROL-->
                <div ng-app="myApp"  ng-controller="cntrl" data-ng-init="displayProd()">
                <form>
                <div class="container-fluid">
					<div class="input-group mb-3">
                        <input type="text"  class="form-control" autofocus placeholder="Scan Products" aria-label="Text input with segmented dropdown button" ng-model="data.pid" name="id" ng-disabled="obj.idisable">
						<div class="input-group-append">
						<!---->
                          <input type="submit" class="btn btn-primary"  value="Add to Cart" ng-click="insertdata()" onclick="SumBill()">
						  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" ng-click="getdata()" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="sr-only">Toggle Dropdown</span>
						  </button>
						  <div class="dropdown-menu">
							<a class="dropdown-item text-primary">Welcome <?php echo $_SESSION["name"]; ?> !</a>
							<a class="dropdown-item" href="#" onclick="SumBillm()" data-toggle="modal" data-target="#modalTable">Purchase History</a>
							<div role="separator" class="dropdown-divider"></div>
							<a class="dropdown-item text-danger" href="logout_1.php">Logout</a>
						  </div>
						</div>
                      </div>

					  <!--<h4>Total= <span id="val"></span></h4>-->

					  <h4>Total= <span id="val"></span></h4>
					  <hr class="pb-2">


                </form>
                </div>
                <!--FORM CONTROL-->

				<!--TABLE-->
				<div class="table100 ver6 mt-2 m-b-20 content">
					<table data-vertable="ver6" id="table">
						<thead>
							<tr class="row100 head font-weight-bold">
								<th class="column100 column1" data-column="column1">Item Name</th>
								<th class="column100 column2" data-column="column2">Quan</th>
								<th class="column100 column1" data-column="column2">Total</th>
							</tr>
						</thead>
						<tbody>
							<tr class="row100" ng-repeat="bills in dat">
								<td class="column100 column1" data-column="column1">{{bills.ItemName}}</td>
								<td class="column100 column2" data-column="column2">{{bills.quan}}</td>
								<td class="column100 column1" data-column="column2">{{bills.Total}}</td>
							</tr>
						</tbody>
					</table>
                </div>
				<div id="modalTable" class="modal fade" tabindex="-1" role="dialog">
			  <div class="modal-dialog" role="document">
				<div class="modal-content">
				  <div class="modal-header">
					<h5 class="modal-title text-success">Your Purchase History</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					  <span aria-hidden="true">&times;</span>
					</button>
				  </div>
				  <div class="modal-body">
					<table id="table1" class="table table-hover table-sm">
					  <thead class="text-primary font-weight-bold">
						<tr>
							<th>Id</th>
							<th>Time</th>
							<th>Amount</th>
						</tr>
					  </thead>
					  <tbody>
						<tr ng-repeat="b_his in data">
							<td>{{b_his.sno}}</td>
							<td>{{b_his.bh_time}}</td>
							<td>{{b_his.bh_Ctot}}</td>
						</tr>
					  </tbody>
					</table>
					<hr>
					<h4 class=" pr-3 text-danger">Total= <span id="valm"></span></h4>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
				  </div>
				</div>
			  </div>
			</div>
				<!--TABLE-->
				<button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.location.href='pay_1.php'"> Proceed To Pay</button>
			</div>
		</div>
	</div>




	<script>
	  var $table = $('#table1')

	  $(function() {
		$('#modalTable').on('shown.bs.modal', function () {
		  $table.bootstrapTable('resetView')
		})
	  })
	</script>




<!--===============================================================================================-->
    <script>
	  var app=angular.module('myApp',[]);
         app.controller('cntrl', function($scope,$http,$compile){'use strict';
         	$scope.obj={'idisable':false};
         	$scope.btnName="Insert";
			$scope.data = { "pid": ""};

         	$scope.insertdata=function(){
         		$http.post("addtocart_1.php",{'id':$scope.data.pid, 'btnName':$scope.btnName})
         		.success(function(){
         			$scope.msg="Product Added";
					$scope.displayProd();
					$scope.reset();
					$scope.reload();

					})
         	}
         	$scope.displayProd=function(){
         		$http.get("select_1.php")
					.success(function(data){
					$scope.dat=data;

         		})
         	}
			$scope.reset = function() {
			  $scope.data.pid = "";
			  $scope.form.$setPristine();
			}
			$scope.getdata=function(){
         		$http.get("sel_bill_amt.php")
         		.success(function(data){
         		$scope.data=data;
         		})
         	}
			$scope.reload=function(){
         		$route.reload();
         		}
	});

    </script>


<!--===============================================================================================-->
	<script>
        function SumBill() {
		var table = document.getElementById("table"), sumVal = 0;

        for(var i = 1; i < table.rows.length; i++)
        {
			sumVal = sumVal + parseInt(table.rows[i].cells[2].innerHTML);
        }
        document.getElementById("val").innerHTML = sumVal;
        console.log(sumVal);
		//location.reload();
		}

		window.onload = function() {
  		SumBill();
		};
    </script>
	<script>
        function SumBillm() {
		var table = document.getElementById("table1"), sumValm = 0;

        for(var i = 1; i < table.rows.length; i++)
        {
			sumValm = sumValm + parseInt(table.rows[i].cells[2].innerHTML);
        }
        document.getElementById("valm").innerHTML = sumValm;
        console.log(sumValm);
		}
    </script>
	<script>

    </script>
<!--===============================================================================================-->
	<script src="../../asset/table/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../../asset/table/vendor/bootstrap/js/popper.js"></script>
	<script src="../../asset/table/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../../asset/table/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../../asset/table/js/main.js"></script>

</body>
</html>
