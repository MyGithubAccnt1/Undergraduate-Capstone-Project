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
			aside .sidebar a.mail-act{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.mail-act::before{
				width: 100%;
				color: var(--color-primary);
				background-color: var(--color-light);
				margin-left: 0;
			}
			aside .sidebar a.mail-act span{
				color: var(--color-primary);
				margin-left: calc(1rem - 3px);
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
			    margin: 10px 0;
			    padding: 5px 0 10px;
			    border-radius: 5px;
			    font-size: 1.5rem;
			    background-color: #fff;
			    color: #000;
			}
		</style>
	</head>
	<body>
		<div class="container">
        	<?php include('./include/admin_header.php') ?>

        	<!-- Main Content -->
        	<main>
        		<section>
        			<h1>Mailbox</h1>
        			<div style="border: 1px solid;"></div>
        		</section>

        		<!-- New Users Section -->
	            <div class="new-users">
	                <div class="user-list" style="padding: 25px 10px; display: flex; align-items: center;">
	                    <div style="width: 100%;">
	                        <div style="overflow-x:hidden; overflow-y:auto; height: 350px; width: 100%;" id="comments-container">
                        		<div class="card" style="margin-left: auto;">
                        			<div style="display: flex; flex-direction: row; justify-content: space-around; align-items: center; width: 100%; margin-left: 10px;">
                        				<span>
                        					<small style="color: #FFC107;">[Administrator]</small>
                        					<small>says: hahahahahahahahaha</small>
                        				</span>
                        				<div>
                        					<small>00-00-000</small>
                        				</div>
                        			</div>
                        		</div>
                        		<div class="card" style="margin-right: auto;">
                        			<div style="display: flex; flex-direction: row; justify-content: space-around; align-items: center; width: 100%; 100%; margin-left: 10px;">
                        				<span>
                        					<small style="color: #0D6EFD;">[User: 00]</small>
                        					<small>says: hahahahahahahahaha</small>
                        				</span>
                        				<div>
                        					<small>00-00-000</small>
                        				</div>
                        			</div>
                        		</div>
	                        </div>
	                    </div>
	                </div>
	                <div class="user-list" style="padding: 25px 10px; display: flex; align-items: center;">
	                    <div style="width: 100%; height: 70px; margin: 0;">
	                        <form id="comment-form" style="width: 100%; height: 100%; margin: 0 auto;">
	                        	<div class="comment-area">
	                        		<textarea class="form-control" placeholder="Type your message here." rows="1" name="comment" id="comment"></textarea>
	                        	</div>
	                        	<div style="display: flex; justify-content: center">
	                        		<button type="submit" class="btn-main" style="margin: 10px 0; padding: 10px 0; width: 75%; border-radius: 25px;">Send</button>
	                        	</div>
	                        </form>
	                    </div>
	                </div>
	                
	            </div>
	            <!-- End of New Users Section -->
	        </main>

	        <!-- Right Section -->
	        <section class="right-section">
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

	        	<h1 style="text-align: center; width: 100%">Users</h1>
	        	<div class="reminders">
	        		<?php
	        		include('./php/connect.php');
	        		$id = 0;
	        		$sql = "SELECT DISTINCT sender, email, deyt FROM message ORDER BY id DESC";
	        		$result = $conn->query($sql);
	        		if ($result->num_rows > 0) {
	        		    // output data of each row
	        		    while ($row = $result->fetch_assoc()) {
	        		    	$id = $id + 1;
	        		        ?>
	        		        <form id="comment-form<?php echo $id; ?>-<?php echo $id; ?>">
	        		        	<div class="notification add-reminder">
	        		        		<input type="hidden" name="id" value="<?php echo $row['sender']?>" id="idInput<?php echo $id; ?>-<?php echo $id; ?>">
    		        		        <input type="hidden" name="email" value="<?php echo $row['email']?>">
    		        		        <input type="hidden" name="date" value="<?php echo $row['deyt']?>" id="dateInput<?php echo $id; ?>-<?php echo $id; ?>"/>
    		        		        <?php
    		        		        include('./php/connect.php');
    		        		        $rowsql = "SELECT DISTINCT email, deyt FROM message ORDER BY id DESC";
    		        		        $rowresult = $conn->query($rowsql);
    		        		        if ($rowresult) {
    		        		            $row_count = $rowresult->num_rows;
    		        		        ?>
    		        		            <input type="hidden" name="row" value="<?php echo $row_count; ?>"/>
    		        		        <?php
    		        		        } else {

    		        		        }
    		        		        ?>
	        		        		<button type="submit" style="background-color: inherit; color: inherit;">
		        		        		<span style="margin-right: 75px;">
	        		        		        <small><?php echo $row['email']?></small>
	        		        		    </span>
	    		        		        <small class="text_muted">
	    		        		            <?php echo $row['deyt']?>
	    		        		        </small>
	        		        		</button>
			        		    </div>
	        		        </form>
	        		        <?php
	        		    }
	        		} else {
        		    	echo '<div class="d-flex justify-content-center mt-5">';
        		        echo '<small>No message found.</small>';
        		        echo '</div>';
	        		}
	        		$conn->close();
	        		?>
	        	</div>
	        </section>
	    </div>
    </body>
	<script>
		function showComments() {
		    var rowCount = $("input[name='row']").val(); // Retrieve the number of rows from the hidden input

		    // Ensure rowCount is a valid number (e.g., convert it to an integer)
		    rowCount = parseInt(rowCount);

		    var looop = 1;

		    function makeAjaxRequest(looop, rowCount) {
		        // Make an AJAX request
		        $.ajax({
		            url: "./php/get_adminmessages.php",
		            method: "GET",
		            data: { date: $("#dateInput5-5").val(), id: $("#idInput5-5").val() },
		            success: function (data) {
		                // Handle the AJAX response here
		                $("#comments-container").html(data);

		                // Increment the loop counter
		                looop++;

		                // Check if there are more iterations to perform
		                if (looop <= rowCount) {
		                    // Make the next AJAX request
		                    makeAjaxRequest(looop, rowCount);
		                }
		            }
		        });
		    }


		    // Start the first AJAX request
		    makeAjaxRequest();
		}
		
	    // Attach the form submission handler to the form with the unique ID
	    $("#comment-form").submit(function (e) {
	        e.preventDefault(); // Prevent the form from submitting traditionally

	        // Serialize the form data
	        var formData = $(this).serialize();

	        // Send the data to the PHP script to handle comment insertion
	        $.ajax({
	            url: "./php/add_adminmessages.php", // PHP script to insert comments into the database
	            method: "POST",
	            data: formData,
	            success: function (data) {
	                // If successful, show the updated comments
	                showComments();
	            }
	        });

	        // Clear the textarea for the current form
	        $(this).find('textarea[name="comment"]').val('');
	    });

        // Show comments on page load
        showComments();
        setInterval(showComments, 1000);
	</script>
</html>
<?php 
}else{
    echo"<script>alert('Notice: Please login to an administrative account.')</script>";
    $script = "<script>window.location = 'signin.php';</script>";
    echo $script;
}
?>