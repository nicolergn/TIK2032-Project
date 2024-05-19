<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== META ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nicorner - My personal blog and gallery.">
    <meta name="keywords" content="blog, gallery, personal, contact">
    
    <!-- ========== TITLE ========== -->
    <title>Nicorner | Blog Article</title>
    <link rel="icon" href="asset/picture/profile/avatarA_bgred.png" type="image/x-icon">
    
    <!-- ========== LINK TO CSS ==========  -->
    <link rel="stylesheet" href="asset/css/styles.css?v=1.0">
    
    <!-- ========== LINK TO BOX ICONS ========== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <!-- ==================== HEADER / NAVBAR ==================== -->
    <header>
            <a href="index.html" class="logo"><img src="asset/picture/profile/avatarA_bgred.png" alt="icon avatar A"></a>
            <div class="bx bx-menu" id="burger-menu"></div>
            
            <!-- ========== NAVBAR MENU ========== -->
            <ul class="navbar">
                <li><a href="index.html#home">Home</a></li>
                <li><a href="index.html#aboutme">About</a></li>
                <li><a href="index.html#blog">Blog</a></li>
                <li><a href="index.html#gallery">Gallery</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
    </header>

    <!-- ==================== ARTICLE DETAILS ==================== -->
    <section class="artdetail">
        <?php
        // CONNECT DATABASE
        $conn = mysqli_connect("localhost", "root", "", "nicorner");
		
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // GET ID PARAMETER
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
            // QUERY ARTIKEL BERDASARKAN ID
            $sql = "SELECT * FROM blog_artikel WHERE id = $id";
            $result = mysqli_query($conn, $sql);
			
			// MENAMPILKAN ARTIKEL
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='heading'>";
                    echo "<h2>" . $row['judul'] . "</h2>";
                    echo "<span>" . $row['tanggal'] . "</span>";
                    echo "</div>";
                    echo "<div class='artd-img'>";
                    echo "<img src='" . $row['gambar'] . "' alt='Article Image'>";
                    echo "</div>";
                    echo "<div class='artd-text'>";
                    echo "<p>" . $row['konten'] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "No article found";
            }
        } else {
            echo "No article selected";
        }

        // CLOSE DATABASE
        mysqli_close($conn);
        ?>
    </section>

    <!-- ==================== CONTACT SECTION ==================== -->
    <footer>
			<div class="contact" id="contact">
				<div class="social">
					<h5>Contact Me on:</h5>
					<a href="mailto:nicolepakiding026@student.unsrat.ac.id" target="_blank" aria-label="Email">
						<i class="bx bxl-gmail"></i>
					</a>
					<a href="https://www.instagram.com/nnnsrch?igsh=MXN0Nm1zMjA4ZDZsbA==" target="_blank" aria-label="Instagram">
						<i class="bx bxl-instagram"></i>
					</a>
				</div>
			<p>&#169; Nicorner All Rights Reserved.</p>
			</div>
		</footer>

    <!-- ==================== LINK TO JAVASCRIPT ==================== -->
    <script src="asset/js/script.js?v=1.0"></script>
</body>
</html>
