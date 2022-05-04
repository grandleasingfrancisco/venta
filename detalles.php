<?php include 'header.php';
include 'admin/conn.php';
$codimg = $_GET['codimg'];
$categoria = $_GET['cate'];
$sqlinfo = "select * from tickets.autosusados where codimg='$codimg'";
$stmtinfo = sqlsrv_query($conn, $sqlinfo);
if ($stmtinfo === false) {
	die(print_r(sqlsrv_errors(), true));
}
$sqlfoto = "select * from tickets.imagenesautos where codimg='$codimg'";
$stmtfoto = sqlsrv_query($conn, $sqlfoto);
if ($stmtfoto === false) {
	die(print_r(sqlsrv_errors(), true));
}

$sqlcate = "SELECT
ai.marca,
ai.modelo,
ai.url2,
ai.categoria,
ai.codimg,
ai.valor
FROM (
SELECT
marca,
modelo,
i.url2,
categoria,
a.codimg,
valor,
ROW_NUMBER() OVER(PARTITION BY a.id ORDER BY i.id) RN FROM tickets.autosusados a
LEFT JOIN tickets.imagenesautos i
ON a.codimg=i.codimg
) ai
WHERE RN = 1 and ai.categoria='$categoria'
";
$stmtcate = sqlsrv_query( $conn, $sqlcate );
if( $stmtcate === false) {
    die( print_r( sqlsrv_errors(), true) );
}

?>


<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
	</div>
	<br>
	<br>
</div>


<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-7 p-b-30">
				<div class="p-l-25 p-r-30 p-lr-0-lg">
					<div class="wrap-slick3 flex-sb flex-w">
						<div class="wrap-slick3-dots"></div>
						<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

						<div class="slick3 gallery-lb">
							<?php
							while ($row2 = sqlsrv_fetch_array($stmtfoto, SQLSRV_FETCH_ASSOC)) {
							?>
								<div class="item-slick3" data-thumb="<?php echo $row2["url2"]; ?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo $row2["url2"]; ?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $row2["url2"]; ?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-5 p-b-30">
				<?php
				while ($row = sqlsrv_fetch_array($stmtinfo, SQLSRV_FETCH_ASSOC)) {
				?>
					<div class="p-r-50 p-t-5 p-lr-0-lg">

						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $row["modelo"]; ?> - <?php echo $row["marca"]; ?>
						</h4>

						<span class="mtext-106 cl2">
							$<?php echo $row["valor"]; ?>
						</span>

						<br>
						<hr>
						<ul class="p-lr-28 p-lr-15-sm">
							<li class="flex-w flex-t p-b-7">
								<span class="stext-102 cl3 size-205">
									Modelo
								</span>

								<span class="stext-102 cl6 size-206">
									<?php echo $row["modelo"]; ?>
								</span>
							</li>

							<li class="flex-w flex-t p-b-7">
								<span class="stext-102 cl3 size-205">
									Marca
								</span>

								<span class="stext-102 cl6 size-206">
									<?php echo $row["marca"]; ?>
								</span>
							</li>

							<li class="flex-w flex-t p-b-7">
								<span class="stext-102 cl3 size-205">
									Año
								</span>

								<span class="stext-102 cl6 size-206">
									<?php echo $row["ano"]; ?>
								</span>
							</li>

							<li class="flex-w flex-t p-b-7">
								<span class="stext-102 cl3 size-205">
									Kilometraje
								</span>

								<span class="stext-102 cl6 size-206">
									<?php echo $row["kilometraje"]; ?>
								</span>
							</li>

							<li class="flex-w flex-t p-b-7">
								<span class="stext-102 cl3 size-205">
									Combustible
								</span>

								<span class="stext-102 cl6 size-206">
									<?php echo $row["combustible"]; ?>
								</span>
							</li>
						</ul>
						<hr>
						<h4>Descripción</h4>
						<p class="stext-102 cl3 p-t-23">
							<?php echo $row["descripcion"]; ?>
						</p>

					</div>
				<?php
				}
				?>
			</div>

		</div>

	</div>
</section>

<hr>
<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
	<div class="container">
		<div class="p-b-45">
			<h3 class="ltext-106 cl5 txt-center">
				Otros Productos
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">
			<?php
				while ($row3 = sqlsrv_fetch_array($stmtcate, SQLSRV_FETCH_ASSOC)) {
				?>
				<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo $row3['url2']; ?>" style="height:400px;width:300px" alt="IMG-PRODUCT">
								<a href="detalles.php?codimg=<?php echo $row3['codimg']; ?>&cate=<?php echo $row3['categoria']; ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Vista rápida
								</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="detalles.php?codimg=<?php echo $row3['codimg']; ?>&cate=<?php echo $row3['categoria']; ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $row3['modelo']; ?> - <?php echo $row3['marca']; ?>
								</a>

								<span class="stext-105 cl3">
									<?php echo $row3['valor']; ?>
								</span>
							</div>

						</div>
					</div>
				</div>
			<?php } ?>
			</div>
		</div>
	</div>
</section>


<?php include 'footer.php'; ?>