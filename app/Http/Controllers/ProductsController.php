<?php

namespace App\Http\Controllers;

use App\model\AddToCart;
use App\model\Product;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class ProductsController extends Controller
{
    public function store(Request $request){
      $product= $request->validate(['category_id'=>'required',
                                    'product_name'=>['required','string'],
                                    'product_price'=>['required','numeric','min:0'],
                                    'product_description'=>['string','required','max:255'],
                                    'product_quantity'=>'required|min:0',
                                    'product_image'=>['file','required'],
                                    'status'=>'required' ]);


        if(request('product_image')){

            $product['product_image']=request('product_image')->store('products');
        }
   Product::create($product);

   return back()->with('success','Record inserted successfully');

    }



    public function update(Request $request){
       $id= $request->id;
      $updates= $request->validate(['category_id'=>'required',
                                    'product_name'=>['required','string'],
                                    'product_price'=>['required','numeric','min:0'],
                                    'product_description'=>['string','required','max:255'],
                                    'product_quantity'=>'required|min:0',
                                    'product_image'=>['file'],
                                    'status'=>'required' ]);





        if(request('product_image')){

            $updates['product_image']=request('product_image')->store('products');
        }

        Product::where('id',$id)->update($updates);



   return back()->with('success','Record updated successfully');

    }

 public function remove(Request $request){

                    // $del=$this->validate($request,['del'=>'required']);
                    $collectid=$request->id;
                     $del=   Product::find($collectid);

                     if(!$del){


                        return ['error','product not found'];

                     }else{

                        $deleted=$del->delete();

                        //  dd($del->product_image);

                        // if($deleted){
                        // File::delete(public_path('storage/').$del->product_image);

                        // }

                        return ['success','Record inserted successfully'];
                     }







                }






public function disapprove(Request $request)
{
    $id=$request->id;

    $approve=Product::find($id);

    if($approve->status == 0){
    DB::table('amazon_products')->where('id','=',$id)->update(['status'=>1]);
    $updates=Product::where('id','=',$id)->get();
    $response=$updates[0]->status;


    return response()->json($response,"200");

    }else{

        DB::table('amazon_products')->where('id','=',$id)->update(['status'=>0]);
        $updates=Product::where('id','=',$id)->get();
        $response=$updates[0]->status;


        return response()->json($response,"200");


    }
}


public function productremove($id)
{
       $user_id=auth()->user()->id;
       $product_id=$id;





       $removed=AddToCart::where([['user_id','=',$user_id],['product_id','=',$product_id]])->delete();

       if($removed){


        $categorie=DB::table('amazon_add_to_carts')
        ->join('amazon_products','amazon_add_to_carts.product_id','=','amazon_products.id')
        ->where('amazon_add_to_carts.user_id','=',auth()->user()->id)
        ->get();

        // $sum=0;
        // foreach($categorie as $val){
        //   $count=$val->product_id;
        //   $sum=  $val->quantity * $val->product_price + $sum;
        //   $pid= $val->id;
        //   $qyt=($val->product_quantity-$val->quantity);

        // }

        $total=count($categorie);


        return response()->json($total,200);

       }else{
        return " no product found";

       }




}





}
