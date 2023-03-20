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
                <form action="" method="post">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>BAB </strong>
                                </div>
                                <div class="col-sm-8">
                                    <select name="asalRujukan" id="" class="form-control">
                                        <option value="" selected> Pilih BAB Dokumen</option>
                                    </select>
                                </div>
                            </div>

                            <br>

                            <div class="row">
                                <div class="col-sm-4">
                                    <strong>Elemen Penilian </strong>
                                </div>
                                <div class="col-sm-8">
                                    <select name="asalRujukan" id="" class="form-control">
                                        <option value="" selected> Pilih Elemen Pinilaian Dokumen</option>
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
            $(this).parents(".hdtuto").remove();
        });
    });
</script>
@endsection