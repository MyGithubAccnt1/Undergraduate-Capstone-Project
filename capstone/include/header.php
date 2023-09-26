<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['email'])) {
?>
<header class="bg-white text-dark sticky-top">
	<section class="d-block d-xl-none">
		<div class="box">
			<div class="icon"></div>
		</div>
	</section>
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
			    </li>
			    <li>
			    	<a href="necklaces.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fab fa-hotjar" style="margin: 0 20px 0 10px;"></i><small>Necklace</small>
			    		</button>
			    	</a>
			    </li>
			    <li>
			    	<a href="pins.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-tag" style="margin: 0 20px 0 10px;"></i><small>Pins</small>
			    		</button>
			    	</a>
			    </li>
			    <li>
			    	<a href="tables.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-ruler-combined" style="margin: 0 20px 0 10px;"></i><small>Table Nameplates</small>
			    		</button>
			    	</a>
			    </li>
			    <li>
			    	<a href="logos.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-sign" style="margin: 0 20px 0 10px;"></i><small>Logo Seal</small>
			    		</button>
			    	</a>
			    </li>
			    <li>
			    	<a href="signin.php">
				    	<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
				    		<i class="fas fa-sign-out-alt" style="margin: 0 20px 0 10px;"></i><small>Sign In</small>
				    	</button>
			    	</a>
			    </li>
			    <li>
			    	<a href="#offcanvasDark" data-bs-toggle="offcanvas">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-shopping-cart" style="margin: 0 20px 0 10px;"></i><small>Cart</small>
			    		</button>
			    	</a>
			    </li>
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
	<section class="d-block d-lg-none w-50">
		<div class="row">
			<div class="col-3 d-flex justify-content-end">
				<img src="images/sb-logo.jpg" width="auto" height="45px">
			</div>
			<div class="col-9 text-start d-flex align-items-center">
				<small>Saint Benedict Medallion</small>
			</div>
		</div>
	</section>
	<section style="width: 50%;" class="d-none d-lg-block">
		<nav style="display: flex; flex-direction: row; align-items: center; justify-content: space-around;">
			<div>
				<a href="necklaces.php">
					<button class="btn-nav btn-necklaces rounded-0 btn-sm text-start">
						<small>NECKLACES</small>
					</button>
				</a>
			</div>
			<div>
				<a href="pins.php">
					<button class="btn-nav btn-pins rounded-0 btn-sm text-start">
						<small>PINS</small>
					</button>
				</a>
			</div>
			<div>
				<a href="tables.php">
					<button class="btn-nav btn-table rounded-0 btn-sm text-start">
						<small>TABLE NAMEPLATES</small>
					</button>
				</a>
			</div>
			<div>
				<a href="logos.php">
					<button class="btn-nav btn-logo rounded-0 btn-sm text-start">
						<small>LOGO SEAL</small>
					</button>
				</a>
			</div>
			<div>
				<a href="necklaces.php">
					<button class="btn-nav btn-customize rounded-0 btn-sm text-start">
						<small>CUSTOMIZE</small>
					</button>
				</a>
			</div>
		</nav>
	</section>
	<section style="width: 35%;" class="d-none d-xl-block">
		<div style="display: flex; flex-direction: row; align-items: center; justify-content: space-around;">
			<div>
		    	<a href="index.php">
		    		<button class="btn-nav btn-home rounded-0 btn-sm text-start">
		    			<i class="fas fa-home" style="margin: 0 10px 0 5px;"></i><small>HOME</small>
		    		</button>
		    	</a>
		    </div>
		    <div>
		    	<a href="signin.php">
			    	<button class="btn-nav btn-signin rounded-0 btn-sm text-start">
			    		<i class="fas fa-sign-out-alt" style="margin: 0 10px 0 5px;"></i><small>SIGN IN</small>
			    	</button>
		    	</a>
		    </div>
		    <div>	
		    	<a href="#offcanvasDark" data-bs-toggle="offcanvas">
		    		<button class="btn-nav rounded-0 btn-sm text-start">
		    			<i class="fas fa-shopping-cart" style="margin: 0 10px 0 5px;"></i><small>CART</small>
		    		</button>
		    	</a>
		    </div>
		    <div>
		    	<a href="account.php">
		    		<button class="btn-nav btn-account rounded-0 btn-sm text-start">
		    			<i class="fas fa-user-circle" style="margin: 0 10px 0 5px;"></i><small>ACCOUNT</small>
		    		</button>
		    	</a>
			</div>
		</div>
	</section>
</header>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel" style="transition: 0.4s ease; background-color: #CCAA89">
	<div class="offcanvas-header py-0" style="position: relative;">
		<section style="position: absolute; top: 0; right: 0; padding: 25px;">
	    	<button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	    </section>
	    <section class="mx-auto">
	    	<h2 class="offcanvas-title" id="offcanvasDarkLabel">Cart</h2>
	    </section>
	</div>
	<div class="offcanvas-body">
		<section class="container-fluid p-0 m-0" style="overflow-x: scroll; width: 350px;">
            <div class="p-0 m-0 row" style="width: 400px;">
                <div class="col-3 text-center">
                	<span>ITEM</span>
                </div>
                <div class="col-2 text-center">
                	<span>PRICE</span>
                </div>
                <div class="col-4 text-center">
                	<span>QUANTITY</span>
                </div>
                <div class="col-2 text-center">
                	<span>TOTAL</span>
                </div>
                <div class="col-1 text-center">
                	<span>...</span>
                </div>
                <hr class="border border-light border-1 opacity-75 my-3">
            </div>
            <div class="p-0 m-0 row" style="width: 400px;" id="cart-container"></div>
            <div class="p-0 m-0 row my-2" style="width: 400px;">
            	<hr class="border border-light border-1 opacity-75 my-2">
                <small id="subtotal-container"></small>
                <hr class="border border-light border-1 opacity-75 my-2">
            </div>
            <div class="p-0" style="width: 400px; margin: 0 50px;">
            	<a href="view_order.php" class="w-75">
            		<button class="btn-main py-1 my-2 w-75 rounded-pill" type="button">View Orders</button>
            	</a>
            </div>
            <div class="p-0" style="width: 400px; margin: 0 50px;">
            	<a id="conditional-link" href="#" class="w-75">
            		<button class="btn-main py-1 my-2 w-75 rounded-pill" type="button">Checkout</button>
            	</a>
            </div>
        </section>
	</div>
</div>
<script>
	function showCart() {
	    $.ajax({
	        url: "./php/get_cart.php",
	        method: "GET",
	        success: function (data) {
	            // Handle the AJAX response here
	            $("#cart-container").html(data);
	        },
	        error: function (xhr, status, error) {
	            console.error("AJAX Request Error:", status, error);
	        }
	    });
	}
	showCart()
	function showSubtotal() {
	    $.ajax({
	        url: "./php/subtotal_cart.php",
	        method: "GET",
	        success: function (data) {
	            // Handle the AJAX response here
	            $("#subtotal-container").html(data);
	        },
	        error: function (xhr, status, error) {
	            console.error("AJAX Request Error:", status, error);
	        }
	    });
	}
	showSubtotal()
</script>
<script>
	$(document).on("click", ".status-form", function (event) {
		event.preventDefault();
    	var action = $(this).data("action");
    	if (action === "minus") {
    		var id = $(this).find("input[name='id']").val();
    		var price = $(this).find("input[name='price']").val();
    		var qty = $(this).find("input[name='qty']").val();
    		$.ajax({
		        url: "./php/minus_cart.php",
		        method: "POST",
		        data: {
	            	id: id,
	            	price: price,
	            	qty: qty
	            },
		        success: function (data) {
		        	showCart()
		        	showSubtotal()
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
    	} else if (action === "plus") {
    		var id = $(this).find("input[name='id']").val();
    		var price = $(this).find("input[name='price']").val();
    		var qty = $(this).find("input[name='qty']").val();
    		$.ajax({
		        url: "./php/plus_cart.php",
		        method: "POST",
		        data: {
	            	id: id,
	            	price: price,
	            	qty: qty
	            },
		        success: function (data) {
		        	showCart()
		        	showSubtotal()
		        },
		        error: function (xhr, status, error) {
		            console.error("AJAX Request Error:", status, error);
		        }
		    });
    	}
    });
</script>
<script>
	function confirm_delete() {
		return confirm('Are you sure you want to delete this item?')
	}
</script>
<script>
    const link = document.getElementById('conditional-link');
    const div = document.getElementById('cart-container');
    const expectedHtml = '<small>Your cart is empty.</small>';

    if (div.innerHTML.includes(expectedHtml)) {
        // If the condition is met (div contains expected HTML content), set the href to '#'
        link.href = '#';
    } else {
        // If the condition is not met, set the href to a different URL
        link.href = './checkout.php';
    }
</script>
<?php
}else{
?>
<header class="bg-white text-dark sticky-top">
	<section class="d-block d-xl-none">
		<div class="box">
			<div class="icon"></div>
		</div>
	</section>
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
			    </li>
			    <li>
			    	<a href="necklaces.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fab fa-hotjar" style="margin: 0 20px 0 10px;"></i><small>Necklace</small>
			    		</button>
			    	</a>
			    </li>
			    <li>
			    	<a href="pins.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-tag" style="margin: 0 20px 0 10px;"></i><small>Pins</small>
			    		</button>
			    	</a>
			    </li>
			    <li>
			    	<a href="tables.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-ruler-combined" style="margin: 0 20px 0 10px;"></i><small>Table Nameplates</small>
			    		</button>
			    	</a>
			    </li>
			    <li>
			    	<a href="logos.php">
			    		<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
			    			<i class="fas fa-sign" style="margin: 0 20px 0 10px;"></i><small>Logo Seal</small>
			    		</button>
			    	</a>
			    </li>
			    <li>
			    	<a href="signin.php">
				    	<button class="btn btn-dark w-100 rounded-0 text-start border border-white">
				    		<i class="fas fa-sign-out-alt" style="margin: 0 20px 0 10px;"></i><small>Sign In</small>
				    	</button>
			    	</a>
			    </li>
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
	<section class="d-block d-lg-none w-50">
		<div class="row">
			<div class="col-3 d-flex justify-content-end">
				<img src="images/sb-logo.jpg" width="auto" height="45px">
			</div>
			<div class="col-9 text-start d-flex align-items-center">
				<small>Saint Benedict Medallion</small>
			</div>
		</div>
	</section>
	<section style="width: 50%;" class="d-none d-lg-block">
		<nav style="display: flex; flex-direction: row; align-items: center; justify-content: space-around;">
			<div>
				<a href="necklaces.php">
					<button class="btn-nav btn-necklaces rounded-0 btn-sm text-start">
						<small>NECKLACES</small>
					</button>
				</a>
			</div>
			<div>
				<a href="pins.php">
					<button class="btn-nav btn-pins rounded-0 btn-sm text-start">
						<small>PINS</small>
					</button>
				</a>
			</div>
			<div>
				<a href="tables.php">
					<button class="btn-nav btn-table rounded-0 btn-sm text-start">
						<small>TABLE NAMEPLATES</small>
					</button>
				</a>
			</div>
			<div>
				<a href="logos.php">
					<button class="btn-nav btn-logo rounded-0 btn-sm text-start">
						<small>LOGO SEAL</small>
					</button>
				</a>
			</div>
			<div>
				<a href="necklaces.php">
					<button class="btn-nav btn-customize rounded-0 btn-sm text-start">
						<small>CUSTOMIZE</small>
					</button>
				</a>
			</div>
		</nav>
	</section>
	<section style="width: 35%;" class="d-none d-xl-block">
		<div style="display: flex; flex-direction: row; align-items: center; justify-content: space-around;">
			<div>
		    	<a href="index.php">
		    		<button class="btn-nav btn-home rounded-0 btn-sm text-start">
		    			<i class="fas fa-home" style="margin: 0 10px 0 5px;"></i><small>HOME</small>
		    		</button>
		    	</a>
		    </div>
		    <div>
		    	<a href="signin.php">
			    	<button class="btn-nav btn-signin rounded-0 btn-sm text-start">
			    		<i class="fas fa-sign-out-alt" style="margin: 0 10px 0 5px;"></i><small>SIGN IN</small>
			    	</button>
		    	</a>
		    </div>
		    <div>
		    	<a href="account.php">
		    		<button class="btn-nav btn-account rounded-0 btn-sm text-start">
		    			<i class="fas fa-user-circle" style="margin: 0 10px 0 5px;"></i><small>ACCOUNT</small>
		    		</button>
		    	</a>
			</div>
		</div>
	</section>
</header>
<?php
}
?>