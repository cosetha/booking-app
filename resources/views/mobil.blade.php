@extends('layouts.user')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
</style>
@endsection
@section('content')
<div class="row min-vh-100">
    <div class="col-sm-10 mx-auto my-auto">
    <h1 class="mt-4">List Mobil</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">User</li>
        <li class="breadcrumb-item active">List Mobil</li>
    </ol>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
        Tambah Data
    </button>
    <a href="/home/order" type="button" class="btn btn-success">
        Order Layanan
    </a>
        <div class="card mb-4 mt-2">
            <div class="card-header">
                <i class="fa fa-table mr-1"></i>
                Tabel List Mobil
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
                                    <th>Nomor Registrasi</th>
                                    <th>Brand</th>
                                    <th>Type</th>                                
                                    <th>Tahun Kendaraan</th>
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
                <label for="nomor">Nomor Registrasi : </label>
                <input type="text" name="nomor" id="nomor" class="form-control" required>
            </div>   
            <div class="form-group">                
                <label for="brand">Brand Mobil : </label>
                <input type="text" name="brand" id="brand" class="form-control" required>
            </div>  
            <div class="form-group">                
                <label for="type">Tipe Mobil : </label>
                <input type="text" name="type" id="type" class="form-control" required>
            </div> 
            <div class="form-group">                
                <label for="tahun">Tahun Kendaraan : </label>
                <input type="number" name="tahun" id="tahun" class="form-control" required>
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
            <input type="hidden" name="id_edit" id="id_edit" value="">            
            <div class="row">            
                @csrf
                <div class="form-group">                
                    <label for="nomor_edit">Nomor Registrasi : </label>
                    <input type="text" name="nomor_edit" id="nomor_edit" class="form-control" required>
                </div>   
                <div class="form-group">                
                    <label for="brand_edit">Brand Mobil : </label>
                    <input type="text" name="brand_edit" id="brand_edit" class="form-control" required>
                </div>  
                <div class="form-group">                
                    <label for="type_edit">Tipe Mobil : </label>
                    <input type="text" name="type_edit" id="type_edit" class="form-control" required>
                </div> 
                <div class="form-group">                
                    <label for="tahun_edit">Tahun Kendaraan : </label>
                    <input type="number" name="tahun_edit" id="tahun_edit" class="form-control" required> 
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
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>            
        <script src="{{asset('admin/js/scripts.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>       
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>   
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">  
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
        <script src="https://use.fontawesome.com/2910099763.js"></script> 
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.min.css" integrity="sha512-cyIcYOviYhF0bHIhzXWJQ/7xnaBuIIOecYoPZBgJHQKFPo+TOBA+BY1EnTpmM8yKDU4ZdI3UGccNGCEUdfbBqw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                        url: '/home/mobil/show',
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
                            data: 'reg_number',
                            name: 'reg_number',
                            className: 'align-middle text-center'
                        },                                            
                        {
                            data: 'brand',
                            name: 'brand',
                            className: 'align-middle text-center'
                        },  
                        {
                            data: 'type',
                            name: 'type',
                            className: 'align-middle text-center'
                        },    
                        {
                            data: 'year',
                            name: 'year',
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
        formData.append('nomor',$('#nomor').val())
        formData.append('brand',$('#brand').val())
        formData.append('type',$('#type').val())
        formData.append('tahun',$('#tahun').val())

        $.ajax({
				type: 'post',
				url: '/home/mobil/store',
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
							text: 'Berhasil Menambahkan Mobil',
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
            url: '/home/mobil/edit/'+id,
            type: 'GET',
            success: function(res) {
                $('#modal-edit').modal('show');
                console.log(res.values)
                $('#id_edit').val(id);
                $('#nomor_edit').val(res.values.reg_number);
                $('#brand_edit').val(res.values.brand);
                $('#type_edit').val(res.values.type);         
                $('#tahun_edit').val(res.values.year);
                }
            });
    })
    $('body').on('submit', '#form-edit', function(e) {
        e.preventDefault();
        var id = $('#id_edit').val();
        var formData = new FormData();
        formData.append('nomor',$('#nomor_edit').val())
        formData.append('brand',$('#brand_edit').val())
        formData.append('type',$('#type_edit').val())
        formData.append('tahun',$('#tahun_edit').val())

        $.ajax({
				type: 'post',
				url: '/home/mobil/update/'+id,
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
							text: 'Berhasil Mengedit Mobil',
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
                        url: '/home/mobil/destroy/' + id,
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
});
</script>
@endsection