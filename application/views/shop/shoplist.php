<div class="container">
	<div class="row">
		<div class="col-xl-3 col-lg-4 col-md-5">
			<?php $this->load->view("shop/_partial/sidebar")?>
		</div>
		<div class="col-xl-9 col-lg-8 col-md-7">
			<!-- Start Filter Bar -->
			<div class="filter-bar d-flex flex-wrap align-items-center">
				<div class="sorting">
					<select>
						<option value="1">Default sorting</option>
						<option value="1">Default sorting</option>
						<option value="1">Default sorting</option>
					</select>
				</div>
				<div class="sorting mr-auto">
					<select>
						<option value="1">Show 12</option>
						<option value="1">Show 12</option>
						<option value="1">Show 12</option>
					</select>
				</div>
				<div class="pagination">
					<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<a href="#" class="active">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
					<a href="#">6</a>
					<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<!-- End Filter Bar -->
			<!-- Start Best Seller -->
			<section class="lattest-product-area pb-40 category-list">
				<div class="row">

					<?php if($dataBarang) { $i=0; foreach ($dataBarang as $Barang) { ?>
					<!-- single product -->
					<div class="col-lg-4 col-md-6">
						<div class="single-product">
							<img class="img-fluid" src="<?php echo base_url();?>app-assets/img/product/<?php echo ($Barang->file_gambar) ?>" alt="">
							<div class="product-details">
								<h6><?php echo ($Barang->nama) ?></h6>
								<div class="price">
									
									<div class="row">
										<div class="col-md-8">
											<h6>IDR <?php echo ($Barang->harga) ?> 
										</div>
										<div class="col-md-4">
											<input <?php if($Barang->stock == 0) echo "disabled" ?> type="number" name="quantity" id="qty<?php echo $Barang->kode;?>" value="1" min="1" max="<?php echo $Barang->stock?>" class="quantity form-control">
										</div>
									</div>
								</div>
								<div class="prd-bottom">
									<div class="row">
									<div class="col-md-6">
										<button data-produkid="<?php echo ($Barang->kode) ?>" class="add_cart btn btn-block btn-info" <?php if($Barang->stock == 0) echo "disabled" ?>><?php if($Barang->stock == 0) echo "Not Avaliable"; else echo "Add to Cart" ?></button>
									</div>
									<div class="col-md-6" align="right">
										<button class="btn btn-block btn-warning">Detail</button>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $i++; } } else { ?>
                      <td colspan="5"> Tidak Ada Data </td>
                    <?php } ?>
				</div>
			</section>
			<!-- End Best Seller -->
			<!-- Start Filter Bar -->
			<div class="filter-bar d-flex flex-wrap align-items-center">
				<div class="sorting mr-auto">
					<select>
						<option value="1">Show 12</option>
						<option value="1">Show 12</option>
						<option value="1">Show 12</option>
					</select>
				</div>
				<div class="pagination">
					<a href="#" class="prev-arrow"><i class="fa fa-long-arrow-left" aria-hidden="true"></i></a>
					<a href="#" class="active">1</a>
					<a href="#">2</a>
					<a href="#">3</a>
					<a href="#" class="dot-dot"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>
					<a href="#">6</a>
					<a href="#" class="next-arrow"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
				</div>
			</div>
			<!-- End Filter Bar -->
		</div>
	</div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('.add_cart').click(function(){
            var kode    = $(this).data("produkid");
            var quantity     = $('#qty' + kode).val();
            $.ajax({
                url : "<?php echo base_url();?>/cart/add_to_cart/"+kode+"/"+quantity,
                method : "POST",
                data : {kode: kode, quantity: quantity},
                success: function(data){
                	window.location.href = "<?php echo base_url();?>cart/";
                }
            });
        });      
    });
</script>