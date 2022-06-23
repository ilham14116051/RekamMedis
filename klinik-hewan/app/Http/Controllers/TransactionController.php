<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pasien = Pasien::all();

        $transaction_id = session('transaction_id');
        session()->forget('transaction_id');
        $deleted = DB::table('transactions')->where('total_item', '=', 0)->delete();



        return view('transaction.index', compact('pasien'));
    }

    public function data()
    {
        $transaction = Transaction::orderBy('id', 'desc')->get();

        return datatables()
            ->of($transaction)
            ->addIndexColumn()
            ->addColumn('pasien_id', function ($transaction) {
                return $transaction->pasien->nm_hewan;
            })
            ->addColumn('total_item', function ($transaction) {
                return format_number($transaction->total_item);
            })
            ->addColumn('grand_total', function ($transaction) {
                return currency_IDR($transaction->grand_total);
            })
            ->addColumn('total_diskon', function ($transaction) {
                return currency_IDR($transaction->total_diskon);
            })
            ->addColumn('total_invoice', function ($transaction) {
                return currency_IDR($transaction->total_invoice);
            })
            ->addColumn('aksi', function ($transaction) {
                return '
                <div class="form group" align="center">
                    <button type="button" onclick="editForm(`' . route('transactions.update', $transaction->id) . '`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`' . route('transactions.destroy', $transaction->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function InvoiceAuto()
    {
        //
        $now = Carbon::now();
        $dateNow = $now->year . $now->month . $now->day;
        $cek = Transaction::count();
        if (
            $cek == 0
        ) {
            $urut = 10001;
            $nomer = 'INV-' . $dateNow . $urut;
        } else {
            $ambil = Transaction::all()->last();
            $urut = (int)substr($ambil->invoice, -5) + 1;
            $nomer = 'INV-' . $dateNow . $urut;
        }

        return $nomer;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $transaction = new Transaction();
        $transaction->pasien_id         = $id;
        $transaction->invoice           = $this->InvoiceAuto();
        $transaction->tgl_transaction   = Carbon::now();
        $transaction->total_item        = 0;
        $transaction->grand_total       = 0;
        $transaction->total_diskon      = 0;
        $transaction->total_invoice     = 0;
        $transaction->remarks           = '-';
        $transaction->save();

        session(['transaction_id' => $transaction->id]);
        session(['pasien_id' => $transaction->pasien_id]);

        return redirect()->route('transaction_detail.index');
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
        $transaction = Transaction::findOrFail($request->transaction_id);
        $transaction->total_item = $request->total_item;
        $transaction->grand_total = $request->total;
        $transaction->total_diskon = $request->total_diskon;
        $transaction->total_invoice = $request->bayar;
        $transaction->update();

        $detail = TransactionDetail::where('transaction_id', $transaction->id)->get();
        foreach ($detail as $item) {
            $product = Product::find($item->product_id);
            $product->stock -= $item->qty;
            $product->update();
        }

        return redirect()->route('transactions.index');
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
        $transaction = Transaction::find($id);
        $transactionDetail    = TransactionDetail::where('transaction_id', $transaction->transaction_id)->get();
        foreach ($transactionDetail as $item) {
            $product = Product::find($item->product_id);
            if ($product) {
                $product->stock -= $item->qty;
                $product->update();
            }
            $item->delete();
        }

        $transaction->delete();

        return response(null, 204);
    }
}
