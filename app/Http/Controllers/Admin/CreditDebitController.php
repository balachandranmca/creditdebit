<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CreditDebit;
use Auth;
use App\Http\Requests\StoreCreditDebit;

class CreditDebitController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$creditdebits = CreditDebit::orderBy('id', 'asc')->paginate(10);

		return view('admin.creditdebits.index', compact('creditdebits'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.creditdebits.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(StoreCreditDebit $request)
	{
		$creditdebit = new CreditDebit();

		$creditdebit->title = $request->input("title");
		$creditdebit->description = $request->input("description");
		$creditdebit->amount = $request->input("amount");
		$creditdebit->nowdate = $request->input("nowdate");
		$creditdebit->nowtime = $request->input("nowtime");
		$creditdebit->photo = $request->input("photo");
		$creditdebit->type = $request->input("type");
		$creditdebit->user_id = Auth::user()->id;
		$creditdebit->save();

		return redirect()->route('admin.creditdebits.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$creditdebit = CreditDebit::findOrFail($id);

		return view('admin.creditdebits.show', compact('creditdebit'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$creditdebit = CreditDebit::findOrFail($id);

		return view('admin.creditdebits.edit', compact('creditdebit'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(StoreCreditDebit $request, $id)
	{
		$creditdebit = CreditDebit::findOrFail($id);

		$creditdebit->title = $request->input("title");
		$creditdebit->description = $request->input("description");
		$creditdebit->amount = $request->input("amount");
		$creditdebit->nowdate = $request->input("nowdate");
		$creditdebit->nowtime = $request->input("nowtime");
		$creditdebit->photo = $request->input("photo");
		$creditdebit->type = $request->input("type");
		$creditdebit->user_id = Auth::user()->id;
		$creditdebit->save();

		$creditdebit->save();

		return redirect()->route('admin.creditdebits.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$creditdebit = CreditDebit::findOrFail($id);
		$creditdebit->delete();

		return redirect()->route('admin.creditdebits.index')->with('message', 'Item deleted successfully.');
	}

}
