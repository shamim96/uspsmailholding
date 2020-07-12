<?php


namespace App;


use GuzzleHttp\Client;
use Illuminate\Support\Str;

class Help extends Dynamic
{

    public function randStrNum($length = 6){
        $str = substr(md5(time()), 0, $length);
        return $str;
    }




    public function captchaVerify($request){

        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            "secret" => "6LeCzvkUAAAAAGeLaZ5X8fdjyQ99_65tXlBwTAoL",
            "response" => $request['captchaToken'],
            "remoteip" => $_SERVER['REMOTE_ADDR']
        ];
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $res = json_decode($response, true);

        if($res['success'] != true) {
            return false;
        }
        return true;

    }

    public function headerScripts(){
        return ScriptHeader::all();
    }

    public function thankYouScript(){
        return ScriptThankYou::all();
    }
    public function disputeScript(){
        return ScriptDispute::all();
    }

    public function paginateData($paginateData){
        $total = $paginateData->total();
        $currentPage = $paginateData->currentPage();
        $totalCurrentPageData = count($paginateData);
        $currentPageFrom = ($paginateData->perPage() * ($currentPage-1))+ 1;
        $currentPageTo = ($currentPageFrom + $totalCurrentPageData) - 1;

        return ['total'=>$total, 'currentPage'=>$currentPage, 'totalCurrentPageData'=>$totalCurrentPageData, 'currentPageFrom'=>$currentPageFrom, 'currentPageTo'=>$currentPageTo];
    }

    public function makeAlert($comment, $route = false, $routeId = false, $link = false, $userId = false, $status = false){
        $data = [];
        $data['comment'] = $comment;
        if($route){
            $data['route'] = $route;
        }
        if($routeId){
            $data['routeId'] = $routeId;
        }
        if($link){
            $data['link'] = $link;
        }
        if($userId){
            $data['userId'] = $userId;
        }
        if($status){
            $data['status'] = $status;
        }
        alert::create($data);
    }

    public function alertLink($alert){
        if($alert->route && $alert->routeId){
            return route($alert->route,$alert->routeId);
        }elseif ($alert->route){
            return route($alert->route);
        }elseif($alert->link){
            return $alert->link;
        }
        return false;
    }

    public function makeUniqueTxId(){
        $txId = Str::random(13);
        $order = Order::where('txId',$txId)->first();
        if($order){
          return $this->makeUniqueTxId();
        }
        return $txId;
    }
}
