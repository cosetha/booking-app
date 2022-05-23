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
    <h1 class="mt-4">Page Order</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">User</li>
        <li class="breadcrumb-item active">Layanan Order</li>
    </ol>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
        Order Layanan
    </button>    
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Nota
    </button>
        <div class="card mb-4 mt-2">
            <div class="card-header">
                <i class="fa fa-table mr-1"></i>
                History Layanan
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
                                    <th>Tanggal Booking</th>
                                    <th>Type</th>                                
                                    <th>Layanan</th>
                                    <th>Status</th>
                                    <th>Biaya</th>
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
                <label for="nomor">Pilih Kendaraan : </label>
                @if(count($mobil) > 0)      
                <select name="mobil" id="mobil" class="form-control">
                    @foreach($mobil as $m)
                    <option value="{{$m->id}}">{{$m->brand.' - '.$m->type}}</option>
                    @endforeach
                </select>          
                @else
                <a href="/home/mobil" class="nav-link">Tambah Data Mobil</a>
                @endif
            </div>   
            <div class="form-group">                
                <label for="brand">Jenis Layanan : </label>
                <select name="layanan" id="layanan" class="form-control" required>
                    <option selected disabled value="">-Pilih Layanan-</option>
                    <option value="Servis Bengkel">Layanan Bengkel</option>
                    <option value="Home Service">Home Service</option>
                </select>
            </div>  
            <div class="form-group">                
                <label for="type">Tipe Layanan</label>
                <div id="tipe_layanan">
                </div>
            </div> 
            <div class="form-group">                
                <label for="total">Estimasi Harga : </label>
                <input type="number" name="total" id="total" class="form-control" readonly>
            </div>   
            <div class="form-group">                
                <label for="tanggal">Booking Time</label>
                <input type="datetime-local" id="tanggal" class="form-control">     
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

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Nota List</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="form-group">                
                <label for="nomor">Pilih Tanggal : </label>
                @if(count($tanggal) > 0)      
                <select name="mobil" id="mobil" class="form-control">
                    @foreach($tanggal as $m)
                    <option value="{{$m->book_date}}">{{$m->book_date}}</option>
                    @endforeach
                </select>          
                @else
                <a href="#" class="nav-link">Belum Ada Pemesanan</a>
                @endif
            </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a taget="_blank" href="/home/order/nota?tanggal={{$m->book_date}}"type="button" class="btn btn-primary">Nota</a>
      </div>
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.1.9/sweetalert2.all.min.js" integrity="sha512-IZ95TbsPTDl3eT5GwqTJH/14xZ2feLEGJRbII6bRKtE/HC6x3N4cHye7yyikadgAsuiddCY2+6gMntpVHL1gHw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>]
        
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
                        url: '/home/order/show-order',
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
                            data: 'book_date',
                            name: 'book_date',
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
                            data: 'price',
                            name: 'price',                           
                            render: function (data, type, row) {                                                              
                                return new Intl.NumberFormat('en-ID', { style: 'currency', currency: 'IDR' }).format(data)
                            },
                        },
                    ]
	});

    $('body').on('submit', '#form-tambah', function(e) {
        e.preventDefault();
        var formData = new FormData();
        var checkedValues = $('input:checkbox:checked').map(function() {
            return this.value;
        }).get();
        var harga = $('input:checkbox:checked').map(function() {
            return $(this).data('harga');
        }).get();
        for (var i = 0; i < harga.length; i++) {
            formData.append('harga[]', harga[i]);
        }
        for (var i = 0; i < checkedValues.length; i++) {
            formData.append('layanan[]', checkedValues[i]);
        }        
        formData.append('mobil',$('#mobil').val())
        formData.append('tanggal',$('#tanggal').val())

        $.ajax({
				type: 'post',
				url: '/home/order/store',
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
    
    $('#layanan').on('change', function () {
        var formData = new FormData()
        formData.append('layanan', $('#layanan').val()); 
            $.ajax({
				type: 'post',
				url: '/home/order/get_layanan',
				data: formData,
				processData: false,
				contentType: false,
				success: function(response) {					

                    for (const element of response) {
                        
                        $('#tipe_layanan').append(`<div class="form-check">
                            <input class="form-check-input checkbox" type="checkbox" value="${element.id}" id="defaultCheck1" data-harga="${element.price}">
                            <label class="form-check-label" for="defaultCheck1">
                            ${element.name}
                            </label>
                        </div>`)
                    }
                    $('.checkbox').on('change', function() { 
                        var data = []                              
                        var harga = $('input:checkbox:checked').map(function() {
                            return $(this).data('harga');
                        }).get();
                        var total = 0;
                        for (let index = 0; index < harga.length; index++) {
                            total += parseFloat(harga[index]);
                            console.log(total)   
                        }
                        $('#total').val(total)                        
                    });
                   
				},
				error: function(err) {
					console.log(err);
				}
			});       
    });
    $('#layanan').on('change', function () {

    })
});
</script>
@endsection