<?php

namespace App\Controllers;

class Admin extends BaseController
{

  protected $isLogin;
  protected $userInfo;
  protected $goodsModel;
  protected $request;

  public function __construct()
  {
      $this->request = service('request');
      $this->goodsModel = model('App\Models\Goods');

  }

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
    return $this->common('admin_page/index');
  }

  public function gs_list()
  {
    $res=$this->goodsModel->gets(0,10);
    $param=[
      'gs_list' => $res
    ];
    return $this->common('admin_page/gs_list', $param);
  }

  public function gs_register(): string
  {
    return $this->common('admin_page/gs_register');
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
      view('admin_common/nav', $headerParam).
      view('admin_common/container_start').
      view($path, $param).
      view('admin_common/container_end').
      view('admin_common/footer');
    }
}
