@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
        <li class="breadcrumb-item active">Booking</li>
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
                                    <th>Nama Pelanggan</th>                              
                                    <th>Jenis Layanan</th>
                                    <th>Nama Layanan</th>
                                    <th>Status Pemesanan</th>
                                    <th>Nomor Kendaraan</th>  
                                    <th>Alamat</th>                                
                                    <th>Telephone</th>
                                    <th>Tanggal Pemesanan</th>
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
                    <label for="status">Status Pemesanan : </label>
                    <select name="status" id="status" class="form-control">
                        <option value="Pending">Pending</option>
                        <option value="Proses">Proses</option>
                        <option value="Selesai">Selesai</option>
                    </select>
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
                        url: '/dashboard/booking/show',
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
                            data: 'nama_pelanggan',
                            name: 'nama_pelanggan',
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
                            data: 'status',
                            name: 'status',
                            className: 'align-middle text-center'
                        }, 
                        {
                            data: 'reg_number',
                            name: 'reg_number',
                            className: 'align-middle text-center'
                        },  
                        {
                            data: 'address',
                            name: 'address',
                            className: 'align-middle text-center'
                        },    
                        {
                            data: 'telephone',
                            name: 'telephone',
                            className: 'align-middle text-center'
                        },   
                        {
                            data: 'book_date',
                            name: 'book_date',
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

    $('body').on('click', '.btn-edit', function(e) {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            e.preventDefault()            
            $('#modal-edit').modal('show');               
            $('#id_edit').val(id);  
            $('#status').val(status);                                          
    })
    $('body').on('submit', '#form-edit', function(e) {
        e.preventDefault();
        var id = $('#id_edit').val();
        var formData = new FormData();
        formData.append('status',$('#status').val())
        $.ajax({
				type: 'post',
				url: '/dashboard/booking/update/'+id,
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
							text: 'Berhasil Mengedit Booking',
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
                        url: '/dashboard/booking/destroy/' + id,
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