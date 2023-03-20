@extends('backend.layouts.app')

@section('SISMADAK KLINIK MUHAMMADIYAH KEDUNGADEM')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Penilaian</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm">BAB Penilaian</div>
                    <div class="col-sm">Standart Penilaian</div>
                    <div class="col-sm">Elemen Penilaian</div>
                </div>

                @foreach($bab as $value)
                <div class="row">{{ $value->BAB }}</div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection