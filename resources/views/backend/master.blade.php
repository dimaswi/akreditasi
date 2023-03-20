@extends('backend.layouts.app')

@section('SISMADAK KLINIK MUHAMMADIYAH KEDUNGADEM')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />



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
            <div class="card-header" style="background-color: #7aff7d;">
                <strong>Tambah BAB</strong><span class="float-right"><button type="button" id="list_bab" class="btn btn-success">List</button></span><span class="float-right"><button type="button" id="input_bab" class="btn btn-success" style="display: none;">List</button></span>
            </div><!--card-header-->
            <form action="{{ route('admin.simpanBAB') }}" method="post">
                @csrf
                <div class="card-body" id="inputBab">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>BAB </strong>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="bab" placeholder="Contoh : BAB I" autocomplete="off">
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
                <div class="card-body" id="listBab" style="display: none;">
                    <table class="table">
                        <thead>
                            <th>Nomor</th>
                            <th>Bab Penilaian</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                            $a = 1;
                            @endphp
                            @foreach($list_bab as $index => $value)
                            <tr id="bab_{{$index +1}}">
                                <td>{{$index +1}}</td>
                                <td>
                                    <p id="text_bab_{{$value->id}}">{{$value->BAB}}</p><input type="text" class="form-control" id="edit_bab_{{$value->id}}" value="{{$value->BAB}}" style="display: none;">
                                </td>
                                <td><button type="button" onclick="editBab('{{ $value->id }}')" id="list_bab_{{$value->id}}" class="btn btn-warning">Edit</button><button type="button" onclick="simpanBab('{{ $value->id }}')" id="simpan_edit_bab_{{$value->id}}" class="btn btn-success" style="display: none;">Simpan</button> <button type="button" onclick="hapusBAB('{{$value->BAB}}','{{$index +1}}')" class="btn btn-danger">Hapus</button></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div><!--card-->
    </div><!--col-->
</div><!--row-->

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header" style="background-color: #94fffd;">
                <strong>Tambah Standart</strong><span class="float-right"><button type="button" id="list_standart" class="btn btn-success">List</button></span><span class="float-right"><button type="button" id="input_standart" class="btn btn-success" style="display: none;">List</button></span>
            </div><!--card-header-->
            <form action="{{ route('admin.simpanEP') }}" method="post">
                @csrf
                <div class="card-body" id="inputStandart">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Standart </strong>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ep" placeholder="Contoh : Standart 1.1"  autocomplete="off">
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-sm-4">
                            <strong>BAB Penilaian </strong>
                        </div>
                        <div class="col-sm-8">
                            <select name="bab_ep" id="" class="form-control">
                                <option value="" selected> Pilih BAB Standart Penilaian</option>
                                @foreach($list_bab as $value)
                                <option value="{{ $value->BAB }}">{{ $value->BAB }}</option>
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
                <div class="card-body" id="listStandart" id="listElemen" style="display: none;">

                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Cari Standar </strong>
                        </div>
                        <div class="col-sm-8">
                            <select name="" id="select_standart" class="form-control">
                                <option value="" selected> Pilih BAB Standart Penilaian</option>
                                @foreach($list_bab as $value)
                                <option value="{{ $value->BAB }}">{{ $value->BAB }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>

                    <table class="table table_standar">
                        <thead>
                            <th>Nomor</th>
                            <th>Standart Penilaian</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </form>
        </div><!--card-->
    </div><!--col-->
</div><!--row-->

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header" style="background-color: #edff69;">
                <strong>Tambah Elemen Penilaian</strong><span class="float-right"><button id="list_elemen" type="button" class="btn btn-success">List</button></span><span class="float-right"><button type="button" id="input_elemen" class="btn btn-success" style="display: none;">List</button></span>
            </div><!--card-header-->
            <form action="{{ route('admin.simpanElemen') }}" method="post">
                @csrf
                <div class="card-body" id="inputElemen">
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Elemen Penilaian </strong>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="elemen"  autocomplete="off">
                        </div>
                    </div>

                    <br>

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
                            <select name="standart" id="ep" class="form-control">

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
                <div class="card-body" id="listElemen" style="display: none;">

                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Cari Bab </strong>
                        </div>
                        <div class="col-sm-8">
                            <select name="" id="select_ep_bab" class="form-control">
                                <option value="" selected> Pilih BAB Standart Penilaian</option>
                                @foreach($list_bab as $value)
                                <option value="{{ $value->BAB }}">{{ $value->BAB }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-sm-4">
                            <strong>Cari Standar Penilaian</strong>
                        </div>
                        <div class="col-sm-8">
                            <select name="" id="select_ep_ep" class="form-control">

                            </select>
                        </div>
                    </div>

                    <br>

                    <table class="table table_ep">
                        <thead>
                            <th>Nomor</th>
                            <th>Bab Penilaian</th>
                            <th>Action</th>
                        </thead>
                    </table>
                </div>
            </form>
        </div><!--card-->
    </div><!--col-->
</div><!--row-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    $('form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });
    $(document).ready(function() {
        $('.table').DataTable();
    });

    $('#list_bab').on('click', function(e) {
        $('#inputBab').hide()
        $('#list_bab').hide()
        $('#listBab').show()
        $('#input_bab').show()
    })

    $('#input_bab').on('click', function(e) {
        $('#inputBab').show()
        $('#list_bab').show()
        $('#listBab').hide()
        $('#input_bab').hide()
    })

    $('#list_standart').on('click', function(e) {
        $('#inputStandart').hide()
        $('#list_standart').hide()
        $('#listStandart').show()
        $('#input_standart').show()
    })

    $('#input_standart').on('click', function(e) {
        $('#inputStandart').show()
        $('#list_standart').show()
        $('#listStandart').hide()
        $('#input_standart').hide()
    })

    $('#list_elemen').on('click', function(e) {
        $('#inputElemen').hide()
        $('#list_elemen').hide()
        $('#listElemen').show()
        $('#input_elemen').show()
    })

    $('#input_elemen').on('click', function(e) {
        $('#inputElemen').show()
        $('#list_elemen').show()
        $('#listElemen').hide()
        $('#input_elemen').hide()
    })

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
                $("#ep").append('<option value="" selected> Pilih Standart Penilaian</option>');
                $.each(data, function(key, value) {
                    $("#ep").append('<option value="' + data[key]['elemen_penilaian'] + '">' + data[key]['elemen_penilaian'] + '</option>');
                });
            },
            error: function(err) {

            }
        })
    })

    $('#select_standart').on('change', function(e) {
        var standar = $('#select_standart').val()

        $.ajax({
            type: "GET",
            url: "{{ route('admin.ajaxListStandar') }}",
            dataType: "JSON",
            data: {
                'standar': standar
            },
            success: function(data) {
                $('.table_standar').DataTable().clear();
                $('.table_standar').DataTable().destroy();
                $.each(data, function(key, value) {
                    $('.table_standar').find('tbody').append(`
                    <tr id="standart_`+key+`">
                        <td>` + (key + 1) + `</td>
                        <td><p id="text_standar` + data[key]['id'] + `">` + data[key]['elemen_penilaian'] + `</p><input type="text" class="form-control" id="edit_standar` + data[key]['id'] + `" value="` + data[key]['elemen_penilaian'] + `" style="display: none;"></td>
                        <td><button type="button" id="list_standar` + data[key]['id'] + `" onclick="editStandar('` + data[key]['id'] + `')" class="btn btn-warning">Edit</button> <button type="button" onclick="simpanStandar('` + data[key]['id'] + `')" id="simpan_edit_standar` + data[key]['id'] + `" class="btn btn-success" style="display: none;">Simpan</button> <button type="button" onclick="hapusStandart('` + data[key]['elemen_penilaian'] + `','`+key+`')" class="btn btn-danger">Hapus</button></td>
                    </tr>
                    `)
                })

                $(document).ready(function() {
                    $('.table_standar').DataTable();
                });

            },
            error: function(err) {
                console.log('data')
            }
        })
    })

    $('#select_ep_bab').on('change', function(e) {
        e.preventDefault()
        $("#select_ep_ep option").remove();
        var bab = $('#select_ep_bab').val()

        $.ajax({
            type: "GET",
            url: "{{ route('admin.ajaxEP') }}",
            dataType: "JSON",
            data: {
                'bab': bab
            },
            success: function(data) {
                $("#select_ep_ep").append('<option value="" selected> Pilih Standart Penilaian</option>');
                $.each(data, function(key, value) {
                    $("#select_ep_ep").append('<option value="' + data[key]['elemen_penilaian'] + '">' + data[key]['elemen_penilaian'] + '</option>');
                });
            },
            error: function(err) {

            }
        })
    })

    $('#select_ep_ep').on('change', function(e) {
        var bab = $('#select_ep_bab').val()
        var ep = $('#select_ep_ep').val()

        $.ajax({
            type: "GET",
            url: "{{ route('admin.ajaxListEP') }}",
            dataType: "JSON",
            data: {
                'bab': bab,
                'ep': ep
            },
            success: function(data) {
                $('.table_ep').DataTable().clear();
                $('.table_ep').DataTable().destroy();
                $.each(data, function(key, value) {
                    console.log(data)
                    $('.table_ep').find('tbody').append(`
                    <tr id="ep_`+key+`">
                        <td>` + (key + 1) + `</td>
                        <td><p id="text_ep_` + data[key]['uid'] + `">` + data[key]['ep'] + `</p><input type="text" class="form-control" id="edit_ep_` + data[key]['uid'] + `" value="` + data[key]['ep'] + `" style="display: none;"></td>
                        <td><button type="button" id="list_ep_` + data[key]['uid'] + `" onclick="editEP('` + data[key]['uid'] + `')" class="btn btn-warning">Edit</button> <button type="button" onclick="simpanEP('` + data[key]['uid'] + `')" id="simpan_edit_ep_` + data[key]['uid'] + `" class="btn btn-success" style="display: none;">Simpan</button> <button type="button" class="btn btn-danger">Hapus</button></td>
                    </tr>
                    `)
                })

                $(document).ready(function() {
                    $('.table_ep').DataTable();
                });
            },
            error: function(err) {
                console.log(data)
            }
        })
    })

    function editBab(id) {
        $('#edit_bab_' + id).show()
        $('#text_bab_' + id).hide()
        $('#simpan_edit_bab_' + id).show()
        $('#list_bab_' + id).hide()
    }

    function simpanBab(id) {
        $('#edit_bab_' + id).hide()
        $('#text_bab_' + id).show()
        $('#simpan_edit_bab_' + id).hide()
        $('#list_bab_' + id).show()

        var bab = $('#text_bab_' + id).text()
        var input_bab = $('#edit_bab_' + id).val()

        $.ajax({
            type: "GET",
            url: "{{ route('admin.editBab') }}",
            dataType: "JSON",
            data: {
                'bab': bab,
                'id': id,
                'input_bab': input_bab
            },
            success: function(data) {
                $('#text_bab_' + id).text(input_bab)
            },
            error: function(data) {

            }
        })
    }

    function editEP(ep) {
        $('#edit_ep_' + ep).show()
        $('#text_ep_' + ep).hide()
        $('#simpan_edit_ep_' + ep).show()
        $('#list_ep_' + ep).hide()
    }

    function simpanEP(ep) {
        $('#edit_ep_' + ep).hide()
        $('#text_ep_' + ep).show()
        $('#simpan_edit_ep_' + ep).hide()
        $('#list_ep_' + ep).show()

        var input_ep = $("#edit_ep_" + ep).val()

        $.ajax({
            type: "GET",
            url: "{{ route('admin.editEP') }}",
            dataType: "JSON",
            data: {
                'uid': ep,
                'ep': input_ep
            },
            success: function(data) {
                $("#text_ep_" + ep).text(input_ep)
            },
            error: function(e) {

            }
        })
    }

    function editStandar(standar) {
        $('#edit_standar' + standar).show()
        $('#text_standar' + standar).hide()
        $('#simpan_edit_standar' + standar).show()
        $('#list_standar' + standar).hide()
    }

    function simpanStandar(standar) {
        $('#edit_standar' + standar).hide()
        $('#text_standar' + standar).show()
        $('#simpan_edit_standar' + standar).hide()
        $('#list_standar' + standar).show()

        var input_standar = $('#edit_standar' + standar).val()
        var standar_std = $('#text_standar' + standar).text()

        $.ajax({
            type: "GET",
            url: "{{ route('admin.editStandar') }}",
            dataType: "JSON",
            data: {
                'id': standar,
                'standar': input_standar,
                'std' : standar_std
            },
            success: function(data) {
                $("#text_standar" + standar).text(input_standar)
            },
            error: function(e) {

            }
        })
    }

    function hapusBAB(bab, key) {
        $.ajax({
            type: "GET",
            url : "{{route('admin.hapusBAB')}}",
            dataType: "JSON",
            data : {
                "bab" : bab
            },
            success: function(data) {
                $('#bab_'+key).remove()
            },
            error : function(data) {
            }
        })
    }

    function hapusStandart(standart, key) {
        $.ajax({
            type : "GET",
            url : "{{ route('admin.hapusStandart') }}",
            dataType : "JSON",
            data : {
                "standart" : standart
            },
            success : function(data) {
                $('#standart_'+key).remove()
            },
            error : function(data) {
            }
        })
    }

</script>
@endsection