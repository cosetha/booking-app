@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Sevices</li>
    </ol>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
        Tambah Data
    </button>
    <div class="row min-vh-100">
        <div class="card mb-4 mt-2">
            <div class="card-header">
                <i class="fa fa-table mr-1"></i>
                Tabel Service
            </div>        
            <div class="card-body">
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table
                            id="table_id"
                            class="table table-bordered"
                            width="100%"
                            cellspacing="0"
                        >
                            <thead>
                                <tr>
                                    <th>No</th>                                
                                    <th>Jenis Layanan</th>
                                    <th>Nama Layanan</th>
                                    <th>Harga</th>                                
                                    <th>Waktu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody> 

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>                    
</div>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <form action="" id="form-tambah">
                @csrf
            <div class="form-group">                
                <label for="nama">Nama Layanan : </label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">                
                <label for="waktu">Waktu Layanan : </label>
                <input type="text" name="waktu" id="waktu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Layanan : </label>
                <select name="jenis" id="jenis" class="form-control">
                    <option value="Servis Bengkel">Layanan Bengkel</option>
                    <option value="Home Service">Home Service</option>
                </select>
            </div>
            <div class="form-group">                
                <label for="harga">Harga Layanan : </label>
                <input type="number" name="harga" id="harga" class="form-control" required>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="" id="form-edit">
            @csrf
            <div class="row">
                <div class="form-group">    
                    <input type="hidden" name="id_edit" id="id_edit" value="">            
                    <label for="nama_edit">Nama Layanan : </label>
                    <input type="text" name="nama_edit" id="nama_edit" class="form-control" required>
                </div>
                <div class="form-group">                
                    <label for="waktu_edit">Waktu Layanan : </label>
                    <input type="text" name="waktu_edit" id="waktu_edit" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="jenis_edit">Jenis Layanan : </label>
                    <select name="jenis_edit" id="jenis_edit" class="form-control">
                        <option value="Servis Bengkel">Layanan Bengkel</option>
                        <option value="Home Service">Home Service</option>
                    </select>
                </div>
                <div class="form-group">                
                    <label for="harga_edit">Harga Layanan : </label>
                    <input type="number" name="harga_edit" id="harga_edit" class="form-control" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
    </div>
  </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var table = $('#table_id').DataTable({
                    processing: true,                    
                    ajax: {
                        url: '/dashboard/service/show',
                        type: 'get'
                    },
                    columns: [
                        {
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            searchable: false,
                            className: 'align-middle text-center'
                        },
                       
                        {
                            data: 'type',
                            name: 'type',
                            className: 'align-middle text-center'
                        },                                            
                        {
                            data: 'name',
                            name: 'name',
                            className: 'align-middle text-center'
                        },  
                        {
                            data: 'price',
                            name: 'price',
                            className: 'align-middle text-center'
                        },    
                        {
                            data: 'time',
                            name: 'time',
                            className: 'align-middle text-center'
                        },                        
                        {
                            data: 'aksi',
                            name: 'aksi',
                            searchable: false,
                            orderable: false,
                            className: 'align-middle text-center'
                        },
                    ]
	});

    $('body').on('submit', '#form-tambah', function(e) {
        e.preventDefault();
        var formData = new FormData();
        formData.append('nama',$('#nama').val())
        formData.append('jenis',$('#jenis').val())
        formData.append('harga',$('#harga').val())
        formData.append('waktu',$('#waktu').val())

        $.ajax({
				type: 'post',
				url: '/dashboard/service/store',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					if (response.hasOwnProperty('error')) {
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: response.error,
							timer: 1200,
							showConfirmButton: false
						});
					} else {
						$('#modal').modal('hide');
                        $('#form-tambah').trigger('reset');
                       
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Menambahkan Services',
							timer: 1200,
							showConfirmButton: false
						});
					}
				},
				error: function(err) {
					console.log(err);
				}
			});
            table.ajax.reload();
    })

    $('body').on('click', '.btn-edit', function(e) {
            var id = $(this).attr('data-id');
            e.preventDefault()
            $.ajax({
            url: '/dashboard/service/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-edit').modal('show');
                console.log(res.values)
                $('#id_edit').val(id);
                $('#nama_edit').val(res.values.name);
                $('#waktu_edit').val(res.values.time);
                $('#jenis_edit').val(res.values.type);         
                $('#harga_edit').val(res.values.price);
                }
            });
    })
    $('body').on('submit', '#form-edit', function(e) {
        e.preventDefault();
        var id = $('#id_edit').val();
        var formData = new FormData();
        formData.append('nama',$('#nama_edit').val())
        formData.append('jenis',$('#jenis_edit').val())
        formData.append('harga',$('#harga_edit').val())
        formData.append('waktu',$('#waktu_edit').val())

        $.ajax({
				type: 'post',
				url: '/dashboard/service/update/'+id,
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {
					if (response.hasOwnProperty('error')) {
						Swal.fire({
							icon: 'error',
							title: 'Ooopss...',
							text: response.error,
							timer: 1200,
							showConfirmButton: false
						});
					} else {
						$('#modal-edit').modal('hide');
                        $('#form-edit').trigger('reset');
                       
						Swal.fire({
							icon: 'success',
							title: 'Sukses',
							text: 'Berhasil Mengedit Service',
							timer: 1200,
							showConfirmButton: false
						});
					}
				},
				error: function(err) {
					console.log(err);
				}
			});
            table.ajax.reload();
    })
    $('body').on('click', '.btn-delete', function(e) {
        e.preventDefault();
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');
            Swal.fire({
                title: 'Hapus ' + nama + ' ?',
                text: 'Anda tidak dapat mengurungkan aksi ini!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!'
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'get',
                        url: '/dashboard/service/destroy/' + id,
                        success: function(response) {
                            Swal.fire('Deleted!', nama + ' telah dihapus.', 'success');
                            table.ajax.reload();
                        },
                        error: function(err) {
                            console.log(err);
                        }
                    });
                }
            });
            table.ajax.reload();
    })

    })
</script>
@endsection