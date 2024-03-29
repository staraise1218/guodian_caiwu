<?php

namespace app\api\controller;
use think\Controller;

class Base extends Controller {
    protected $method = 'GET';
    protected $noLoginController;

    public function __construct(){
        header("Access-Control-Allow-Origin: *"); // 允许跨域
        
        parent::__construct();

        // 请求写入log
        $this->requestToLog();
        $this->checkMethod();

        
    }

    protected function checkMethod(){
        // 允许的请求方式
        $allow_method = strtoupper($this->method);
        if ($allow_method == '*') return true;

        // 当前请求方式
        $method = $this->request->method();

        if(!($method == $allow_method)) {
            response_error('', '不被允许的请求');
        }
    }

    protected function requestToLog(){
        $pathinfo = $this->request->pathinfo();
        $method = $this->request->method();
        $param = $this->request->param();

        if($_FILES){
            $param = array_merge($param, $_FILES);
        }

        $data = "\r\n".date('Y-m-d H:i:s')." ".$pathinfo." method: {$method} \r\n param: ".var_export($param, true);

        // $logPath = ROOT_PATH.'/runtime/log/'.date('Ymd').'/requestlog.txt';
        $filepath = 'runtime/log/'.date('Y/m/');
        if(!is_dir($filepath)){
            mkdir($filepath, 0777, true);
        }
        $filename = $filepath.date('d').'.log';

$data .= $_SERVER['HTTP_USER_AGENT'];
        file_put_contents($filename, $data, FILE_APPEND);
    }
}