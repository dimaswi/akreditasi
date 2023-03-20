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
                <thead>
                            <tr>
                                <th style="display: none;">idList</th>
                                <th>No.</th>
                                <th>Nama File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    <tbody>
                        @foreach($bab as $value)
                        <tr>
                            <td><strong>{{ $value->BAB }}</strong></td>
                        </tr>
                        @endforeach
                    </tbody>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection