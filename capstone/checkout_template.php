<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
	error_reporting(0);
	ini_set('display_errors', 0);
?>
<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	  	<?php include('./include/style.php') ?>
		<style>
		</style>
	</head>
	<body class="font-monospace">
		<main class="container-fluid m-0 p-0">
			<section>
				<div class="container-fluid my-width my-4">
					<div class="row text-center">
						<div class="col-6">
							<a href="javascript:history.back()">
							    <button class="btn-main py-1 mt-4 w-75 rounded-pill">BACK</button>
							</a>
						</div>
						<div class="col-6">
							<form action="" class="info">
							    <button type="submit" class="btn-main py-1 mt-4 w-75 rounded-pill">NEXT</button>
							</form>
						</div>
	                </div>
	                <div class="row gx-5">
	                    <div class="col-sm-12 col-md-8">
	                    	<div class="row mx-0 my-4 p-0">
	                    	    <h2>checkout</h2>
	                    	    <div class="progress" role="progressbar" aria-valuemin="0" aria-valuemax="100" style="height: 12px">
	                    	      <div class="progress-bar" style="width: 50%">50%</div>
	                    	    </div>
	                    	</div>
	                        <div class="row g-3">
	                            <h4 class="my-2">Billing Address</h4>
	                            <div class="col-md-6">
	                                <label class="form-label">First Name</label>
	                                <input type="text" id="fname" class="form-control" value="<?php echo $_SESSION['fname']; ?>">
	                            </div>
	                            <div class="col-md-6">
	                                <label class="form-label">Last Name</label>
	                                <input type="text" id="lname" class="form-control" value="<?php echo $_SESSION['lname']; ?>">
	                            </div>
	                            <div class="col-md-6">
	                                <label class="form-label">Mobile Number</label>
	                                <input type="text" id="mnumber" class="form-control" value="<?php echo $_SESSION['mnumber']; ?>">
	                            </div>
	                            <div class="col-md-6">
	                                <label class="form-label">Email</label>
	                                <input type="email" id="email" class="form-control" value="<?php echo $_SESSION['email']; ?>">
	                            </div>
	                            <div class="col-md-12">
	                                <label class="form-label">Complete Address</label>
	                                <input type="text" id="caddress" class="form-control" value="<?php echo $_SESSION['caddress']; ?>">
	                            </div>
	                        </div>
	                        <div class="row g-3 mt-3">
	                            <h4 class="my-2">Order Details</h4>
	                            <div class="col-md-12">
	                            	<label class="form-label">Main material of your design: </label>
	                            	<select class="input" id="material">
	                        	        <option value="Gold">Gold</option>
	                        	        <option value="Silver">Silver</option>
	                        	        <option value="Bronze">Bronze</option>
	                        	    </select>
	                            </div>
	                            <div class="col-md-12">
	                                <label class="form-label">Describe your design, emphasize how you want us to recreate your beautiful ideas.</label>
	                                <textarea class="form-control" id="description" rows="5" style="resize: none;"></textarea>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-sm-12 col-md-4 text-center">
	                        <h2 class="">ORDER SUMMARY</h2>
	                        <div class="m-0 p-0 border border-dark border-2 opacity-100 rounded-0" id="template-container">
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
			</section>
		</main>
	</body>
</html>
<script type="text/javascript">
	$(document).on("submit", ".info", function (event) {
        event.preventDefault();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var mnumber = $("#mnumber").val();
        var email = $("#email").val();
        var caddress = $("#caddress").val();
        var material = $("#material").val();
        var description = $("#description").val();

        if (fname === "" || lname === "" || mnumber === "" || email === "" || caddress === "" || material === "" || description === "") {
        	alert('Notice: There are some empty field, please fill it up.');
        } else {
        	$.ajax({
        	    url: "./php/order_template.php",
        	    method: "POST",
        	    data: {
        	        fname: fname,
       		    	lname: lname,
       		    	mnumber: mnumber,
       		    	email: email,
       		    	caddress: caddress,
       		    	material: material,
       		    	description: description
        	    },
        	    success: function (data) {
        	        if (data === "1") {
        	        	alert('Notice: Only 1 order can be made every minute per account.');
        	        } else if (data === "2") {
        	        	alert('Notice: Order has been submitted successfully.');
        	        	window.location.href = "view_order.php";
        	        } else if (data === "3") {
        	        	alert('Notice: An unexpected error occur during submitting your order, please try again.');
        	        } else {
        	        	alert('Notice: [' + data + ']');
        	        }
        	    },
        	    error: function (xhr, status, error) {
        	        console.error("AJAX Request Error:", status, error);
        	    },
        	});
        }
    });
</script>
<script type="text/javascript">
	function showTemplate() {
	    $.ajax({
	        url: "./php/get_template_image.php",
	        method: "GET",
	        success: function (data) {
	            $("#template-container").html(data);
	        },
	        error: function (xhr, status, error) {
	            console.error("AJAX Request Error:", status, error);
	        }
	    });
	}
	showTemplate();
	setInterval(showTemplate, 1000);
</script>
<?php 
}else{
	echo"<script>var xlink = window.location.href;</script>";
	echo"<script>window.localStorage.setItem('xlink', xlink);</script>";
    echo"<script>alert('Notice: Please login to proceed.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>
