@extends('layouts.app')

@section('content')
<div class="container" style="margin: 4% auto; width: 600px; padding-left: 0px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4><span class="glyphicon glyphicon-lock"></span> Verifikasi Pengguna</h4>
        </div>
        <div class="panel-body">
            <form role="form" method="POST" action="{{ url('/login') }}">
                {!! csrf_field() !!}
                <div class="form-group">
                    <div class="row" style="padding-bottom: 15px; padding-top: 15px;">
                        <div class="col-xs-4" style="padding-right: 0px; padding-left: 30px; width: auto;">
                            <h5>Nama Pengguna</h5>
                        </div>
                        <div class="col-xs-1" style="padding-left: 5px; padding-right: 7px; width: auto;">
                            <h5>:</h5>
                        </div>
                        <div class="col-xs-7" style="padding-left: 0px; width: 355px;">
                            <input type="text" class="form-control" id="user" placeholder="nama pengguna" name="email" value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="padding-bottom: 15px;">
                        <div class="col-xs-4" style="padding-right: 0px; padding-left: 30px; width: auto;">
                            <h5>Kata Kunci</h5>
                        </div>
                        <div class="col-xs-1" style="padding-left: 43px; padding-right: 7px; width: auto;">
                            <h5>:</h5>
                        </div>
                        <div class="col-xs-7" style="padding-left: 0px; width: 355px;">
                            <input type="password" class="form-control" id="pwd" placeholder="kata kunci" name="password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-default"
                        style="background-color: #0066ff; color: #fff; margin-left: 15px;">
                    Masuk Aplikasi</button>
            </form>
        </div>
    </div>
</div>
@endsection
