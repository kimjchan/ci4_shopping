<?php
namespace App\Controllers;

class Home extends BaseController
{
    protected $isLogin;
    protected $userInfo;

    private function cookieCheck()
    {
        if(isset($_COOKIE[ "accessToken" ])){
            $cookie = json_decode($_COOKIE[ "accessToken" ], true);
            $this->isLogin = true;
            $this->userInfo = $cookie;
        }else{
            $this->isLogin = false;
            $this->userInfo = [];
        }
    }

    public function index(): string
    {
        return $this->common('page/main');
    }

    public function join(): string
    {
        return $this->common('page/join');
    }

    public function login(): string
    {
        return $this->common('page/login');
    }

    private function common($path, $param=[])
    {
        $this->cookieCheck();
        $headerParam = [
          'is_login' => $this->isLogin,
          'userInfo' => $this->userInfo
        ];
        return 
        view('common/header').
        view('common/nav', $headerParam).
        view($path, $param).
        view('common/footer');
    }
}
