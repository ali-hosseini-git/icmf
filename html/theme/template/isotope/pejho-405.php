<!doctype html>
<html>
<head>
<meta charset="utf-8">

<title>دیناپارت</title>


  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/tests.css" />/>

</head>
<body dir="rtl">

	<h1>قطعات</h1>
	<h2>پژو ۴۰۵</h2>
	<div id="filters" class=" button-group ">
		<button class="button btn1 is-checked" data-filter="*">نمایش همه</button>
		<button class="button" data-filter=".motor">موتور</button>
		<button class="button" data-filter=".modiriate-motor">مدیریت موتور</button>
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
	$handle1 = opendir ( 'images/پژو-405/موتور/' );
	echo "<div class='isotope'>";
	while ( false !== ($entry1 = readdir ( $handle1 )) ) {
		$handle = opendir ( 'images/پژو-405/موتور/' . $entry1 . '/' );
		while ( false !== ($entry = readdir ( $handle )) )
			if ($entry !== ".." and $entry !== "." and $entry1 !== ".." and $entry1 !== ".")
				echo "
	    	<div class=' element-item transition motor ' data-category='transition'>
	    	<h3 class='name'>$entry1</h3>
	    	<img class='isotope-img' src='images/پژو-405/موتور/$entry1/$entry'>
	    	<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
	    	</div>";
	}
	
	closedir ( $handle1 );
	closedir ( $handle );
	
	$handle1 = opendir ( 'images/پژو-405/مدیریت-موتور/' );
	while ( false !== ($entry1 = readdir ( $handle1 )) ) {
		$handle = opendir ( 'images/پژو-405/مدیریت-موتور/' . $entry1 . '/' );
		while ( false !== ($entry = readdir ( $handle )) )
			if ($entry !== ".." and $entry !== "." and $entry1 !== ".." and $entry1 !== ".")
				echo "
			<div class='element-item transition modiriate-motor ' data-category='transition'>
			<h3 class='name'>$entry1</h3>
			<img class='isotope-img' src='images/پژو-405/مدیریت-موتور/$entry1/$entry'>
			<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	}
	
	closedir ( $handle1 );
	closedir ( $handle );
	
	$handle1 = opendir ( 'images/پژو-405/تعلیق/' );
	
	while ( false !== ($entry1 = readdir ( $handle1 )) ) {
		$handle = opendir ( 'images/پژو-405/تعلیق/' . $entry1 . '/' );
		while ( false !== ($entry = readdir ( $handle )) )
			if ($entry !== ".." and $entry !== "." and $entry1 !== ".." and $entry1 !== ".")
				echo "
			<div class='element-item transition taligh ' data-category='transition'>
			<h3 class='name'>$entry1</h3>
			<img class='isotope-img' src='images/پژو-405/تعلیق/$entry1/$entry'>
			<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	}
	
	closedir ( $handle1 );
	closedir ( $handle );
	
	$handle1 = opendir ( 'images/پژو-405/ترمز/' );
	
	while ( false !== ($entry1 = readdir ( $handle1 )) ) {
		$handle = opendir ( 'images/پژو-405/ترمز/' . $entry1 . '/' );
		while ( false !== ($entry = readdir ( $handle )) )
			if ($entry !== ".." and $entry !== "." and $entry1 !== ".." and $entry1 !== ".")
				echo "
			<div class='element-item transition tormoz' data-category='transition'>
			<h3 class='name'>$entry1</h3>
			<img class='isotope-img' src='images/پژو-405/ترمز/$entry1/$entry'>
			<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	}
	
	closedir ( $handle1 );
	closedir ( $handle );
	
	$handle1 = opendir ( 'images/پژو-405/برق/' );
	
	while ( false !== ($entry1 = readdir ( $handle1 )) ) {
		$handle = opendir ( 'images/پژو-405/برق/' . $entry1 . '/' );
		while ( false !== ($entry = readdir ( $handle )) )
			if ($entry !== ".." and $entry !== "." and $entry1 !== ".." and $entry1 !== ".")
				echo "
			<div class='element-item transition bargh' data-category='transition'>
			<h3 class='name'>$entry1</h3>
			<img class='isotope-img' src='images/پژو-405/برق/$entry1/$entry'>
			<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	}
	
	closedir ( $handle1 );
	closedir ( $handle );
	
	$handle1 = opendir ( 'images/پژو-405/بدنه/' );
	
	while ( false !== ($entry1 = readdir ( $handle1 )) ) {
		$handle = opendir ( 'images/پژو-405/بدنه/' . $entry1 . '/' );
		while ( false !== ($entry = readdir ( $handle )) )
			if ($entry !== ".." and $entry !== "." and $entry1 !== ".." and $entry1 !== ".")
				echo "
			<div class='element-item transition badane' data-category='transition'>
			<h3 class='name'>$entry1</h3>
			<img class='isotope-img' src='images/پژو-405/بدنه/$entry1/$entry'>
			<p class='number'>" . substr ( $entry, 0, - 4 ) . "</p>
			</div>";
	}
	
	closedir ( $handle1 );
	closedir ( $handle );
	echo "</div>";
	
	?>
 
 
 




<script src="js/jquery.js"></script>
<script src="js/.isotope.min.js"></script>
<script src="js/isotope.pkgd.js"></script>
<script src="js/test.js"></script>
</body>
</html>
