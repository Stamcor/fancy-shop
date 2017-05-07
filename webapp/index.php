<?php
    require 'header.inc.php';
?>
<table class="table">
    <tr>
        <th class="product-name">Product</th>
        <th class="product-price">Price</th>
    </tr>
<?php
    if (isset($_GET["search"]) && $_GET["search"]!="") {
        $tmp = " AND name LIKE '%" . $_GET["search"] . "%'";
    } else {
        $tmp = "";
    }
    $sql = "SELECT * FROM products WHERE hidden = 0" . $tmp;
    if ($result = $mysqli->query($sql)) {
        while ($product = $result->fetch_object()) {
            $label = "";
            if (!is_null($product->flag)) {
                $label = " <span class=\"label label-danger\">" . $product->flag . "</span>";
            }
?>
    <tr>
        <td class="product-name"><a href="product.php?id=<?php echo $product->id ?>"><?php echo $product->name ?></a><?php echo $label ?></td>
        <td class="product-price"><?php echo $product->price ?>$</td>
    </tr>
<?php
        }
    } else {
        echo $mysqli->error;
    }
?>
</table>
<?php
    require 'footer.inc.php';
?>
