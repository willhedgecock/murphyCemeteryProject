<?php

require_once("main.php"); //database connection
require_once("sql-functions.php");

$firstName = "";
$lastName = "";

if (isset($_POST['submit'])) {

$firstName = $_POST['burial_first_name'];
$lastName = $_POST['burial_last_name'];

$sql = createSQLStatement();

$stmt = $pdo->prepare($sql);


if (strpos($sql, 'AND')) {
    $stmt->bindParam(':firstName1', $firstName);
    $stmt->bindParam(':lastName1', $lastName);
} 

if (strpos($sql, "burial_last_name", -20)) {
    //var_dump($stmt); die;
    $stmt->bindParam(':firstName1', $firstName);
}

if (strpos($sql, "burial_first_name", -21)) {
    $stmt->bindParam(':lastName1', $lastName);
}
//var_dump($stmt); die;
}
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
        <link rel="stylesheet" href="css/find-display-grave.css">
	</head>
	<body class="loggedin">
        <div class="wrapper">
            
	<nav>
        <input type="checkbox" id="nav-toggle">
        <div class="logo">Murphy Cemetery</div>
        <ul class="links">
            <li><a href="murphy-cemetery.html">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
            <li><a href="#findAGrave">Find a Grave</a></li>
			<a href="index.php">Login</a>
			
        </ul>
        <label for="nav-toggle" class="icon-burger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </label>
    </nav>
   
   
		<section class="row">
            
                <div class="imageBackground">
                    
                <h1>Find a Grave</h1>
               </div>
            
        </section>
        <section class="row">
            <div class="column">
                <img src="images/murphyCemetery-7.jpg" alt="">
            </div>
            <div class="column">
                <p class="find-grave-heading">Here at Murphy Cemetery, we believe that you should be able to find all the information you need for your loved one. Use our burial search below.</p>

                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" id="findAGraveForm">

                    <label for="burial_first_name">First Name </label>
                    <input type="text" name="burial_first_name" id="burial_first_name">
            
                    <label for="burial_last_name">Last Name </label>
                    <input type="text" name="burial_last_name" id="burial_last_name">
            
                    <input type="submit" name="submit" id="submit">
            
                </form>

                <p class="find-grave-heading">*Results displayed below*</p>
            </div>
        </section>

        <section class="row records">

        <?php

            if (isset($_POST['submit'])) {
                
                $stmt->execute();

                if ($stmt->rowCount() > 0) {

                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>

                        <div class="burial-record">
                            <p><?php echo $row['burial_first_name'] . " " . $row['burial_last_name'] ?></p>
                            <!--<p>Date of birth: <?php //echo $row['burial_DOB'] ?></p>-->
                            <p>Plot Row: <?php echo $row['burial_plot_row'] ?></p>
                            <p>Plot Number: <?php echo $row['burial_plot_number'] ?></p>
                            <a href="view-grave.php?burial_ID=<?php echo $row['burial_ID']?>"><button>View</button></a>
                        </div>
                
                <?php } ?>
            <?php } else { ?>
            <h2>Sorry, your search didn't return any results.</h2>
            <?php }} ?>
        
        </section>

        <!--footer start-->
        <footer class="row">
            <div class="column">

            </div>
            
        </footer>
			
			
		
        </div>
	</body>
</html>