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
                <strong>Upload Dokumen</strong>
            </div><!--card-header-->
            <div class="card-body">
                <form action="{{route('admin.simpanDokumen')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>BAB </strong>
                                </div>
                                <div class="col-sm-8">
                                    <select name="bab" id="bab" class="form-control">
                                        <option value="" selected> Pilih BAB Dokumen</option>
                                        @foreach($bab as $value)
                                        <option value="{{ $value->bab }}">{{ $value->bab }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Elemen Penilian </strong>
                                </div>
                                <div class="col-sm-8">
                                    <select name="ep" id="" class="form-control">
                                        <option value="" selected> Pilih Elemen Pinilaian Dokumen</option>
                                        @foreach($ep as $value)
                                        <option value="{{ $value->elemen_penilaian }}">{{ $value->elemen_penilaian }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Upload Dokumen </strong>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group hdtuto control-group lst increment">
                                        <input type="file" name="filenames[]" class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success tambah_file" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-sm-4">

                                </div>
                                <div class="col-sm-8">
                                    <button type="submit" class="btn btn-success" style="margin-top:10px">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!--card-body-->
        </div><!--card-->
    </div><!--col-->
</div><!--row-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".tambah_file").click(function() {
            console.log('tambah')
            var lsthmtl = `<div class="clone hide">
                                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                        <input type="file" name="filenames[]" class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-danger hapus_file" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                        </div>
                                    </div>
                                    </div>`
            $(".increment").after(lsthmtl);
        });
        $("body").on("click", ".btn-danger", function() {
            console.log('hapus')
            $(this).parents(".hdtuto").remove();
        });
    });

    $('#bab').on('change', function(e) {
        e.preventDefault()
        var bab = $('#bab').val()
        console.log(bab)
    })
</script>
@endsection