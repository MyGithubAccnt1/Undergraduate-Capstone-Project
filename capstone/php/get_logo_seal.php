<?php
include("connect.php");
$filter = mysqli_real_escape_string($conn, $_GET['filter']);
$min_price = mysqli_real_escape_string($conn, $_GET['min_price']);
$max_price = mysqli_real_escape_string($conn, $_GET['max_price']);
$page = mysqli_real_escape_string($conn, $_GET['page']);

$checksql = "SELECT COUNT(*) AS total_rows FROM product WHERE category = 'Logo'";
$checkresult = $conn->query($checksql);
if ($checkresult->num_rows > 0) {
    $checkrow = $checkresult->fetch_assoc();
    $maxrow = $checkrow["total_rows"];
    if ($page >= $maxrow) {
        $page = $maxrow - 8;
        if ($page < 0) {
        	$page = 0;
        }
    }
}

if ($filter === "None") {

	$sql = "SELECT * FROM product WHERE category = 'Logo' ORDER BY popularity DESC LIMIT 8 OFFSET $page";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo '<div class="col-sm-12 col-md-4 col-lg-3 mb-3">';
				echo '<div class="thumb-wrapper">';
					echo '<div class="img-box">';
						echo '<img src="'. $row['thumbnail'] .'" class="img-responsive" alt="Missing Image">';
						echo '<input type="hidden" name="image" value="' . $row['thumbnail'] . '">';
					echo '</div>';
					echo '<div class="thumb-content">';
						echo '<form action="" id="viewProduct">';
							echo '<input type="hidden" name="title" value="'. $row['title'] .'">';
							echo '<input type="hidden" name="thumbnail" value="' . $row['thumbnail'] . '">';
							echo '<input type="hidden" name="price" value="'. $row['price'] .'">';
							echo '<input type="hidden" name="description" value="'. $row['description']. '">';
							echo '<input type="hidden" name="category" value="'. $row['category'] .'">';
							echo '<h5> '. $row['title'] .'</h5>';
							echo '<p>Views: '. $row['popularity'] .'</p>';
							echo '<p class="item-price">Price: <b>PHP '. $row['price'] .'</b></p>';
							echo '<button type="submit" class="btn">View</button>';
							echo '<input type="hidden" name="page" value="'. $page .'">';
						echo '</form>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	} else {
		echo '<p class="w-100 text-center text-dark">[There is no available product at the moment]</p>';
	}

} elseif ($filter === "Price") {
	
	$sql = "SELECT * FROM product WHERE category = 'Logo' and price between '$min_price' and '$max_price' ORDER BY popularity DESC LIMIT 8 OFFSET $page";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo '<div class="col-sm-12 col-md-4 col-lg-3 mb-3">';
				echo '<div class="thumb-wrapper">';
					echo '<div class="img-box">';
						echo '<img src="' . $row['thumbnail'] . '" class="img-responsive" alt="Missing Image">';
						echo '<input type="hidden" name="image" value="' . $row['thumbnail'] . '">';
					echo '</div>';
					echo '<div class="thumb-content">';
						echo '<form action="" id="viewProduct">';
							echo '<input type="hidden" name="title" value="' . $row['title'] . '">';
							echo '<input type="hidden" name="thumbnail" value="' . $row['thumbnail'] . '">';
							echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
							echo '<input type="hidden" name="description" value="' . $row['description'] . '">';
							echo '<input type="hidden" name="category" value="' . $row['category'] . '">';
							echo '<h5> ' . $row['title'] . '</h5>';
							echo '<p>Views: ' . $row['popularity'] . '</p>';
							echo '<p class="item-price">Price: <b>PHP ' . $row['price'] . '</b></p>';
							echo '<button type="submit" class="btn">View</button>';
							echo '<input type="hidden" name="page" value="'. $page .'">';
						echo '</form>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	} else {
		echo '<p class="w-100 text-center text-dark">[There is no available product at range.]</p>';
	}

} else {

	$sql = "SELECT * FROM product WHERE category = 'Logo' ORDER BY popularity DESC LIMIT 8 OFFSET $page";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			echo '<div class="col-sm-12 col-md-4 col-lg-3 mb-3">';
				echo '<div class="thumb-wrapper">';
					echo '<div class="img-box">';
						echo '<img src="' . $row['thumbnail'] . '" class="img-responsive" alt="Missing Image">';
						echo '<input type="hidden" name="image" value="' . $row['thumbnail'] . '">';
					echo '</div>';
					echo '<div class="thumb-content">';
						echo '<form action="" id="viewProduct">';
							echo '<input type="hidden" name="title" value="' . $row['title'] . '">';
							echo '<input type="hidden" name="thumbnail" value="' . $row['thumbnail'] . '">';
							echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
							echo '<input type="hidden" name="description" value="' . $row['description'] . '">';
							echo '<input type="hidden" name="category" value="' . $row['category'] . '">';
							echo '<h5> ' . $row['title'] . '</h5>';
							echo '<p>Views: ' . $row['popularity'] . '</p>';
							echo '<p class="item-price">Price: <b>PHP ' . $row['price'] . '</b></p>';
							echo '<button type="submit" class="btn">View</button>';
							echo '<input type="hidden" name="page" value="'. $page .'">';
						echo '</form>';
					echo '</div>';
				echo '</div>';
			echo '</div>';
		}
	} else {
		echo '<p class="w-100 text-center text-dark">[There is no available product at the moment]</p>';
	}

}

mysqli_close($conn);
?>