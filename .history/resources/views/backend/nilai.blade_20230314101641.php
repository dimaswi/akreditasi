@extends('backend.layouts.app')

@section('SISMADAK KLINIK MUHAMMADIYAH KEDUNGADEM')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Penilaian</strong>
            </div>
            <div class="card-body" style="text-align: center;">
                <div class="row" id="jumlahDiv">
                    <div class="col-sm">BAB Penilaian</div>
                    <div class="col-sm">Standart Penilaian</div>
                    <div class="col-sm">Elemen Penilaian</div>
                </div>
                @foreach($bab as $value)
                <div class="row"><div id="colombab">{{ $value->BAB }}</div></div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var a = $("#jumlahDiv > div").length
        console.log(a)
    })

</script>