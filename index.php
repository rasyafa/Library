<?php
    include 'db.php';
	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 2");
	$a = mysqli_fetch_object($kontak);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Library</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <!-- header -->
    <header>
        <div class="container">
        <div class="header">
        <h1><a href="index.php">LIBRA TECH</a></h1>
        <ul>
            <li><a href="index.php">Home</a></li>
           <li><a href="galeri.php">Category</a></li>
           <li><a href="registrasi.php">Registration</a></li>
           <li><a href="login.php">Sign In</a></li>
        </ul>
        </div>
        </div>
    </header>
    
    <!-- search -->
    <div class="search">
        <div class="container">
            <form action="galeri.php">
                <input type="text" name="search" placeholder="Search Book" />
                <input type="submit" name="cari" value="Search Book" />
            </form>
        </div>
    </div>
    
    <!-- category -->
    <div class="section">
        <div class="container">
            <h3>Category</h3>
            <div class="box">
                <?php
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
					if(mysqli_num_rows($kategori) > 0){
						while($k = mysqli_fetch_array($kategori)){
				?>
                    <a href="galeri.php?kat=<?php echo $k['category_id'] ?>">
                        <div class="col-5">
                            <img src="img/icon.png" width="50px" style="margin-bottom:5px;" />
                        <p><?php echo $k['category_name'] ?></p>
                        </div>
                    </a>
                <?php }}else{ ?>
                     <p>Category Not Found</p>
                <?php } ?>
            </div>
        </div>
    </div>

    
    <!-- footer -->
     <footer>
        <div class="container">
            <small>Copyright &copy; 2024 - LIBRA TECH.</small>
        </div>
    </footer>
</body>
</html>