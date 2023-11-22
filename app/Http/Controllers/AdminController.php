<?php

namespace App\Http\Controllers;

use App\model\Category;
use App\model\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {

     $items = Category::with('products')->get();
      return view('amazon.category',compact('items'));

    }




    public function categorystore(Request $request)
    {
        $category=$request->validate([
           'category_name'=>['required'],
           'category_title'=>['required'],
            'category_quantity'=>['required']
        ]);


        Category::create($category);

        return back()->with('success','Record inserted successfully');
    }


    public function viewcategory()
    {
        $items = Category::with('products')->get();

        $categories=Category::latest()->paginate(10);


      return view('amazon.viewcategory',compact('items','categories'));
    }



    public function adminsearch(Request $request)
    {
        $items = Category::with('products')->get();
        $cato=$request->cato;
        $search=$request->search;
        session(['word'=>$search]);
        if($search){
            $datas= DB::table('amazon_categories')
            ->join('amazon_products','amazon_categories.id','=','amazon_products.category_id')
            ->where('amazon_categories.category_name','=',$search)
            ->where('amazon_categories.category_name','LIKE','%'.$search.'%')
            ->orWhere('amazon_products.product_name','=',$search)
            ->orWhere('amazon_products.product_name','LIKE','%'.$search.'%')
            ->paginate(5);


            return view('amazon.panel',compact('items','datas'));


        }elseif($cato){
            $datas= DB::table('amazon_categories')
            ->join('amazon_products','amazon_categories.id','=','amazon_products.category_id')
            ->where('amazon_products.category_id','=',$cato)
            ->paginate(5);


         return view('amazon.panel',compact('items','datas'));

        }else{

            $datas=Product::latest()->paginate(10);

            return view('amazon.panel',compact('items','datas'));
        }
    }

    public function viewusers()
    {


     $items = Category::with('products')->get();



     $users=User::paginate(10);


      return view('amazon.users',compact('items','users'));
    }
}
