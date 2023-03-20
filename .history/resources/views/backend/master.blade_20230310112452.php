@extends('backend.layouts.app')

@section('SISMADAK KLINIK MUHAMMADIYAH KEDUNGADEM')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Tambah BAB</strong>
            </div><!--card-header-->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <strong>BAB </strong>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="bab">
                    </div>
                </div>
            </div><!--card-body-->
        </div><!--card-->
    </div><!--col-->
</div><!--row-->

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Elemen Penilaian</strong>
            </div><!--card-header-->
            <div class="card-body">
                {!! __('strings.backend.welcome') !!}
            </div><!--card-body-->
        </div><!--card-->
    </div><!--col-->
</div><!--row-->
@endsection