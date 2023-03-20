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
                <div>
                    <table class="table" style="border: 1px solid black; text-align: center;">
                        <tbody>
                            <tr>
                                <td>BAB Penilaian</td>
                                <td>Standart Penilaian</td>
                            </tr>
                        </tbody>
                            @foreach($bab as $value)
                            <tr>
                                <td><strong>{{ $value->BAB }}</strong></td>
                            </tr>
                            @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection