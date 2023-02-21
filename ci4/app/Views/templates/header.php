<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/style.css">
    <script defer src="js/script.js"></script>
    <title> Personal Website ni Danni </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>
  
    <style>
.error {color: #FF0000;}
</style>
</head>

<body>
    <header>
    <nav>
        <ul class="nav_link">
                <li><a data-link="WelcomePart" class="scroll_to">Home</a></li>
                <li><a data-link="AboutPart" class="scroll_to">About Me</a></li>
                <li><a data-link="SamplePart" class="scroll_to">Sample Shots</a></li>
                <li><a data-link="ContactPart" class="scroll_to">Contact Me</a></li>
        </ul>
        </nav>
    </header>

<!--Welcome part--> 
<section class="WelcomeSection" id="WelcomePart">
    <p class="Welcome"><span class="auto-type"></span></p>
</section>

<!--About part-->
<section class="AboutSection" id="AboutPart">
        <div class = "title">
            <h1> About Me </h1>
        </div>
        
        <div class = "AboutMeSection">
            <div><img src= "pictures/me.jpeg"></div>
            <div>
                <h1>I'm Danni Raphael R. Morta</h1>
                <br>
                
                <p> I am currently 20 years old and is studying at Asia Pacific College. I am a second year college student under the course of BS Information Technology with specialization in Mobile and Internet techonology. I love taking photos as a hobby and also loves to play video games</p>
            </div>
        </div>
    </section>

<!--Sample Shots-->

<section class="SampleSection" id="SamplePart">
<div class="container">
<div class = "title">
            <h1> Sample Shots </h1>
        </div>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      <div class="item active">
        <img src="pictures/NM.png" alt="National Museum of Fine Arts" style="width:100%;">
        <div class="carousel-caption">
          <h3>National Museum of Fine Arts</h3>
        </div>
      </div>

      <div class="item">
        <img src="pictures/intra.png" alt="Intramuros Park" style="width:100%;">
        <div class="carousel-caption">
          <h3>Intramuros Park</h3>
        </div>
      </div>
    
      <div class="item">
        <img src="pictures/pangasinan.png" alt="Pangasinan" style="width:100%;">
        <div class="carousel-caption">
          <h3>Pangasinan</h3>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</section>

<!--Contact-->
<section class="ContactSection" id="ContactPart">
<?php
  // define variables and set to empty values
  $nameErr = $emailErr = $genderErr = $websiteErr = "";
  $name = $email = $gender = $comment = $website = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["name"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed";
      }
    }
    
    if (empty($_POST["email"])) {
      $emailErr = "Email is required";
    } else {
      $email = test_input($_POST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Invalid email format";
      }
    }

    if (empty($_POST["comment"])) {
      $comment = "";
    } else {
      $comment = test_input($_POST["comment"]);
    }
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

  <h2>Contact Me!</h2>
  <p><span class="error">* required field</span></p>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Name: <br><input type="text" name="name" value="<?php echo $name;?>">
    <span class="error">* <?php echo $nameErr;?></span>
    <br><br>
    E-mail: <br>
    <input type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br><br>
    Comment: <br>
    <textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
    <br><br>
    <input type="submit" name="submit" value="Submit">  
  </form>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{

	$servername = "localhost";
	$username = "webprogmi211";
	$password = "webprogmi211";
	$dbname = "webprogmi211";
	
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "INSERT INTO drmorta_myguests (name, email, comment)
	VALUES ('$name', '$email', '$comment  ')";
	
  if ($conn->query($sql) === TRUE) {
    echo '<script>alert("New record created successfully")</script>';
    } else {
    echo '<script>alert("Error creating a new record")</script>'. $sql . "<br>" . $conn->error;
    }
	
	$conn->close();
}
?>
</section>

</body>
</html>