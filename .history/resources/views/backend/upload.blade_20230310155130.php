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
                                    <strong>Standart</strong>
                                </div>
                                <div class="col-sm-8">
                                    <select name="ep" id="ep" class="form-control">
                                        <option value="" selected> Pilih BAB Dokumen</option>
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Elemen Penilaian</strong>
                                </div>
                                <div class="col-sm-8">
                                    <select name="elemen" id="elemen" class="form-control">
                                        
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
        $("#ep option").remove();


        $.ajax({
            type: "GET",
            url: "{{ route('admin.ajaxEP') }}",
            dataType: "JSON",
            data: {
                'bab': bab
            },
            success: function(data) {
                $.each(data,function(key, value)
                {
                    $("#ep").append('<option value="' + data[key]['elemen_penilaian'] + '">' + data[key]['elemen_penilaian'] + '</option>');
                });
            },
            error: function(err) {

            }
        })
    })

    $('#ep').on('change', function(e) {
        e.preventDefault()
        var bab = $('#bab').val()
        var ep = $('#ep').val()
        $("#elemen option").remove();

        console.log(bab)
        console.log(ep)

        $.ajax({
            type: "GET",
            url: "{{ route('admin.ajaxElemen') }}",
            dataType: "JSON",
            data: {
                'bab': bab,
                'ep': ep,
            },
            success: function(data) {
                console.log(data)
                $.each(data,function(key, value)
                {
                    $("#elemen").append('<option value="' + data[key]['ep'] + '">' + data[key]['ep'] + '</option>');
                });
            },
            error: function(err) {

            }
        })
    })
</script>
@endsection