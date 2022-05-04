<?php include 'header.php';
include 'php.php'; ?>
<!-- Slider -->
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<div class="item-slick1" style="background-image: url(images/fondo1.jpg);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">

						<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
							<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
								VENTA USADOS
							</h2>
						</div>

						<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								Liquidamos flotas posterior al uso en <br>
								leasing operativo. unidades bien mantenidas<br>
								y operativas. Ventas al por mayor y al detalle.
							</span>
						</div>
						<br>
						<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
							<a href="#catalogo" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" style="background-color: orange;">
								Ver catálogo
							</a>
						</div>
					</div>
				</div>
			</div>

			<div class="item-slick1" style="background-image: url(images/fondo2.jpg);">
				<div class="container h-full">
					<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
							<span class="ltext-101 cl2 respon2">
								¿Quieres que el vehículo sea tuyo?
							</span>
						</div>
						<br>
						<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
							<a href="#catalogo" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" style="background-color: orange;">
								Ver catálogo
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>




<!-- Product -->
<section class="bg0 p-t-23 p-b-140" id="catalogo">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				Productos a la venta
			</h3>
		</div>

		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					Todos los productos
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".autos">
					Autos
				</button>

				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".carrocarga">
					Carro de cargas
				</button>
			</div>

			<div class="flex-w flex-c-m m-tb-10">

			</div>



			<!-- Filter -->
			<div class="dis-none panel-filter w-full p-t-10">


			</div>
		</div>

		<div class="row isotope-grid">
			<?php
			while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
			?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item autos">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo $row['url2']; ?>" style="height:400px;width:300px" alt="IMG-PRODUCT">
							<a href="detalles.php?codimg=<?php echo $row['codimg']; ?>&cate=<?php echo $row['categoria']; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Vista rápida
							</a>
							</form>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="detalles.php?codimg=<?php echo $row['codimg']; ?>&cate=<?php echo $row['categoria']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $row['modelo']; ?> - <?php echo $row['marca']; ?>
								</a>

								<span class="stext-105 cl3">
									<?php echo $row['valor']; ?>
								</span>
							</div>

						</div>
					</div>
				</div>


			<?php
			}
			?>

			<?php
			while ($row2 = sqlsrv_fetch_array($stmt1, SQLSRV_FETCH_ASSOC)) {
			?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item carrocarga">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo $row2['url2']; ?>" style="height:400px;width:300px" alt="IMG-PRODUCT">
							<a href="detalles.php?codimg=<?php echo $row2['codimg']; ?>&cate=<?php echo $row2['categoria']; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Vista rápida
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="detalles.php?codimg=<?php echo $row2['codimg']; ?>&cate=<?php echo $row2['categoria']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $row2['modelo']; ?> - <?php echo $row2['marca']; ?>
								</a>

								<span class="stext-105 cl3">
									<?php echo $row2['valor']; ?>
								</span>
							</div>

						</div>
					</div>
				</div>


			<?php
			}
			?>

		</div>

	</div>
</section>



<?php include 'footer.php' ?>