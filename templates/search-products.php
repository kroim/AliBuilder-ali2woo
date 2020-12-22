<?php

$api_key = get_option('ali_api_key');
$ali_language = get_option('ali_language');
$ali_currency = get_option('ali_currency');

require_once 'aliexpress/AliExpress.php';

$ali = new AliExpress();

//get category list
$catList = $ali->getListCategory();
 
 /*
$productListByCategory = $ali->getListProduct(100002612, array('sort'=>'commissionRateDown', 'commissionRateFrom'=>0.5));
 
$productListByKeyword = $ali->getListProduct('Astrology');
 
$productList = $ali->getListProduct(322, array('keywords'=>'man shoes', 'commissionRateFrom'=>0.5));
 
$product = $ali->getProduct(32213749383);
 
$link = $ali->getPromotionLinks('Express', "http://www.aliexpress.com/item//32213749383.html,http://www.aliexpress.com/item//1786034050.html");
*/
$all_products = array();
$page_no = 1;
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

if(isset($_GET['search_prdct'])){
	
	$keywords = $_GET['keyword'];
	$category = $_GET['category'];
	
	$originalPriceFrom = $_GET['originalPriceFrom'];
	$originalPriceTo = $_GET['originalPriceTo'];
	$volumeFrom = $_GET['volumeFrom'];
	$volumeTo = $_GET['volumeTo'];
	$startCreditScore = $_GET['startCreditScore'];
	$endCreditScore = $_GET['endCreditScore'];
	
	$advance_query = '&originalPriceFrom='.$originalPriceFrom.'&originalPriceTo='.$originalPriceTo.'&volumeFrom='.$volumeFrom.'&volumeTo='.$volumeTo.'&startCreditScore='.$startCreditScore.'&endCreditScore='.$endCreditScore.'';
	
	if(isset($_GET['page_no'])){
		$page_no = $_GET['page_no'];
	}
	
	if($category!=0){
		$cat = '&categoryId='.$category.'';
	}else{
		$cat = '';
	}
	
	 $url = 'http://gw.api.alibaba.com/openapi/param2/2/portals.open/api.listPromotionProduct/'.$api_key.'?keywords='.$keywords.''.$cat.'&highQualityItems=true&totalResults=true&fields=volume,allImageUrls,evaluateScore,productTitle,productUrl,imageUrl,productId,salePrice,originalPrice,localPrice,lotNum&pageSize=24&language='.$ali_language.'&pageNo='.$page_no.'&localCurrency='.$ali_currency.''.$advance_query.'&sort=volumeDown'; 
	$products_searched = wp_remote_retrieve_body(wp_remote_get($url));
	$products = json_decode($products_searched);
	$all_products = $products->result->products;
	$totalResults = $products->result->totalResults;
	//echo '<pre>'; print_r($products); exit;
}
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="wrap">
<h1 class="wp-heading-inline">Search Products</h1>

</div>

<div style="width:95%;margin-top:25px;">

	<div class="main_wrap_search">
	<h4>Search for Products  
<a type="submit" name="prdct_url_id" class="button button-primary form-contrl imprt_product_btn" style="float: right;margin-top: -5px;width: 195px;background: #75e075;color: #fff;border: 1px solid #65c865;text-shadow: 0 -1px 1px #65c865,1px 0 1px #65c865,0 1px 1px #65c865,-1px 0 1px #65c865;">Import product by URL or ID</a>
   </h4>
	<form method="GET" action="<?php echo admin_url(); ?>admin.php" style="margin-top: 40px;">
	<input type="hidden" name="page" value="alib-products" />
		<input type="text" name="keyword" value="<?php echo $_GET['keyword']; ?>" placeholder="Enter Keyword" class="form-contrl" />
		<select name="category" class="form-contrl" style="height: 36px;margin-bottom: 6px;">
			<option value="0" >All categories</option>
			<option value="100003109" <?php if($category==100003109){ echo 'selected="selected"'; } ?> >Women's Clothing & Accessories</option>
			<option value="200003482" <?php if($category==200003482){ echo 'selected="selected"'; } ?>> - Dresses</option>
			<option value="200001648" <?php if($category==200001648){ echo 'selected="selected"'; } ?>> - Blouses & Shirts</option>
			<option value="200000785" <?php if($category==200000785){ echo 'selected="selected"'; } ?>> - Tops & Tees</option>
			<option value="100003141" <?php if($category==100003141){ echo 'selected="selected"'; } ?>> - Hoodies & Sweatshirts</option>
			<option value="200001092" <?php if($category==200001092){ echo 'selected="selected"'; } ?>> - Jumpsuits</option>
			<option value="200000724" <?php if($category==200000724){ echo 'selected="selected"'; } ?>> - Accessories</option>
			<option value="200000773" <?php if($category==200000773){ echo 'selected="selected"'; } ?>> - Intimates</option>
			<option value="200118010" <?php if($category==200118010){ echo 'selected="selected"'; } ?>> - Bottoms</option>
			<option value="200215341" <?php if($category==200215341){ echo 'selected="selected"'; } ?>> - Rompers</option>
			<option value="200215336" <?php if($category==200215336){ echo 'selected="selected"'; } ?>> - Bodysuits</option>
			<option value="200000775" <?php if($category==200000775){ echo 'selected="selected"'; } ?>> - Jackets & Coats</option>
			<option value="200000782" <?php if($category==200000782){ echo 'selected="selected"'; } ?>> - Suits & Sets</option>
			<option value="200000781" <?php if($category==200000781){ echo 'selected="selected"'; } ?>> - Socks & Hosiery</option>
			<option value="200000777" <?php if($category==200000777){ echo 'selected="selected"'; } ?>> - Sleep & Lounge</option>
			<option value="200000783" <?php if($category==200000783){ echo 'selected="selected"'; } ?>> - Sweaters</option>
			<option value="100003070" <?php if($category==100003070){ echo 'selected="selected"'; } ?>>Men's Clothing & Accessories</option>
			<option value="100003084" <?php if($category==100003084){ echo 'selected="selected"'; } ?>> - Hoodies & Sweatshirts</option>
			<option value="200000707" <?php if($category==200000707){ echo 'selected="selected"'; } ?>> - Tops & Tees</option>
			<option value="200000662" <?php if($category==200000662){ echo 'selected="selected"'; } ?>> - Jackets & Coats</option>
			<option value="200118008" <?php if($category==200118008){ echo 'selected="selected"'; } ?>> - Pants</option>
			<option value="200000668" <?php if($category==200000668){ echo 'selected="selected"'; } ?>> - Shirts</option>
			<option value="100003086" <?php if($category==100003086){ echo 'selected="selected"'; } ?>> - Jeans</option>
			<option value="200000708" <?php if($category==200000708){ echo 'selected="selected"'; } ?>> - Underwear</option>
			<option value="200000599" <?php if($category==200000599){ echo 'selected="selected"'; } ?>> - Accessories</option>
			<option value="200000701" <?php if($category==200000701){ echo 'selected="selected"'; } ?>> - Sweaters</option>
			<option value="200000692" <?php if($category==200000692){ echo 'selected="selected"'; } ?>> - Suits & Blazers</option>
			<option value="200000673" <?php if($category==200000673){ echo 'selected="selected"'; } ?>> - Sleep & Lounge</option>
			<option value="100003088" <?php if($category==100003088){ echo 'selected="selected"'; } ?>> - Shorts</option>
			<option value="200003491" <?php if($category==200003491){ echo 'selected="selected"'; } ?>> - Socks</option>
			<option value="509" <?php if($category==509){ echo 'selected="selected"'; } ?>>Phones & Telecommunications</option>
			<option value="5090301" <?php if($category==5090301){ echo 'selected="selected"'; } ?>> - Mobile Phones</option>
			<option value="200216959" <?php if($category==200216959){ echo 'selected="selected"'; } ?>> - Phone Bags & Cases</option>
			<option value="200003132" <?php if($category==200003132){ echo 'selected="selected"'; } ?>> - Power Bank</option>
			<option value="200084017" <?php if($category==200084017){ echo 'selected="selected"'; } ?>> - Mobile Phone Accessories</option>
			<option value="200086021" <?php if($category==200086021){ echo 'selected="selected"'; } ?>> - Mobile Phone Parts</option>
			<option value="200126001" <?php if($category==200126001){ echo 'selected="selected"'; } ?>> - Communication Equipments</option>
			<option value="7" <?php if($category==7){ echo 'selected="selected"'; } ?>>Computer & Office</option>
			<option value="200004720" <?php if($category==200004720){ echo 'selected="selected"'; } ?>> - Office Electronics</option>
			<option value="200216607" <?php if($category==200216607){ echo 'selected="selected"'; } ?>> - Tablet</option>
			<option value="200002319" <?php if($category==200002319){ echo 'selected="selected"'; } ?>> - Computer Components</option>
			<option value="200002361" <?php if($category==200002361){ echo 'selected="selected"'; } ?>> - Tablet Accessories</option>
			<option value="200002342"<?php if($category==200002342){ echo 'selected="selected"'; } ?> > - Computer Peripherals</option>
			<option value="200002321" <?php if($category==200002321){ echo 'selected="selected"'; } ?>> - External Storage</option>
			<option value="200002320"<?php if($category==200002320){ echo 'selected="selected"'; } ?> > - Networking</option>
			<option value="200215304"<?php if($category==200215304){ echo 'selected="selected"'; } ?> > - Memory Cards & SSD</option>
			<option value="200216561" <?php if($category==200216561){ echo 'selected="selected"'; } ?>> - Cables & Connectors</option>
			<option value="70803003" <?php if($category==70803003){ echo 'selected="selected"'; } ?>> - Mini PC</option>
			<option value="200216762" <?php if($category==200216762){ echo 'selected="selected"'; } ?>> - Demo Board & Accessories</option>
			<option value="200216687" <?php if($category==200216687){ echo 'selected="selected"'; } ?>> - Desktops & Servers</option>
			<option value="100005089" <?php if($category==100005089){ echo 'selected="selected"'; } ?>> - Industrial Computer & Accessories</option>
			<option value="200215461"<?php if($category==200215461){ echo 'selected="selected"'; } ?> > - DIY Gaming PC</option>
			<option value="708022" <?php if($category==708022){ echo 'selected="selected"'; } ?>> - Computer Cleaners</option>
			<option value="702" <?php if($category==702){ echo 'selected="selected"'; } ?>> - Laptops</option>
			<option value="100005063" <?php if($category==100005063){ echo 'selected="selected"'; } ?>> - Laptop Accessories</option>
			<option value="200216551" <?php if($category==200216551){ echo 'selected="selected"'; } ?>> - Gaming Laptops</option>
			<option value="44"<?php if($category==44){ echo 'selected="selected"'; } ?> >Consumer Electronics</option>
			<option value="200002395" <?php if($category==200002395){ echo 'selected="selected"'; } ?>> - Camera & Photo</option>
			<option value="200002398" <?php if($category==200002398){ echo 'selected="selected"'; } ?>> - Portable Audio & Video</option>
			<option value="200002397" <?php if($category==200002397){ echo 'selected="selected"'; } ?>> - Home Audio & Video</option>
			<option value="200010196" <?php if($category==200010196){ echo 'selected="selected"'; } ?>> - Smart Electronics</option>
			<option value="200002394" <?php if($category==200002394){ echo 'selected="selected"'; } ?>> - Accessories & Parts</option>
			<option value="200005280" <?php if($category==200005280){ echo 'selected="selected"'; } ?>> - Electronic Cigarettes</option>
			<option value="200002396" <?php if($category==200002396){ echo 'selected="selected"'; } ?>> - Video Games</option>
			<option value="200216623" <?php if($category==200216623){ echo 'selected="selected"'; } ?>> - Earphones & Headphones</option>
			<option value="200118003" <?php if($category==200118003){ echo 'selected="selected"'; } ?>> - Camera Drones & Accessories</option>
			<option value="200084019" <?php if($category==200084019){ echo 'selected="selected"'; } ?>> - Wearable Devices</option>
			<option value="200215272" <?php if($category==200215272){ echo 'selected="selected"'; } ?>> - VR/AR Devices</option>
			<option value="200216648" <?php if($category==200216648){ echo 'selected="selected"'; } ?>> - Sports & Action Video Cameras</option>
			<option value="200216592" <?php if($category==200216592){ echo 'selected="selected"'; } ?>> - 360° Video Cameras & Accessories</option>
			<option value="200216598"<?php if($category==200216598){ echo 'selected="selected"'; } ?> > - Home Electronic Accessories</option>
			<option value="1509" <?php if($category==1509){ echo 'selected="selected"'; } ?>>Jewelry & Accessories</option>
			<option value="200188001" <?php if($category==200188001){ echo 'selected="selected"'; } ?>> - Fine Jewelry</option>
			<option value="200000109" <?php if($category==200000109){ echo 'selected="selected"'; } ?>> - Necklaces & Pendants</option>
			<option value="200000139" <?php if($category==200000139){ echo 'selected="selected"'; } ?>> - Earrings</option>
			<option value="100006749"<?php if($category==100006749){ echo 'selected="selected"'; } ?> > - Rings</option>
			<option value="200000097"<?php if($category==200000097){ echo 'selected="selected"'; } ?> > - Bracelets & Bangles</option>
			<option value="200132001"<?php if($category==200132001){ echo 'selected="selected"'; } ?> > - Jewelry Sets & More</option>
			<option value="200154003"<?php if($category==200154003){ echo 'selected="selected"'; } ?> > - Beads & Jewelry Making</option>
			<option value="200000161" <?php if($category==200000161){ echo 'selected="selected"'; } ?>> - Wedding & Engagement Jewelry</option>
			<option value="15" <?php if($category==15){ echo 'selected="selected"'; } ?>>Home & Garden</option>
			<option value="200002086" <?php if($category==200002086){ echo 'selected="selected"'; } ?>> - Kitchen,Dining & Bar</option>
			<option value="3710" <?php if($category==3710){ echo 'selected="selected"'; } ?>> - Home Decor</option>
			<option value="405" <?php if($category==405){ echo 'selected="selected"'; } ?>> - Home Textile</option>
			<option value="200154001" <?php if($category==200154001){ echo 'selected="selected"'; } ?>> - Arts,Crafts & Sewing</option>
			<option value="100002992"<?php if($category==100002992){ echo 'selected="selected"'; } ?> > - Festive & Party Supplies</option>
			<option value="100004814" <?php if($category==100004814){ echo 'selected="selected"'; } ?>> - Bathroom Products</option>
			<option value="200003136"<?php if($category==200003136){ echo 'selected="selected"'; } ?> > - Housekeeping & Organization</option>
			<option value="100006206" <?php if($category==100006206){ echo 'selected="selected"'; } ?>> - Pet Products</option>
			<option value="125" <?php if($category==125){ echo 'selected="selected"'; } ?>> - Garden Supplies</option>
			<option value="200215281" <?php if($category==200215281){ echo 'selected="selected"'; } ?>> - Household Merchandises</option>
			<option value="1524" <?php if($category==1524){ echo 'selected="selected"'; } ?>>Luggage & Bags</option>
			<option value="200010063" <?php if($category==200010063){ echo 'selected="selected"'; } ?>> - Women's Bags</option>
			<option value="200010057" <?php if($category==200010057){ echo 'selected="selected"'; } ?>> - Men's Bags</option>
			<option value="152401" <?php if($category==152401){ echo 'selected="selected"'; } ?>> - Backpacks</option>
			<option value="152405" <?php if($category==152405){ echo 'selected="selected"'; } ?>> - Wallets</option>
			<option value="200066014" <?php if($category==200066014){ echo 'selected="selected"'; } ?>> - Kids & Baby's Bags</option>
			<option value="152404" <?php if($category==152404){ echo 'selected="selected"'; } ?>> - Luggage & Travel Bags</option>
			<option value="200068019" <?php if($category==200068019){ echo 'selected="selected"'; } ?>> - Functional Bags</option>
			<option value="3803"<?php if($category==3803){ echo 'selected="selected"'; } ?> > - Coin Purses & Holders</option>
			<option value="152409" <?php if($category==152409){ echo 'selected="selected"'; } ?>> - Bag Parts & Accessories</option>
			<option value="322" <?php if($category==322){ echo 'selected="selected"'; } ?>>Shoes</option>
			<option value="100001615" <?php if($category==100001615){ echo 'selected="selected"'; } ?>> - Men's Shoes</option>
			<option value="200216391" <?php if($category==200216391){ echo 'selected="selected"'; } ?>> - Men's Boots</option>
			<option value="200002124" <?php if($category==200002124){ echo 'selected="selected"'; } ?>> - Shoe Accessories</option>
			<option value="200002136"<?php if($category==200002136){ echo 'selected="selected"'; } ?> > - Men's Casual Shoes</option>
			<option value="100001606"<?php if($category==100001606){ echo 'selected="selected"'; } ?> > - Women's Shoes</option>
			<option value="200002253"<?php if($category==200002253){ echo 'selected="selected"'; } ?> > - Men's Vulcanize Shoes</option>
			<option value="200216407"<?php if($category==200216407){ echo 'selected="selected"'; } ?> > - Women's Boots</option>
			<option value="200002155"<?php if($category==200002155){ echo 'selected="selected"'; } ?> > - Women's Flats</option>
			<option value="200002161" <?php if($category==200002161){ echo 'selected="selected"'; } ?>> - Women's Pumps</option>
			<option value="200002164" <?php if($category==200002164){ echo 'selected="selected"'; } ?>> - Women's Vulcanize Shoes</option>
			<option value="1501" <?php if($category==1501){ echo 'selected="selected"'; } ?>>Mother & Kids</option>
			<option value="200000567" <?php if($category==200000567){ echo 'selected="selected"'; } ?>> - Baby Girls Clothing</option>
			<option value="200000528" <?php if($category==200000528){ echo 'selected="selected"'; } ?>> - Baby Boys Clothing</option>
			<option value="100003199" <?php if($category==100003199){ echo 'selected="selected"'; } ?>> - Girls Clothing</option>
			<option value="100003186" <?php if($category==100003186){ echo 'selected="selected"'; } ?>> - Boys Clothing</option>
			<option value="200002101" <?php if($category==200002101){ echo 'selected="selected"'; } ?>> - Baby Shoes</option>
			<option value="32212" <?php if($category==32212){ echo 'selected="selected"'; } ?>> - Children's Shoes</option>
			<option value="100001118" <?php if($category==100001118){ echo 'selected="selected"'; } ?>> - Baby Care</option>
			<option value="200003594" <?php if($category==200003594){ echo 'selected="selected"'; } ?>> - Activity & Gear</option>
			<option value="200003592" <?php if($category==200003592){ echo 'selected="selected"'; } ?>> - Safety</option>
			<option value="100002964" <?php if($category==100002964){ echo 'selected="selected"'; } ?>> - Baby Bedding</option>
			<option value="200003595" <?php if($category==200003595){ echo 'selected="selected"'; } ?>> - Feeding</option>
			<option value="200000774" <?php if($category==200000774){ echo 'selected="selected"'; } ?>> - Maternity</option>
			<option value="200166001" <?php if($category==200166001){ echo 'selected="selected"'; } ?>> - Family Matching Outfits</option>
			<option value="18" <?php if($category==18){ echo 'selected="selected"'; } ?>>Sports & Entertainment</option>
			<option value="200214332" <?php if($category==200214332){ echo 'selected="selected"'; } ?>> - Sports Bags</option>
			<option value="200005276" <?php if($category==200005276){ echo 'selected="selected"'; } ?>> - Sneakers</option>
			<option value="200214370" <?php if($category==200214370){ echo 'selected="selected"'; } ?>> - Sport Accessories</option>
			<option value="200094001" <?php if($category==200094001){ echo 'selected="selected"'; } ?>> - Team Sports</option>
			<option value="200005059" <?php if($category==200005059){ echo 'selected="selected"'; } ?>> - Racquet Sports</option>
			<option value="200005102" <?php if($category==200005102){ echo 'selected="selected"'; } ?>> - Bowling</option>
			<option value="100005433" <?php if($category==100005433){ echo 'selected="selected"'; } ?>> - Camping & Hiking</option>
			<option value="200003570" <?php if($category==200003570){ echo 'selected="selected"'; } ?>> - Cycling</option>
			<option value="200005101" <?php if($category==200005101){ echo 'selected="selected"'; } ?>> - Entertainment</option>
			<option value="100005444" <?php if($category==100005444){ echo 'selected="selected"'; } ?>> - Fishing</option>
			<option value="100005259" <?php if($category==100005259){ echo 'selected="selected"'; } ?>> - Fitness & Body Building</option>
			<option value="100005322"<?php if($category==100005322){ echo 'selected="selected"'; } ?> > - Golf</option>
			<option value="100005460" <?php if($category==100005460){ echo 'selected="selected"'; } ?>> - Horse Racing</option>
			<option value="100005471"<?php if($category==100005471){ echo 'selected="selected"'; } ?> > - Hunting</option>
			<option value="100005383" <?php if($category==100005383){ echo 'selected="selected"'; } ?>> - Musical Instruments</option>
			<option value="100005663" <?php if($category==100005663){ echo 'selected="selected"'; } ?>> - Other Sports & Entertainment Products</option>
			<option value="200005143" <?php if($category==200005143){ echo 'selected="selected"'; } ?>> - Roller,Skate board &Scooters</option>
			<option value="200005156"<?php if($category==200005156){ echo 'selected="selected"'; } ?> > - Running</option>
			<option value="100005479"<?php if($category==100005479){ echo 'selected="selected"'; } ?> > - Shooting</option>
			<option value="100005599" <?php if($category==100005599){ echo 'selected="selected"'; } ?>> - Skiing & Snowboarding</option>
			<option value="200001095" <?php if($category==200001095){ echo 'selected="selected"'; } ?>> - Sports Clothing</option>
			<option value="200001115" <?php if($category==200001115){ echo 'selected="selected"'; } ?>> - Swimming</option>
			<option value="100005575" <?php if($category==100005575){ echo 'selected="selected"'; } ?>> - Water Sports</option>
			<option value="66" <?php if($category==66){ echo 'selected="selected"'; } ?>>Beauty & Health</option>
			<option value="200002547" <?php if($category==200002547){ echo 'selected="selected"'; } ?>> - Nails & Tools</option>
			<option value="660103" <?php if($category==660103){ echo 'selected="selected"'; } ?>> - Makeup</option>
			<option value="200002496" <?php if($category==200002496){ echo 'selected="selected"'; } ?>> - Health Care</option>
			<option value="3306" <?php if($category==3306){ echo 'selected="selected"'; } ?>> - Skin Care</option>
			<option value="200002458" <?php if($category==200002458){ echo 'selected="selected"'; } ?>> - Hair Care & Styling</option>
			<option value="660302" <?php if($category==660302){ echo 'selected="selected"'; } ?>> - Shaving & Hair Removal</option>
			<option value="200003045"<?php if($category==200003045){ echo 'selected="selected"'; } ?> > - Sex Products</option>
			<option value="200074001" <?php if($category==200074001){ echo 'selected="selected"'; } ?>> - Beauty Essentials</option>
			<option value="200003551" <?php if($category==200003551){ echo 'selected="selected"'; } ?>> - Tattoo & Body Art</option>
			<option value="200002444" <?php if($category==200002444){ echo 'selected="selected"'; } ?>> - Bath & Shower</option>
			<option value="200002454" <?php if($category==200002454){ echo 'selected="selected"'; } ?>> - Fragrances & Deodorants</option>
			<option value="3305" <?php if($category==3305){ echo 'selected="selected"'; } ?>> - Oral Hygiene</option>
			<option value="1513"<?php if($category==1513){ echo 'selected="selected"'; } ?> > - Sanitary Paper</option>
			<option value="200002569" <?php if($category==200002569){ echo 'selected="selected"'; } ?>> - Tools & Accessories</option>
			<option value="1511"<?php if($category==1511){ echo 'selected="selected"'; } ?> >Watches</option>
			<option value="200214006" <?php if($category==200214006){ echo 'selected="selected"'; } ?>> - Men's Watches</option>
			<option value="200214036" <?php if($category==200214036){ echo 'selected="selected"'; } ?>> - Women's Watches</option>
			<option value="200214047" <?php if($category==200214047){ echo 'selected="selected"'; } ?>> - Lover's Watches</option>
			<option value="200214043" <?php if($category==200214043){ echo 'selected="selected"'; } ?>> - Children's Watches</option>
			<option value="361120" <?php if($category==361120){ echo 'selected="selected"'; } ?>> - Pocket & Fob Watches</option>
			<option value="200000084" <?php if($category==200000084){ echo 'selected="selected"'; } ?>> - Watch Accessories</option>
			<option value="200214074" <?php if($category==200214074){ echo 'selected="selected"'; } ?>> - Women's Bracelet Watches</option>
			<option value="26" <?php if($category==26){ echo 'selected="selected"'; } ?>>Toys & Hobbies</option>
			<option value="200002639"<?php if($category==200002639){ echo 'selected="selected"'; } ?> > - Remote Control Toys</option>
			<option value="200003225" <?php if($category==200003225){ echo 'selected="selected"'; } ?>> - Dolls & Stuffed Toys</option>
			<option value="100001626"<?php if($category==100001626){ echo 'selected="selected"'; } ?> > - Classic Toys</option>
			<option value="100001625" <?php if($category==100001625){ echo 'selected="selected"'; } ?>> - Learning & Education</option>
			<option value="100001623" <?php if($category==100001623){ echo 'selected="selected"'; } ?>> - Outdoor Fun & Sports</option>
			<option value="2621" <?php if($category==2621){ echo 'selected="selected"'; } ?>> - Action & Toy Figures</option>
			<option value="200002633"<?php if($category==200002633){ echo 'selected="selected"'; } ?> > - Models & Building Toy</option>
			<option value="100001663" <?php if($category==100001663){ echo 'selected="selected"'; } ?>> - Diecasts & Toy Vehicles</option>
			<option value="100001622"<?php if($category==100001622){ echo 'selected="selected"'; } ?> > - Baby Toys</option>
			<option value="100001629" <?php if($category==100001629){ echo 'selected="selected"'; } ?>> - Electronic Toys</option>
			<option value="200003226" <?php if($category==200003226){ echo 'selected="selected"'; } ?>> - Puzzles & Magic Cubes</option>
			<option value="200002636" <?php if($category==200002636){ echo 'selected="selected"'; } ?>> - Novelty & Gag Toys</option>
			<option value="200216936" <?php if($category==200216936){ echo 'selected="selected"'; } ?>> - Stress Relief Toy</option>
			<option value="100003235"<?php if($category==100003235){ echo 'selected="selected"'; } ?> >Weddings & Events</option>
			<option value="100003269" <?php if($category==100003269){ echo 'selected="selected"'; } ?>> - Wedding Dresses</option>
			<option value="100005792" <?php if($category==100005792){ echo 'selected="selected"'; } ?>> - Evening Dresses</option>
			<option value="100005791" <?php if($category==100005791){ echo 'selected="selected"'; } ?>> - Prom Dresses</option>
			<option value="200001520" <?php if($category==200001520){ echo 'selected="selected"'; } ?>> - Wedding Party Dress</option>
			<option value="100005624" <?php if($category==100005624){ echo 'selected="selected"'; } ?>> - Wedding Accessories</option>
			<option value="200001553" <?php if($category==200001553){ echo 'selected="selected"'; } ?>> - Celebrity-Inspired Dresses</option>
			<option value="100005790" <?php if($category==100005790){ echo 'selected="selected"'; } ?>> - Cocktail Dresses</option>
			<option value="200001554" <?php if($category==200001554){ echo 'selected="selected"'; } ?>> - Homecoming Dresses</option>
			<option value="100003270" <?php if($category==100003270){ echo 'selected="selected"'; } ?>> - Bridesmaid Dresses</option>
			<option value="100005823" <?php if($category==100005823){ echo 'selected="selected"'; } ?>> - Mother of the Bride Dresses</option>
			<option value="200001556"<?php if($category==200001556){ echo 'selected="selected"'; } ?> > - Quinceanera Dresses</option>
			<option value="200000875" <?php if($category==200000875){ echo 'selected="selected"'; } ?>>Novelty & Special Use</option>
			<option value="200001270" <?php if($category==200001270){ echo 'selected="selected"'; } ?>> - Costumes & Accessories</option>
			<option value="200001271" <?php if($category==200001271){ echo 'selected="selected"'; } ?>> - Exotic Apparel</option>
			<option value="100003240" <?php if($category==100003240){ echo 'selected="selected"'; } ?>> - Stage & Dance Wear</option>
			<option value="200001096" <?php if($category==200001096){ echo 'selected="selected"'; } ?>> - Traditional & Cultural Wear</option>
			<option value="200001355" <?php if($category==200001355){ echo 'selected="selected"'; } ?>> - Work Wear & Uniforms</option>
			<option value="34" <?php if($category==34){ echo 'selected="selected"'; } ?>>Automobiles & Motorcycles</option>
			<option value="200000191"<?php if($category==200000191){ echo 'selected="selected"'; } ?> > - Auto Replacement Parts</option>
			<option value="200000369"<?php if($category==200000369){ echo 'selected="selected"'; } ?> > - Car Electronics</option>
			<option value="200216017" <?php if($category==200216017){ echo 'selected="selected"'; } ?>> - Car Repair Tools</option>
			<option value="200004619" <?php if($category==200004619){ echo 'selected="selected"'; } ?>> - Interior Accessories</option>
			<option value="200004620"<?php if($category==200004620){ echo 'selected="selected"'; } ?> > - Exterior Accessories</option>
			<option value="200000408" <?php if($category==200000408){ echo 'selected="selected"'; } ?>> - Motorcycle Accessories & Parts</option>
			<option value="200214451" <?php if($category==200214451){ echo 'selected="selected"'; } ?>> - Other Vehicle Parts & Accessories</option>
			<option value="200216084"<?php if($category==200216084){ echo 'selected="selected"'; } ?> > - Car Lights</option>
			<option value="200217078" <?php if($category==200217078){ echo 'selected="selected"'; } ?>> - Car Wash & Maintenance</option>
			<option value="200217080" <?php if($category==200217080){ echo 'selected="selected"'; } ?>> - Travel & Roadway Product</option>
			<option value="39"<?php if($category==39){ echo 'selected="selected"'; } ?> >Lights & Lighting</option>
			<option value="200214033" <?php if($category==200214033){ echo 'selected="selected"'; } ?>> - Lamps & Shades</option>
			<option value="1504"<?php if($category==1504){ echo 'selected="selected"'; } ?> > - Ceiling Lights & Fans</option>
			<option value="150402" <?php if($category==150402){ echo 'selected="selected"'; } ?>> - Light Bulbs</option>
			<option value="390501" <?php if($category==390501){ echo 'selected="selected"'; } ?>> - LED Lighting</option>
			<option value="150401" <?php if($category==150401){ echo 'selected="selected"'; } ?>> - Outdoor Lighting</option>
			<option value="200003575" <?php if($category==200003575){ echo 'selected="selected"'; } ?>> - LED Lamps</option>
			<option value="390503"<?php if($category==390503){ echo 'selected="selected"'; } ?> > - Portable Lighting</option>
			<option value="200003009"<?php if($category==200003009){ echo 'selected="selected"'; } ?> > - Commercial Lighting</option>
			<option value="39050508" <?php if($category==39050508){ echo 'selected="selected"'; } ?>> - Night Lights</option>
			<option value="39050501" <?php if($category==39050501){ echo 'selected="selected"'; } ?>> - Book Lights</option>
			<option value="200003210" <?php if($category==200003210){ echo 'selected="selected"'; } ?>> - Professional Lighting</option>
			<option value="200002283" <?php if($category==200002283){ echo 'selected="selected"'; } ?>> - Novelty Lighting</option>
			<option value="200216091" <?php if($category==200216091){ echo 'selected="selected"'; } ?>> - Holiday Lighting</option>
			<option value="530" <?php if($category==530){ echo 'selected="selected"'; } ?>> - Lighting Accessories</option>
			<option value="1503"<?php if($category==1503){ echo 'selected="selected"'; } ?> >Furniture</option>
			<option value="150303" <?php if($category==150303){ echo 'selected="selected"'; } ?>> - Home Furniture</option>
			<option value="150304"<?php if($category==150304){ echo 'selected="selected"'; } ?> > - Office Furniture</option>
			<option value="100001203" <?php if($category==100001203){ echo 'selected="selected"'; } ?>> - Children Furniture</option>
			<option value="150302" <?php if($category==150302){ echo 'selected="selected"'; } ?>> - Outdoor Furniture</option>
			<option value="150301" <?php if($category==150301){ echo 'selected="selected"'; } ?>> - Commercial Furniture</option>
			<option value="200216366" <?php if($category==200216366){ echo 'selected="selected"'; } ?>> - Café Furniture</option>
			<option value="100001146" <?php if($category==100001146){ echo 'selected="selected"'; } ?>> - Bar Furniture</option>
			<option value="3712" <?php if($category==3712){ echo 'selected="selected"'; } ?>> - Furniture Accessories</option>
			<option value="150306" <?php if($category==150306){ echo 'selected="selected"'; } ?>> - Furniture Hardware</option>
			<option value="3708"<?php if($category==3708){ echo 'selected="selected"'; } ?> > - Furniture Parts</option>
			<option value="502" <?php if($category==502){ echo 'selected="selected"'; } ?>>Electronic Components & Supplies</option>
			<option value="4001"<?php if($category==4001){ echo 'selected="selected"'; } ?> > - Active Components</option>
			<option value="150412" <?php if($category==150412){ echo 'selected="selected"'; } ?>> - EL Products</option>
			<option value="4003" <?php if($category==4003){ echo 'selected="selected"'; } ?>> - Electronic Accessories & Supplies</option>
			<option value="504" <?php if($category==504){ echo 'selected="selected"'; } ?>> - Electronic Data Systems</option>
			<option value="150407" <?php if($category==150407){ echo 'selected="selected"'; } ?>> - Electronic Signs</option>
			<option value="4002" <?php if($category==4002){ echo 'selected="selected"'; } ?>> - Electronics Production Machinery</option>
			<option value="515" <?php if($category==515){ echo 'selected="selected"'; } ?>> - Electronics Stocks</option>
			<option value="4004" <?php if($category==4004){ echo 'selected="selected"'; } ?>> - Optoelectronic Displays</option>
			<option value="4099" <?php if($category==4099){ echo 'selected="selected"'; } ?>> - Other Electronic Components</option>
			<option value="4005"<?php if($category==4005){ echo 'selected="selected"'; } ?> > - Passive Components</option>
			<option value="21"<?php if($category==21){ echo 'selected="selected"'; } ?> >Office & School Supplies</option>
			<option value="100003836" <?php if($category==100003836){ echo 'selected="selected"'; } ?>> - Adhesives & Tapes</option>
			<option value="2202" <?php if($category==2202){ echo 'selected="selected"'; } ?>> - Books</option>
			<option value="200003198" <?php if($category==200003198){ echo 'selected="selected"'; } ?>> - Calendars, Planners & Cards</option>
			<option value="100003819" <?php if($category==100003819){ echo 'selected="selected"'; } ?>> - Cutting Supplies</option>
			<option value="211106" <?php if($category==211106){ echo 'selected="selected"'; } ?>> - Desk Accessories & Organizer</option>
			<option value="100003804"<?php if($category==100003804){ echo 'selected="selected"'; } ?> > - Filing Products</option>
			<option value="200003197" <?php if($category==200003197){ echo 'selected="selected"'; } ?>> - Labels, Indexes & Stamps</option>
			<option value="200003238"<?php if($category==200003238){ echo 'selected="selected"'; } ?> > - Mail & Shipping Supplies</option>
			<option value="100003745"<?php if($category==100003745){ echo 'selected="selected"'; } ?> > - Notebooks & Writing Pads</option>
			<option value="100003809"<?php if($category==100003809){ echo 'selected="selected"'; } ?> > - Office Binding Supplies</option>
			<option value="2115" <?php if($category==2115){ echo 'selected="selected"'; } ?>> - Other Office & School Supplies</option>
			<option value="200003196" <?php if($category==200003196){ echo 'selected="selected"'; } ?>> - Pens, Pencils & Writing Supplies</option>
			<option value="212002" <?php if($category==212002){ echo 'selected="selected"'; } ?>> - Presentation Boards</option>
			<option value="100005094"<?php if($category==100005094){ echo 'selected="selected"'; } ?> > - School & Educational Supplies</option>
			<option value="13"<?php if($category==13){ echo 'selected="selected"'; } ?> >Home Improvement</option>
			<option value="39"<?php if($category==39){ echo 'selected="selected"'; } ?> > - Lights & Lighting</option>
			<option value="1420" <?php if($category==1420){ echo 'selected="selected"'; } ?>> - Tools</option>
			<option value="6"<?php if($category==6){ echo 'selected="selected"'; } ?> > - Home Appliances</option>
			<option value="30" <?php if($category==30){ echo 'selected="selected"'; } ?>> - Security & Protection</option>
			<option value="100006479" <?php if($category==100006479){ echo 'selected="selected"'; } ?>> - Bathroom Fixtures</option>
			<option value="200215252" <?php if($category==200215252){ echo 'selected="selected"'; } ?>> - Kitchen Fixtures</option>
			<option value="42" <?php if($category==42){ echo 'selected="selected"'; } ?>> - Hardware</option>
			<option value="5" <?php if($category==5){ echo 'selected="selected"'; } ?>> - Electrical Equipment & Supplies</option>
			<option value="200003230" <?php if($category==200003230){ echo 'selected="selected"'; } ?>> - Building Supplies</option>
			<option value="30" <?php if($category==30){ echo 'selected="selected"'; } ?>>Security & Protection</option>
			<option value="3011" <?php if($category==3011){ echo 'selected="selected"'; } ?>> - Video Surveillance</option>
			<option value="200215432"<?php if($category==200215432){ echo 'selected="selected"'; } ?> > - Security Alarm</option>
			<option value="3030" <?php if($category==3030){ echo 'selected="selected"'; } ?>> - Access Control</option>
			<option value="3007" <?php if($category==3007){ echo 'selected="selected"'; } ?>> - Workplace Safety Supplies</option>
			<option value="200215419" <?php if($category==200215419){ echo 'selected="selected"'; } ?>> - Door Intercom</option>
			<option value="3019" <?php if($category==3019){ echo 'selected="selected"'; } ?>> - Self Defense Supplies</option>
			<option value="200215424" <?php if($category==200215424){ echo 'selected="selected"'; } ?>> - Smart Card System</option>
			<option value="200215427" <?php if($category==200215427){ echo 'selected="selected"'; } ?>> - Building Automation</option>
			<option value="3009" <?php if($category==3009){ echo 'selected="selected"'; } ?>> - Fire Protection</option>
			<option value="200003251" <?php if($category==200003251){ echo 'selected="selected"'; } ?>> - Emergency Kits</option>
			<option value="200216744" <?php if($category==200216744){ echo 'selected="selected"'; } ?>> - Roadway Safety</option>
			<option value="3012" <?php if($category==3012){ echo 'selected="selected"'; } ?>> - Safes</option>
			<option value="300912" <?php if($category==300912){ echo 'selected="selected"'; } ?>> - Lightning Protection</option>
			<option value="200216754" <?php if($category==200216754){ echo 'selected="selected"'; } ?>> - Transmission & Cables</option>
			<option value="200002489" <?php if($category==200002489){ echo 'selected="selected"'; } ?>>Hair Extensions & Wigs</option>
			<option value="200004934" <?php if($category==200004934){ echo 'selected="selected"'; } ?>> - Human Hair</option>
			<option value="200004346" <?php if($category==200004346){ echo 'selected="selected"'; } ?>> - Wigs</option>
			<option value="200004950" <?php if($category==200004950){ echo 'selected="selected"'; } ?>> - Synthetic Hair</option>
			<option value="200002956" <?php if($category==200002956){ echo 'selected="selected"'; } ?>> - Accessories & Tools</option>
			<!--<?php 
			foreach($catList as $cat){ ?>
				<option value="<?php echo $cat['id']; ?>" <?php if($category==$cat['id']){ echo 'selected="selected"'; } ?>><?php echo $cat['name']; ?></option>
			<?php }
			?>-->
		</select>

		
		&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class="simple_srch" style="display:none;font-size: 19px;
    text-underline-position: under;">Simple</a>
	
		 
		<div class="search-panel-advanced" style="display: none;">
				
				<input type="hidden" name="page" value="alib-products" />
                    <div class="search-panel-row">
                        <div class="search-panel-col">
                            <label>Price</label><br/>
                            <input type="text" class="form-contrl dsbl_smle" name="originalPriceFrom" placeholder="Price from" value="">
                            <input type="text" class="form-contrl dsbl_smle" name="originalPriceTo" placeholder="Price to" value="">
                        </div>
                        <div class="search-panel-col">
                            <label>Seller's Feedback score</label><br/>
                            <input type="text" class="form-contrl dsbl_smle" name="startCreditScore" placeholder="Score from 0" value="">
                            <input type="text" class="form-contrl dsbl_smle" name="endCreditScore" placeholder="Score to 400 000+" value="">
                        </div>
                        <div class="search-panel-col">
                            <label>Sold in 30 days</label><br/>
                            <input type="text" class="form-contrl dsbl_smle" name="volumeFrom" placeholder="Orders count from" value="">
                            <input type="text" class="form-contrl dsbl_smle" name="volumeTo" placeholder="Orders count to" value="">
							
                        </div>
						<br>
                    </div>
					 
                </div>
				<input type="submit" name="search_prdct" value="Search" class="button button-primary form-contrl nrml_srch_btn" style="margin-top:1px;height: 34px;"/>
		&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class="advance_srch" style="font-size: 19px;
    text-underline-position: under;">Advance</a><br><br>
	Show shipping prices in : <select name="country" id="country">
	<option value="Select" title="Select">--- Select ---</option>
	<option value="Afghanistan" title="Afghanistan">Afghanistan</option>
	<option value="Åland Islands" title="Åland Islands">Åland Islands</option>
	<option value="Albania" title="Albania">Albania</option>
	<option value="Algeria" title="Algeria">Algeria</option>
	<option value="American Samoa" title="American Samoa">American Samoa</option>
	<option value="Andorra" title="Andorra">Andorra</option>
	<option value="Angola" title="Angola">Angola</option>
	<option value="Anguilla" title="Anguilla">Anguilla</option>
	<option value="Antarctica" title="Antarctica">Antarctica</option>
	<option value="Antigua and Barbuda" title="Antigua and Barbuda">Antigua and Barbuda</option>
	<option value="Argentina" title="Argentina">Argentina</option>
	<option value="Armenia" title="Armenia">Armenia</option>
	<option value="Aruba" title="Aruba">Aruba</option>
	<option value="Australia" title="Australia">Australia</option>
	<option value="Austria" title="Austria">Austria</option>
	<option value="Azerbaijan" title="Azerbaijan">Azerbaijan</option>
	<option value="Bahamas" title="Bahamas">Bahamas</option>
	<option value="Bahrain" title="Bahrain">Bahrain</option>
	<option value="Bangladesh" title="Bangladesh">Bangladesh</option>
	<option value="Barbados" title="Barbados">Barbados</option>
	<option value="Belarus" title="Belarus">Belarus</option>
	<option value="Belgium" title="Belgium">Belgium</option>
	<option value="Belize" title="Belize">Belize</option>
	<option value="Benin" title="Benin">Benin</option>
	<option value="Bermuda" title="Bermuda">Bermuda</option>
	<option value="Bhutan" title="Bhutan">Bhutan</option>
	<option value="Bolivia, Plurinational State of" title="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
	<option value="Bonaire, Sint Eustatius and Saba" title="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
	<option value="Bosnia and Herzegovina" title="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
	<option value="Botswana" title="Botswana">Botswana</option>
	<option value="Bouvet Island" title="Bouvet Island">Bouvet Island</option>
	<option value="Brazil" title="Brazil">Brazil</option>
	<option value="British Indian Ocean Territory" title="British Indian Ocean Territory">British Indian Ocean Territory</option>
	<option value="Brunei Darussalam" title="Brunei Darussalam">Brunei Darussalam</option>
	<option value="Bulgaria" title="Bulgaria">Bulgaria</option>
	<option value="Burkina Faso" title="Burkina Faso">Burkina Faso</option>
	<option value="Burundi" title="Burundi">Burundi</option>
	<option value="Cambodia" title="Cambodia">Cambodia</option>
	<option value="Cameroon" title="Cameroon">Cameroon</option>
	<option value="Canada" title="Canada">Canada</option>
	<option value="Cape Verde" title="Cape Verde">Cape Verde</option>
	<option value="Cayman Islands" title="Cayman Islands">Cayman Islands</option>
	<option value="Central African Republic" title="Central African Republic">Central African Republic</option>
	<option value="Chad" title="Chad">Chad</option>
	<option value="Chile" title="Chile">Chile</option>
	<option value="China" title="China">China</option>
	<option value="Christmas Island" title="Christmas Island">Christmas Island</option>
	<option value="Cocos (Keeling) Islands" title="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
	<option value="Colombia" title="Colombia">Colombia</option>
	<option value="Comoros" title="Comoros">Comoros</option>
	<option value="Congo" title="Congo">Congo</option>
	<option value="Congo, the Democratic Republic of the" title="Congo, the Democratic Republic of the">Congo, the Democratic Republic of the</option>
	<option value="Cook Islands" title="Cook Islands">Cook Islands</option>
	<option value="Costa Rica" title="Costa Rica">Costa Rica</option>
	<option value="Côte d'Ivoire" title="Côte d'Ivoire">Côte d'Ivoire</option>
	<option value="Croatia" title="Croatia">Croatia</option>
	<option value="Cuba" title="Cuba">Cuba</option>
	<option value="Curaçao" title="Curaçao">Curaçao</option>
	<option value="Cyprus" title="Cyprus">Cyprus</option>
	<option value="Czech Republic" title="Czech Republic">Czech Republic</option>
	<option value="Denmark" title="Denmark">Denmark</option>
	<option value="Djibouti" title="Djibouti">Djibouti</option>
	<option value="Dominica" title="Dominica">Dominica</option>
	<option value="Dominican Republic" title="Dominican Republic">Dominican Republic</option>
	<option value="Ecuador" title="Ecuador">Ecuador</option>
	<option value="Egypt" title="Egypt">Egypt</option>
	<option value="El Salvador" title="El Salvador">El Salvador</option>
	<option value="Equatorial Guinea" title="Equatorial Guinea">Equatorial Guinea</option>
	<option value="Eritrea" title="Eritrea">Eritrea</option>
	<option value="Estonia" title="Estonia">Estonia</option>
	<option value="Ethiopia" title="Ethiopia">Ethiopia</option>
	<option value="Falkland Islands (Malvinas)" title="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
	<option value="Faroe Islands" title="Faroe Islands">Faroe Islands</option>
	<option value="Fiji" title="Fiji">Fiji</option>
	<option value="Finland" title="Finland">Finland</option>
	<option value="France" title="France">France</option>
	<option value="French Guiana" title="French Guiana">French Guiana</option>
	<option value="French Polynesia" title="French Polynesia">French Polynesia</option>
	<option value="French Southern Territories" title="French Southern Territories">French Southern Territories</option>
	<option value="Gabon" title="Gabon">Gabon</option>
	<option value="Gambia" title="Gambia">Gambia</option>
	<option value="Georgia" title="Georgia">Georgia</option>
	<option value="Germany" title="Germany">Germany</option>
	<option value="Ghana" title="Ghana">Ghana</option>
	<option value="Gibraltar" title="Gibraltar">Gibraltar</option>
	<option value="Greece" title="Greece">Greece</option>
	<option value="Greenland" title="Greenland">Greenland</option>
	<option value="Grenada" title="Grenada">Grenada</option>
	<option value="Guadeloupe" title="Guadeloupe">Guadeloupe</option>
	<option value="Guam" title="Guam">Guam</option>
	<option value="Guatemala" title="Guatemala">Guatemala</option>
	<option value="Guernsey" title="Guernsey">Guernsey</option>
	<option value="Guinea" title="Guinea">Guinea</option>
	<option value="Guinea-Bissau" title="Guinea-Bissau">Guinea-Bissau</option>
	<option value="Guyana" title="Guyana">Guyana</option>
	<option value="Haiti" title="Haiti">Haiti</option>
	<option value="Heard Island and McDonald Islands" title="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
	<option value="Holy See (Vatican City State)" title="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
	<option value="Honduras" title="Honduras">Honduras</option>
	<option value="Hong Kong" title="Hong Kong">Hong Kong</option>
	<option value="Hungary" title="Hungary">Hungary</option>
	<option value="Iceland" title="Iceland">Iceland</option>
	<option value="India" title="India">India</option>
	<option value="Indonesia" title="Indonesia">Indonesia</option>
	<option value="Iran, Islamic Republic of" title="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
	<option value="Iraq" title="Iraq">Iraq</option>
	<option value="Ireland" title="Ireland">Ireland</option>
	<option value="Isle of Man" title="Isle of Man">Isle of Man</option>
	<option value="Israel" title="Israel">Israel</option>
	<option value="Italy" title="Italy">Italy</option>
	<option value="Jamaica" title="Jamaica">Jamaica</option>
	<option value="Japan" title="Japan">Japan</option>
	<option value="Jersey" title="Jersey">Jersey</option>
	<option value="Jordan" title="Jordan">Jordan</option>
	<option value="Kazakhstan" title="Kazakhstan">Kazakhstan</option>
	<option value="Kenya" title="Kenya">Kenya</option>
	<option value="Kiribati" title="Kiribati">Kiribati</option>
	<option value="Korea, Democratic People's Republic of" title="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
	<option value="Korea, Republic of" title="Korea, Republic of">Korea, Republic of</option>
	<option value="Kuwait" title="Kuwait">Kuwait</option>
	<option value="Kyrgyzstan" title="Kyrgyzstan">Kyrgyzstan</option>
	<option value="Lao People's Democratic Republic" title="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
	<option value="Latvia" title="Latvia">Latvia</option>
	<option value="Lebanon" title="Lebanon">Lebanon</option>
	<option value="Lesotho" title="Lesotho">Lesotho</option>
	<option value="Liberia" title="Liberia">Liberia</option>
	<option value="Libya" title="Libya">Libya</option>
	<option value="Liechtenstein" title="Liechtenstein">Liechtenstein</option>
	<option value="Lithuania" title="Lithuania">Lithuania</option>
	<option value="Luxembourg" title="Luxembourg">Luxembourg</option>
	<option value="Macao" title="Macao">Macao</option>
	<option value="Macedonia, the former Yugoslav Republic of" title="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav Republic of</option>
	<option value="Madagascar" title="Madagascar">Madagascar</option>
	<option value="Malawi" title="Malawi">Malawi</option>
	<option value="Malaysia" title="Malaysia">Malaysia</option>
	<option value="Maldives" title="Maldives">Maldives</option>
	<option value="Mali" title="Mali">Mali</option>
	<option value="Malta" title="Malta">Malta</option>
	<option value="Marshall Islands" title="Marshall Islands">Marshall Islands</option>
	<option value="Martinique" title="Martinique">Martinique</option>
	<option value="Mauritania" title="Mauritania">Mauritania</option>
	<option value="Mauritius" title="Mauritius">Mauritius</option>
	<option value="Mayotte" title="Mayotte">Mayotte</option>
	<option value="Mexico" title="Mexico">Mexico</option>
	<option value="Micronesia, Federated States of" title="Micronesia, Federated States of">Micronesia, Federated States of</option>
	<option value="Moldova, Republic of" title="Moldova, Republic of">Moldova, Republic of</option>
	<option value="Monaco" title="Monaco">Monaco</option>
	<option value="Mongolia" title="Mongolia">Mongolia</option>
	<option value="Montenegro" title="Montenegro">Montenegro</option>
	<option value="Montserrat" title="Montserrat">Montserrat</option>
	<option value="Morocco" title="Morocco">Morocco</option>
	<option value="Mozambique" title="Mozambique">Mozambique</option>
	<option value="Myanmar" title="Myanmar">Myanmar</option>
	<option value="Namibia" title="Namibia">Namibia</option>
	<option value="Nauru" title="Nauru">Nauru</option>
	<option value="Nepal" title="Nepal">Nepal</option>
	<option value="Netherlands" title="Netherlands">Netherlands</option>
	<option value="New Caledonia" title="New Caledonia">New Caledonia</option>
	<option value="New Zealand" title="New Zealand">New Zealand</option>
	<option value="Nicaragua" title="Nicaragua">Nicaragua</option>
	<option value="Niger" title="Niger">Niger</option>
	<option value="Nigeria" title="Nigeria">Nigeria</option>
	<option value="Niue" title="Niue">Niue</option>
	<option value="Norfolk Island" title="Norfolk Island">Norfolk Island</option>
	<option value="Northern Mariana Islands" title="Northern Mariana Islands">Northern Mariana Islands</option>
	<option value="Norway" title="Norway">Norway</option>
	<option value="Oman" title="Oman">Oman</option>
	<option value="Pakistan" title="Pakistan">Pakistan</option>
	<option value="Palau" title="Palau">Palau</option>
	<option value="Palestinian Territory, Occupied" title="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
	<option value="Panama" title="Panama">Panama</option>
	<option value="Papua New Guinea" title="Papua New Guinea">Papua New Guinea</option>
	<option value="Paraguay" title="Paraguay">Paraguay</option>
	<option value="Peru" title="Peru">Peru</option>
	<option value="Philippines" title="Philippines">Philippines</option>
	<option value="Pitcairn" title="Pitcairn">Pitcairn</option>
	<option value="Poland" title="Poland">Poland</option>
	<option value="Portugal" title="Portugal">Portugal</option>
	<option value="Puerto Rico" title="Puerto Rico">Puerto Rico</option>
	<option value="Qatar" title="Qatar">Qatar</option>
	<option value="Réunion" title="Réunion">Réunion</option>
	<option value="Romania" title="Romania">Romania</option>
	<option value="Russian Federation" title="Russian Federation">Russian Federation</option>
	<option value="Rwanda" title="Rwanda">Rwanda</option>
	<option value="Saint Barthélemy" title="Saint Barthélemy">Saint Barthélemy</option>
	<option value="Saint Helena, Ascension and Tristan da Cunha" title="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option>
	<option value="Saint Kitts and Nevis" title="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
	<option value="Saint Lucia" title="Saint Lucia">Saint Lucia</option>
	<option value="Saint Martin (French part)" title="Saint Martin (French part)">Saint Martin (French part)</option>
	<option value="Saint Pierre and Miquelon" title="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
	<option value="Saint Vincent and the Grenadines" title="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
	<option value="Samoa" title="Samoa">Samoa</option>
	<option value="San Marino" title="San Marino">San Marino</option>
	<option value="Sao Tome and Principe" title="Sao Tome and Principe">Sao Tome and Principe</option>
	<option value="Saudi Arabia" title="Saudi Arabia">Saudi Arabia</option>
	<option value="Senegal" title="Senegal">Senegal</option>
	<option value="Serbia" title="Serbia">Serbia</option>
	<option value="Seychelles" title="Seychelles">Seychelles</option>
	<option value="Sierra Leone" title="Sierra Leone">Sierra Leone</option>
	<option value="Singapore" title="Singapore">Singapore</option>
	<option value="Sint Maarten (Dutch part)" title="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
	<option value="Slovakia" title="Slovakia">Slovakia</option>
	<option value="Slovenia" title="Slovenia">Slovenia</option>
	<option value="Solomon Islands" title="Solomon Islands">Solomon Islands</option>
	<option value="Somalia" title="Somalia">Somalia</option>
	<option value="South Africa" title="South Africa">South Africa</option>
	<option value="South Georgia and the South Sandwich Islands" title="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
	<option value="South Sudan" title="South Sudan">South Sudan</option>
	<option value="Spain" title="Spain">Spain</option>
	<option value="Sri Lanka" title="Sri Lanka">Sri Lanka</option>
	<option value="Sudan" title="Sudan">Sudan</option>
	<option value="Suriname" title="Suriname">Suriname</option>
	<option value="Svalbard and Jan Mayen" title="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
	<option value="Swaziland" title="Swaziland">Swaziland</option>
	<option value="Sweden" title="Sweden">Sweden</option>
	<option value="Switzerland" title="Switzerland">Switzerland</option>
	<option value="Syrian Arab Republic" title="Syrian Arab Republic">Syrian Arab Republic</option>
	<option value="Taiwan, Province of China" title="Taiwan, Province of China">Taiwan, Province of China</option>
	<option value="Tajikistan" title="Tajikistan">Tajikistan</option>
	<option value="Tanzania, United Republic of" title="Tanzania, United Republic of">Tanzania, United Republic of</option>
	<option value="Thailand" title="Thailand">Thailand</option>
	<option value="Timor-Leste" title="Timor-Leste">Timor-Leste</option>
	<option value="Togo" title="Togo">Togo</option>
	<option value="Tokelau" title="Tokelau">Tokelau</option>
	<option value="Tonga" title="Tonga">Tonga</option>
	<option value="Trinidad and Tobago" title="Trinidad and Tobago">Trinidad and Tobago</option>
	<option value="Tunisia" title="Tunisia">Tunisia</option>
	<option value="Turkey" title="Turkey">Turkey</option>
	<option value="Turkmenistan" title="Turkmenistan">Turkmenistan</option>
	<option value="Turks and Caicos Islands" title="Turks and Caicos Islands">Turks and Caicos Islands</option>
	<option value="Tuvalu" title="Tuvalu">Tuvalu</option>
	<option value="Uganda" title="Uganda">Uganda</option>
	<option value="Ukraine" title="Ukraine">Ukraine</option>
	<option value="United Arab Emirates" title="United Arab Emirates">United Arab Emirates</option>
	<option value="United Kingdom" title="United Kingdom">United Kingdom</option>
	<option value="United States" title="United States">United States</option>
	<option value="United States Minor Outlying Islands" title="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
	<option value="Uruguay" title="Uruguay">Uruguay</option>
	<option value="Uzbekistan" title="Uzbekistan">Uzbekistan</option>
	<option value="Vanuatu" title="Vanuatu">Vanuatu</option>
	<option value="Venezuela, Bolivarian Republic of" title="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
	<option value="Viet Nam" title="Viet Nam">Viet Nam</option>
	<option value="Virgin Islands, British" title="Virgin Islands, British">Virgin Islands, British</option>
	<option value="Virgin Islands, U.S." title="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
	<option value="Wallis and Futuna" title="Wallis and Futuna">Wallis and Futuna</option>
	<option value="Western Sahara" title="Western Sahara">Western Sahara</option>
	<option value="Yemen" title="Yemen">Yemen</option>
	<option value="Zambia" title="Zambia">Zambia</option>
	<option value="Zimbabwe" title="Zimbabwe">Zimbabwe</option>
</select>
				</form>
	</div>
	<?php if(!empty($all_products)){ ?>
	<div class="">
		<ul class="searched_prd">
		<?php foreach($all_products as $all_product){ ?>
		<li class="prod_wrap_search">
			<img src="<?php echo $all_product->imageUrl; ?>" />
			<a href="<?php echo $all_product->productUrl; ?>" class="title"><?php echo $all_product->productTitle; ?></a>
			<h4 class="price"><?php echo $all_product->localPrice; ?>
			<span class="cut_price"><?php echo $all_product->originalPrice; ?></span></h4>
			<!--<h4 class="price"><?php echo $all_product->localPrice; ?></h4>-->
			<div style="margin-bottom: 10px;">
			<?php for($i=1; $i<=5; $i++){ 
				if($i>round($all_product->evaluateScore)){ 
					echo '<i class="fa fa-star review_star" aria-hidden="true" style="color:#c0baac;"></i>';
				}else{
					echo '<i class="fa fa-star review_star" aria-hidden="true" ></i>';
				}
			 } ?>
			 <span class="algn_orders"><?php echo $all_product->volume; ?>&nbsp;Orders&nbsp;<i aria-hidden="true" class="fa fa-shopping-cart"></i></span>
			</div>
			<button type="button" class="button button-primary impot_btn" data-url="<?php echo $all_product->productUrl; ?>" data-image="<?php echo $all_product->imageUrl; ?>" product-id="<?php echo $all_product->productId; ?>" style="top: 17px;position: relative;display: block;"><i class="fa fa-plus"></i>Add to Import List</button>
		</li>
		<?php }?>
		</ul>
	</div>
	<div style="text-align: right;padding-right: 25px;">
	<?php  $page_prev = $page_no-1;
		   $page_next = $page_no+1;
		  $totalRes = round($totalResults/24);
		  if($totalRes==0)
		  {
			  ;
		  }
		  else if($page_no==1)
		  { 
				  for($i=$page_no;$i<$page_no+2;$i++)
				  { ?>
				  <a href="<?php echo $actual_link.'&page_no='.$i.''; ?>" class="button button-default"><?php echo $i; ?></a>
				  <?php } ?>
				  <a href="javascript:void(0);" class="button button-default">...</a>
				<a href="<?php echo $actual_link.'&page_no='.$totalRes.''; ?>" class="button button-default"><?php echo $totalRes; ?></a>
				  <a href="<?php echo $actual_link.'&page_no='.$page_next.''; ?>" class="button button-primary">Next>></a>
		<?php } 
		else if($page_no == $totalRes)
		{ $page_prev = $totalRes-3;
		?>
			<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$page_prev.'', $actual_link); ?>" class="button button-primary">< Previous</a>
			<?php for($i=$page_no-2;$i<$totalRes;$i++)
				{ ?>
				<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$i.'', $actual_link); ?>" class="button button-default"><?php echo $i; ?></a>
				<?php }	?>
				<a href="javascript:void(0);" class="button button-default">...</a>
				<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$totalRes.'', $actual_link); ?>" class="button button-default"><?php echo $totalRes; ?></a>
				
		<?php
		}
		else if($page_no+1 == $totalRes)
		{ $page_rev = $page_no-1;
			
		?>	<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$page_rev.'', $actual_link); ?>" class="button button-primary">< Previous</a>
				<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$totalRes.'', $actual_link); ?>" class="button button-default"><?php echo $page_no; ?></a>
				<a href="javascript:void(0);" class="button button-default">...</a>
				<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$totalRes.'', $actual_link); ?>" class="button button-default"><?php echo $totalRes; ?></a>
				<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$page_next.'', $actual_link); ?>" class="button button-primary">Next ></a>
		<?php
		}
		else { ?>
				<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$page_prev.'', $actual_link); ?>" class="button button-primary">< Previous</a>
				<?php for($i=$page_no;$i<$page_no+2;$i++)
				{ ?>
				<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$i.'', $actual_link); ?>" class="button button-default"><?php echo $i; ?></a>
				<?php }	
				 ?>
				<a href="javascript:void(0);" class="button button-default">...</a>
				<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$totalRes.'', $actual_link); ?>" class="button button-default"><?php echo $totalRes; ?></a>
				<a href="<?php echo str_replace('page_no='.$page_no.'', 'page_no='.$page_next.'', $actual_link); ?>" class="button button-primary">Next ></a>
		<?php } ?>
			</div>
	<?php }
	else  { ?>
	<br/>
		<div class="main_wrap_search">
			<h3>Sorry, No Products found !</h3>
		</div>
	<?php } ?>
	<div id="dialog" title="Import Product by URL or ID"> 
		<form method="post" id="import_url">
			<div>
				<label>Product URL</label>
				<input type="text" name="product_url" id="product_url" style="width: 100%;margin-bottom: 16px;"/>
			</div>
			<div style="width: 100%;margin-bottom: 16px;">OR</div>
			<div>
				<label>Product ID</label>
				<input type="text" name="product_id" id="product_id" style="width: 100%;margin-bottom: 16px;"/>
			</div>
			<div style="text-align:right">
				<button type="reset" class="button button-default " id="reset_url" >Reset</button>
				<button type="button" name="import_by_url" value="Import" id="import_by_url" class="button button-primary impot_url"><i class="fa fa-plus"></i>&nbsp;&nbsp;Import</button>
			</div>
		</form>
	</div>
	


</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
<script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 jQuery(document).ready(function(){
	 var admin_ajax = '<?php echo admin_url( 'admin-ajax.php' ); ?>';
	 jQuery('.impot_btn').click(function(){
		if(jQuery(this).hasClass('remove_btn')==false){
			jQuery(this).html('<i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;Please wait.......');
			var product_url = jQuery(this).attr('data-url');
			var product_img = jQuery(this).attr('data-image');
			var product_id = jQuery(this).attr('product-id');
			var this_btn = jQuery(this);
			var datastring = 'product_url='+product_url+'&product_img='+product_img+'&product_id='+product_id+'&action=alib_import_to_list';
			jQuery.ajax({
				'url': admin_ajax,
				'type': 'POST',
				'data': datastring,
				success:function(data){
					if(data=='done'){
						this_btn.attr('style', 'background: red !important;top: 17px;position: relative;display: block;text-shadow:none !important');
						this_btn.html('<i class="fa fa-window-close"></i>Remove from Import List');
						this_btn.addClass('remove_btn');
					}
				}
			});
		 }
	 });
	 
	 jQuery('.imprt_product_btn').click(function(){
		jQuery( "#dialog" ).dialog();
	 });
	 
	 jQuery('.advance_srch').click(function(){
		  jQuery('.advance_srch').hide();
		  jQuery('.dsbl_smle').removeAttr('disabled');
		  jQuery('.simple_srch').show();
		  jQuery('.search-panel-advanced').slideDown();
		 
	 });
	 jQuery('.simple_srch').click(function(){
		 jQuery('.simple_srch').hide();
		 jQuery('.advance_srch').show();
		 jQuery('.dsbl_smle').attr('disabled', 'disabled');
		 jQuery('.search-panel-advanced').slideUp();
		 jQuery('.search-panel-advanced').hide();
	 });
	 
	 jQuery('#import_by_url').click(function(){
		 var this_btn = jQuery(this);
		 
		var product_url = $("#product_url").val();
		var product_id = $("#product_id").val();
		if(product_id == "" && product_url == "")
		{
			alert("Enter one of its field");
		}
		else{
			if(jQuery(this).hasClass('remove_btn')==false){
			jQuery(this).html('<i class="fa fa-cog fa-spin"></i>&nbsp;&nbsp;Please wait.......');
			var datastring = 'product_url='+product_url+'&product_id='+product_id+'&action=alib_import_by_url';
			jQuery.ajax({
				'url': admin_ajax,
				'type': 'POST',
				'data': datastring,
				success:function(data){ 
				
					if(data=='done'){
						alert("Successfully imported");
						this_btn.html('<i class="fa fa-plus"></i>&nbsp;&nbsp;Import');
					}
					else
					{
						alert("not imported");
						this_btn.html('<i class="fa fa-plus"></i>&nbsp;&nbsp;Import');
					}
				}
			});
			}
		}
	  });
	   jQuery('#reset_url').click(function(){
		$('#import_by_url').html("<i class=\"fa fa-plus\"></i>&nbsp;&nbsp;Import");
					
	 });
 });
</script>

<style>
#dialog{
	display:none;
}
.main_wrap_search{
	background: white;
	padding: 2px 10px 40px 10px;
	border: 1px solid #dadada;
	border-radius: 3px;
}
.form-contrl{
	max-width: 300px;
	width:100%;
	padding:7px;
}
.searched_prd li{
	max-width:240px;
	width:25%;
	display:inline-block;
}
.searched_prd li img{
	width:100%;
	height: 264px;
}
.searched_prd li .price{
    font-weight: 600;
    color: #f97442;
	font-weight:bold;
	margin: 5px 0px;
}
.searched_prd li .title{
display: block;
overflow: hidden;
padding: 3px 0;
white-space: nowrap;
text-overflow: ellipsis;
font-size: 13px;
margin-top: 17px;
text-decoration: none;
}
.prod_wrap_search{
	background: white;
	padding: 10px 10px 40px 10px;
	border: 1px solid #b6aaaa;
	border-radius: 3px;
	margin-right:10px;
	margin-bottom:20px;
}
.cut_price{
	text-decoration: line-through;
	color: #9b9b9b;
	font-weight:600;
}
.impot_btn{
	background: #7ef07f !important;
	text-shadow: 0 -1px 1px #7ef07f,1px 0 1px #7ef07f,0 1px 1px #7ef07f,-1px 0 1px #7ef07f !important;
	border-color: #6fa770 #6fa770 #6fa770 !important;
	box-shadow: 0 1px 0 #7ef07f !important;
}
.impot_btn i{
	font-size: 13px;
	margin-right: 7px;
}
.review_star{
	width: 15px;
	height: 15px;
	color: #ffb000;
}
.algn_orders{
	font-weight: bold;
	color: #786464;
	margin-left: 65px;
}
.ui-dialog-titlebar.ui-corner-all.ui-widget-header.ui-helper-clearfix.ui-draggable-handle{
	background: #e19f56;
	color: #fff;
}
.ui-dialog{
	width:450px !important;
	top:120px !important;
}
</style>