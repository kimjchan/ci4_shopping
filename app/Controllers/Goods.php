<?php
namespace App\Controllers;

class Goods extends BaseController
{
    public function index(): string
    {
        return $this->common('page/gs_detail');
    }

    public function cart(): string
    {
        return $this->common('page/cart');
    }

    private function common($path, $param=[])
    {
        return 
        view('common/header').
        view('common/nav').
        view($path, $param).
        view('common/footer');
    }
}
