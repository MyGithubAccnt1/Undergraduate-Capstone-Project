<?php
include("connect.php");
$counter = 0;
$sql = "SELECT * FROM product ORDER BY `id` DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$counter = $counter + 1;
		if ($counter > 9) {
			
		} else {
			echo '<div class="items">';
				echo '<form action="" id="viewProduct" class="img-box">';
					echo '
						<button type="submit" style="border: none; padding: 0;">
							<img src="' . $row['thumbnail'] . '" class="img-responsive" alt="Missing Image"/>
						</button>
					';
					echo '<input type="hidden" name="image" value="' . $row['thumbnail'] . '">';
					echo '<input type="hidden" name="title" value="' . $row['title'] . '">';
					echo '<input type="hidden" name="thumbnail" value="' . $row['thumbnail'] . '">';
					echo '<input type="hidden" name="price" value="' . $row['price'] . '">';
					echo '<input type="hidden" name="description" value="' . $row['description'] . '">';
					echo '<input type="hidden" name="category" value="' . $row['category'] . '">';
				echo '</form>';
			echo '</div>';
		}
	}
} else {
	echo '<p class="w-100 text-center text-dark">[There is no available product at the moment]</p>';
}
mysqli_close($conn);
?>