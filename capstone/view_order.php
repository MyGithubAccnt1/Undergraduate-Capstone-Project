<!doctype html>
<html lang="en">
	<head>
	  	<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<title>Saint Benedict Medallion</title>
	  	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ICO">
	  	<?php $IPATH = $_SERVER["DOCUMENT_ROOT"]."/capstone/"; include($IPATH."include.html"); ?>
	</head>
	<body class="font-monospace">
		<?php include($IPATH."header.html"); ?>
		<main class="container-fluid my-4 my-width">
			<div class="row text-center">
                <h2>VIEW ORDERS</h2>
                <div class="col-4">Item</div>
                <div class="col-2">Price</div>
                <div class="col-2">Date</div>
                <div class="col-2">Status</div>
                <div class="col-2">Options</div>
                <div class="bg-dark rounded" style="height: 3px;"></div>
            </div>
            <div class="row">
                <div class="border border-white mt-3 card" style="background-color: lightgreen;">
                    <div class="row text-center my-1">
                        <div class="col-4">SET 1, SET 3, SET 11</div>
                        <div class="col-2">₱1,499</div>
                        <div class="col-2">1-1-2023</div>
                        <div class="col-2">Pending</div>
                        <div class="col-2">
                            <a data-toggle="collapse" href="#collapseExample1">
                                <i class="fas fa-ellipsis-h" style="color: #000000;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapseExample1">
                    <div class="card card-body">
                        <div class="row text-center d-flex align-items-center">
                            <div class="col-12 col-md-6">
                                <button class="btn btn-danger btn-sm rounded-0">Cancel Order</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-check form-switch d-flex flex-row justify-content-center mt-3">
                                    <h5 class="text-center">MESSAGE "ON"</h5>
                                    <input class="form-check-input" type="checkbox" data-toggle="collapse" href="#collapseExample12">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="collapse" id="collapseExample12">
                                <div class="stick-top bg-dark text-center text-white py-2">Chat with SBM</div>
                                <div class="border card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;">
                                    <div class="card p-3 mx-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">james_olesenn</small> <small class="font-weight-bold">Thanks</small></span>
                                            </div>
                                            <small>2 days ago</small>
                                        </div>
                                    </div>
                                    <div class="card p-3 mx-4 my-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">olan_sams</small> <small class="font-weight-bold">Loving your work and profile!</small></span>
                                            </div>
                                            <small>3 days ago</small>
                                        </div>
                                    </div>
                                    <div class="card p-3 mx-4 my-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">rashida_jones</small> <small class="font-weight-bold">Really cool Which filter are you using?</small></span>
                                            </div>
                                            <small>3 days ago</small>
                                        </div>
                                    </div>
                                    <div class="card p-3 mx-4 my-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">simona_rnasi</small> <small class="font-weight-bold">Hmm, This poster looks cool</small></span>
                                            </div>
                                            <small>3 days ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="stick-bot">
                                    <div class="comment-area">
                                        <textarea class="form-control rounded-0" placeholder="Type your message here." rows="1"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button class="btn btn-primary rounded-pill btn-md w-75">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border border-white mt-3 card" style="background-color: indianred;">
                    <div class="row text-center my-1">
                        <div class="col-4">SET 6, SET 9</div>
                        <div class="col-2">₱499</div>
                        <div class="col-2">1-1-2023</div>
                        <div class="col-2">Canceled</div>
                        <div class="col-2">
                            <a data-toggle="collapse" href="#collapseExample2">
                                <i class="fas fa-ellipsis-h" style="color: #000000;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapseExample2">
                    <div class="card card-body">
                        <div class="row text-center d-flex align-items-center">
                            <div class="col-12 col-md-6">
                                <button class="btn btn-danger btn-sm rounded-0">Cancel Order</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-check form-switch d-flex flex-row justify-content-center mt-3">
                                    <h5 class="text-center">MESSAGE "ON"</h5>
                                    <input class="form-check-input" type="checkbox" data-toggle="collapse" href="#collapseExample22">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="collapse" id="collapseExample22">
                                <div class="stick-top bg-dark text-center text-white py-2">Chat with SBM</div>
                                <div class="border card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;">
                                    <div class="card p-3 mx-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">james_olesenn</small> <small class="font-weight-bold">Thanks</small></span>
                                            </div>
                                            <small>2 days ago</small>
                                        </div>
                                    </div>
                                    <div class="card p-3 mx-4 my-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">olan_sams</small> <small class="font-weight-bold">Loving your work and profile!</small></span>
                                            </div>
                                            <small>3 days ago</small>
                                        </div>
                                    </div>
                                    <div class="card p-3 mx-4 my-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">rashida_jones</small> <small class="font-weight-bold">Really cool Which filter are you using?</small></span>
                                            </div>
                                            <small>3 days ago</small>
                                        </div>
                                    </div>
                                    <div class="card p-3 mx-4 my-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">simona_rnasi</small> <small class="font-weight-bold">Hmm, This poster looks cool</small></span>
                                            </div>
                                            <small>3 days ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="stick-bot">
                                    <div class="comment-area">
                                        <textarea class="form-control rounded-0" placeholder="Type your message here." rows="1"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button class="btn btn-primary rounded-pill btn-md w-75">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="border border-white mt-3 card" style="background-color: lightgoldenrodyellow;">
                    <div class="row text-center my-1">
                        <div class="col-4">Customize Necklace</div>
                        <div class="col-2">₱499</div>
                        <div class="col-2">1-1-2023</div>
                        <div class="col-2">Reviewing...</div>
                        <div class="col-2">
                            <a data-toggle="collapse" href="#collapseExample31">
                                <i class="fas fa-ellipsis-h" style="color: #000000;"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="collapse" id="collapseExample31">
                    <div class="card card-body">
                        <div class="row text-center d-flex align-items-center">
                            <div class="col-12 col-md-6">
                                <button class="btn btn-danger btn-sm rounded-0">Cancel Order</button>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="form-check form-switch d-flex flex-row justify-content-center mt-3">
                                    <h5 class="text-center">MESSAGE "ON"</h5>
                                    <input class="form-check-input" type="checkbox" data-toggle="collapse" href="#collapseExample32">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="collapse" id="collapseExample32">
                                <div class="stick-top bg-dark text-center text-white py-2">Chat with SBM</div>
                                <div class="border card-body" style="overflow-x:hidden; overflow-y:auto; height: 200px;">
                                    <div class="card p-3 mx-4">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">james_olesenn</small> <small class="font-weight-bold">Thanks</small></span>
                                            </div>
                                            <small>2 days ago</small>
                                        </div>
                                    </div>
                                    <div class="card p-3 mx-4 my-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">olan_sams</small> <small class="font-weight-bold">Loving your work and profile!</small></span>
                                            </div>
                                            <small>3 days ago</small>
                                        </div>
                                    </div>
                                    <div class="card p-3 mx-4 my-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">rashida_jones</small> <small class="font-weight-bold">Really cool Which filter are you using?</small></span>
                                            </div>
                                            <small>3 days ago</small>
                                        </div>
                                    </div>
                                    <div class="card p-3 mx-4 my-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex flex-row align-items-center">
                                                <span><small class="font-weight-bold text-primary">simona_rnasi</small> <small class="font-weight-bold">Hmm, This poster looks cool</small></span>
                                            </div>
                                            <small>3 days ago</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="stick-bot">
                                    <div class="comment-area">
                                        <textarea class="form-control rounded-0" placeholder="Type your message here." rows="1"></textarea>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button class="btn btn-primary rounded-pill btn-md w-75">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
		</main>
		<?php include($IPATH."footer.html"); ?>
		<script type="text/javascript">
			var navigation = document.querySelector("header");
			window.onload = navigation.classList.toggle('bg-dark');
		</script>
		<script type="text/javascript">
		    var toggleClick = document.querySelector(".box,.icon");
		    var navigation = document.querySelector("header");
		    var removeClick = document.querySelector(".close");
		    toggleClick.addEventListener('click', ()=>{
		        navigation.classList.toggle('active-nav');
		    })
		    removeClick.addEventListener('click', ()=>{
		        navigation.classList.remove('active-nav');
		    })
		</script>
	</body>
</html>