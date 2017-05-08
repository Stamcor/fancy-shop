<?php
include_once 'includes/save_review.inc.php';
require 'header.inc.php';

if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];
    $sql = "SELECT * FROM products WHERE id = ? AND hidden = 0 LIMIT 1";
    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $product = $result->fetch_object();
            if (!is_null($product->flag)) {
                $label = " <span class=\"label label-danger\">" . $product->flag . "</span>";
            }
        } else {
            ?>Product does not exist.<?php 
        }
?>
<h2><?php echo $product->name . $label ?></h2>
<p class="lead">Price: <?php echo $product->price ?>&thinsp;$</p>
<p><?php echo $product->description ?></p>
<?php
    } else {
        ?>Database error.<?php 
    }
    
    $sql = "SELECT members.username AS name, reviews.time AS time, reviews.text AS txt FROM reviews,members WHERE members.id=reviews.user_id AND product_id = ?";
    $stmt = $mysqli->prepare($sql);
    if ($stmt) {
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $result = $stmt->get_result();
        ?>
        <div class="container">
                <hr data-brackets-id="12673">
                    <ul data-brackets-id="12674" id="sortable" class="list-unstyled ui-sortable">
            <?php
        while ($review = $result->fetch_object()) {
            ?>
                        </br>
                        <strong class="pull-left primary-font"><?php echo $review->name?></strong>
                            <small class="pull-right text-muted">
                            <span class="glyphicon glyphicon-time"></span><?php echo date('d/m/Y h:i:s a', $review->time)?></small>
                            </br>
                            <li class="ui-state-default"><?php echo $review->txt?> </li>
            <?php
        }
    } else {
         ?>Database error.<?php 
    }
    ?>
                        </ul>
            </div>
        

	<div class="row" style="margin-top:40px;">
		<div class="col-md-6">
    	<div class="well well-sm">
            
        
            <div class="row" id="post-review-box" >
                <div class="col-md-12">
                    <form accept-charset="UTF-8" action="/includes/save_review.incl.php" method="post">
                        <textarea name="input" class="form-control animated" cols="50" id="new-review" placeholder="Enter your review here..." rows="5"></textarea>   
                        <input name="id" type="hidden" value = "<?php echo $_GET["id"] ?>"></input>     
                        <div class="text-right">
                            <button class="btn btn-success btn-lg" type="submit" >Leave a review</button>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div> 
         
		</div>
	</div>
</div>
    <?php
} else {
    ?>Missing product ID.<?php
}
?>

<?php
require 'footer.inc.php';
?>
