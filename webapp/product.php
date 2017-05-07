<?php
require 'header.inc.php';

if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    $sql = "SELECT * FROM products WHERE id = ? LIMIT 1";
    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_object();
        if (!is_null($product->flag)) {
            $label = " <span class=\"label label-danger\">" . $product->flag . "</span>";
        }
?>
<h2><?php echo $product->name . $label ?></h2>
<p class="lead">Price: <?php echo $product->price ?>&thinsp;$</p>
<p><?php echo $product->description ?></p>
<?php
    } else {
        ?>Database error.<?php 
    }
} else {
    ?>Missing product ID.<?php
}

require 'footer.inc.php';
?>
