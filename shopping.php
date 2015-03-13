<!DOCTYPE html>
<html>
	<?php  $title = 'Shopping'?>
	<?php include 'inc/head.php' ?>
<body>

	<?php include 'inc/nav.php' ?>

	<div class="content">
		<h2>Shop and Buy</h2>
		
		<form action="checkout.php" method="POST">

		<div class="item">
			<div class="box">
				<img src="imgs/s5.jpg" alt="">
				<dl>
					<dt>Samsung Galaxy S5</dt>
					<dd>Samsungs latest attempt at innovating in the handheld market.</dd>
					<p>Rating : <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></p>
				</dl>
				<div class="price">
					<p>$199.99</p>
					<input type="number" name="s5Q" min=0 max=5 step=1 value=0>
				</div>
					<div class="clear"></div>
			</div>
		</div>

		<div class="item">
			<div class="box">
				<img src="imgs/imac.jpg" alt="">
				<dl>
					<dt>iMac</dt>
					<dd>3.5GHz quad-core Intel Core i5 Turbo Boost up to 3.9GHz. 8GB (two 4GB) memory 1TB Fusion Drive1. AMD Radeon R9 M290X with 2GB video memory</dd>
					<p>Rating : <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></p>
					</dl>
				<div class="price">
					<p>$2,499.99</p>
					<input type="number" name="iMacQ" min=0 max=5 step=1 value=0>
				</div>
					<div class="clear"></div>
			</div>
		</div>

		<div class="item">
			<div class="box">
				<img src="imgs/alpha.jpg" alt="">
				<dl>
					<dt>Alienware Alpha</dt>
					<dd>Remember when Alienware was a respectable company full of aspiring young hardware engineers who were looking to produce the highest quality personal computers at a competitive price? Now Dell owns it.</dd>
					<p>Rating : <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i></p>
					</dl>
				<div class="price">
					<p>$799.99</p>
					<input type="number" name="alphaQ" min=0 max=5 step=1 value=0>
				</div>
					<div class="clear"></div>
			</div>
		</div>

		<div class="item">
			<div class="box">
				<img src="imgs/friendship.png" alt="">
				<dl>
					<dt>My Little Pony DVD Box Set</dt>
						<dd>A show only children and man-children can love! Follow these anthropomorphic baby-horses as they solve problems with friendship!</dd>
						<p>Rating : <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i> <i class="fa fa-star gold"></i></p>
					</dl>
				<div class="price">
					<p>$0.99</p>
					<input type="number" name="mlpQ" min=0 max=5 step=1 value=0>
				</div>
					<div class="clear"></div>
			</div>
		</div>

		<input type="submit" value="submit" id="submit" name="submit">
		</form>

		</div>
	</body>
	</html>