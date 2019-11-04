    <!--================Admin Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Kode Transaksi</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(isset($dataTransaksi)) { $i=0; foreach ($dataTransaksi as $Transaksi) { ?>
                            <tr>
                                <td>
                                    <h5><?php echo ($Transaksi->NoPenjualan) ?></h5>
                                </td>
                                <td>
                                    <h5><?php echo ($Transaksi->Tanggal) ?></h5>
                                </td>
                                <td>
                                    <?php if ($Transaksi->Status == 'Belum Bayar') { ?>
                                    <span class="badge badge-pill badge-danger">Belum Bayar</span>
                                    <?php } else if ($Transaksi->Status == 'Sudah Bayar') { ?>
                                    <span class="badge badge-pill badge-success">Sudah Bayar</span>
                                    <?php } else { ?>
                                    <span class="badge badge-pill badge-warning">Sedang Dikirim</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if ($Transaksi->Status == 'Belum Bayar') { ?>
                                    <a class="btn btn-success" href="<?php echo base_url()?>Transaksi/bayar/<?php echo ($Transaksi->NoPenjualan) ?>">Bayar</a>
                                    
                                    <?php } else if ($Transaksi->Status == 'Sudah Bayar') { ?>
                                    <a class="btn btn-primary" href="<?php echo base_url()?>Transaksi/kirim/<?php echo ($Transaksi->NoPenjualan) ?>">Kirim</a>
                                    <?php } ?>
                                    
                                </td>
                            </tr>
                            <?php } } else { ?>
                                <tr>
                                    <td colspan="4"> Tidak ada transaksi</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Admin Area =================-->