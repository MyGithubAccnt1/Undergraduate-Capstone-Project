<?php
session_start();
if (isset($_POST['maxPrice'], $_POST['minPrice'])) {

    include('./php/connect.php');

    global $conn;

    $maxPrice = $_POST['maxPrice'];
    $minPrice = $_POST['minPrice'];

    $sql = "SELECT price, title, thumbnail FROM product WHERE price BETWEEN ? AND ?";

    $stmt = $conn->prepare($sql);

    //bind parameters
    $stmt->bind_param("ii", $minPrice, $maxPrice);

    // execute prepared statement
    $stmt->execute();

    //get result
    $result = $stmt->get_result();

    $products = array();

    while ($data = $result->fetch_assoc()) {
        $products[] = [
            'price' => $data['price'],
            'title' => $data['title'],
            'thumbnail' => $data['thumbnail'],
        ];
    }

    echo json_encode($products);
    die();
}

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
			.btn-necklaces {
			    background-color: #794B29;
			    color: white;
			}

			.product-card {
			    margin: 15px 0;
			}

			.product-button {
			    width: 50%;
			}
		</style>
	</head>
	<body class="font-monospace">
		<?php include('./include/header.php') ?>
		<main class="container-fluid m-0 p-0">
			<section class="my-width mx-auto">
				<div class="container">
				    <div class="row d-flex align-items-center">
				        <div class="col-sm-12 col-md-12 col-lg-4">
				            <div class="card px-2">
				                <h2 class="text-center">Filter by</h2>
				                <h4 class="text-center">
				                    <hr>
				                    <div class="form-switch p-0 d-flex justify-content-center">
				                    	<h5 class="my-auto">PRICE</h5>
				                      	<input class="form-check-input my-auto" type="checkbox" data-toggle="collapse" href="#collapseExample" onclick="submitcomment();">
				                    </div>
				                    <hr>
				                </h4>
				                <div class="collapse" id="collapseExample">
					                <div class="card-body">
					                    <form id="price-range-form" method="post" action="#">
					                        <label for="min-price" class="form-label">Min price: </label>
					                        <span id="min-price-txt">₱0</span>
					                        <input type="range" class="form-range" min="0" max="999" id="min-price" step="1" value="0">
					                        <label for="max-price" class="form-label">Max price: </label>
					                        <span id="max-price-txt">₱1000</span>
					                        <input type="range" class="form-range" min="1" max="1000" id="max-price" step="1"
					                               value="1000">
					                    </form>
					                </div>
					            </div>
				            </div>
				        </div>
				        <div class="col-sm-12 col-md-12 col-lg-8">
				            <div class="card">
				                <div class="card-body">
				                    <div class="carousel slide p-0" data-ride="carousel" data-interval="0">
				                        <!-- Wrapper for carousel items -->
				                        <div class="carousel-inner" style="width: 100%">
				                            <div class="item carousel-item active" style="overflow-x: auto;">
				                                <div id="productSection" class="d-flex flex-direction-row gap-4"
				                                     style="height: auto;">
				                                    <?php
				                                    include('./php/connect.php');
				                                    $sql = "SELECT price, title, thumbnail FROM product";
				                                    $result = $conn->query($sql);
				                                    if ($result->num_rows > 0) {
				                                        // output data of each row
				                                        while ($row = $result->fetch_assoc()) {
				                                            ?>
				                                            <div class="container p-0 m-0">
				                                                <div class="thumb-wrapper rounded-0 text-dark border border-dark m-0"
				                                                     style="width: 200px; background-color: #D0B89F;">
				                                                    <div class="img-box">
				                                                        <img src="<?php echo $row['thumbnail'] ?>" class="img-fluid"
				                                                             alt="Missing Image">
				                                                    </div>
				                                                    <div class="thumb-content">
				                                                        <form action="./php/get_product.php" method="POST">
				                                                            <input type="hidden" name="title" value="<?php echo $row['title']?>">
				                                                            <h4><?php echo $row['title']?></h4>
				                                                            <p class="item-price"><b>₱ <?php echo $row['price']?></b></p>
				                                                            <button type="submit" class="rounded-0 btn-main btn btn-md">View</button>
				                                                        </form>
				                                                    </div>
				                                                </div>
				                                            </div>
				                                            <?php
				                                        }
				                                    } else {
				                                        echo "0 results";
				                                    }
				                                    $conn->close();
				                                    ?>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
				    </div>
				</div>
			</section>
		</main>
		<?php include('./include/footer.php') ?>
		<script>
		    var toggleClick = document.querySelector(".box,.icon");
		    var navigation = document.querySelector("header");
		    var removeClick = document.querySelector(".close");
		    toggleClick.addEventListener('click', () => {
		        navigation.classList.toggle('active-nav');
		    })
		    removeClick.addEventListener('click', () => {
		        navigation.classList.remove('active-nav');
		    })
		</script>
		<script>

		    //form
		    const priceRangeForm = document.querySelector("#price-range-form");

		    const productSection = document.querySelector("#productSection");

		    //selector
		    const minPriceInput = document.querySelector("#min-price");
		    const maxPriceInput = document.querySelector("#max-price");

		    // labels
		    const minPriceLabel = document.querySelector("#min-price-txt");
		    const maxPriceLabel = document.querySelector("#max-price-txt");

		    //fetch result whenever the value for min and max price change
		    const updateProductView = async () => {

		        const formData = new FormData();

		        formData.append('maxPrice', maxPriceInput.value);
		        formData.append('minPrice', minPriceInput.value);

		        const status = await fetch('#', {
		            method: 'POST',
		            body: formData
		        });

		        //json products receive
		        const data = await status.json();

		        //update displayer
		        createProductElement(data);
		    }

		    //call updateProductView when min price value change
		    minPriceInput.addEventListener('input', (event) => {
		        minPriceLabel.textContent = event.target.value;
		        updateProductView();
		    })

		    //call updateProductView when max price value change
		    maxPriceInput.addEventListener('input', (event) => {
		        maxPriceLabel.textContent = event.target.value;
		        updateProductView();
		    })

		    function createProductElement(products) {

		        //make div empty
		        productSection.innerHTML = "";

		        //show warning when none products
		        if (products.length <= 0) {
		            productSection.innerHTML = "No Products Found In range";
		        }

		        //loop through each product and create the necessary details
		        products.forEach(productData => {

		            const containerDiv = document.createElement('div');
		            containerDiv.classList.add('container', 'p-0', 'm-0');

		            const thumbWrapperDiv = document.createElement('div');
		            thumbWrapperDiv.classList.add('thumb-wrapper', 'rounded-0', 'text-dark', 'border', 'border-dark', 'm-0');
		            thumbWrapperDiv.style.width = '200px';
		            thumbWrapperDiv.style.backgroundColor = '#D0B89F';

		            const imgBoxDiv = document.createElement('div');
		            imgBoxDiv.classList.add('img-box');

		            const imgElement = document.createElement('img');
		            imgElement.src = productData.thumbnail;
		            imgElement.classList.add('img-fluid');
		            imgElement.alt = 'Missing Image';

		            imgBoxDiv.appendChild(imgElement);

		            const thumbContentDiv = document.createElement('div');
		            thumbContentDiv.classList.add('thumb-content');

		            const form = document.createElement('form');
		            form.action = './php/get_product.php';
		            form.method = 'POST';

		            const titleInput = document.createElement('input');
		            titleInput.type = 'hidden';
		            titleInput.name = 'title';
		            titleInput.value = productData.title;

		            const titleHeading = document.createElement('h4');
		            titleHeading.textContent = productData.title;

		            const priceParagraph = document.createElement('p');
		            priceParagraph.classList.add('item-price');
		            priceParagraph.innerHTML = '<b>₱ ' + productData.price + '</b>';

		            const viewButton = document.createElement('button');
		            viewButton.classList.add('rounded-0', 'btn-main', 'btn', 'btn-md');
		            viewButton.textContent = 'View';
		            viewButton.type = 'Submit';

		            form.appendChild(titleInput);
		            form.appendChild(titleHeading);
		            form.appendChild(priceParagraph);
		            form.appendChild(viewButton);
		            thumbContentDiv.appendChild(form);

		            thumbWrapperDiv.appendChild(imgBoxDiv);
		            thumbWrapperDiv.appendChild(thumbContentDiv);

		            containerDiv.appendChild(thumbWrapperDiv);

		            productSection.appendChild(containerDiv);
		        })

		    }
		</script>
	</body>
</html>
