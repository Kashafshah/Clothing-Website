<?php

include('kashaf_mysql_config.php');

// Variables
$pwidth = '1030';
  
// Output Navigation Bar  
echo "<table width='$pwidth' align='center'><tr><td><div>\n";
		
// Links for Style Sheet and JavaScript Functions
// Link to styles used for our Navigation Bar
echo "<link href=\"kashaf_NavBarStyles.css\" rel=\"stylesheet\" type=\"text/css\">\n";

// Link to a file with couple simple JavaScript functions used for our Navigation Bar
echo "<script src=\"kashaf_NavBarScripts.js\" language=\"JavaScript\" type=\"text/javascript\"></script>\n";

// Links for Style Sheet and JavaScript Functions
// Link to styles used for our Navigation Bar
echo "<link href=\"kashaf.css\" rel=\"stylesheet\" type=\"text/css\">\n";


$product_types = $connection->prepare("SELECT DISTINCT id, product_type_name FROM product_types");
$product_types->execute();
$result = $product_types->fetchAll(PDO::FETCH_ASSOC);

$products = $connection->prepare("SELECT id, product_type, product_name, image, price FROM products");
$products->execute();
$product_results = $products->fetchAll(PDO::FETCH_ASSOC);

?>
<div class="product_types content-wrapper">
    <h1>Womens And Mens Shirts</h1>
    <div class="product_types-wrapper">
        <?php foreach ($result as $product_type): ?>
        <a href="kashaf.php?p=clothing&id=<?=$product_type['id']?>" class="product_types">
            <span class="product_type"><?=$product_type['product_type_name']?></span>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<div class="products content-wrapper">
    <h1>Products</h1>
    <div class="products-wrapper">
        <?php foreach ($product_results as $product): ?>
        <a href="kashaf.php?p=clothing&id=<?=$product['id']?>" class="product">
            <img src="images/<?=$product['image']?>" width="200" height="200" alt="<?=$product['product_name']?>">
			<div>
			<span class="product_type><?=$product['product_type']?></span>
            <span class="name"><?=$product['product_name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
            </span>
			</div>
        </a>
        <?php endforeach; ?>
    </div>
