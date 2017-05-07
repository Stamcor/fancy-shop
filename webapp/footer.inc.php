      <footer class="footer">
        <center>
<?php
if ($logged_in) {
  ?>You are logged in as <?php echo $_SESSION["username"] ?>. Do not forget to <a href="includes/logout.php">log out</a><?php
} else {
  ?>You are not logged in. Please <a href="login.php">login</a> or <a href="register.php">register</a>.<?php
}
?>
        </center>
      </footer>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>