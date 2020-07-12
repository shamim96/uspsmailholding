<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function test(){

        $days = 30;
       $order = Order::whereRaw('DATEDIFF(endDate,startDate) > ?')
            ->setBindings([$days])
            ->paginate();
       return $order;

    }
}
