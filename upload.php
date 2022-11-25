
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="new.css" />
    <title>Luca’s Loaves</title>
  </head>
  <body>
    <nav class="nav">
      <div class="container">
        <ul>
        <li><a href="index2.php" accesskey="1" title="">Home</a></li>
				<li><a href="aboutus.php" accesskey="2" title="">About US</a></li>
				<li><a class="current" href="upload.php" accesskey="3" title="">Careers </a></li>
				<li><a href="orderonline.php" accesskey="4" title="">Order online </a></li>
				<li><a href="contactus.php" accesskey="5" title="">Contact Us</a></li>
				<li><a href="register.php" accesskey="6" title="">register vip</a></li>
        </ul>
        <h1 class="logo"><a href="/index2.php">Welcome to Luca’s Loaves<br>(click here back to home)</a></h1>
        <img src="newtubiao.png" width="100" height="100" alt=""/>
      </div>
    </nav>

    <div class="hero">
      <div class="container">
        <h1>Join our team</h1>
        <p> We are expanding our branches and need experienced baker regularly.</n>
          Send us your detail with the form below</br>
          and we will be in contact shortly</p></p>
      </div>
    </div>

    <section class="container content">
      <h2 class="uf">Fill out the form below and upload your cover letter and resume</h2>
      <form action="file_upload.php" method="POST"
      enctype="multipart/form-data">


   <div class="uform">
  <div class="upfirst"><label for="name">First name:</label></div>
  <input type="text" id="name" name="name"/><br>
  <div class="uplast"><label for="email">Last name:</label></div>
  <input type="text" id="email"name="email" /><br>
  <div class="ed"><label for="telephone">Email Address:</label></div>
  <input type="text" id="telephone" name="telephone"/><br>
  <div class="Workex"><label for="message">Work experience:</label></div>
  <textarea name="message" id="message" cols="30" rows="10"></textarea><br />
  <div class="ups">Select files to upload:</div>
      <br></br>
             
      <!-- name of the input fields are going to
          be used in our php script-->
      <input type="file" name="files[]" multiple><br>
      <input type="file" name="files[]" multiple>
      <br><br>
       
      <input type="submit" name="submit" value="Upload" >
  </p>

</form>
          
          </div>
      
  
  
      </div>
      </div>
      </div>
      <a href="login sql.php" class="intosql" > Get into sql </a>
</div>

      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><footer  class="footer2">  
  The creator of this website is Watermelon
    </footer>

    <script src="new.js"></script>
  </body>
</html>
