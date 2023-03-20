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
                    $('#tableNilai').append(`
                    <tr>
                    <td class="bab">` + data[key]['bab'] + `</td>
                    <td>` + data[key]['elemen_penilaian'] + `</td>
                    <td>` + data[key]['ep'] + `</td>
                    <td>` + data[key]['bab'] + `</td>
                    <td>` + data[key]['bab'] + `</td>
                    </tr>
                    `)
                })

                var seen = {};
                $('#tableNilai td').each(function() {
                    var index = $(this).index();
                    var txt = $(this).text();
                    console.log(seen[index])
                    if (seen[index] === txt) {
                        // $($(this).parent().prev().children()[index]).attr('rowspan', 2);
                        $(this).hide();
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