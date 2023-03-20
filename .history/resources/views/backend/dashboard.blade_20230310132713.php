@extends('backend.layouts.app')

@section('SISMADAK KLINIK MUHAMMADIYAH KEDUNGADEM')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>SISMADAK</strong>
            </div><!--card-header-->
            <div class="card-body">
                <div class="toggleBAB">
                    <div class="btn-group btn-group-toggle " data-toggle="buttons">
                        @foreach($bab as $value)
                        <label class="btn btn-primary">
                            <input type="radio" name="options" id="{{ $value->BAB }}" autocomplete="off" checked> {{ $value->BAB }}
                        </label>
                        @endforeach
                    </div>
                </div>
            </div><!--card-body-->
        </div><!--card-->
    </div><!--col-->
</div><!--row-->
@endsection