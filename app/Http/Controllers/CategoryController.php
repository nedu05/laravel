<?php

namespace App\Http\Controllers;

use App\Jobs\Trendingsale;
use App\model\AddToCart;
use App\model\Amazontrending;
use App\model\Category;
use App\model\Product;
use App\model\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{

    public function index()
    {


        // groupby query
        // $collection= DB::table('amazon_categories')
        //                 ->join('amazon_products','amazon_categories.id','=','amazon_products.category_id')
        //                 ->select('amazon_products.category_id','amazon_categories.category_name',
        //                          DB::raw('count(amazon_products.category_id) as Total_no_products'))
        //                 ->groupBy('amazon_products.category_id')
        //                 ->get();


        // dd($collection);


$url_link="https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
session(['url'=>$url_link]);

Trendingsale::dispatch();
        $items = Category::with('products')->get();





        if(auth()->user()){

        $categorie=DB::table('amazon_add_to_carts')
        ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
        ->where('amazon_add_to_carts.user_id','=',auth()->user()->id)
        ->get();

        $sum=0;
        foreach($categorie as $val){
          $count=$val->product_id;
          $sum=  $val->quantity * $val->product_price + $sum;
          $pid= $val->id;
          $qyt=($val->product_quantity-$val->quantity);

        }

        $total=count($categorie);




$trending=DB::table('amazontrendings')
->join('amazon_products','amazontrendings.product_id','=','amazon_products.id')->get();
        return view('amazon.preview',compact('items','trending','total'));


    }else{
        $url_link="https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        session(['url'=>$url_link]);
        $items = Category::with('products')->get();
        return view('amazon.preview',compact('items'));

    }
    }

    public function admin()
    {

        $items = Category::with('products')->get();
        return view('amazon.admin',compact('items'));
    }

    public function search(Request $request)
    {
        if(auth()->user()){

        $categorie=DB::table('amazon_add_to_carts')
        ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
        ->where('amazon_add_to_carts.user_id','=',auth()->user()->id)
        ->get();

        $sum=0;
        foreach($categorie as $val){
          $count=$val->product_id;
          $sum=  $val->quantity * $val->product_price + $sum;
          $pid= $val->id;
          $qyt=($val->product_quantity-$val->quantity);

        }

        $total=count($categorie);

        $items = Category::with('products')->get();
        $search=$request->input('search');
        $cato=$request->input('cato');
        session(['search'=>$search]);
            if( $cato){
            $categories= DB::table('amazon_categories')
            ->join('amazon_products','amazon_categories.id','=','amazon_products.category_id')
            ->where('amazon_products.category_id','=',$cato)
            ->where('amazon_products.status','=',1)
            ->paginate(10);

            return view('amazon.search',compact('items','categories','total'));

          }else{

            $categorie=DB::table('amazon_add_to_carts')
            ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
            ->where('amazon_add_to_carts.user_id','=',auth()->user()->id)
            
            ->get();

            $sum=0;
            foreach($categorie as $val){
              $count=$val->product_id;
              $sum=  $val->quantity * $val->product_price + $sum;
              $pid= $val->id;
              $qyt=($val->product_quantity-$val->quantity);

            }

            $total=count($categorie);



                $categories= DB::table('amazon_categories')
                ->join('amazon_products','amazon_categories.id','=','amazon_products.category_id')
                ->where('amazon_categories.category_name','=',$search)
                ->where('amazon_products.status','=',1)
                ->where('amazon_categories.category_name','LIKE','%'.$search.'%')
                ->orWhere('amazon_products.product_name','=',$search)
                ->orWhere('amazon_products.product_name','LIKE','%'.$search.'%')
                

                ->paginate(10);



                if($categories->isEmpty()){


                    return view('amazon.error',compact('items','total'));

                }else{

                    return view('amazon.search',compact('items','categories','total'));
                }


        }
    }else{
        $items = Category::with('products')->get();
        $search=$request->input('search');
        $cato=$request->input('cato');
        session(['search'=>$search]);
            if( $cato){
            $categories= DB::table('amazon_categories')
            ->join('amazon_products','amazon_categories.id','=','amazon_products.category_id')
            ->where('amazon_products.category_id','=',$cato)
            ->where('amazon_products.status','=',1)
            ->paginate(10);

            return view('amazon.search',compact('items','categories'));
    }else{

        $categories= DB::table('amazon_categories')
        ->join('amazon_products','amazon_categories.id','=','amazon_products.category_id')
        ->where('amazon_categories.category_name','=',$search)
        ->where('amazon_products.status','=',1)
        ->where('amazon_categories.category_name','LIKE','%'.$search.'%')
        ->orWhere('amazon_products.product_name','=',$search)
        ->orWhere('amazon_products.product_name','LIKE','%'.$search.'%')
        ->paginate(10);



        if($categories->isEmpty()){


            return view('amazon.error',compact('items'));

        }else{

            return view('amazon.search',compact('items','categories'));
        }

    }

}
    }


    public function panel(){

        $items = Category::with('products')->get();

        $datas=Product::latest()->paginate(10);




        return view('amazon.panel',compact('items','datas'));
    }




    public function edit(Request $request,$id){

        $items = Category::with('products')->get();


        $recievedata=Product::find($id);




        return view('amazon.edit',compact('items','recievedata'));

    }


    public function view(Request $request)
    {

if(auth()->user()){

        $items = Category::with('products')->get();
        $id=$request->id;
        $categories=Product::find($id);

        $categorie=DB::table('amazon_add_to_carts')
        ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
        ->where('amazon_add_to_carts.user_id','=',auth()->user()->id)
        ->get();

        $sum=0;
        foreach($categorie as $val){
          $count=$val->product_id;
          $sum=  $val->quantity * $val->product_price + $sum;
          $pid= $val->id;
          $qyt=($val->product_quantity-$val->quantity);

        }
        $total=count($categorie);
        return view('amazon.product',compact('items','categories','total'));


    }else{
        $items = Category::with('products')->get();
        $id=$request->id;
        $categories=Product::find($id);

        return view('amazon.product',compact('items','categories'));

    }


    }

    public function cart(Request $request)
    {


          $count=$request->count;
          $product_id=$request->product_id;
          $user_id=$request->user_id;

          $check=AddToCart::where([['product_id','=',$product_id],['user_id','=',$user_id]])->exists();

          if($check){

           AddToCart::where('product_id','=',$product_id)->increment('quantity',1);


        //    $categories=DB::table('amazon_add_to_carts')
        //    ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
        //    ->where('amazon_add_to_carts.user_id','=',auth()->user()->id)
        //    ->get();

        //    $total=count($categories);

        //     return response()->json($total,200);

          }else{
             AddToCart::create(['user_id'=>$user_id,'product_id'=>$product_id,'quantity'=>$count]);


           $categories=DB::table('amazon_add_to_carts')
           ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
           ->where('amazon_add_to_carts.user_id','=',auth()->user()->id)
           ->get();

           $total=count($categories);

                return response()->json($total,200);
          }
    }


    public function viewcart(Request $request)
    {

        $items = Category::with('products')->get();

        $us_id=$request->id;
        $categories=DB::table('amazon_add_to_carts')
                        ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
                        ->where('amazon_add_to_carts.user_id','=',$us_id)
                        ->get();

                        $sum=0;
                        foreach($categories as $val){
                            $count=$val->product_id;
                          $sum=  $val->quantity * $val->product_price + $sum;
                        }

                        $total=count($categories);

        return view('amazon.cart',compact('items','categories','sum','total'));

    }

    public function category()
    {

        $items = Category::with('products')->get();


    return view('amazon.category',compact('items'));
    }

    public function buy(Request $request)
    {
        $items = Category::with('products')->get();
        $us_id=$request->id;


if(Product::find($us_id)){
    $categories=Product::find($us_id);
    $sum= $categories->product_price;

    $categorie=DB::table('amazon_add_to_carts')
    ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
    ->where('amazon_add_to_carts.user_id','=',auth()->user()->id)
    ->get();

    $sum=0;
    foreach($categorie as $val){
      $count=$val->product_id;
      $sum=  $val->quantity * $val->product_price + $sum;
      $pid= $val->id;
      $qyt=($val->product_quantity-$val->quantity);

    }

    $total=count($categorie);



return view('amazon.buy',compact('items','categories','sum','total'));

}else{



        $categories=DB::table('amazon_add_to_carts')
                        ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
                        ->where('amazon_add_to_carts.user_id','=',$us_id)
                        ->get();

                        $sum=0;
                        foreach($categories as $val){
                          $count=$val->product_id;
                          $sum=  $val->quantity * $val->product_price + $sum;
                          $pid= $val->id;
                          $qyt=($val->product_quantity-$val->quantity);

                        }

                        $total=count($categories);



        return view('amazon.overallbuy',compact('items','categories','sum','total'));

}

    }


    public function order(Request $request)
    {

        $items = Category::with('products')->get();

            $user_add=$request->input('user_address');
            $pay=$request->input('pay_mode');
            $total=$request->input('total');
            $transactions=$request->input('product_ids');
            $transaction=$request->input('product_id');


   if($transactions){

            foreach($transactions as $trans){

            Transaction::create([
                'user_id'=>auth()->user()->id,
                 'product_id'=> $trans,
                 'user_address'=> $user_add,
                 'pay_mode'=>$pay,
                 'purchased_price'=>$total
            ]);

            }


            $us_id=auth()->user()->id;


            $categories=DB::table('amazon_add_to_carts')
                            ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
                            ->where('amazon_add_to_carts.user_id','=',$us_id)
                            ->get();


                            $sum=0;
                            foreach($categories as $val){
                                $count=$val->product_id;
                                $sum =  $val->quantity * $val->product_price + $sum;
                                $qyt=($val->product_quantity-$val->quantity);
                                Product::where('id',$count)->update(['product_quantity'=>$qyt]);
                                AddToCart::where('user_id',$us_id)->delete($count);
                            }
                            $total=count($categories);

       return view('amazon.success',compact('items','categories','sum','total'));

        }else{

            Transaction::create([
                'user_id'=>auth()->user()->id,
                 'product_id'=> $transaction,
                 'user_address'=> $user_add,
                 'pay_mode'=>$pay,
                 'purchased_price'=>$total
            ]);

            $us_id=auth()->user()->id;

            $cat=Product::find($transaction);
            $qyt =$cat->product_quantity-1;

            Product::where('id',$transaction)->update(['product_quantity'=>$qyt]);
            $categories=DB::table('amazon_add_to_carts')
                            ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
                            ->where('amazon_add_to_carts.user_id','=',$us_id)
                            ->get();
                            $sum=0;
                            $total=count($categories);


       return view('amazon.success',compact('items','categories','sum','total'));

        }


    }



    public function update(Request $request){
        $update=AddToCart::where('product_id',$request->product_id)->update([
            'quantity'=>$request->quantity
        ]);

       $cart=DB::table('amazon_add_to_carts')
       ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
       ->where('amazon_add_to_carts.user_id','=',auth()->user()->id)
       ->get();

     return response()->json($cart);

    }



}

