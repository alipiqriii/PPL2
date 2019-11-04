<!-- BEGIN Content -->
<div class="app-content content">
  <div class="content-wrapper">
    <!-- BEGIN Content Header -->
    <div class="content-header row">
      <div class="content-header-left col-md-12 col-12 mb-2">
      </div>
      <div class="content-header-left col-md-6 col-12 mb-2">
        <h3 class="content-header-title mb-0"><?php echo $PageTitle;?></h3>
        <div class="row breadcrumbs-top">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="index.html">Home</a>
              </li>
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>Barang">Barang</a>
              </li>
              <li class="breadcrumb-item active">Data Barang
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- END Content Header -->
    <!-- BEGIN Content Body -->
    <div class="content-body">
      <section id="html-markup" class="card">
        <div class="card-header">
          <h2><b>List Barang</b></h2>
          <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
          <div class="heading-elements">
            <ul class="list-inline mb-0">
              <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="content-header-right text-md-right col-md-12 col-12">
            </div>
            <div class="tab-content px-1 pt-1">
              <div class="table-responsive">
                  <div id="alert_message"></div>
                  <table class="table table-hover text-md-center table-bordered mb-0 penilaian-matakuliah">
                      <thead>
                        <tr>
                        <th class="align-middle">No</th>
                        <th class="align-middle">Kode Barang</th>
                        <th class="align-middle">Nama Barang</th>
                        <th class="align-middle">Harga Beli</th>
                        <th class="align-middle">Harga Jual</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if($dataBarang) { $i=0; foreach ($dataBarang as $Barang) { ?>
                          <tr>
                            <td> <?php echo $i+1 ?> </td>
                            <td> <?php echo ($Barang->kode_barang) ?> </td>
                            <td> <?php echo ($Barang->nama_barang) ?> </td>
                            <td> <?php echo ($Barang->harga_beli) ?> </td>
                            <td> <?php echo ($Barang->harga_jual) ?> </td>
                          </tr>
                        <?php $i++; } } else { ?>
                          <td colspan="5"> Tidak Ada Data </td>
                        <?php } ?>
                      </tbody>
                      <tfoot>
                        <tr>
                        <th class="align-middle">No</th>
                        <th class="align-middle">Kode Barang</th>
                        <th class="align-middle">Nama Barang</th>
                        <th class="align-middle">Harga Beli</th>
                        <th class="align-middle">Harga Jual</th>
                        </tr>
                      </tfoot>
                    </table>
                  <br>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    <!-- END Content Body -->
  </div>
</div>
<!-- END Content -->

