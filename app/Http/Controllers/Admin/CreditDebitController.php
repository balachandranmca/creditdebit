<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\CreditDebit;
use Auth;
use App\Http\Requests\StoreCreditDebit;
use Illuminate\Support\Facades\Input;
use App\Models\Auth\User\User;

class CreditDebitController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$creditdebits = CreditDebit::where('type', $_GET['type']);
		$users = User::all();
		if(isset($_GET['users_id'])){
			$creditdebits = $creditdebits->where('user_id', $_GET['users_id'])->whereBetween('nowdate', [$_GET['from_date'], $_GET['to_date']]);
		}
		$totalAmount = $creditdebits->sum('amount');
		$creditdebits = $creditdebits->orderBy('id', 'asc')->paginate(1);

		$variables = [
						'creditdebits' => $creditdebits->appends(Input::except('page')),
						'users' => $users,
						'totalAmount' => $totalAmount
					 ];
					 
		return view('admin.creditdebits.index', $variables);
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
		if ($request->hasFile('photo')) {
			$creditdebit->photo 	= $this->fileUpload($request->only('photo'), 'photo');
		}
		$creditdebit->save();

		return redirect()->route('admin.creditdebits.index', ['type' => $creditdebit->type])->with('message', 'Item created successfully.');
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
		if($creditdebit->user_id != Auth::user()->id){
			abort(404, 'Yor are not authorized to page access'); 
		}
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
		if ($request->hasFile('photo')) {
			$creditdebit->photo 	= $this->fileUpload($request->only('photo'), 'photo');
		}
		$creditdebit->save();


		return redirect()->route('admin.creditdebits.index', ['type' => $creditdebit->type])->with('message', 'Item updated successfully.');
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
		$type = $creditdebit->type;
		if($creditdebit->user_id != Auth::user()->id){
			abort(404, 'Yor are not authorized to page access'); 
		}
		$creditdebit->delete();

		return redirect()->route('admin.creditdebits.index', ['type' => $type])->with('message', 'Item deleted successfully.');
	}

	public function custom()
	{
		dd();
		$creditdebit = CreditDebit::findOrFail($id);

		return view('admin.creditdebits.show', compact('creditdebit'));
	}

	private function fileUpload($file, $fileVarName)
    {
        $destinationPath = public_path(). '/uploads/';
        $fileExtenstion = \File::extension($file[$fileVarName]->getClientOriginalName());
        $filename = strtotime("now").".".$fileExtenstion;
        $file[$fileVarName]->move($destinationPath, $filename);
        return $filename;
    }

    private function fileUploadWithName($file, $fileVarName, $name)
    {
        $destinationPath = public_path(). '/uploads/';
        $fileExtenstion = \File::extension($file[$fileVarName]->getClientOriginalName());
        $filename = $name.'_'.strtotime("now").".".$fileExtenstion;
        $file[$fileVarName]->move($destinationPath, $filename);
        return $filename;
    }

}
