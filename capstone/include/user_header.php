<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();
?>
<section class="loader"></section>
<header class="sticky-top">
	<div class="mobile-navigation">
		<ul>
			<li>
		    	<a href="index.php">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-center border border-white">
		    			<small style="letter-spacing: 3px; font-size: 1rem; font-family: 'Great Vibes', sans-serif;" class="text-warning">SB</small>
		    			<small style="letter-spacing: 3px; font-size: 0.7rem; font-family: 'Open Sans', sans-serif; text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;" class="text-black">MEDALLION</small>
		    		</button>
		    	</a>
		    </li>
		    <li>
		    	<a href="#" class="close">
	            	<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
	            		<i class="fas fa-door-open" style="margin: 0 20px 0 10px;"></i><small>Close Menu</small>
	            	</button>
	    		</a>
		    </li>
		    <?php
		    if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
		    ?>
		    <li>
		    	<a href="account.php">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
		    			<i class="fas fa-user-circle" style="margin: 0 20px 0 10px;"></i><small>My Profile</small>
		    		</button>
		    	</a>
		    </li>
		    <li>
		    	<a href="#">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
		    			<i class="fas fa-clipboard-list" style="margin: 0 20px 0 10px;"></i><small>My Orders</small>
		    		</button>
		    	</a>
		    </li>
		    <?php
		    } else {
	    	?>
	    	<li>
		    	<a href="signin.php">
			    	<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    		<i class="fas fa-sign-out-alt" style="margin: 0 20px 0 10px;"></i><small>Sign In</small>
			    	</button>
		    	</a>
		    </li>
	    	<?php
		    }
		    ?>
		    <li>
		    	<a href="#">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
		    			<i class="fas fa-sign" style="margin: 0 20px 0 10px;"></i><small>Logo Seal</small>
		    		</button>
		    	</a>
		    </li>
		    <li>
		    	<a href="#">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
		    			<i class="fab fa-hotjar" style="margin: 0 20px 0 10px;"></i><small>Necklace</small>
		    		</button>
		    	</a>
		    </li>
		    <li>
		    	<a href="#">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
		    			<i class="fas fa-tag" style="margin: 0 20px 0 10px;"></i><small>Pins</small>
		    		</button>
		    	</a>
		    </li>
		    <li>
		    	<a href="#">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
		    			<i class="fas fa-ruler-combined" style="margin: 0 20px 0 10px;"></i><small>Table Nameplates</small>
		    		</button>
		    	</a>
		    </li>
		    <li>
	    	    <a href="#">
	    			<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
	    				<i class="fas fa-pencil-ruler" style="margin: 0 20px 0 10px;"></i></i><small>Customize</small>
	    			</button>
	    		</a>
		    </li>
		    <?php
		    if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
		    ?>
		    <li>
	    	    <a href="cart.php">
	    			<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
	    				<i class="fas fa-shopping-cart" style="margin: 0 20px 0 10px;"></i><small>Cart</small>
	    			</button>
	    		</a>
		    </li>
		    <?php
		    }
	    	?>
		    <li>
	    	    <a href="./php/logout.php">
	    			<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
	    				<i class="fas fa-sign-out-alt" style="margin: 0 20px 0 10px;"></i><small>Logout</small>
	    			</button>
	    		</a>
		    </li>
		</ul>
	</div>

	<div class="d-block d-lg-none">
		<div class="button">
			<button type="button" class="icon"></button>
		</div>
	</div>
	
	<div class="navigation">
		<div>
			<a href="index.php">
				<div class="m-0 p-0 row btn-nav">
					<div class="m-0 mr-1 p-0 col-4 text-end d-flex align-items-center">
						<small style="margin-right: 2px; font-size: 1.25rem; font-family: 'Great Vibes', sans-serif;" class="text-warning">SB</small>
					</div>
					<div class="m-0 p-0 col-8 text-start d-flex align-items-center">
						<small style="margin-left: 2px; font-size: 0.7rem; font-family: 'Open Sans', sans-serif; text-shadow: -1px -1px 0 #fff, 1px -1px 0 #fff, -1px 1px 0 #fff, 1px 1px 0 #fff;" class="text-black">MEDALLION</small>
					</div>
				</div>
			</a>
		</div>
		<?php
		if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
		?>
		<div class="dropdown d-none d-lg-block">
		  	<button type="button" class="btn-nav dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		    	ACCOUNT
		  	</button>
		  	<ul class="dropdown-menu">
		    	<li>
		    		<a class="dropdown-item" href="account.php">
		    			<button type="button" class="btn-nav rounded-0 btn-sm">
		    				<small>MY PROFILE</small>
		    			</button>
		    		</a>
		    	</li>
		    	<li>
		    		<a class="dropdown-item" href="#">
		    			<button type="button" class="btn-nav rounded-0 btn-sm">
		    				<small>MY ORDERS</small>
		    			</button>
		    		</a>
		    	</li>
		    	<li>
		    		<a class="dropdown-item" href="./php/logout.php">
		    			<button type="button" class="btn-nav rounded-0 btn-sm">
		    				<small>LOGOUT</small>
		    			</button>
		    		</a>
		    	</li>
		  	</ul>
		</div>
		<?php
		} else {
		?>
		<div class="d-none d-lg-block">
			<a href="signin.php">
				<button type="button" class="btn-nav rounded-0 btn-sm">
					<small>SIGN IN</small>
				</button>
			</a>
		</div>
		<?php
		}
		?>
	</div>
	
	<div class="navigation">
		<div class="dropdown d-none d-md-block">
		  	<button type="button" class="btn-nav dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		    	PRODUCTS
		  	</button>
		  	<ul class="dropdown-menu">
		    	<li>
		    		<a class="dropdown-item" href="#">
		    			<button type="button" class="btn-nav rounded-0 btn-sm">
		    				<small>LOGO SEAL</small>
		    			</button>
		    		</a>
		    	</li>
		    	<li>
		    		<a class="dropdown-item" href="#">
		    			<button type="button" class="btn-nav rounded-0 btn-sm">
		    				<small>NECKLACE</small>
		    			</button>
		    		</a>
		    	</li>
		    	<li>
		    		<a class="dropdown-item" href="#">
		    			<button type="button" class="btn-nav rounded-0 btn-sm">
		    				<small>PINS</small>
		    			</button>
		    		</a>
		    	</li>
		    	<li>
		    		<a class="dropdown-item" href="#">
		    			<button type="button" class="btn-nav rounded-0 btn-sm">
		    				<small>TABLE NAMEPLATE</small>
		    			</button>
		    		</a>
		    	</li>
		  	</ul>
		</div>
		<div class="d-none d-md-block">
			<a href="#">
				<button type="button" class="btn-nav rounded-0 btn-sm">
					<small>CUSTOMIZE</small>
				</button>
			</a>
		</div>
	</div>
	<div class="navigation">
		<?php
		if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
		?>
		<div class="d-none d-md-block">
			<a href="#">
				<button type="button" class="btn-nav rounded-0 btn-sm">
					<small>CART</small>
				</button>
			</a>
		</div>
		<?php
		}
		?>
		<div>
			<a href="#">
				<button type="button" class="btn-nav rounded-0 btn-sm">
					<i class="fas fa-bell"></i>
				</button>
			</a>
		</div>
	</div>
</header>