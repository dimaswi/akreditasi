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
                    <thead>
                        <th>Bab Penilaian</th>
                        <th>Standart Penilaian</th>
                        <th>Elemen Penilaian</th>
                        <th>Nilai</th>
                        <th>Dokumen</th>
                    </thead>
                    <tbody id="tableNilai">

                    </tbody>
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

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.getNilai') }}",
            dataType: "JSON",
            success: function(data) {
                $.each(data, function(key, value) {
                    var nilai ;
                    if(data[key]['nilai_ep'] == 0) {
                        var nilai = '<button class="btn btn-danger" disabled> 0/10 </button>'
                    }else if(data[key]['nilai_ep'] == 5) {
                        var nilai = '<button class="btn btn-warning" disabled> 5/10 </button>'
                    }else if(data[key]['nilai_ep'] == 10) {
                        var nilai = '<button class="btn btn-success" disabled> 10/10 </button>'
                    }
                    $('#tableNilai').append(`
                    <tr>
                    <td><strong>` + data[key]['bab'] + `</strong></td>
                    <td>` + data[key]['elemen_penilaian'] + `</td>
                    <td>` + data[key]['ep'] + `</td>
                    <td>` + data[key]['nilai_ep'] + `</td>
                    <td>` + data[key]['bab'] + `</td>
                    </tr>
                    `)
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