<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Product;
use App\Models\RawatInap;
use App\Models\RawatInapDetail;
use Illuminate\Http\Request;

class RawatInapDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rawat_inap_id = session('rawat_inap_id');
        $pasien = Pasien::find(session('pasien_id'));
        $product = Product::all();
        $totalDiskon = RawatInap::find($rawat_inap_id)->total_diskon ?? 0;

        // return $detail;

        if (!$pasien) {
            abort(404);
        }

        return view('rawat_inap_detail.index', compact('pasien', 'product', 'rawat_inap_id', 'totalDiskon'));
    }

    public function data($id)
    {
        //
        $detail = RawatInapDetail::with('product')
            ->where('rawat_inap_id', $id)
            ->get();

        $data = array();
        $total_item = 0;
        $total_diskon = 0;
        $total = 0;

        foreach ($detail as $item) {
            $row = array();
            $row['waktu'] = \Carbon\Carbon::parse($item->waktu)->format('H:i:s');
            $row['kd_product'] = '<span class="label label-success">' . $item->product->kd_product . '</span';
            $row['nm_product'] = $item->product->nm_product;
            $row['harga']  = currency_IDR($item->harga);
            $row['qty']      = '<input type="number" style="width:100%; text-align:center;" class="form-control input-sm quantity" data-id="' . $item->id . '" value="' . $item->qty . '">';
            $row['subtotal']    = currency_IDR($item->subtotal);
            $row['disc_amount']    = currency_IDR($item->disc_amount);
            $row['disc_percent']    = '' . $item->disc_percent . '%';
            $row['total_disc_line']    = currency_IDR($item->total_disc_line);
            $row['total']    = currency_IDR($item->total);
            $row['aksi']        = '
                <div class="btn-group">
                    <button onclick="deleteData(`' . route('ranap_detail.destroy', $item->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>';
            $data[] = $row;

            $total_item += $item->qty;
            $total_diskon += $item->total_disc_line;
            $total += $item->harga * $item->qty;
        }
        $data[] = [
            'waktu'             => '',
            'kd_product' => '
                <div class="total hide">' . $total . '</div>
                <div class="total_item hide">' . $total_item . '</div>
                <div class="total_diskon hide">' . $total_diskon . '</div>',
            'nm_product'        => '',
            'harga'             => '',
            'qty'               => '',
            'subtotal'          => '',
            'disc_amount'       => '',
            'disc_percent'      => '',
            'total_disc_line'   => '',
            'total'             => '',
            'aksi'              => '',
        ];

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['aksi', 'kd_product', 'qty', 'disc_percent'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $product = Product::where('id', $request->product_id)->first();
        if (!$product) {
            return response()->json('Data gagal disimpan', 400);
        }

        $detail = new RawatInapDetail();
        $detail->waktu = $request->waktu;
        $detail->rawat_inap_id = $request->rawat_inap_id;
        $detail->product_id = $product->id;
        $detail->harga = $product->sale_price;
        $detail->qty = $request->qty;
        $detail->subtotal = $product->sale_price * $request->qty;
        if ($request->disc_amount == "") {
            $detail->disc_amount = 0;
        } else {
            $detail->disc_amount = $request->disc_amount;
        }
        if ($request->disc_percent == "") {
            $detail->disc_percent = 0;
        } else {
            $detail->disc_percent = $request->disc_percent;
        }
        $detail->total_disc_line = $detail->disc_amount + $detail->disc_percent * $detail->subtotal / 100;
        $detail->total = $detail->subtotal - $detail->total_disc_line;
        $detail->save();

        return response()->json('Data berhasil disimpan', 200);
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
        $detail = RawatInapDetail::find($id);
        $detail->qty = $request->qty;
        $detail->subtotal = $detail->harga * $request->qty;
        $detail->disc_amount = $detail->disc_amount;
        $detail->disc_percent = $detail->disc_percent;
        $detail->total_disc_line = $detail->disc_amount + $detail->disc_percent * $detail->subtotal / 100;
        $detail->total = $detail->subtotal - $detail->total_disc_line;
        $detail->update();
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
        $detail = RawatInapDetail::find($id);
        $detail->delete();

        return response(null, 204);
    }

    public function loadForm($total_diskon, $total)
    {
        $bayar = $total - $total_diskon;
        $data  = [
            'totalrp' => currency_IDR($total),
            'total_diskonrp' => currency_IDR($total_diskon),
            'bayar' => $bayar,
            'bayarrp' => currency_IDR($bayar),
            'terbilang' => ucwords(terbilang($bayar) . ' Rupiah')
        ];

        return response()->json($data);
    }
}
