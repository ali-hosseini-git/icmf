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
	<h2>قطعات مشترک</h2>
	<div id="filters" class=" button-group ">
		<button class="button btn1 is-checked" data-filter="*">نمایش همه</button>
		<button class="button" data-filter=".prid">پراید</button>
		<button class="button" data-filter=".pejho">پژو</button>
		<button class="button" data-filter=".pars">پارس</button>
		<button class="button" data-filter=".206">۲۰۶</button>
		<button class="button" data-filter=".roa">روا</button>
		<button class="button" data-filter=".peykan">پیکان</button>

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
	$handle = opendir ( 'images/قطعات-مشترک/پراید/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
	    	<div class=' element-item transition prid ' data-category='transition'>
	    
	    	<img class='isotope-img' src='images/قطعات-مشترک/پراید/$entry'>
	    	<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
	    	</div>";
	
	closedir ( $handle );
	
	$handle = opendir ( 'images/قطعات-مشترک/پژو/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
		<div class=' element-item transition pejho' data-category='transition'>

		<img class='isotope-img' src='images/قطعات-مشترک/پژو/$entry'>
		<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	closedir ( $handle );
	
	$handle = opendir ( 'images/قطعات-مشترک/پارس/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
			<div class=' element-item transition pars ' data-category='transition'>

			<img class='isotope-img' src='images/قطعات-مشترک/پارس/$entry'>
			<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	closedir ( $handle );
	
	$handle = opendir ( 'images/قطعات-مشترک/206/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
			<div class=' element-item transition 206 ' data-category='transition'>

			<img class='isotope-img' src='images/قطعات-مشترک/206/$entry'>
			<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	
	closedir ( $handle );
	
	$handle = opendir ( 'images/قطعات-مشترک/پیکان/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
		<div class=' element-item transition peykan ' data-category='transition'>

		<img class='isotope-img' src='images/قطعات-مشترک/پیکان/$entry'>
		<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	closedir ( $handle );
	
	$handle = opendir ( 'images/قطعات-مشترک/روا/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
					<div class=' element-item transition roa ' data-category='transition'>

					<img class='isotope-img' src='images/قطعات-مشترک/روا/$entry'>
					<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	
	closedir ( $handle );
	
	echo "</div>";
	?>
 
 
 



<script src="js/jquery.js"></script>
<script src="js/.isotope.min.js"></script>
<script src="js/isotope.pkgd.js"></script>
<script src="js/test.js"></script>
</body>
</html>
