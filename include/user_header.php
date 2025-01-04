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
		    	<a href="#" class="close">
	            	<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
	            		<i class="fas fa-door-open" style="margin: 0 20px 0 10px;"></i><small>Close Menu</small>
	            	</button>
	    		</a>
		    </li>
		    <li>
		    	<a href="index.php">
	            	<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
	            		<img src="images/saint.png" height="17" width="17" alt="Missing_Image" style="margin: 0 20px 0 10px;">
	            		<small>Home</small>
	            	</button>
	    		</a>
		    </li>
		    <li>
		    	<a href="logo_seal.php">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
		    			<i class="fas fa-sign" style="margin: 0 20px 0 10px;"></i><small>Logo Seal</small>
		    		</button>
		    	</a>
		    </li>
		    <li>
		    	<a href="necklace.php">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
		    			<i class="fab fa-hotjar" style="margin: 0 20px 0 10px;"></i><small>Necklace</small>
		    		</button>
		    	</a>
		    </li>
		    <li>
		    	<a href="table_nameplate.php">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
		    			<i class="fas fa-ruler-combined" style="margin: 0 20px 0 10px;"></i><small>Table Nameplates</small>
		    		</button>
		    	</a>
		    </li>
		    <li>
	    	    <a href="customize.php">
	    			<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
	    				<i class="fas fa-pencil-ruler" style="margin: 0 20px 0 10px;"></i></i><small>Customize</small>
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
		    	<a href="order.php">
		    		<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
		    			<i class="fas fa-clipboard-list" style="margin: 0 20px 0 10px;"></i><small>My Orders</small>
		    		</button>
		    	</a>
		    </li>
		    <li>
	    	    <a href="./php/logout.php">
	    			<button type="button" class="btn btn-dark w-100 rounded-0 text-start border border-white">
	    				<i class="fas fa-sign-out-alt" style="margin: 0 20px 0 10px;"></i><small>Logout</small>
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
		</ul>
	</div>
	
	<div class="navigation">
		<div>
			<a href="index.php">
				<div class="m-0 p-0 btn-home" style="display: flex; align-items: end;">
					<img src="images/saint.png" height="54px" alt="Missing_Image">
					<small style="font-size: 1.25em;">SAINT BENEDICT MEDALLION</small>
				</div>
			</a>
		</div>
	</div>
	
	<div class="navigation">
		<div class="dropdown d-none d-lg-block">
			<a href="index.php">
				<button type="button" class="btn-nav rounded-0 btn-sm home-nav">
					<small>HOME</small>
				</button>
			</a>
		</div>
		<div class="dropdown d-none d-md-block">
		  	<button type="button" class="btn-nav dropdown-toggle directory-nav necklace-nav pins-nav table-nav" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		    	PRODUCTS
		  	</button>
		  	<ul class="dropdown-menu">
		    	<li>
		    		<a class="dropdown-item" href="logo_seal.php">
		    			<button type="button" class="btn-nav rounded-0 btn-sm directory-nav">
		    				<small>LOGO SEAL</small>
		    			</button>
		    		</a>
		    	</li>
		    	<li>
		    		<a class="dropdown-item" href="necklace.php">
		    			<button type="button" class="btn-nav rounded-0 btn-sm necklace-nav">
		    				<small>NECKLACE</small>
		    			</button>
		    		</a>
		    	</li>
		    	<li>
		    		<a class="dropdown-item" href="table_nameplate.php">
		    			<button type="button" class="btn-nav rounded-0 btn-sm table-nav">
		    				<small>TABLE NAMEPLATE</small>
		    			</button>
		    		</a>
		    	</li>
		  	</ul>
		</div>
		<div class="d-none d-md-block">
			<a href="customize.php">
				<button type="button" class="btn-nav rounded-0 btn-sm customize-nav">
					<small>CUSTOMIZE</small>
				</button>
			</a>
		</div>
	</div>
	<div class="navigation">
		<?php
		if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
		?>
		<div style="margin-right: 10px !important;">
			<a href="cart.php">
				<button type="button" id="cart-only" class="btn-home rounded-0 btn-sm cart-nav position-relative">
					<i class="fas fa-cart-arrow-down"></i>
					<span id="cart-number" class="font-monospace position-absolute"></span>
				</button>
			</a>
			<div class="cart-header add-header" id="cart-header-container"></div>
		</div>
		<div>
			<a>
				<button type="button" id="notif-only" class="btn-home rounded-0 btn-sm">
					<i class="fas fa-bell"></i><span class="notification_dot"></span>
				</button>
			</a>
			<div class="notif-header add-header" id="notif-header-container"></div>
		</div>
		<div class="dropdown d-none d-lg-block">
		  	<button type="button" class="btn-home dropdown-toggle profile-nav orders-nav" type="button" data-bs-toggle="dropdown" aria-expanded="false">
		    	<i class="fas fa-user"></i>
		  	</button>
		  	<ul class="dropdown-menu">
		    	<li>
		    		<a class="dropdown-item" href="account.php">
		    			<button type="button" class="btn-nav rounded-0 btn-sm profile-nav">
		    				<small>MY PROFILE</small>
		    			</button>
		    		</a>
		    	</li>
		    	<li>
		    		<a class="dropdown-item" href="order.php">
		    			<button type="button" class="btn-nav rounded-0 btn-sm orders-nav">
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
				<button type="button" class="btn btn-outline-danger rounded-0 btn-sm signin-nav">
					<small>SIGN IN</small>
				</button>
			</a>
		</div>
		<?php
		}
		?>
		<div class="d-block d-lg-none">
			<div class="button">
				<button type="button" class="icon"></button>
			</div>
		</div>
	</div>
</header>