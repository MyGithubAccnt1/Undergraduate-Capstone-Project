<?php
include("connect.php");
$sql = "SELECT * FROM product ORDER BY popularity ASC LIMIT 4 OFFSET 0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo '<div class="col-sm-12 col-md-4 col-lg-3 mb-3">';
			echo '<div class="thumb-wrapper cool">';	
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
						echo '<p class="item-price">Price: ₱<b>' . $row['price'] . '</b></p>';
						echo '<button type="submit" class="btn">View</button>';
					echo '</form>';
				echo '</div>';
			echo '</div>';
		echo '</div>';
	}
} else {
	echo '<p class="w-100 text-center text-dark">[There is no available product at the moment]</p>';
}

mysqli_close($conn);
?>