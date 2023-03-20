@extends('backend.layouts.app')

@section('SISMADAK KLINIK MUHAMMADIYAH KEDUNGADEM')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
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
                <strong>SISMADAK</strong>
            </div><!--card-header-->
            <div class="card-body">
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
                                    <option value="{{ $value->BAB }}">{{ $value->BAB }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Standart Penilian </strong>
                            </div>
                            <div class="col-sm-8">
                                <select name="ep" id="ep" class="form-control">

                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-4">
                                <strong>Elemen Penilian </strong>
                            </div>
                            <div class="col-sm-4">
                                <select name="elemen" id="elemen" class="form-control">

                                </select>
                            </div>
                            <div class="col-sm-4">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <strong>Nilai Standart</strong>
                                    </div>
                                    <div class="col-sm-8" id="nilaiEP">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-8">
                                <button type="button" class="btn btn-success" id="cariDokumen" style="margin-top:10px">Cari</button>
                                <button type="button" class="btn btn-primary" id="dokumenTambahan" style="margin-top:10px; display: none;">Upload Dokumen Tambahan</button>
                                <button type="button" class="btn btn-primary" id="dokumenTambahan-close" style="margin-top:10px; display: none;">Upload Dokumen Tambahan</button>
                            </div>
                        </div>

                        <br>

                        <div id="#inputDokumen">
                            
                        </div>
                    </div>
                </div>

                <br>

                <div class="table-responsive" id="tabel_dokumen" style="display: none;">
                    <table class="table display nowrap" cellspacing="0" width="100%" id="table-data">
                        <thead>
                            <tr>
                                <th style="display: none;">idList</th>
                                <th>No.</th>
                                <th>Nama File</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div><!--card-body-->
        </div><!--card-->
    </div><!--col-->
</div><!--row-->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#dokumenTambahan').on('click', function(e) {
        $('#dokumenTambahan-close').show()
        $('#dokumenTambahan').hide()
        $('#uploadDoc').add(`<div class="row" id="uploadDoc" style="display: none;">
                                <div class="col-sm-4">
                                    <strong>Upload Dokumen </strong>
                                </div>
                                <div class="col-sm-8">
                                    <div class="input-group control-group lst increment">
                                        <input type="file" name="filenames[]" accept="application/pdf" class="myfrm form-control">
                                        <div class="input-group-btn">
                                            <button class="btn btn-success tambah_file" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                        </div>
                                    </div>
                                </div>
                            </div>`)
    })

    $('#dokumenTambahan-close').on('click', function(e) {
        $('#dokumenTambahan-close').hide()
        $('#dokumenTambahan').show()
        $('#uploadDoc').remove()
    })

    $(document).ready(function() {
        $(".tambah_file").click(function() {
            console.log('tambah')
            var lsthmtl = `<div class="clone hide">
                                    <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                        <input type="file" name="filenames[]" accept="application/pdf" class="myfrm form-control">
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

    function nilaiDokumen(ep) {
        var nilaiDokumen = $("#nilai_ep").val()

        $.ajax({
            type: "GET",
            url: "{{ route('admin.simpanNilai') }}",
            dataType: "JSON",
            contentType: false,
            data: {
                'ep': ep,
                'nilai': nilaiDokumen,
                '_token': "{{ csrf_token() }}"
            },
            success: function(data) {

                if (data == 0) {
                    $('#nilaiEP').html(`<button class="btn btn-danger btn-lg modalNilai" data-toggle="modal" data-target="#nilaiBos">0/10</button>`)
                } else if (data == 5) {
                    $('#nilaiEP').html(`<button class="btn btn-warning btn-lg modalNilai" data-toggle="modal" data-target="#nilaiBos">5/10</button>`)
                } else if (data == 10) {
                    $('#nilaiEP').html(`<button class="btn btn-success btn-lg modalNilai" data-toggle="modal" data-target="#nilaiBos">10/10</button>`)
                }
            },
            error: function(data) {
                alert('gagal')
            }
        })
    }

    function deleteDokumen(id) {

        $.ajax({
            type: "POST",
            url: "{{ url('/admin/hapusDokumen') }}",
            dataType: "JSON",
            retrieve: true,
            data: {
                'id': id,
                '_token': "{{ csrf_token() }}"
            },
            success: function(data) {
                $("#index_" + id).remove()
            },
            error: function(data) {
                alert('gagal Hapus data')
            }
        })
    }


    $('#cariDokumen').on('click', function(e) {
        e.preventDefault();

        var bab = $('#bab').val()
        var ep = $('#ep').val()
        var elemen = $('#elemen').val()

        $.ajax({
            type: "GET",
            url: "{{ route('admin.dokumenAkreditasi') }}",
            dataType: "JSON",
            data: {
                'bab': bab,
                'ep': ep,
                'elemen': elemen,
            },
            success: function(data) {
                $('#dokumenTambahan').show();
                if (!$.trim(data)) {
                    $('.modalNilai').hide()
                }
                $('.modal').remove()
                $('#table-data').DataTable().clear();
                $('#table-data').DataTable().destroy();
                $("#tabel_dokumen").show()
                $.each(data, function(key, value) {
                    var namafile = data[key]['filenames']
                    if (data[key]['nilai'] == 0) {
                        $('#nilaiEP').html(`<button class="btn btn-danger btn-lg modalNilai" data-toggle="modal" data-target="#nilaiBos">0/10</button>`)
                    } else if (data[key]['nilai'] == 5) {
                        $('#nilaiEP').html(`<button class="btn btn-warning btn-lg modalNilai" data-toggle="modal" data-target="#nilaiBos">5/10</button>`)
                    } else if (data[key]['nilai'] == 10) {
                        $('#nilaiEP').html(`<button class="btn btn-success btn-lg modalNilai" data-toggle="modal" data-target="#nilaiBos">10/10</button>`)
                    }

                    $('table').find('tbody').append(`       
                    <tr id="index_` + data[key]['id'] + `">
                    <td style="display:none;"><input type="hidden" id="dataList_` + (key + 1) + `" value="` + data[key]['id'] + `">` + (key + 1) + `</td>
                    <td>` + (key + 1) + `</td>
                    <td>` + data[key]['filenames'] + `</td>
                    <td><button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#dokumenModal_` + data[key]['id'] + `"><i class="fas fa-file-pdf"></i></button> <button type="button" class="btn btn-danger" onClick="deleteDokumen(` + data[key]['id'] + `)"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    `);

                    $('body').append(`
                    <div class="modal fade" id="dokumenModal_` + data[key]['id'] + `" tabindex="-1" role="dialog" aria-labelledby="dokumenModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="nilaiModalLabel">Modal Dokumen</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <iframe src="{{ url('files/` + namafile + `') }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    `)


                });

                var epList = $('#elemen').val()
                $('body').append(`
                    <div class="modal fade" id="nilaiBos" tabindex="-1" role="dialog" aria-labelledby="nilaiModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="nilaiModalLabel">Modal Nilai</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="id_` + epList + `" value="` + epList + `">
                                        <select name="nilai" id="nilai_ep" class="form-control">
                                            <option value="0">0</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" onClick="nilaiDokumen('` + epList + `')" class="btn btn-primary">Save changes</button>
                                    </div>
                            </div>
                        </div>
                    </div>
                    `)



                $(document).ready(function() {
                    $('#table-data').DataTable({
                        scrollX: true,
                        "bDestroy": true,
                        searching: false,
                        paging: false,
                        "ordering": false,

                    });
                });

            },
            error: function(err) {

            }
        })
    })


    $('#bab').on('change', function(e) {
        e.preventDefault()
        var bab = $('#bab').val()
        $("#ep option").remove();
        $("#elemen option").remove();


        $.ajax({
            type: "GET",
            url: "{{ route('admin.ajaxEP') }}",
            dataType: "JSON",
            data: {
                'bab': bab
            },
            success: function(data) {
                $("#ep").append('<option value="" selected> Pilih Standart Penilaian</option>');
                $.each(data, function(key, value) {
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

        $.ajax({
            type: "GET",
            url: "{{ route('admin.ajaxElemen') }}",
            dataType: "JSON",
            data: {
                'bab': bab,
                'ep': ep,
            },
            success: function(data) {
                $("#elemen").append('<option value="" selected> Pilih Elemen Penilaian</option>');
                $.each(data, function(key, value) {
                    $("#elemen").append('<option value="' + data[key]['ep'] + '">' + data[key]['ep'] + '</option>');
                });
            },
            error: function(err) {

            }
        })
    })
</script>
@endsection