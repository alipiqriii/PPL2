    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Produk</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total=0; if(isset($dataBarang)) { $i=0; foreach ($dataBarang as $Barang) { ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img width="100px" height="100px" src="<?php echo base_url();?>app-assets/img/product/<?php echo ($Barang['file_gambar']) ?>" alt="">
                                        </div>
                                        <div class="media-body">
                                            <p><?php echo ($Barang['nama']) ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>IDR <?php echo ($Barang['harga']) ?></h5>
                                </td>
                                <td>
                                    <?php echo ($Barang['quantity']) ?>
                                </td>
                                <td>
                                    <h5><?php echo ($Barang['harga'] * $Barang['quantity']); $total += $Barang['harga'] * $Barang['quantity']?></h5>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="<?php echo base_url();?>Cart/clear_one/<?php echo $Barang['kode'] ?>">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>IDR <?php echo ($total) ?></h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-left">
                                        <a class="red_btn" href="<?php echo base_url();?>Cart/clear_all">Clear Cart</a>
                                        <a class="gray_btn" href="#">Continue Shopping</a>
                                        <a class="primary-btn" href="<?php echo base_url();?>Shop/checkout">Proceed to checkout</a>

                                    </div>
                                </td>
                            </tr>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="4"> Tidak ada item</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->