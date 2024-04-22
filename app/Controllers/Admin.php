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

  public function banner_form(): string
  {
    $res=$this->goodsModel->gets('banner_tb',0,3);
    $count=$this->goodsModel->getBdAllCount('banner_tb');
    $param=[
      'banner_list' => $res,
      'count'=>$count
    ];
    return $this->common('admin_page/banner_form', $param);
  }

  public function gs_list()
  {
    $page = $this->request->getGet('page');
    if(!isset($page)){
      $page = 1;
    }
    $stNum = ($page -1) * 10;
    $res=$this->goodsModel->get_goods($stNum,10);
    $allCount=$this->goodsModel->getBdAllCount('gs_tb');
    $perPage = 10;
    $allPagination = ceil($allCount/10);
    $endPage = ($page+2)>$allPagination?$allPagination:$page+2;
    $startPage = ($page-2)<=0 ? 1 : $page-2;
    $param=[
      'page' => $page,
      'startPage' => $startPage,
      'endPage' => $endPage,
      'gs_list' => $res
    ];
    return $this->common('admin_page/gs_list', $param);
  }

  public function gs_register(): string
  {
    return $this->common('admin_page/gs_register');
  }

  public function cate_list():string
  {
    $page = $this->request->getGet('page');
    if(!isset($page)){
      $page = 1;
    }
    $stNum = ($page -1) * 10;
    $res=$this->goodsModel->gets('gs_category',$stNum,10);
    $allCount=$this->goodsModel->getBdAllCount('gs_category');
    $perPage = 10;
    $allPagination = ceil($allCount/10);
    $endPage = ($page+2)>$allPagination?$allPagination:$page+2;
    $startPage = ($page-2)<=0 ? 1 : $page-2;
    $param=[
      'page' => $page,
      'startPage' => $startPage,
      'endPage' => $endPage,
      'cate_list' => $res
    ];
    return $this->common('admin_page/cate_list', $param);
  }

  public function cate_register():string
  {
    $idx = $this->request->getGet('idx');
    $info=$this->goodsModel->get_category($idx);
    $param=[
      'cate_info' => $info
    ];
    return $this->common('admin_page/cate_register', $param);
  }

  public function cate_adapt():string
  {
    $gs_res=$this->goodsModel->gets('gs_tb',0,10);
    $res=$this->goodsModel->get_categories();
    $param=[
      'cate_list' => $res,
      'gs_list' => $gs_res
    ];
    return $this->common('admin_page/cate_adapt', $param);
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
