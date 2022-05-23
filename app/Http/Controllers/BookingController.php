<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Http\Requests\StoreBookingRequest;
use App\Http\Requests\UpdateBookingRequest;
use Illuminate\Http\Request;
use DataTables;
use Auth;
use DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.booking');
    }

    public function nota()
    {
        $total = DB::table('bookings as b')->select(DB::raw("SUM(total_price) as grand_total"))->where('b.id_user',Auth::id())
        ->where('b.book_date',request('tanggal'))
        ->join('cars as c', 'c.id', '=', 'b.id_car')
        ->join('users as u', 'u.id', '=', 'b.id_user')
        ->join('services as s', 's.id', '=', 'b.id_service')
         ->groupBy(['b.id_user','b.id_car','b.book_date','u.name'])
        ->get();          
        $service = DB::table('bookings as b')->select('*')->where('b.id_user',Auth::id())
        ->where('b.book_date',request('tanggal'))
        ->join('cars as c', 'c.id', '=', 'b.id_car')
        ->join('users as u', 'u.id', '=', 'b.id_user')
        ->join('services as s', 's.id', '=', 'b.id_service')      
        ->get();         
        return view('nota',['services'=>$service,'total'=>$total]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('cars')->where('id_user',Auth::id())->get();
        $tanggal= DB::table('bookings')->select('book_date')->where('id_user',Auth::id())->groupBy('book_date')->get();        
        return view('order',['mobil' => $data,'tanggal'=>$tanggal]);        
    }

    public function layanan(Request $request){
        $data = DB::table('services')->where('type',$request->layanan)->get();
        return response()->json($data);
    }
    public function showOrder()
    {
        $data = DB::table('bookings as b')->select('*')->where('b.id_user',Auth::id())
        ->join('cars as c', 'c.id', '=', 'b.id_car')
        ->join('users as u', 'u.id', '=', 'b.id_user')
        ->join('services as s', 's.id', '=', 'b.id_service')
        // ->groupBy(['b.id_user','b.id_car','b.book_date','u.name'])
        ->get();        

        // $data = Booking::where('id_user',Auth::id());
        return Datatables::of($data)->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn = '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->name.'" class="btn btn-info btn-edit mx-2">
            Edit <span class="fa fa-edit"></span>
            </button> &nbsp';
            $btn = $btn. '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->name.'" class="btn btn-danger btn-delete"">
            Delete <span class="fa fa-trash-o"</span>
            </button>';
            return $btn;
        })
        ->rawColumns(['aksi'])
            ->make(true);  
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->layanan as $key => $value) {
            $data[]= [
                'total_price' => $request->harga[$key],
                'book_date' => $request->tanggal,
                'status' => 'Pending',
                'id_user' => Auth::id(),
                'id_car' => $request->mobil,
                'id_service' => $request->layanan[$key],
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ];
        }      
        Booking::insert($data);       
        return response()->json([
            'message' => 'Success'
        ]);  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        $data = DB::table('bookings as b')->select('*','u.name as nama_pelanggan')
        ->join('cars as c', 'c.id', '=', 'b.id_car')
        ->join('users as u', 'u.id', '=', 'b.id_user')
        ->join('services as s', 's.id', '=', 'b.id_service')
        // ->groupBy(['b.id_user','b.id_car','b.book_date','u.name'])
        ->get();    

        return Datatables::of($data)->addIndexColumn()
        ->addColumn('aksi', function($row){
            $btn = '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->name.'"data-status="'.$row->status.'" class="btn btn-info btn-edit mx-2">
            Edit <span class="fa fa-edit"></span>
            </button> &nbsp';
            // $btn = $btn. '<button href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->name.' "data-status="'.$row->status.'" class="btn btn-danger btn-delete"">
            // Delete <span class="fa fa-trash-o"</span>
            // </button>';
            return $btn;
        })
        ->rawColumns(['aksi'])
            ->make(true);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookingRequest  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $booking = Booking::find($id);        
        $booking->status = $request->status;
        $booking->save();
        return response()->json([
            'message' => 'Success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
