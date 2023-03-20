@extends('backend.layouts.app')

@section('SISMADAK KLINIK MUHAMMADIYAH KEDUNGADEM')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Tambah BAB</strong>
            </div><!--card-header-->
            <form action="{{ route('admin.simpanBAB') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>BAB </strong>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="bab" placeholder="Contoh : BAB I">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div><!--card-body-->
            </form>
        </div><!--card-->
    </div><!--col-->
</div><!--row-->

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Tambah Elemen Penilaian</strong>
            </div><!--card-header-->
            <form action="{{ route('admin.simpanEP') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Elemen Penilaian </strong>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ep" placeholder="Contoh : Kriteria 1.2">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-4">
                            <strong>BAB Penilaian </strong>
                        </div>
                        <div class="col-sm-8">
                            <select name="bab_ep" id="" class="form-control">
                                <option value="" selected> Pilih BAB Elemen Penilaian</option>
                                @foreach($bab as $value)
                                <option value="{{ $value->bab }}">{{ $value->bab }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-4">

                        </div>
                        <div class="col-sm-8">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>
                </div><!--card-body-->
            </form>
        </div><!--card-->
    </div><!--col-->
</div><!--row-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    
</script>
@endsection