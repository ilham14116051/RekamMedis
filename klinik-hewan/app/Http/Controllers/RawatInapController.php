<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\RawatInap;
use App\Models\RawatInapDetail;
use App\Models\RekamMedis;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RawatInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rekamMedis = RekamMedis::all();
        // return $rekamMedis;

        // $rawat_inap_id = session('rawat_inap_id');
        // session()->forget('rawat_inap_id');
        // $deleted = DB::table('rawat_inaps')->where('total_item', '=', 0)->delete();



        return view('rawat_inap.index', compact('rekamMedis'));
    }

    public function data()
    {
        $ranap = RawatInap::orderBy('id', 'desc')->get();

        return datatables()
            ->of($ranap)
            ->addIndexColumn()
            ->addColumn('rekam_medis_id', function ($ranap) {
                return $ranap->rekam_medis->no_rm;
            })
            ->addColumn('pasien_id', function ($ranap) {
                return $ranap->pasien->nm_hewan;
            })
            ->addColumn('total_item', function ($ranap) {
                return format_number($ranap->total_item);
            })
            ->addColumn('grand_total', function ($ranap) {
                return currency_IDR($ranap->grand_total);
            })
            ->addColumn('total_diskon', function ($ranap) {
                return currency_IDR($ranap->total_diskon);
            })
            ->addColumn('total_invoice_ranap', function ($ranap) {
                return currency_IDR($ranap->total_invoice);
            })
            ->addColumn('aksi', function ($ranap) {
                return '
                <div class="form group" align="center">
                    <button type="button" onclick="editForm(`' . route('ranaps.update', $ranap->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('ranaps.destroy', $ranap->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function RanapAuto()
    {
        //
        $now = Carbon::now();
        $dateNow = $now->year . $now->month . $now->day;
        $cek = RawatInap::count();
        if (
            $cek == 0
        ) {
            $urut = 10001;
            $nomer = 'Ranap-' . $dateNow . $urut;
        } else {
            $ambil = RawatInap::all()->last();
            $urut = (int)substr($ambil->invoice, -5) + 1;
            $nomer = 'Ranap-' . $dateNow . $urut;
        }

        return $nomer;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_rm, $id_pasien)
    {
        //
        $ranap = new RawatInap();
        $ranap->rekam_medis_id    = $id_rm;
        $ranap->pasien_id         = $id_pasien;
        $ranap->no_ranap          = $this->RanapAuto();
        $ranap->tgl_ranap         = Carbon::now();
        $ranap->total_item        = 0;
        $ranap->grand_total       = 0;
        $ranap->total_diskon      = 0;
        $ranap->total_invoice_ranap    = 0;
        $ranap->remarks           = '-';
        $ranap->save();

        session(['rawat_inap_id' => $ranap->id]);
        session(['pasien_id' => $ranap->pasien_id]);

        return redirect()->route('ranap_detail.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ranap = RawatInap::find($id);
        $ranapDetail    = RawatInapDetail::where('rawat_inap_id', $ranap->rawat_inap_id)->get();
        foreach ($ranapDetail as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $product->stock -= $item->qty;
                $product->update();
            }
            $item->delete();
        }

        $ranap->delete();

        return response(null, 204);
    }
}
