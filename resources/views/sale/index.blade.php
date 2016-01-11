@extends('layouts.app')

@section('content')
<div class="container">
	<a href="#" class="btn add-new" role="button" data-toggle="modal" data-target="#newSO">
	    <span class="glyphicon glyphicon-plus-sign"></span>
	    Tambah Order Penjualan</a>
	<!--Start SO List-->
	<div class="panel panel-default">
	    <div class="panel-heading padding-title">
	        <div class="row">
	            <div class="col-xs-5">
	                <div style="margin-top: -5px;">
	                    <h3><span class="glyphicon glyphicon-list"></span> Daftar Order Penjualan</h3>
	                </div>
	            </div>
	            <div class="col-xs-7">
	                <form class="navbar-form hidden-xs navbar-right form-inline" role="form" method="get" id="search-form-hidden-xs" name="search-form">
	                    <div class="form-group" style="margin-top: 5px;">
	                        <input type="text" class="form-control" placeholder="cari order penjualan" id="searchSO" name="search" style="width: 300px;">
	                        <button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
	                    </div>
	                </form>
	            </div>
	        </div>
	    </div>
	    <div class="panel-body" style="height: 100%; overflow: auto;">
	        <!--Start SO Table-->
	        <table class="table table-striped">
	            <thead>
	            <tr>
	                <th>No.</th>
	                <th>Kode</th>
	                <th>Konsumen</th>
	                <th>Tgl Penjualan</th>
	                <th>Jlh</th>
	                <th>Keterangan</th>
	                <th>Dibuat Tgl</th>
	                <th>Diubah Tgl</th>
	            </tr>
	            </thead>
	            <tbody>
	            <tr>
	                <td>1</td>
	                <td>001</td>
	                <td>Modena</td>
	                <td>07/12/2015</td>
	                <td>5</td>
	                <td>1 meja makan dan 4 kursi makan</td>
	                <td>09/12/2015</td>
	                <td>09/12/2015</td>
	                <td>
	                    <a href="#">
	                        <span class="glyphicon glyphicon-edit"></span>
	                        Ubah</a>
	                    <a href="#" class="space">
	                        <span class="glyphicon glyphicon-remove-circle"></span>
	                        Hapus</a>
	                </td>
	            </tr>
	            <tr>
	                <td>2</td>
	                <td>002</td>
	                <td>Ocean Furniture</td>
	                <td>08/12/2015</td>
	                <td>10</td>
	                <td>5 meja makan dan 5 meja tulis</td>
	                <td>09/12/2015</td>
	                <td>09/12/2015</td>
	                <td>
	                    <a href="#">
	                        <span class="glyphicon glyphicon-edit"></span>
	                        Ubah</a>
	                    <a href="#" class="space">
	                        <span class="glyphicon glyphicon-remove-circle"></span>
	                        Hapus</a>
	                </td>
	            </tr>
	            </tbody>
	        </table>
	        <!--End SO Table-->
	    </div>
	</div>
	<!--End SO List-->
</div>
<!--Start New SO-->
<div id="newSO" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!--Start Modal Content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: #ff0000;">&times;</button>
                <h4 class="modal-title">Detail Order Penjualan</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="get" id="soEditorial" name="frmSOEditorial">
                    <div class="container-fluid" style="margin-left: 0px; margin-right: 0px;">
                        <div class="row" style="padding-bottom: 15px;">
                            <div class="col-xs-4" style="padding-right: 0px; width: auto;">
                                <label class="editorial-label">Kode Order Penjualan</label>
                            </div>
                            <div class="col-xs-1" style="padding-left: 5px; padding-right: 7px; width: auto;">
                                <label class="editorial-label">:</label>
                            </div>
                            <div class="col-xs-7" style="padding-left: 0px; width: 355px;">
                                <input class="form-control" id="soCode" type="text" placeholder="auto" disabled>
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 15px;">
                            <div class="col-xs-4" style="padding-right: 0px; width: auto;">
                                <label class="editorial-label">Nama Konsumen</label>
                            </div>
                            <div class="col-xs-1" style="padding-left: 35px; padding-right: 7px; width: auto;">
                                <label class="editorial-label">:</label>
                            </div>
                            <div class="col-xs-7" style="padding-left: 0px; width: 355px;">
                                <input class="form-control" id="soCustomer" type="text" placeholder="nama konsumen">
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 15px;">
                            <div class="col-xs-4" style="padding-right: 0px; width: auto;">
                                <label class="editorial-label">Tgl Penjualan</label>
                            </div>
                            <div class="col-xs-1" style="padding-left: 55px; padding-right: 7px; width: auto;">
                                <label class="editorial-label">:</label>
                            </div>
                            <div class="col-xs-7" style="padding-left: 0px; width: 355px;">
                                <div class='input-group date' id='soDate'>
                                    <input type='text' class="form-control" placeholder="11/12/2015">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>
                            </div>
                            <script type="text/javascript">
                                $(function () {
                                    $('#soDate').datetimepicker();
                                });
                            </script>
                        </div>
                    </div>
                    <div class="container-fluid" style="margin-left: -20px; margin-right: 0px; width: 920px; padding-left: 0px;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <label class="editorial-label">Detail Barang</label>
                            </div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jlh</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <p></p>
                                        </td>
                                        <td>
                                            <div class='input-group button' id='poItemCode'>
                                                <input type='text' class="form-control" placeholder="003" style="width: 120px;">
                                                <button type = "button" class = "btn btn-default dropdown-toggle"
                                                        data-toggle = "dropdown">
                                                    <span class = "caret"></span>
                                                </button>
                                                <ul class = "dropdown-menu pull-right">
                                                    <li><a href = "#">001</a></li>
                                                    <li><a href = "#">002</a></li>
                                                    <li><a href = "#">003</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <input class="form-control" id="poItemName" type="text" placeholder="" disabled>
                                        </td>
                                        <td>
                                            <input class="form-control" id="poItemQty" type="number" placeholder="0" style="width: 50px;">
                                        </td>
                                        <td>
                                            <input class="form-control" id="poItemDescription" type="text" placeholder="">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>001</td>
                                        <td>Modena</td>
                                        <td>5</td>
                                        <td>1 meja makan dan 4 kursi makan</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>002</td>
                                        <td>Ocean Furniture</td>
                                        <td>10</td>
                                        <td>5 meja makan dan 5 meja tulis</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="panel-footer">
                                <div class="row">
                                    <div class="col-xs-5" style="padding-right: 0px; width: auto;">
                                        <label class="editorial-label">Total Penjualan Barang</label>
                                    </div>
                                    <div class="col-xs-1" style="padding-left: 5px; padding-right: 5px; width: auto;">
                                        <label class="editorial-label">:</label>
                                    </div>
                                    <div class="col-xs-6" style="padding-left: 0px; width: auto;">
                                        <label class="editorial-label">15</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-default"
                        style="background-color: #0066ff; color: #fff;">
                    Simpan</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"
                        style="background-color: #ff0000; color: #fff;">
                    Tutup</button>
            </div>
        </div>
        <!--End Modal Content-->
    </div>
</div>
<!--End New SO-->
@endsection