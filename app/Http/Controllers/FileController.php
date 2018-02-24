<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class FileController extends Controller
{
    public function download()
    {
        $url = 'https://fxft.oss-cn-hangzhou.aliyuncs.com/car_server_upload/application/wechat.png';
        $client = new Client(['verify' => false]);  //忽略SSL错误
        $response = $client->get($url, ['save_to' => public_path($file)]);  //保存远程url到文件
        return $response;
    }
}
