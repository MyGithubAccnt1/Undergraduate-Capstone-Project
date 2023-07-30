<header class="sticky-top text-white" style="transition: background .5s;">
	<div class="box">
		<div class="icon"></div>
	</div>
	<section class="darker">
		<div class="navigation">
			<ul>
			    <li>
			    	<a href="#" class="close">
		            	<button class="btn btn-dark border border-white rounded-pill text-navigation"
		            style="width: 75%; height: 40px; margin: 0 0 10px 12.25%;">Close Menu</button>
		    		</a>
			    </li>
			    <li>
			    	<a href="index.php" class="">
			    		<button class="btn btn-dark btn-sm border border-white rounded-0 text-navigation">Home</button>
			    	</a>
			    <li>
			    	<a href="product.php" class="text-navigation">
			    		<button class="btn btn-dark btn-sm border border-white rounded-0 text-navigation">Necklaces</button>
			    	</a>
			    <li>
			    	<a href="product.php" class="text-navigation">
			    		<button class="btn btn-dark btn-sm border border-white rounded-0 text-navigation">Pins</button>
			    	</a>
			    <li>
			    	<a href="product.php" class="text-navigation">
			    		<button class="btn btn-dark btn-sm border border-white rounded-0 text-navigation">Table Nameplates</button>
			    	</a>
			    <li>
			    	<a href="product.php" class="text-navigation">
			    		<button class="btn btn-dark btn-sm border border-white rounded-0 text-navigation">Logo Seal</button>
			    	</a>
			    <li>
			    	<a href="signin.php" class="text-navigation">
				    	<button class="btn btn-dark btn-sm border border-white rounded-0 text-navigation">Sign In</button>
			    	</a>
			    <li>
			    	<a href="#offcanvasDark" data-bs-toggle="offcanvas" class="text-navigation">
			    		<button class="btn btn-dark btn-sm border border-white rounded-0 text-navigation">Cart</button>
			    	</a>
			    <li>
			    	<a href="account.php" class="text-navigation">
			    		<button class="btn btn-dark btn-sm border border-white rounded-0 text-navigation">Account</button>
			    	</a>
			    </li>
			</ul>
		</div>
	</section>
	<div class="row">
		<div class="col">
			<img src="images/sb-logo.jpg" width="auto" height="45px">
		</div>
		<div class="col">
			<p style="margin: 10px 0 10px 0">SBM</p>
		</div>
	</div>
	<div class="d-none d-lg-block">
		<a href="#" class="me-5">
		    <i class="fab fa-facebook-f" style="color: #ffffff;"></i>
		</a>
		<a href="#" class="me-5">
		    <i class="fab fa-twitter" style="color: #ffffff;"></i>
		</a>
		<a href="#" class="me-5">
		    <i class="fab fa-google" style="color: #ffffff;"></i>
		</a>
		<a href="#" class="me-5">
		    <i class="fab fa-instagram" style="color: #ffffff;"></i>
		</a>
	</div>
	<div>
		<a href="signin.php" class="d-none d-md-block">
			<i class="fas fa-sign-in-alt" style="color: #ffffff;"> Sign In</i>
		</a>
	</div>
	<div>
		<a href="#offcanvasDark" data-bs-toggle="offcanvas" class="d-none d-md-block">
			<i class="fas fa-shopping-cart" style="color: #ffffff;"> Cart</i>
		</a>
	</div>
	<div>
		<a href="account.php" class="d-none d-md-block">
			<i class="far fa-user-circle" style="color: #ffffff;"> Account</i>
		</a>
	</div>
</header>

<div class="offcanvas offcanvas-start text-bg-dark" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel" style="transition: 0.4s ease;">
	<div class="offcanvas-header">
	    <h5 class="offcanvas-title" id="offcanvasDarkLabel">Cart</h5>
	    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		<div class="row">
			<div class="col-3">
				<p class="text-center">ITEM</p>
				<p>SET 1</p>
			</div>
			<div class="col-3 text-center">
				<p>QTY</p>
				<div class="d-flex justify-content-center">
					<input type=button value=" + " onclick="button1()"/>
					<span id="output-area" style="margin: 0 10px;"></span>
					<input type=button value=" - " onclick="button2()"/>
				</div>
			</div>
			<div class="col-3 text-end">
				<p class="text-center">PRICE</p>
				<div id="totalPrice"></div>
			</div>
			<div class="col-3 text-center">
				<p>OPTION</p>
			    <a data-toggle="collapse" href="#collapseExample1">
			       <i class="fas fa-times" style="color: #ffffff;"></i>
			    </a>
			</div>
		</div>
	    <div class="row">
	    	<hr>
	    	<div class="col-6">
	    		<p>Sub-Total:</p>
	    	</div>
	    	<div class="col-6">
	    		<p id="subtotalPrice" style="text-align: right;"></p>
	    	</div>
	    	<hr>
	    </div>
	    <a href="view_order.php">
	    	<button type="submit" class="btn btn-success my-3 w-100 rounded-pill">VIEW ORDERS</button>
	    </a>
	    <a href="checkout.php">
	    	<button type="submit" class="btn btn-danger my-3 w-100 rounded-pill">CHECKOUT</button>
	    </a>
	</div>
</div>
<script type="text/javascript">
	var x = 0;

	document.getElementById('output-area').innerHTML = x;

	function button1() {
	  	document.getElementById('output-area').innerHTML = ++x;
	  	var total = (x * 499);
	  	document.getElementById("totalPrice").innerHTML = total + ".00";
	  	document.getElementById("subtotalPrice").innerHTML = total + ".00";
	}

	function button2() {
		if (x == 0) {

		}else{
			document.getElementById('output-area').innerHTML = --x;
			var total = (x * 499);
			document.getElementById("totalPrice").innerHTML = total + ".00";
			document.getElementById("subtotalPrice").innerHTML = total + ".00";
		}
	}
</script>