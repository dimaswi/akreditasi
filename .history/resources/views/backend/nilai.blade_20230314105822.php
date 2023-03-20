@extends('backend.layouts.app')

@section('SISMADAK KLINIK MUHAMMADIYAH KEDUNGADEM')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Penilaian</strong>
            </div>
            <div class="card-body ">
                <div class="row  flex-nowrap" style="text-align: center;">
                    <div class="col-sm">
                        <p>Bab Penilaian</p>
                        <br>
                        @foreach($bab as $value)
                        <div class="row">
                            <div class="col-sm"><strong>{{ $value->BAB }}</strong></div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                    <div class="col-sm">
                        <p>Standart Penilaian</p>
                        <br>
                        @foreach($standart as $value)
                        <div class="row">
                            <div class="col-sm"><strong>{{ $value->elemen_penilaian }}</strong></div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                    <div class="col-sm">
                        <p>Elemen Penilaian</p>
                        <br>
                        @foreach($ep as $value)
                        <div class="row">
                            <div class="col-sm"><strong>{{ $value->ep }}</strong></div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                    <div class="col-sm">
                        <p>Nilai</p>
                        <br>
                        @foreach($ep as $value)
                        <div class="row">
                            <div class="col-sm"><strong>{{ $value->nilai_ep }}</strong></div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                    <div class="col-sm">
                        <p>Dokumen</p>
                    </div>
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