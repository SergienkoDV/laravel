<?php

namespace App\Http\Controllers;

use App\Positions;
use App\Product;
use App\Orders;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $positions = Positions::find($id);

    }

    public function plus($id)
    {
        $positions = Positions::find($id);
        $total = $positions['total'];
        $total++;
        $positions['total'] = $total;
        $positions->save();
        return redirect('/orders/'.$positions['orders_id']);
    }

    public function minus($id)
    {
        $positions = Positions::find($id);
        $total = $positions['total'];
        $total--;
        $positions['total'] = $total;
        $positions->save();
        return redirect('/orders/'.$positions['orders_id']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $products = Product::all();
        return view('positions.create', array('products' => $products, 'id' => $id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'total'=>'integer'
        ]);
        $positions = new Positions([
            'total' => $request->get('total'),
            'products_id' => $request->get('products_id'),
            'orders_id' => $request->get('orders_id'),
        ]);
        $id = $request->get('orders_id');
        $positions->save();
        return redirect('/orders/'.$id)->with('success', 'Товар добавлен');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $positions = Positions::find($id);
        return view('positions.show', compact('positions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $positions = Positions::find($id);
        $products = Product::all();
        return view('positions.edit', array('products' => $products, 'positions' => $positions));
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
        $request->validate([
            'total'=>'required'
        ]);
        $positions = new Positions([
            'total' => $request->get('total'),
            'products_id' => $request->get('products_id'),
            'orders_id' => $request->get('orders_id'),
        ]);
        $id = $request->get('orders_id');
        $positions->save();
        return redirect('/orders/'.$id)->with('success', 'Товар добавлен');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $positions = Positions::find($id);
        $parent = $positions['orders_id'];
        $positions->delete();

        return redirect('/orders/'.($parent))->with('success', 'Товар удален!');

    }
}
