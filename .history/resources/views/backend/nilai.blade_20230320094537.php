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

    function getCatatan(ep) {

        $.ajax({
            type: "GET",
            url: "{{ route('admin.getCatatan') }}",
            dataType: "JSON",
            data: {
                "ep": ep,
            },
            success: function(data) {

                $.each(data, function(key, value) {
                    $("#card" + key).remove()
                    var id = data[key]['ep']
                    $("#catatan_" + ep).append(`
                    <div class="card" id="card` + key + `">
                        <div class="card-header">
                        <strong>` + data[key]['user_id'] + `</strong><span class="float-right">` + data[key]['created_at'] + `</span>
                        </div>
                        <div class="card-body">
                            <p>` + data[key]['message'] + `</p>
                        </div>
                    </div>
                    `)
                })

            },
            error: function(data) {
                console.log('error')
            }
        })
    }

    function getDocument(ep, uid) {

        $.ajax({
            type: "GET",
            url: "{{ route('admin.getDocument') }}",
            dataType: "JSON",
            data: {
                'ep': ep,
            },
            success: function(data) {

                $.each(data, function(key, value) {
                    $('.' + key).remove()
                    $('.judul_' + key).remove()
                    var namafile = data[key]['filenames']
                    console.log(data.length)


                    $('#' + uid).append(`
                    <div class="tab-pane fade show `+key+`" id="list-home_` + key + `" role="tabpanel" aria-labelledby="list-home-list"><iframe src="{{ url('files/` + namafile + `') }}" align="top" height="620" width="100%" frameborder="0" scrolling="auto"></iframe></div>
                    
                    `)
                    $('#judul_' + uid).append(`
                    <a class="list-group-item list-group-item-action judul_`+key+`" id="list-home-list" data-toggle="list" href="#list-home_` + key + `" role="tab" aria-controls="home">` + data[key]['jenis_dokumen'] + ` - ` + data[key]['filenames'] + `</a>
                    `)
                })

                if (!$.isArray(data) || !data.length) {
                    $('#' + uid).html("data belum diupload !!")
                    $('#' + uid).attr('style', 'text-align:center;')
                }
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
                console.log(data)
                $.each(data, function(key, value) {
                    var uid = data[key]['uid']
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
                    <td><input type="hidden" class="nilai_akreditasi" id="nilai_value_`+ key +`" value="`+ data[key]['nilai_ep'] +`">` + nilai + `</td>
                    <td><span><button onclick="getDocument('` + data[key]['ep'] + `','` + data[key]['uid'] + `')" class="btn btn-success" data-toggle="modal" data-target="#modalDocument_` + key + `"> <i class="fas fa-folder"></i> <span style="display:none;">` + key + `</span></button><button onclick="getCatatan('` + data[key]['uid'] + `')" class="btn btn-primary" data-toggle="modal" data-target="#modalCatatan_` + key + `"> <i class="fas fa-comment-dots"></i> <span style="display:none;">` + key + `</span></button></span></td>
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
                            <div class="modal-body">
                            <div class="row">
                            <div class="col-4">
                                <div class="list-group"  id="judul_` + data[key]['uid'] + `">
                            
                                </div>
                            </div>
                            <div class="col-8" >
                                <div class="tab-content"  id="` + data[key]['uid'] + `">
               
                                </div>
                            </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                    </div>`)

                    $('body').append(`
                    <!-- Modal -->
                    <div class="modal fade" id="modalCatatan_` + key + `" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Catatan Pengguna</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body" >
                            <div id="catatan_` + data[key]['uid'] + `">

                            </div>
                            <div class="chat">
                              <div class="inputChat">
                                <div class="row">
                                    <div class="col-sm-10">
                                      <input type="hidden" id="msg_username" value="{{ $logged_in_user->full_name }}">
                                      <input type="hidden" id="msg_ep">
                                      <input type="text" id="msg_isi` + uid + `" class="form-control msg_isi" placeholder="Tuliskan Catatan"> 
                                    </div>
                                    <div class="col-sm-2">
                                      <button onClick="postCatatan('` + data[key]['uid'] + `')" class="btn btn-success"> <i class="fas fa-paper-plane"></i> Kirim</button> 
                                    </div>
                                  </div>         
                                </div>
                              </div>
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

    $(document).ready(function() {
        $.ajax({
            type: "GET",
            url: "{{ route('admin.getMsg') }}",
            dataType: "JSON",
            success: function(data) {
                console.log(data)
                $.each(data, function(key, value) {
                    var msg_data = data[key]['ep']
                    $("#jumlahCatatan_" + msg_data).html(data.length)
                })
            },
            error: function(data) {
                console.log('gagal')
            }
        })
    })

    function postCatatan(ep) {
        var uid = $('#msg_username').val()
        var msg = $('#msg_isi' + ep).val()
        var dt = new Date();
        var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
        let now = new Date();
        let today = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate();

        console.log(ep)
        console.log(uid)
        console.log(msg)

        $.ajax({
            type: "GET",
            url: "{{ route('admin.postCatatan') }}",
            dataType: "JSON",
            data: {
                "ep": ep,
                "user_id": uid,
                "message": msg,
                '_token': "{{ csrf_token() }}"
            },
            success: function(data) {
                $("#catatan_" + ep).append(`
            <div class="card">
                <div class="card-header">
                  <strong>` + uid + `</strong><span class="float-right">` + today + " " + time + `</span>
                </div>
                <div class="card-body">
                    <p>` + msg + `</p>
                </div>
              </div>
            `)
            },
            error: function(data) {
                $("#catatan_" + ep).append(`
            <div class="card">
                <div class="card-header">
                  <strong>` + uid + `</strong><span class="float-right">` + today + " " + time + `</span>
                </div>
                <div class="card-body">
                    <p>` + msg + `</p>
                </div>
              </div>
            `)
            }
        })
    }

    $(document).ready(function(){
        alert($('.nilai_akreditasi').length)
    })
</script>