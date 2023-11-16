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
			aside .sidebar a.temp-act{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.temp-act::before{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.temp-act span{
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
			.template-img {
				cursor: zoom-in;
			}

			.template-img:hover {
				background-color: rgba(0, 0, 0, 0.1);
			}
			.input-container {
				width: 100%;
				display: flex;
				flex-direction: row;
				align-items: center;
				margin-bottom: 5px;
				justify-content: left;
			}
			.input {
				border: 1px solid;
				margin: 5px 0;
				width: 75%;
				padding: 5px 5px 5px 10px;
				border-radius: 5px;
			}
			.input-button {
				padding: 8px 0;
				width: 100%;
				border: 1px solid;
				border-radius: 25px;
				font-weight: bold;
				border: 1px solid;
			    background-color: #BB8A5B;
			}
			.input-button:hover {
				background-color: #794B29;
			    color: #fff;
			}
			.responsive-button{
				display: flex;
				justify-content: space-around;
				width: 100%;
				padding: 10px 0;
				margin-top: 5px;
			}
			.responsive-button > div{
				width: 30%;
				padding: 0 5px;
			}
		</style>
	</head>
	<body>
		<div class="container">
        	<?php include('./include/admin_header.php') ?>
        	<main>
	            <h1>Orders</h1>
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
			            </div>
	                </div>
	            </div>
        	</main>
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

	                <div class="notification add-reminder" style="padding: 10px;" data-action="reviewed">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Reviewed</h3>
	                    </button>
	                </div>

	                <div class="notification add-reminder" style="padding: 10px;" data-action="impossible">
	                    <button style="width: 100%; padding: 10px 0; background-color: inherit; color: inherit;">
	                        <h3>Impossible</h3>
	                    </button>
	                </div>
	            </div>
        	</div>
    	</div>
    	<section id="imageToggle" style="top: 0; height: 100vh; width: 100%; position: absolute; z-index: 2; display: none; cursor: zoom-out;">
    		<img src="" style="height: 100%; width: auto; background-color: #fff; text-align: center; margin: 0 auto; border: 1px solid #000;" id="file" alt="Missing_Image">
    	</section>
    </body>
    <script src="./js/admin.js"></script>
    <script>
    	$(document).ready(function () {
    	    $(".notification.add-reminder").on("click", function () {
    	        var action = $(this).data("action");
    	        showDefault(action)
    	    });

        	function showDefault(action) {
    		    $.ajax({
    		        url: "./php/get_admintemplates.php",
    		        method: "GET",
    		        data: { action: action },
    		        success: function (data) {
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
	    $(document).on("click", "#image", function () {
	    	var top = window.pageYOffset || document.documentElement.scrollTop;
	        var image = $(this).find("input[name='image']").val();
	        var imageToggle = $("#imageToggle");

	        if (imageToggle.css("display") === "none") {
        	    imageToggle.css("display", "block");
        	    imageToggle.css('top', top);
        	    document.body.style.overflow = "hidden";
        	    $('#file').attr("src", image);
        	} else {
        		imageToggle.css("display", "none");
        		document.body.style.overflow = "";
        	}
	    });
	    $(document).on("click", "#imageToggle", function () {
	    	
	        var imageToggle = $("#imageToggle");

	        if (imageToggle.css("display") === "none") {
        	    
        	} else {
        		imageToggle.css("display", "none");
        		document.body.style.overflow = "";
        	}
	    });
	</script>
	<script>
	    $(document).on("click", ".status-form", function () {
	        // Get the data-action attribute value to determine the action
	        var action = $(this).data("action");

	        var rowCount = $("input[name='row']").val();
	        rowCount = parseInt(rowCount);

	        // Call the appropriate function based on the action
	        if (action === "message") {
	            var id = $(this).find("input[name='id']").val();
        	    var messageToggle = $("#messageToggle" + id);

        	    if (messageToggle.css("display") === "none") {
	        	    messageToggle.css("display", "block"); // If hidden, make it visible

	        	    function showComments(rowCount) {
	        	    	
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

	        	    showComments(rowCount)

	        	    for (var i = 1; i <= rowCount; i++) {
	        	        var formId = "comment-form" + i + "-" + i;

	        	        $("#" + formId).submit(function (e) {
	        	            e.preventDefault(); // Prevent the form from submitting traditionally

	        	            var formData = $(this).serialize();

	        	            $.ajax({
	        	                url: "./php/add_productmessages.php",
	        	                method: "POST",
	        	                data: formData,
	        	                success: function (data) {
	        	                    // If successful, show the updated comments
	        	                    showComments(rowCount);
	        	                }
	        	            });

	        	            $(this).find('textarea[name="comment"]').val('');
	        	        });
	        	    }

        	    } else {
        	      messageToggle.css("display", "none"); // If visible, hide it
        	    }
	        } else if (action === "update") {
	        	var id = $(this).find("input[name='id']").val();
        	    var price = $("#price" + id).val();
        	    $.ajax({
		            url: "./php/update_template_price.php",
		            method: "POST",
		            data: {
		            	id: id,
		            	price: price
		            },
		            success: function (data) {
		            	if (data === "1") {
		            		alert('Notice: ' + data + '.');
	                	} else if (data === "2") {
	                		alert('Notice: An item has been updated successfully.');
	                		window.location.href = "template.php";
	                	} else {
	                		alert('Notice: There is an unexpected error while updating the product, please try again.');
	                	}
		            },
			        error: function (xhr, status, error) {
			            console.error("AJAX Request Error:", status, error);
			        }
		        });
		    } else if (action === "delete") {
		    	if (confirm("Are you sure you want to delete this template?") === true) {

		            var id = $(this).find("input[name='id']").val();

		            $.ajax({
		                url: "./php/delete_template_order.php",
		                method: "POST",
		                data: {
			            	id: id
			            },
		                success: function (data) {
		                	if (data === "1") {
		                		window.location.href = "template.php";
		                	} else {
		                		alert('Notice: ' + data + '.');
		                	}
		                },
		    	        error: function (xhr, status, error) {
		    	            console.error("AJAX Request Error:", status, error);
		    	        }
		            });

	        	}
	        } else {
	            $.ajax({
	                type: "POST", // You can change the HTTP method as needed
                    url: "./php/change_orders.php", // URL of your PHP script
                    data: {
                        action: action, // Set the desired action value here
                        formData: $(this).find('input').serialize() // Serialize form data if needed
                    },
                    success: function () {
                        window.location.href = "template.php";
                    },
	                error: function (xhr, status, error) {
	                    console.error("AJAX Request Error:", status, error);
	                }
	            });
	        }
	    });
    </script>
</html>
<?php 
}else{
	echo"<script>var xlink = window.location.href;</script>";
	echo"<script>window.localStorage.setItem('xlink', xlink);</script>";
    echo"<script>alert('Notice: Please login to proceed.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>