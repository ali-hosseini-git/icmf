<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>دیناپارت</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/tests.css" />

</head>
<body dir="rtl">

	<h1>قطعات</h1>
	<h2>خارج از لیست</h2>
	<div id="filters" class=" button-group ">
		<button class="button btn1 is-checked" data-filter="*">نمایش همه</button>
	</div>
	<!-- 
<h2>Sort</h2>
<div id="sorts" class="button-group"> <button class="button is-checked" data-sort-by="original-order">original order</button>
  <button class="button" data-sort-by="name">name</button>
  <button class="button" data-sort-by="symbol">symbol</button>
  <button class="button" data-sort-by="number">number</button>
  <button class="button" data-sort-by="weight">weight</button>
  <button class="button" data-sort-by="category">category</button>
</div>
 -->
 
 <?php
 



echo "<div class='isotope'>";
    $handle = opendir('images/خارج-از-لیست/') ;
	while (false !== ($entry = readdir($handle)))
	    if ($entry !== ".." AND $entry !== "." )
	    	echo "
	    	<div class=' element-item transition motor ' data-category='transition'>
	    
	    	<img class='isotope-img' src='images/خارج-از-لیست/$entry'>
	    	<p class='number'>" . substr($entry, 0, -4) . "</p>
	    	</div>";
    

closedir($handle);



echo "</div>";
 ?>
 
 
 
<script src="js/jquery.js"></script>
<script src="js/.isotope.min.js"></script>
<script src="js/isotope.pkgd.js"></script>
<script src="js/test.js"></script>
</body>
</html>
