<?php 
session_start();
if ($_SESSION['role'] === "Admin") {
?>
<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
	  	<?php include('./include/admin_style.php') ?>
		<style>
			aside .sidebar a.prod-act{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.prod-act::before{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.prod-act span{
				color: var(--color-primary);
				margin-left: calc(1rem - 3px);
			}
			.border {
				border: 1px solid;
			}
			.btn-main {
			    border: 1px solid;
			    background-color: #BB8A5B;
			    padding: 0 10px 0 10px;
			    width: 75%;
			}

			.btn-main:hover {
			    background-color: #794B29;
			    color: #fff;
			}
			.comment-area textarea{
			    resize: none; 
			    border: 1px solid #ad9f9f;
			}
			.form-control:focus {
			    color: #495057;
			    background-color: #fff;
			    border-color: #0D6EFD;
			}
			.comment-area textarea{
			    resize: none; 
			    border: 1px solid #ad9f9f;
			    width: 100%;
			    height: 25px;
			    border-radius: 0;
			    font-size: 15px;
			}
			.comment-area{
				border: 1px solid;
				border-radius: 25px;
				padding: 5px 20px;
				display: flex;
				align-items: center;
				background-color: #fff;
			}
			.card {
			    display: flex; 
			    justify-content: center; 
			    align-items: center; 
			    width: 75%; 
			    margin: 10px 5px;
			    padding: 5px 0 10px;
			    box-shadow: 5px 6px 6px 2px #e9ecef;
			    border-radius: 4px;
			    font-size: 1.5rem;
			    background-color: #fff;
			    color: #000;
			    border: 1px solid #D2D2D2;
			}
		</style>
	</head>
	<body>
		<div class="container">
        	<?php include('./include/admin_header.php') ?>

        	<!-- Main Content -->
        	<main>
	            <h1>Product Orders</h1>
	           
	            <!-- New Users Section -->
	            <div class="new-users">
	                <div class="user-list" style="gap: 5px;">
	                	<div style="width: 100%; display: flex; flex-direction: row; text-align: center;">
	                		<div style="width: 33.33%;">Item</div>
	                		<div style="width: 16.66%;">Price</div>
	                		<div style="width: 16.66%;">Date</div>
	                		<div style="width: 16.66%;">Status</div>
	                		<div style="width: 16.66%;">More</div>
	                	</div>
	                    <div class="border" style="width: 100%;"></div>
	                    <div id="orders-container" style="width: 100%;">
		                    <div style="width: 100%; text-align: center; margin-top: 10px;">
	    						<small>There are currently no orders.</small>
	    					</div>
		                	<!-- <div id="optionToggle" style="width: 100%; background-color: #fff; color: #000; display: none;">
			                    <div style="padding: 20px 20px;">
			                        <div style="width: 100%; display: flex; justify-content: center; text-align: center; padding: 10px 0;">
			                            <div style="max-width: 100%; min-width: 20%;">
			                                <button type="button" id="messageButton" style="color: #fff; background-color: royalblue; padding: 5px 10px; cursor: inherit;">
			                                	Message
			                                </button>
			                            </div>
			                        </div>
			                        <div style="width: 100%;">
			                            <div id="messageToggle" style="display: none;">
			                                <div style="width: 100%; background-color: #000; color: #fff; text-align: center; padding: 5px 0;">Chat with SBM</div>

					                        <div class="border" style="overflow-x:hidden; overflow-y:auto; height: 200px;" id="comments-container1-1"></div>

					                        <div style="width: 100%;">
												<form id="comment-form1-1" style="width: 100%; height: 100%; margin: 0 auto;">
													<input type="hidden" name="id" value="id"/>
													<input type="hidden" name="email" value="email"/>
													<input type="hidden" name="role" value="role"/>
													<input type="hidden" name="date" value="date" id="dateInput1-1"/>
													<div class="comment-area">
														<textarea class="form-control" placeholder="Type your message here." rows="1" name="comment" id="comment1-1"></textarea>
													</div>
													<div style="display: flex; justify-content: center">
														<button type="submit" class="btn-main" style="margin: 10px 0; padding: 10px 0; width: 75%; border-radius: 25px;">Send</button>
													</div>
												</form>
					                        </div>
			                            </div>
			                        </div>
			                    </div>
			                </div> -->
			            </div>
	                </div>
	            </div>
	            <!-- End of New Users Section -->

        	</main>
        	<!-- End of Main Content -->

	        <!-- Right Section -->
	        <div class="right-section">
	            <div class="nav">
	                <button id="menu-btn">
	                    <span class="material-icons-sharp">
	                        menu
	                    </span>
	                </button>
	                <div class="dark-mode">
	                    <span class="material-icons-sharp active">
	                        light_mode
	                    </span>
	                    <span class="material-icons-sharp">
	                        dark_mode
	                    </span>
	                </div>
            	</div>
            	<!-- End of Nav -->
            	<div class="reminders">
	                <div class="header">
	                    <h2>Options</h2>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="default">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Default</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="pending">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Pending</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="on-the-way">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>On-The-Way</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="delivered">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Delivered</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="canceled">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Canceled</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="rejected">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Rejected</h3>
	                    </button>
	                </div>
	            </div>
        	</div>
    	</div>
    </body>
    <script src="./js/admin.js"></script>
    <script>
    	$(document).ready(function () {
    	    // Add a click event listener to the div elements with class "notification add-reminder"
    	    $(".notification.add-reminder").on("click", function () {
    	        // Get the data-action attribute value to determine the action
    	        var action = $(this).data("action");

    	        // Call the appropriate function based on the action
    	        if (action === "default") {
    	            showDefault()
    	        } else if (action === "pending") {
    	            showPending();
    	        }else if (action === "on-the-way") {
    	            showOTW();
    	        }else if (action === "delivered") {
    	            showDelivered();
    	        }else if (action === "canceled") {
    	            showCanceled();
    	        }else if (action === "rejected") {
    	        	showRejected();
    	        }else{
    	        	showDefault()
    	        }
    	    });

        	function showDefault() {
    		    // Make an AJAX request
    		    $.ajax({
    		        url: "./php/get_defaultorders.php",
    		        method: "GET",
    		        success: function (data) {
    		            // Handle the AJAX response here
    		            $("#orders-container").html(data);
    		        },
    		        error: function (xhr, status, error) {
    		            console.error("AJAX Request Error:", status, error);
    		        }
    		    });
    		}

    		function showPending() {
    		    // Make an AJAX request
    		    $.ajax({
    		        url: "./php/get_pendingorders.php",
    		        method: "GET",
    		        success: function (data) {
    		            // Handle the AJAX response here
    		            $("#orders-container").html(data);
    		        },
    		        error: function (xhr, status, error) {
    		            console.error("AJAX Request Error:", status, error);
    		        }
    		    });
    		}

    		function showOTW() {
    		    // Make an AJAX request
    		    $.ajax({
    		        url: "./php/get_otworders.php",
    		        method: "GET",
    		        success: function (data) {
    		            // Handle the AJAX response here
    		            $("#orders-container").html(data);
    		        },
    		        error: function (xhr, status, error) {
    		            console.error("AJAX Request Error:", status, error);
    		        }
    		    });
    		}

    		function showDelivered() {
    		    // Make an AJAX request
    		    $.ajax({
    		        url: "./php/get_deliveredorders.php",
    		        method: "GET",
    		        success: function (data) {
    		            // Handle the AJAX response here
    		            $("#orders-container").html(data);
    		        },
    		        error: function (xhr, status, error) {
    		            console.error("AJAX Request Error:", status, error);
    		        }
    		    });
    		}

    		function showCanceled() {
    		    // Make an AJAX request
    		    $.ajax({
    		        url: "./php/get_canceledorders.php",
    		        method: "GET",
    		        success: function (data) {
    		            // Handle the AJAX response here
    		            $("#orders-container").html(data);
    		        },
    		        error: function (xhr, status, error) {
    		            console.error("AJAX Request Error:", status, error);
    		        }
    		    });
    		}

    		function showRejected() {
    		    // Make an AJAX request
    		    $.ajax({
    		        url: "./php/get_rejectedorders.php",
    		        method: "GET",
    		        success: function (data) {
    		            // Handle the AJAX response here
    		            $("#orders-container").html(data);
    		        },
    		        error: function (xhr, status, error) {
    		            console.error("AJAX Request Error:", status, error);
    		        }
    		    });
    		}

    		showDefault();
    	});
    </script>
    <script>
    	$(document).ready(function () {
    	  $(document).on("submit", ".dynamic-form", function (event) {
    	    event.preventDefault();
    	    var idValue = $(this).find("input[name='id']").val();
    	    var optionToggle = $("#optionToggle" + idValue);

    	    // Check the current state of the element
    	    if (optionToggle.css("display") === "none") {
    	      optionToggle.css("display", "block"); // If hidden, make it visible
    	    } else {
    	      optionToggle.css("display", "none"); // If visible, hide it
    	    }
    	  });
    	});
    </script>
    <script>
    	// $(document).ready(function () {

    		// Add a click event listener to the div elements with class "notification add-reminder"
    	    $(document).on("click", ".status-form", function () {
    	        // Get the data-action attribute value to determine the action
    	        var action = $(this).data("action");

    	        // Call the appropriate function based on the action
    	        if (action === "otw") {
    	            $.ajax({
    	                type: "POST", // You can change the HTTP method as needed
                        url: "./php/otw_order.php", // URL of your PHP script
                        data: $(this).find('input').serialize(), // Serialize form data if needed
                        success: function () {
                            window.location.href = "product.php";
                        },
    	                error: function (xhr, status, error) {
    	                    console.error("AJAX Request Error:", status, error);
    	                }
    	            });
    	        }else if (action === "delivered") {
    	            $.ajax({
                        type: "POST", // You can change the HTTP method as needed
                        url: "./php/delivered_order.php", // URL of your PHP script
                        data: $(this).find('input').serialize(), // Serialize form data if needed
                        success: function () {
                            window.location.href = "product.php";
                        },
                        error: function (xhr, status, error) {
                            console.error("AJAX Request Error:", status, error);
                        }
                    });
    	        }else if (action === "Rejected") {
    	        	$.ajax({
        	            type: "POST", // You can change the HTTP method as needed
        	            url: "./php/rejected_order.php", // URL of your PHP script
        	            data: $(this).find('input').serialize(), // Serialize form data if needed
        	            success: function () {
        	                window.location.href = "product.php";
        	            },
        	            error: function (xhr, status, error) {
        	                console.error("AJAX Request Error:", status, error);
        	            }
        	        });
    	        }else{
	        	    var id = $(this).find("input[name='id']").val();
	        	    var messageToggle = $("#messageToggle" + id);

	        	    if (messageToggle.css("display") === "none") {
		        	    messageToggle.css("display", "block"); // If hidden, make it visible

		        	    function showComments() {

		        	    	var rowCount = $("input[name='row']").val();
		        	    	rowCount = parseInt(rowCount);

		        	        var looop = 1;

		        	        function makeAjaxRequest() {
		        	            $.ajax({
		        	                url: "./php/get_productmessages.php",
		        	                method: "GET",
		        	                data: {
		        	                	date: $("#dateInput" + looop + "-" + looop).val(),
		        	                	email: $("#emailInput" + looop + "-" + looop).val()
		        	                },
		        	                success: function (data) {
		        	                    $("#comments-container" + looop + "-" + looop).html(data);

		        	                    looop++;

		        	                    if (looop <= rowCount) {
		        	                        makeAjaxRequest();
		        	                    }
		        	                }
		        	            });
		        	        }

		        	        makeAjaxRequest();

		        	    }

		        	    showComments()

		        	    var rowCount = $("input[name='row']").val();
		        	    rowCount = parseInt(rowCount);

		        	    for (var i = 1; i <= row_count; i++) {
		        	        var formId = "comment-form" + i + "-" + i;

		        	        $("#" + formId).submit(function (e) {
		        	            e.preventDefault(); // Prevent the form from submitting traditionally

		        	            // var formData = $(this).serialize();

		        	            // $.ajax({
		        	            //     url: "./php/add_messages.php", // PHP script to insert comments into the database
		        	            //     method: "POST",
		        	            //     data: formData,
		        	            //     success: function (data) {
		        	            //         // If successful, show the updated comments
		        	            //         showComments();
		        	            //     }
		        	            // });

		        	            $(this).find('textarea[name="comment"]').val('');
		        	        });
		        	    }

	        	    } else {
	        	      messageToggle.css("display", "none"); // If visible, hide it
	        	    }
    	        }
    	    });
    </script>
</html>
<?php 
}else{
    echo"<script>alert('Notice: Please login to an administrative account.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>