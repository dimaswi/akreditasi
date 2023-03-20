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
                                <td>Elemen Penilaian</td>
                            </tr>
                            @foreach($bab as $value)
                            <tr>
                                <td><strong>{{ $value->BAB }}</strong></td>
                            </tr>
                            @endforeach
                            @foreach($standart as $value)
                                <td><strong>{{ $value->elemen_penilaian }}</strong></td>
                            @endforeach

                                <td><strong>b</strong></td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection