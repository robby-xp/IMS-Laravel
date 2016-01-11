@extends('layouts.app')

@section('content')
<div class="container">
    <a href="#" class="btn add-new" role="button" data-toggle="modal" data-target="#formModal">
        <span class="glyphicon glyphicon-plus-sign"></span>
        Tambah Barang
    </a>
    <!--Start Item List-->
    <div class="panel panel-default">
        <div class="panel-heading padding-title">
            <div class="row">
                <div class="col-xs-3">
                    <div style="margin-top: -5px;">
                        <h3><span class="glyphicon glyphicon-list"></span> Daftar Barang</h3>
                    </div>
                </div>
                <div class="col-xs-9">
                    <form class="navbar-form hidden-xs navbar-right form-inline" role="form" id="search-form-hidden-xs" name="search-form" action="{{ url('/item') }}">
                        <div class="form-group" style="margin-top:5px;">
                            <input type="text" class="form-control" placeholder="cari barang" id="searchItem" name="search" style="width:300px;" value="{{ old('search') }}"/>
                            <button type="submit" class="btn"><span class="glyphicon glyphicon-search"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="panel-body" style="height: 100%; overflow: auto;">
            <!--Start Item Table-->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Jlh</th>
                        <th>Dibuat Tgl</th>
                        <th>Diubah Tgl</th>
                    </tr>
                </thead>
                <tbody>
                     @foreach ($items as $item)
                        <tr>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->stock }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#formModal" data-id="{{ $item->id }}">
                                    <span class="glyphicon glyphicon-edit"></span>
                                    Ubah
                                </a>
                                <a href="#" class="space" data-toggle="modal" data-target="#deleteModal" data-id="{{ $item->id }}">
                                    <span class="glyphicon glyphicon-remove-circle"></span>
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    {{--<tr ng-repeat="item in items">
                        <td>@{{ item.code }}</td>
                        <td>@{{ item.name }}</td>
                        <td>@{{ item.stock }}</td>
                        <td>@{{ item.created_at }}</td>
                        <td>@{{ item.updated_at }}</td>
                        <td>
                            <a href="#">
                                <span class="glyphicon glyphicon-edit"></span>
                                Ubah
                            </a>
                            <a href="#" class="space">
                                <span class="glyphicon glyphicon-remove-circle"></span>
                                Hapus
                            </a>
                        </td>
                    </tr>--}}
                </tbody>
            </table>
            <!--End Item Table-->
            {!! $items->links() !!}
        </div>
    </div>
    <!--End Item List-->
</div>
<!--Start New Item-->
<div class="modal fade" role="dialog" id="formModal">
    <div class="modal-dialog">
        <!--Start Modal Content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" style="color: #ff0000;">&times;</button>
                <h4 class="modal-title">Detail Barang</h4>
            </div>
            <div class="modal-body">
                <form role="form" method="post" id="itemEditorial" name="frmItemEditorial" url="{{ url('/item') }}">
                    {!! csrf_field() !!}
                    {!! method_field('put') !!}
                    <div class="container-fluid" style="margin-left: 20px; margin-right: 20px;">
                        <div class="row" style="padding-bottom: 15px;">
                            <div class="col-xs-4" style="padding-right: 0px; width: auto;">
                                <label class="editorial-label">Kode Barang</label>
                            </div>
                            <div class="col-xs-1" style="padding-left: 8px; padding-right: 7px; width: auto;">
                                <label class="editorial-label">:</label>
                            </div>
                            <div class="col-xs-7" style="padding-left: 0px; width: 414px;">
                                <input class="form-control" id="itemCode" name="itemCode" type="text" placeholder="kode barang">
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 15px;">
                            <div class="col-xs-4" style="padding-right: 0px; width: auto;">
                                <label class="editorial-label">Nama Barang</label>
                            </div>
                            <div class="col-xs-1" style="padding-left: 5px; padding-right: 7px; width: auto;">
                                <label class="editorial-label">:</label>
                            </div>
                            <div class="col-xs-7" style="padding-left: 0px; width: 414px;">
                                <input class="form-control" id="itemName" name="itemName" type="text" placeholder="nama barang">
                            </div>
                        </div>
                        <div class="row" style="padding-bottom: 15px;">
                            <div class="col-xs-4" style="padding-right: 0px; width: auto;">
                                <label class="editorial-label">Jlh Barang</label>
                            </div>
                            <div class="col-xs-1" style="padding-left: 20px; padding-right: 7px; width: auto;">
                                <label class="editorial-label">:</label>
                            </div>
                            <div class="col-xs-7" style="padding-left: 0px; width: 414px;">
                                <input class="form-control" id="itemQty" name="itemQty" type="number" placeholder="0">
                            </div>
                        </div>
                    </div>
                    {{--<div class="panel-group" style="margin-left: 5px; width: 559px;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title" style="color: #0066ff;">
                                    <a data-toggle="collapse" href="#itemBalance">Persediaan Barang</a>
                                </h4>
                            </div>
                            <div id="itemBalance" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <table class="table table-striped" id="tblItemBalance">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center;">Jlh Awal</th>
                                            <th style="text-align: center;">Jlh Dijual</th>
                                            <th style="text-align: center;">Jlh Dibeli</th>
                                            <th style="text-align: center;">Jlh Akhir</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td style="text-align: right; background-color: #f2f2f2;">10</td>
                                            <td style="text-align: right; background-color: #f2f2f2;">5</td>
                                            <td style="text-align: right; background-color: #f2f2f2;">12</td>
                                            <td style="text-align: right; background-color: #f2f2f2;">17</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>--}}
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" style="background-color: #0066ff; color: #fff;">
                        Simpan
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #ff0000; color: #fff;">
                        Tutup
                    </button>
                </div>
            </form>
        </div>
        <!--End Modal Content-->
    </div>
</div>
<!--End New Item-->
<div class="modal fade" tabindex="-1" role="dialog" id="deleteModal">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Hapus Barang?</h4>
      </div>
      <div class="modal-footer">
        <form method="post">
            {!! csrf_field() !!}
            {!! method_field('delete') !!}
            <input class="btn btn-danger" type="submit" value="Hapus">
            <input class="btn btn-default" type="button" value="Batal" data-dismiss="modal">
        </form>
      </div>
    </div>
  </div>
</div>
{{--<div class="modal fade" tabindex="-1" role="dialog" id="pleaseWaitDialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Loading...</h4>
      </div>
    </div>
  </div>
</div>
<script>
    var app = angular.module('app', []);
    app.controller('mainCtrl', function($scope, $http) {
        $('#pleaseWaitDialog').modal({
            backdrop: 'static',
            keyboard: false
        });
        $http.get('/api/item').then(function(response) {
            $scope.items = response.data.data;
        });
        $('#pleaseWaitDialog').modal('hide');
    });
</script>--}}
@endsection
@section('script')
<script>
    $('#formModal').on('show.bs.modal', function (event) {
        var id = $(event.relatedTarget).data('id');
        var form = $(this).find('form')[0];
        if (id) {
            $.getJSON( '/api/items/' + id, function( item ) {
                console.log( "success" );
                $('#itemCode').val(item.code);
                $('#itemName').val(item.name);
                $('#itemQty').val(item.qty);
            });
            $('#formModal input[name="_method"]').val('put');
        } else {
            $('#itemCode').val('');
            $('#itemName').val('');
            $('#itemQty').val('');
            $('#formModal input[name="_method"]').val('post');
        }
        form.action = '/item/' + id;
    });
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var modal = $(this);
        modal.find('form')[0].action = '/item/' + id;
    });
</script>
@endsection