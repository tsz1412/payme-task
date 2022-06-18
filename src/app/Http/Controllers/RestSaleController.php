<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Sale;
use Illuminate\Support\Facades\Http;

class RestSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales = Sale::all();
        return json_encode($sales);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSaleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSaleRequest $request)
    {

        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'currency' => 'required',
        ]);

        $body = [
            'seller_payme_id' => env('SELLER_PAYME_ID'),
            'sale_price' => $request->get('price'),
            'currency' => $request->get('currency'),
            'product_name' => $request->get('name'),
            'installments' => '1',
            'language' => 'en'
        ];

        $paymentPage = Http::post(env('PAYME_PAYMENT_ENDPOINT'), $body);
        if ($paymentPage['status_code'] == 0) {
            $request->merge([
                'sale_number' => $paymentPage['payme_sale_code'],
                'payment_link' => $paymentPage['sale_url'],
            ]);

            Sale::create($request->all());

            return response('Created Successfully');
        }
        else{
            return response('Failed to create sale');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        return json_encode($sale);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSaleRequest  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
