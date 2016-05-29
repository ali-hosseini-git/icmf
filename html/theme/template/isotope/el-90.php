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
	<h2>ال ۹۰</h2>
	<div id="filters" class=" button-group ">
		<button class="button btn1 is-checked" data-filter="*">نمایش همه</button>
		<button class="button" data-filter=".motor">موتور</button>
		<button class="button" data-filter=".modiriate-motor">مدیریت-موتور</button>
		<button class="button" data-filter=".taligh">تعلیق</button>
		<button class="button" data-filter=".tormoz">ترمز</button>
		<button class="button" data-filter=".bargh">برق</button>
		<button class="button" data-filter=".badane">بدنه</button>
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
	$handle = opendir ( 'images/ال-90/موتور/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
	    	<div class=' element-item transition motor ' data-category='transition'>
	    
	    	<img class='isotope-img' src='images/ال-90/موتور/$entry'>
	    	<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
	    	</div>";
	
	closedir ( $handle );
	
	$handle = opendir ( 'images/ال-90/مدیریت-موتور/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
			<div class=' element-item transition modiriate-motor' data-category='transition'>
			 
			<img class='isotope-img' src='images/ال-90/مدیریت-موتور/$entry'>
			<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	
	closedir ( $handle );
	
	$handle = opendir ( 'images/ال-90/تعلیق/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
		<div class=' element-item transition taligh' data-category='transition'>

		<img class='isotope-img' src='images/ال-90/تعلیق/$entry'>
		<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	closedir ( $handle );
	
	$handle = opendir ( 'images/ال-90/ترمز/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
			<div class=' element-item transition tormoz ' data-category='transition'>

			<img class='isotope-img' src='images/ال-90/ترمز/$entry'>
			<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	closedir ( $handle );
	
	$handle = opendir ( 'images/ال-90/برق/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
			<div class=' element-item transition bargh ' data-category='transition'>

			<img class='isotope-img' src='images/ال-90/برق/$entry'>
			<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	
	closedir ( $handle );
	
	$handle = opendir ( 'images/ال-90/بدنه/' );
	while ( false !== ($entry = readdir ( $handle )) )
		if ($entry !== ".." and $entry !== ".")
			echo "
			<div class=' element-item transition badane ' data-category='transition'>

			<img class='isotope-img' src='images/ال-90/بدنه/$entry'>
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
