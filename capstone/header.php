<header class="sticky-top text-white" style="transition: background .5s;">
	<div class="box">
		<div class="icon"></div>
	</div>
	<section class="darker">
		<div class="navigation">
			<ul>
			    <li>
			    	<a href="#" class="close">
		            	<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
		            		<i class="fas fa-door-open" style="margin: 0 20px 0 10px;"></i><small>Close Menu</small>
		            	</button>
		    		</a>
			    </li>
			    <li>
			    	<a href="index.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-home" style="margin: 0 20px 0 10px;"></i><small>Home</small>
			    		</button>
			    	</a>
			    <li>
			    	<a href="product.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fab fa-hotjar" style="margin: 0 20px 0 10px;"></i><small>Necklace</small>
			    		</button>
			    	</a>
			    <li>
			    	<a href="product.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-tag" style="margin: 0 20px 0 10px;"></i><small>Pins</small>
			    		</button>
			    	</a>
			    <li>
			    	<a href="product.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-ruler-combined" style="margin: 0 20px 0 10px;"></i><small>Table Nameplates</small>
			    		</button>
			    	</a>
			    <li>
			    	<a href="product.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-sign" style="margin: 0 20px 0 10px;"></i><small>Logo Seal</small>
			    		</button>
			    	</a>
			    <li>
			    	<a href="signin.php">
				    	<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
				    		<i class="fas fa-sign-out-alt" style="margin: 0 20px 0 10px;"></i><small>Sign In</small>
				    	</button>
			    	</a>
			    <li>
			    	<a href="#offcanvasDark" data-bs-toggle="offcanvas">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-shopping-cart" style="margin: 0 20px 0 10px;"></i><small>Cart</small>
			    		</button>
			    	</a>
			    <li>
			    	<a href="account.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-user-circle" style="margin: 0 20px 0 10px;"></i><small>Account</small>
			    		</button>
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
			<div class="col-3 text-center">
				<p>ITEM</p>
			</div>
			<div class="col-3 text-center">
				<p>QTY</p>
			</div>
			<div class="col-3 text-center">
				<p>PRICE</p>
			</div>
			<div class="col-3 text-center">
				<p>OPTION</p>
			</div>
		</div>
		<div class="row" id="cart-items">
			<!-- test display -->
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