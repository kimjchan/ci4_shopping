<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return $this->common('page/main');
    }

    public function gs_detail(): string
    {
        return $this->common('page/gs_detail');
    }

    public function cart(): string
    {
        return $this->common('page/cart');
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
        return 
        view('common/header').
        view('common/nav').
        view($path, $param).
        view('common/footer');
    }
}
