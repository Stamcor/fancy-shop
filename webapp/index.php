<?php
    require './header.inc.php';
?>
<table class="table">
    <tr>
        <th class="product-name">Product</th>
        <th class="product-price">Price</th>
    </tr>
<?php
    $mysqli = new mysqli("localhost", "shop", "FancyShop", "shop");
    if ($mysqli->connect_errno) {
        die("Connection failed: " . $mysqli->connect_error);
    }
    if (isset($_GET["search"]) && $_GET["search"]!="") {
        $tmp = "AND name LIKE '%" . $_GET["search"] . "%'";
    } else {
        $tmp = "";
    }
    $sql = "SELECT * FROM products WHERE hidden = 0 " . $tmp;
    if ($result = $mysqli->query($sql)) {
        while ($row = $result->fetch_object()) {
?>
    <tr>
        <td class="product-name"><?php echo $row->name ?></td>
        <td class="product-price"><?php echo $row->price ?>$</td>
    </tr>
<?php
        }
    }
?>
</table>
<?php
    require './footer.inc.php';
?>
