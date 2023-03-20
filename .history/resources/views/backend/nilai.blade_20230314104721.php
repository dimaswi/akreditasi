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
                <div class="row" style="text-align: center;">
                    <div class="col-sm">Bab Penilaian</strong>
                        @foreach($bab as $value)
                        <div class="row">
                            <div class="col-sm"><strong>{{ $value->BAB }}</strong></div>
                        </div>
                        @endforeach
                    </div>
                    <div class="col-sm"><strong>Standart Penilaian</strong></div>
                    <div class="col-sm"><strong>Elemen Penilaian</strong></div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {

    })
</script>