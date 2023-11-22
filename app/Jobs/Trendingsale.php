<?php

namespace App\Jobs;

use App\model\Amazontrending;
use App\model\Transaction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class Trendingsale implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $data= Transaction::select('product_id',DB::raw('COUNT(product_id) as count '))->groupBy('product_id')->get();

            $product=$data->filter(function($item){
                return $item->count>2;

            });
            
            Amazontrending::truncate();

            foreach ($product as $val  ){
              Amazontrending::create(['product_id'=>$val->product_id]);
            }
    }
}
