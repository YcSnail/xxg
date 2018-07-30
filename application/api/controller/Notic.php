<?php


namespace app\api\controller;

use think\Db;
use think\Controller;

class Notic extends Controller{


    // 查询返回所有数据
    public function index(){

        // 获取当前分页
        // 默认 当前页为0
        // 每页10条数据
        $page = 0;
        $pageNum = 10;

        // 分页返回


    }

    // 获取指定数据
    public function get(){

    }

    // 添加数据
    public function add(){

        $post = input('post.');

        if (!isset($post['happen_time']) || !isset($post['description'])){
            ajaxRes(-1,'请填写完整参数!');
        }

        // 检查时间是否正确
        $happen_time = strtotime($post['happen_time']);
        if (!$happen_time){
            ajaxRes(-1,'请选择正确的时间!');
        }

        $setData = [
            'happen_time'=>$happen_time,
            'description'=>trim($post['description']),
            'create_time'=>time()
        ];

        $result = Db::name('notic')->insert($setData);

        if ($result){
            ajaxRes(0);
        }

        ajaxRes(-1,'保存失败,请重试!');
    }

    // 修改数据
    public function edit(){

    }


}