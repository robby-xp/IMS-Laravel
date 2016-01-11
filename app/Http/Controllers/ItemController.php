<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->flash();
        return view('item.index', [
            'items' => Item::get($request->search)
        ]);
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
        $this->validate($request, [
            'itemCode' => 'required',
            'itemName' => 'required|max:255',
            'itemQty' => 'required|numeric'
        ]);

        $item = new Item;
        $item->code = $request->itemCode;
        $item->name = $request->itemName;
        $item->qty = $item->stock = $request->itemQty;
        $item->created_by = $item->updated_by = $request->user()->id;
        $item->save();

        return redirect('/item');
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
    public function update(Request $request, Item $item)
    {
        return $item;
        /*$this->validate($request, [
            'itemCode' => 'required',
            'itemName' => 'required|max:255',
            'itemQty' => 'required|numeric'
        ]);

        $item->code = $request->itemCode;
        $item->name = $request->itemName;
        $item->qty = $request->itemQty;
        $item->created_at = $item->created_at;
        $item->updated_by = $request->user()->id;
        $item->save();

        return redirect('/item');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect('/item');
    }

    public function get(Request $request) {
        return Item::get($request->search);
    }

    public function getById(Item $item) {
        return $item;
    }
}
