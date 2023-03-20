@extends('backend.layouts.app')

@section('SISMADAK KLINIK MUHAMMADIYAH KEDUNGADEM')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@section('content')
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
                            <div class="col-sm-8">
                                <select name="elemen" id="elemen" class="form-control">

                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="row">
                            <div class="col-sm-4">

                            </div>
                            <div class="col-sm-8">
                                <button type="button" class="btn btn-success" id="cariDokumen" style="margin-top:10px">Cari</button>
                                <button type="button" class="btn btn-primary" id="dokumenTambahan" style="margin-top:10px; display: none;">Upload Dokumen Tambahan</button>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <div class="table-responsive" id="tabel_dokumen" style="display: none;">
                    <table class="table display nowrap" cellspacing="0" width="100%" id="table-data">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>BAB Dokumen</th>
                                <th>Standart Penilaian Dokumen</th>
                                <th>Elemen Penilaian Dokumen</th>
                                <th>Nilai</th>
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

<!-- Modal -->


<!-- Modal -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $('#cariDokumen').on('click', function(e) {
        e.preventDefault();

        $('#dokumenTambahan').show();
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
                $('.modal').remove()
                $('#table-data').DataTable().clear();
                $('#table-data').DataTable().destroy();
                $("#tabel_dokumen").show()
                $.each(data, function(key, value) {
                    var namafile = data[key]['filenames']
                    var html;
                    if (data[key]['nilai'] == 0) {
                        var html = '<button type="button" class="btn btn-danger" disabled>0/10</button>';
                    } else if (data[key]['nilai'] == 5) {
                        var html = '<button type="button" class="btn btn-warning" disabled>5/10</button>';
                    } else if (data[key]['nilai'] == 10) {
                        var html = '<button type="button" class="btn btn-success" disabled>10/10</button>';
                    }
                    $('table').find('tbody').append(`
                    <tr id="a">
                    <td>` + (key + 1) + `</td>
                    <td>` + data[key]['bab'] + `</td>
                    <td>` + data[key]['elemen_penilaian'] + `</td>
                    <td>` + data[key]['ep'] + `</td>
                    <td>` + html + `</td>
                    <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#nilaiModal_` + key + `"><i class="fas fa-percent"></i></button> <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#dokumenModal_` + key + `"><i class="fas fa-file-pdf"></i></button> <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#hapusDokumen_` + key + `"><i class="fas fa-trash"></i></button></td>
                    </tr>
                    `);

                    $('body').append(`
                    <div class="modal fade" id="dokumenModal_` + key + `" tabindex="-1" role="dialog" aria-labelledby="dokumenModalLabel" aria-hidden="true">
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

                    $('body').append(`
                    <div class="modal fade" id="nilaiModal_` + key + `" tabindex="-1" role="dialog" aria-labelledby="nilaiModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <form action="{{route('admin.simpanNilai')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="nilaiModalLabel">Modal Nilai</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" name="data" value="`+data[key]['ep']+`">
                                        <select name="nilai" id="nilai" class="form-control">
                                            <option value="0">0</option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                        </select>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    `)

                    $('body').append(`
                    <div class="modal fade" id="hapusDokumen_` + key + `" tabindex="-1" role="dialog" aria-labelledby="nilaiModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="{{route('admin.hapusDokumen')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="nilaiModalLabel">Hapus Dokumen</h1>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <input type="hidden" name="data" value="`+data[key]['id']+`">
                                    <div class="modal-footer" style="text-align: center;">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    `)
                });



                $(document).ready(function() {
                    $('#table-data').DataTable({
                        scrollX: true,
                        "bDestroy": true
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