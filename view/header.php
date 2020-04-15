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
        <?php
        if(isset($_GET["login"]) && $_GET["login"]=="admin"){
        ?>
          <p><a href="index.php?login=admin&&function=logout">Logout</a></p>
        <?php
        }else{
        ?>
          <p><a href="index.php?function=register">Account</a></p>
        <?php
        }
        ?>
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
            <?php 
            $categories = $pdo->query('SELECT * FROM category');

            foreach ($categories as $category) {
             ?> <li><a href="index.php?login=admin&&function=<?php echo str_replace( ' ', '', $category['name'] ) ?>"><?php echo $category['name'] ?></a></li>
             <?php
           }
           ?>
           
         </ul>
       </li>

       <li> <a href="index.php?login=admin&&function=about">About Us</a> </li>

       <li> <a href="index.php?login=admin&&function=faqs">FAQs</a> </li>

     </ul>
     <?php
   }else{
    ?>
    <ul>
      <?php 
      $categories = $pdo->query('SELECT * FROM category');

      foreach ($categories as $category) {
       ?> <li><a href="index.php?function=<?php echo str_replace( ' ', '', $category['name'] ) ?>"><?php echo $category['name'] ?></a></li>
       <?php
     }
     ?>
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