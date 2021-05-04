<?php
include 'main.php';
check_loggedin($pdo);
?>
<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1">
		<title>Murphy Cemetery</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/nav.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="css/structure.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
        <div class="wrapper">
            
	<nav>
        <input type="checkbox" id="nav-toggle">
        <div class="logo">Murphy Cemetery</div>
        <ul class="links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><a href="find-grave.php">Find a Grave</a></li>
			<li><a href="logout.php">Logout</a></li>
			<li><a href="admin/index.php" target="_blank">Admin</a></li>
			
        </ul>
        <label for="nav-toggle" class="icon-burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </label>
    </nav>
   
   
		<section class="row">
            
                <div class="imageBackground">
                <h1>Home Page</h1>
                
                </div>
            
        </section>
		<section class="row">
			<div class="column">
		<p>Welcome back, <?=$_SESSION['name']?>!</p>
</div>
	</section>
    <section class="row">
            <div class="column">
                <img src="images/murphyCemetery-6.jpg" alt="">
            </div>
            <div class="column">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore pariatur illum nisi fugit aperiam enim dolorum ratione, molestias magni hic natus tenetur, dolorem adipisci eius sequi quasi accusamus. Vero, consequuntur provident aliquam odit quidem corrupti! Veniam expedita provident voluptatum, delectus rerum nemo consequatur commodi esse ipsam vero officiis voluptates, tempore repellat culpa, molestias iusto! Itaque placeat eius quod animi libero quis vero qui deleniti est nam quae architecto laudantium non expedita ab possimus accusamus assumenda, explicabo, saepe ex aut nisi quisquam odio. Eveniet, quibusdam minus veritatis illum voluptate id officia quae repellendus ipsam, corrupti, iure totam maiores tempora aliquam fuga.</p>
            </div>
        </section>
        <section class="row">
            <div class="column"></div>
            <div class="column">
            <div class="divider"></div>
            </div>
            <div class="column"></div>
        </section>
        <section class="row">
           
           <div class="column">
               <h2>Contact Us Today!</h2>
               <a href="contact.html" class="myButton">Contact</a>
           </div>
           
                
        
        </section>

        <!--footer start-->
        <footer class="row">
            <div class="column">
            
        <div class="footerNav">
            <a href="home.php">Home</a>
            <a href="about.html">About</a>
            <a href="services.html">Services</a>
            <a href="contact.html">Contact</a>
            <a href="find-grave.php">Find a Grave</a>
    		<a href="logout.php">Logout</a>
    		<a href="admin/index.php" target="_blank">Admin</a>
        </div>
			
        
            </div>
            <div class="column">
                <h3>Murphy Cemetery</h3>
                <p>Nevada, IA 50201</p>
                <p>Lat:   42.0569°   (42° 3' 24")</p>
                <p>Lon:   -93.3674°   (-93° 22' 2")</p>
            </div>
            <div class="column">

            </div>
            
        </footer>
			
			
		
        </div>
	</body>
</html>
