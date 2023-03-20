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
                <div class="table" style="border: 1px solid black; text-align: center;">
                    <th> BAB Penliaian</th>
                    @foreach($bab as $value)
                    <th><strong>{{ $value->bab }}</strong></th>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection