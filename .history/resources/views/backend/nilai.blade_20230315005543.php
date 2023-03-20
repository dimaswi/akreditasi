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
                <table class="table">
                    <thead style="background-color: #00ff5e;">
                        <th>Bab Penilaian</th>
                        <th>Standart Penilaian</th>
                        <th>Elemen Penilaian</th>
                        <th>Nilai</th>
                        <th>Dokumen</th>
                    </thead>
                    <tbody id="tableNilai">

                    </tbody>
                    <tfoot id="footerNilai" style="background-color: #f6ff00;">
                        <th colspan="3">Total Nilai</th>
                        <th><button class="btn btn-success" disabled>190/190</button></th>
                        <th><button class="btn btn-success" disabled>100%</button></th>
                    </tfoot>
                </table>
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
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function getDocument(ep) {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.getDocument') }}",
            dataType: "JSON",
            data: {
                'ep': ep,
            },
            success: function(data) {
                $.each(data, function(key, value) {
                    var namafile = data[key]['filenames']
                    var namaEP = data[key]['ep']
                    $("'#data_" + namaEP + "'").appendTo(``)

                })
            },
            error: function(data) {
                console.log('error')
            },
        })
    }

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.getNilai') }}",
            dataType: "JSON",
            success: function(data) {
                $.each(data, function(key, value) {
                    var nilai;
                    if (data[key]['nilai_ep'] == 0) {
                        var nilai = '<button class="btn btn-danger" disabled> 0/10 </button>'
                    } else if (data[key]['nilai_ep'] == 5) {
                        var nilai = '<button class="btn btn-warning" disabled> 5/10 </button>'
                    } else if (data[key]['nilai_ep'] == 10) {
                        var nilai = '<button class="btn btn-success" disabled> 10/10 </button>'
                    }
                    $('#tableNilai').append(`
                    <tr>
                    <td><strong>` + data[key]['bab'] + `</strong></td>
                    <td>` + data[key]['elemen_penilaian'] + `</td>
                    <td>` + data[key]['ep'] + `</td>
                    <td>` + nilai + `</td>
                    <td><button onclick="getDocument('` + data[key]['ep'] + `')" class="btn btn-success" data-toggle="modal" data-target="#modalDocument_` + key + `"> <i class="fas fa-folder"></i> <span style="display:none;">` + key + `</span> </button></td>
                    </tr>
                    `)

                    $('body').append(`
                    <!-- Modal -->
                    <div class="modal fade" id="modalDocument_` + key + `" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">` + data[key]['ep'] + `</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" id="data_` + data[key]['ep'] + `">
                            <iframe src="{{ url('files/` + namafile + `') }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>`)
                })

                var seen = {};
                $('#tableNilai td').each(function() {
                    var index = $(this).index();
                    var txt = $(this).text();
                    if (seen[index] === txt) {
                        $(this).text('');
                    } else {
                        seen[index] = txt;
                    }
                });
            },
            error: function(data) {

            }
        })

    })
</script>