<!DOCTYPE html>
<html>
<head>
  <?php
  if(isset($_GET["login"]) && $_GET["login"]=="admin"){
    ?>
    <link rel="stylesheet" href="../styles.css"/>
    <?php
  }else{
    ?>
    <link rel="stylesheet" href="styles.css"/>
    <?php
  }
  ?>
  <title>Jo's Jobs - Home</title>
</head>
<body>
  <header>
    <section>
      <aside>
        <h3>Office Hours:</h3>
        <p>Mon-Fri: 09:00-17:30</p>
        <p>Sat: 09:00-17:00</p>
        <p>Sun: Closed</p>
      </aside>
      <h1>Jo's Jobs</h1>

    </section>
  </header>
  <nav>

    <ul>
      <li><a href="index.php">Home</a></li>
      <li>Jobs
        <?php
        if(isset($_GET["login"]) && $_GET["login"]=="admin"){
          ?>
          <ul>
            <li><a href="index.php?login=admin&&function=it">IT</a></li>
            <li><a href="index.php?login=admin&&function=hr">Human Resources</a></li>
            <li><a href="index.php?login=admin&&function=sales">Sales</a></li>
          </ul>
        </li>

        <li> <a href="index.php?login=admin&&function=about">About Us</a> </li>

        <li> <a href="index.php?login=admin&&function=faqs">FAQs</a> </li>

      </ul>
      <?php
    }else{
      ?>
      <ul>
        <li><a href="index.php?function=it">IT</a></li>
        <li><a href="index.php?function=hr">Human Resources</a></li>
        <li><a href="index.php?function=sales">Sales</a></li>
      </ul>
    </li>

    <li> <a href="index.php?function=about">About Us</a> </li>

    <li> <a href="index.php?function=faqs">FAQs</a> </li>
  </ul>

  <?php
}
?>
</nav>
<?php
if(isset($_GET["login"]) && $_GET["login"]=="admin"){
  ?>
  <img src="../images/randombanner.php"/>
  <?php
}else{
  ?>
  <img src="images/randombanner.php"/>
  <?php
}
?>