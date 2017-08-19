<!DOCTYPE html>


<?php
include ("server.php");
	$chk="";
  	if(isset($_POST['submit'])){
		if(isset($_POST['searchStr'])&&!empty($_POST['searchStr'])){
		$searchStr= $_POST['searchStr'];
		$query="SELECT * FROM `details` WHERE CONCAT (`id`, `owner`, `single`, `rent_single`, `doubler`, `rent_doubler`, `triple`, `rent_triple`, `Address`) LIKE '%$searchStr%'";
		$result= searchTable($query);
	}}else if(isset($_POST['setfilter'])){
		if(isset($_POST['occupacancy'])){
		$checkbox1=$_POST['occupacancy'];
		foreach($checkbox1 as $chk1)
		   {
		      $chk .= $chk1.",";
		   }
		$query="SELECT * FROM `details` WHERE `facilities`='$chk'";
		$result=searchTable($query);
		 }



		if(isset($_POST['type'])){
			echo "1";
		}



		if(isset($_POST['techno'])){
		$checkbox1=$_POST['techno'];
		foreach($checkbox1 as $chk1)
		   {
		      $chk .= $chk1.",";
		   }
		$query="SELECT * FROM `details` WHERE `facilities`='$chk'";
		$result=searchTable($query);
		 }
	}
	else{
		$query= "SELECT * FROM details";
		$result= false;
	}

	function searchTable($query){
		$db=mysqli_connect("localhost","root","","pg");
		$searchResult=mysqli_query($db, $query);
		if (!$searchResult ) {
    		printf("Error: %s\n", mysqli_error($db));
    		exit();
		}
		return $searchResult;
	}


	?>











<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Collapse Filters Search - Bootsnipp.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style3.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/modernizr.js"></script> 
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</head>
<body>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
<form method="post">
<div class="container-fluid">
    <div class="row">
		<div class="col-xs-6 col-sm-3">
			<div id="accordion" class="panel panel-primary behclick-panel">
				<div class="panel-heading">
					<h3 class="panel-title">Search Filter</h3>
				</div>

				<div class="panel-body" >
					<div class="text">
					<label>
						<input type="text" placeholder="Search or select filters" name="searchStr">
						<button type="submit" name="submit" class="fa fa-search"></button>
					</label>
					</div>
				</div>


				<div class="panel-body" >
					<div class="panel-heading " >
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse0">
								<i class="indicator fa fa-caret-down" aria-hidden="true"></i> Occupacancy
							</a>
						</h4>
					</div>
					<div id="collapse0" class="panel-collapse collapse in" >
						<ul class="list-group">
							<li class="list-group-item">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="allo" name="occupacancy[]">
										All types
									</label>
								</div>
							</li>
							<li class="list-group-item">
								<div class="checkbox" >
									<label>
										<input type="checkbox" value="single" name="occupacancy[]">
										One Person
									</label>
								</div>
							</li>
							<li class="list-group-item">
								<div class="checkbox"  >
									<label>
										<input type="checkbox" value="double" name="occupacancy[]">
										Two Person
									</label>
								</div>
							</li>
							<li class="list-group-item">
								<div class="checkbox"  >
									<label>
										<input type="checkbox" value="triple" name="occupacancy[]">
										More than two person
									</label>
								</div>
							</li>
						</ul>
					</div>

					<div class="panel-heading " >
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse1">
								<i class="indicator fa fa-caret-down" aria-hidden="true"></i> Type
							</a>
						</h4>
					</div>
					<div id="collapse1" class="panel-collapse collapse in" >
						<ul class="list-group">
							<li class="list-group-item">
								<div class="radio">
									<label>
										<input type="radio" value="all" name="type">
										All
									</label>
								</div>
							</li>
							<li class="list-group-item">
								<div class="radio" >
									<label>
										<input type="radio" value="boys" name="type">
										Boys
									</label>
								</div>
							</li>
							<li class="list-group-item">
								<div class="radio"  >
									<label>
										<input type="radio" value="girls" name="type">
										Girls
									</label>
								</div>
							</li>
						</ul>
					</div>
					<div class="panel-heading" >
						<h4 class="panel-title">
							<a data-toggle="collapse" href="#collapse2"><i class="indicator fa fa-caret-right" aria-hidden="true"></i> More Filters</a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<ul class="list-group">
							<li class="list-group-item">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="food" name="techno[]">
										Food
									</label>
								</div>
							</li>
							<li class="list-group-item">
								<div class="checkbox" >
									<label>
										<input type="checkbox" value="wifi" name="techno[]">
										wifi
									</label>
								</div>
							</li>
							<li class="list-group-item">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="laundry" name="techno[]">
										Laundry
									</label>
								</div>
							</li>
							<li class="list-group-item">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="AC" name="techno[]">
										AC
									</label>
								</div>
							</li>
							<li class="list-group-item">
								<div class="checkbox">
									<label>
										<input type="checkbox" value="maid" name="techno[]">
										Maid
									</label>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<input type="submit" name="setfilter" value="SET FILTERS">
			</div>
		</div>

	</div>
</div>

</form>

<main class="cd-main-content">
<section class="cd-gallery">
			<ul>		<?php if($result)
			while($row= mysqli_fetch_array($result)): ?>
				<?php $owner=$row['owner'];?>
				<li class="mix"><?php echo "<img src='pic/".$row['pic']."' alt='NO Image Available'>";?>
				<?php echo "<a href='http://localhost/practice/pg/details.php?owner=$owner'>click</a></li>";?>
				<li class="gap"></li>
				<li class="gap"></li>
				<li class="gap"></li>
				
			<?php endwhile;?>
			</ul>
			<div class="cd-fail-message">No results found</div>
		</section> <!-- cd-gallery -->
</main>


<script type="text/javascript">
    	

        function toggleChevron(e) {
		$(e.target)
				.prev('.panel-heading')
				.find("i.indicator")
				.toggleClass('fa-caret-down fa-caret-right');
	}
	$('#accordion').on('hidden.bs.collapse', toggleChevron);
	$('#accordion').on('shown.bs.collapse', toggleChevron);

</script>

<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>
