@extends('backend.layouts.app')

@section('SISMADAK KLINIK MUHAMMADIYAH KEDUNGADEM')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <strong>Upload Dokumen</strong>
            </div><!--card-header-->
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-sm-4">
                                <strong>BAB </strong>
                            </div>
                            <div class="col-sm-8">
                                <select name="asalRujukan" id="" class="form-control">
                                    <option value="" selected> pilih asal rujukan peserta </option>
                                    <option value="1">Faskes Tingkat 1</option>
                                    <option value="2">Faskes Tingkat 2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--card-body-->
        </div><!--card-->
    </div><!--col-->
</div><!--row-->
@endsection