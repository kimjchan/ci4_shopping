<?php
namespace App\Controllers;

class Process extends BaseController
{
    protected $request;
    protected $goodsModel;

    public function __construct()
    {
        $this->request = service('request');
        $this->goodsModel = model('App\Models\Goods');

    }

    public function index(): string
    {
        return "";
    }

    public function login(): void
    {
        // $id = $this->request->getPost('id');
        // $pwd = $this->request->getPost('pwd');
        // if(($id=="admin" && $pwd=="admin") || ($id=="test" && $pwd=="test")):
        //   $expiry = time() + 50000;
        //   $data = ["id" => $id, "pwd"=> $pwd];
        //   $cookieData = ["data" => $data, "expiry" => $expiry];
        //   setcookie( "accessToken", json_encode( $cookieData ), $expiry, '/');
        //   echo "<script>location.href='".BASE."'</script>";
        // endif;
    }

    public function logout(): void
    {
      setcookie("accessToken", "쿠키값", time()-100,'/');
      echo "<script>location.href='".BASE."'</script>";
    }

    public function register_gs()
    {
        try{
            // $this->validate([
            //     'main_img' => 'uploaded[userfile]|max_size[userfile,100]'
            //                    . '|mime_in[userfile,image/png,image/jpg,image/gif]'
            //                    . '|ext_in[userfile,png,jpg,gif]|max_dims[userfile,1024,768]',
            //     'sub_img01' => 'uploaded[sub_img01]|max_size[sub_img01,100]'
            //                    . '|mime_in[sub_img01,image/png,image/jpg,image/gif]'
            //                    . '|ext_in[sub_img01,png,jpg,gif]|max_dims[sub_img01,1024,768]',
            //     'sub_img02' => 'uploaded[sub_img02]|max_size[sub_img02,100]'
            //                    . '|mime_in[sub_img02,image/png,image/jpg,image/gif]'
            //                    . '|ext_in[sub_img02,png,jpg,gif]|max_dims[sub_img02,1024,768]',                           
            // ]);
            $main_img_path = "";
            if($_FILES['main_img']['size']>0){
                $main_img = $this->request->getFile('main_img');
                $main_img_path = $main_img->store();
            }          
            
            $sub_img01_path = "";
            if($_FILES['sub_img01']['size']>0){
                $sub_img01 = $this->request->getFile('sub_img01');
                $sub_img01_path = $sub_img01->store();
            }

            $sub_img02_path="";
            if($_FILES['sub_img02']['size']>0){
                $sub_img02 = $this->request->getFile('sub_img02');
                $sub_img02_path = $sub_img02->store();
            }

            $gs_name = strip_tags($this->request->getPost('gs_name'));
            $gs_content = strip_tags($this->request->getPost('gs_content'));
            $gs_price = strip_tags($this->request->getPost('gs_price'));
            $gs_cnt = strip_tags($this->request->getPost('gs_cnt'));
            
            // if(!isset($_COOKIE[ "accessToken" ])){
            //     echo "<script>alert('쿠키가 만료 되었습니다.'); location.href='".BASE."'</script>";
            //     return;
            // }
            // $cookie = json_decode($_COOKIE[ "accessToken" ], true);
            // $reg_id = $cookie['data']['id'];
            $data = [
                'main_img' => $main_img_path,
                'sub_img01' => $sub_img01_path,
                'sub_img02' => $sub_img02_path,
                'gs_name' => $gs_name,
                'gs_content'=> $gs_content,
                'gs_price'=> $gs_price,
                'gs_cnt'=> $gs_cnt,
            ];

            $tb="gs_tb";
            
            $this->goodsModel->insertData($tb, $data);
            echo "<script>location.href='".BASE."gsRegister'</script>";
        } catch (ErrorException $e) {
        
        }

    }

    public function register_cate()
    {
        try{
            $cate_name = strip_tags($this->request->getPost('cate_name'));
            $idx = $this->request->getPost('idx');
            
            // if(!isset($_COOKIE[ "accessToken" ])){
            //     echo "<script>alert('쿠키가 만료 되었습니다.'); location.href='".BASE."'</script>";
            //     return;
            // }
            $data = [
                'ca_name' => $cate_name,
            ];
            $tb = "gs_category";
            $res = $this->goodsModel->get_categories();

            $duplication = false;
            foreach($res as $key => $cate){
                if($cate['ca_name']==$cate_name){
                    $duplication = true;
                    break;
                }
            }
            if($duplication){
                echo "<script>alert('기존의 카테고리가 있습니다');history.back();</script>";
                return false;
            }

            if(isset($idx) && $idx!=null){
                $this->goodsModel->updateData($tb, $data, $idx);
            }else{
                $this->goodsModel->insertData($tb, $data);
            }
            echo "<script>location.href='".BASE."cateList'</script>";
        } catch (Exception $e) {
            var_dump($e);
        }
    }

    public function adpat_cate()
    {
        try{
            $tb="gs_tb";
            $gs_idx_arr = $this->request->getPost('gs_idx');
            if(!isset($gs_idx_arr) || $gs_idx_arr==Null){
                echo "<script>alert('선택된 상품이 없습니다');history.back();</script>";
                return false;
            }
            $category = $this->request->getPost('category');
            $data = [
                'gs_category' => $category
            ];
            
            foreach($gs_idx_arr as $idx){
                $this->goodsModel->updateData($tb, $data, $idx);
            }
            echo "<script>location.href='".BASE."gsList'</script>";
        }catch (Exception $e) {
            var_dump($e);
        }
    }
}
