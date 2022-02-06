<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SheetDB\SheetDB;
use App\Product;
class AdminController extends Controller
{
//8rz48iqdsetll
//iveq6g6e2fa79
    public function __construct() {
      $this->middleware('auth');
    }


  public function sheetdb()
    {
        return new SheetDB('8rz48iqdsetll');
    }

    public function index() {
      $response = Product::all();
      return view('admin.home',compact('response'));
    }

    public function changeData($id) {
      $response = Product::where('id',$id)->first();
      if (!$response) {
        return abort(404);
      }
      return view('admin.change',compact('response'));
    }

    public function createChange(Request $request,$id) {
      $validation = $request->validate([
        'name' => 'required|min:8',
        'description' => 'required|min:16',
        'price' => 'required|numeric|min:0',
        'url' => 'required|min:16',
        'qty' => 'required|integer|min:0',
        'available' => 'required|integer|min:0',
      ]);
      $response = Product::find($id);
      if ($response) {
        $response->url = $request->input('url');
        $response->title = $request->input('name');
        $response->description = $request->input('description');
        $response->price = $request->input('price');
        $response->available = $request->input('available');
        $response->qty = $request->input('qty');
        $response->save();
      }

        return redirect(route('admin.home'));

    }

    public function updateData() {
        $products_arr = Product::all();
        if (count($products_arr) !== 0) {
          foreach ($products_arr as $e) { $e->delete(); }
        }
        $response = $this->sheetdb()->get();
        foreach ($response as $value) {
          $user = Product::insert([
            'id' => $value->id,
            'title'=> $value->name,
            'description'=> $value->desc,
            'price'=> $value->price,
            'url'=> $value->img,
            'qty'=> $value->qty,
            'available'=> $value->availability,
          ]);
        }
        return redirect(route('admin.home'));
    }
}
