<!--================Checkout Area =================-->
<section class="checkout_area section_gap">
    <div class="container">
        <form class="row contact_form" action="<?php echo base_url();?>cart/docheckout" method="post" novalidate="novalidate">
        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    

                        <?php
                            $length = 15;
                            $today = date("h.i.s.m.d.y");
                            $transaction_code = substr(hash('md5', $today), mt_rand(1, 20), $length); 
                        ?>


                        <div class="col-md-12 form-group">
                            <input type="text" readonly class="form-control" id="first" value="Nomor Penjualan  : <?php echo $transaction_code ?>">
                            <input type="hidden" class="form-control" id="first" name="NomorPenjualan" value="<?php echo $transaction_code ?>">
                            
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="first" name="Nama" placeholder="Nama Lengkap">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="number" name="HP" placeholder="Nomor HP">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="email" name="Email" placeholder="Alamat Email">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="add1" name="Alamat" placeholder="Alamat Rumah">
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="form-group">
                                <select class="form-control" id="provinsi-dropdown" name="provinsi">
                                    <option disabled selected> Pilih Provinsi </option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                       echo "<option value='".$prov['province_id']."'>".$prov['province']."</option>";
                                    }
                                    ?>
                                </select>
                              </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="form-group">
                                <select class="form-control" id="kota-dropdown" name="kota">
                                    <option disabled selected> Pilih Kota / Kabupaten </option>
                                </select>
                              </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="form-group">
                                <select class="form-control" id="kurir" name="kurir">
                                    <option disabled selected> Pilih Kurir </option>
                                    <option value="jne">JNE</option>
                                    <option value="tiki">TIKI</option>
                                    <option value="pos">POS INDONESIA</option>
                                </select>
                              </div>
                        </div>
                        <div class="col-md-12 form-group">
                            <div class="form-group">
                                <select class="form-control" id="services-kurir" name="services_kurir">
                                    <option disabled selected> Pilih Jenis Services Kurir </option>
                                </select>
                              </div>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" name="kodepos" placeholder="Kode Pos" id="kodepos">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input id="ongkir_field" type="hidden" class="form-control" name="ongkir">
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input id="total_field" type="hidden" class="form-control" name="total">
                        </div>
                    
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>
                        <ul class="list">
                            <li><a href="#">Product <span>Total</span></a></li>
                            <?php $total=0; if($dataBarang) { $i=0; foreach ($dataBarang as $Barang) { ?>
                                <li><a href="#"><?php echo substr($Barang['nama'], 0,15);?>... <span class="middle">x <?php echo $Barang['quantity']?></span> <span class="last">IDR <?php echo $Barang['harga']*$Barang['quantity']; $total += $Barang['harga']*$Barang['quantity'] ?></span></a></li>

                            <?php } } ?>
                        </ul>
                        <ul class="list list_2">
                            <li><a href="#">Total Berat <span id="total_berat"><?php echo $total_berat?> Gram</span></a></li>
                            <li><a href="#">Ongkos Kirim <span id="ongkir">IDR 0</span></a></li>
                            <li><a href="#">Total <span id="total">IDR <?php echo $total ?></span></a></li>
                        </ul>
                        <div class="payment_item">
                            <div class="radion_btn">
                                <input type="radio" id="f-option5" name="selector" checked>
                                <label for="f-option5">Transfer Bank</label>
                                <div class="check"></div>
                            </div>
                            <p>BRI 3210129831092 <br>A/N Ali Piqri Sopandi</p>
                            <p>BCA 3210129831092 <br>A/N Ali Piqri Sopandi</p>
                        </div>
                        <div class="creat_account">
                            <input type="checkbox" id="f-option4" name="selector">
                            <label for="f-option4">I’ve read and accept the </label>
                            <a href="#">terms & conditions*</a>
                        </div>
                        <button class="primary-btn" type="submit">Proceed to Checkout</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
<!--================End Checkout Area =================-->
<!-- <script src="<?php echo base_url();?>app-assets/js/vendor/jquery-2.2.4.min.js"></script> -->
<script type="text/javascript">
    var costs;
    var harga_murni_text = $("#total").text();
    var harga_murni = parseInt(harga_murni_text.split('IDR ')[1]);

    $(document).ready(function(){
        $('#provinsi-dropdown').change(function(){
            var prov = $('#provinsi-dropdown').val();
            $.ajax({
                type : 'GET',
                url : '<?php echo base_url()?>Shop/getKotaKabupaten/'+prov,
                    success: function (data) {
                    $("#kota-dropdown").html(data);
                }
            });
            $("#services-kurir").empty();
        });
        $('#kota-dropdown').change(function(){
            $("#services-kurir").empty();
        });
        $('#kurir').change(function(){

            var asal_pengiriman = 22;
            var tujuan_pengiriman = $('#kota-dropdown').val();
            var kurir = $('#kurir').val();
            var berat = parseInt(<?php echo $total_berat?>);

            $("#services-kurir").empty();
            $("#services-kurir").append($("<option></option>").attr({"disabled":"true", "value":"", "selected":"true"}).text('Pilih Services kurir'));
            $.ajax({
                type : 'POST',
                dataType: "json",
                url : '<?php echo base_url()?>Shop/getServiceKurir/'+asal_pengiriman+'/'+tujuan_pengiriman+'/'+kurir+'/'+berat+'/',
                    success: function (data) {
                        costs = data;
                        $.each(data.rajaongkir.results[0].costs, function(){
                            $("#services-kurir").append($("<option></option>").attr("value",this.service).text(this.service+' Rp.'+ this.cost[0].value +' '+this.cost[0].etd+' Hari Sampai' )); 
                        });
                        $("#kodepos").val(costs.rajaongkir.destination_details.postal_code);
                }
            });
        });
        $('#services-kurir').change(function(){
            var services = $("#services-kurir").val();
            var total = $("#total").text()
            console.log("")
            $.each(costs.rajaongkir.results[0].costs, function(){
                console.log(services);
                if (this.service == services) {
                    console.log(this.cost[0].value);
                    $("#ongkir").text("IDR "+this.cost[0].value);
                    var new_total = parseInt(this.cost[0].value) + harga_murni;
                    $("#total").text("IDR "+new_total);
                    $("#ongkir_field").val(this.cost[0].value);
                    $("#total_field").val(new_total);
                }
            });
        });
    });
</script>