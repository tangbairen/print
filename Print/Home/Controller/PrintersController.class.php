<?php

// ===================================================================
// | FileName:      PrintersController.class.php
// ===================================================================
// | Discription：  打印店信息
//      <命名规范：>
// ===================================================================
// +------------------------------------------------------------------
// | 云印南开
// +------------------------------------------------------------------
// | Copyright (c) 2014-2015 云印南开团队 All rights reserved.
// +------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +------------------------------------------------------------------
/**
 * Class and Function List:
 * Function list:
 * - index()
 * - getPrice()
 * Classes list:
 * - PrintersController extends Controller
 */
namespace Home\Controller;
use Think\Controller;
class PrintersController extends Controller
{
	public function index()
	{
	    $Printer = M('Printer');
	    $list = $Printer->select();
	    if($list)
	    {
	        $this->data = $list;
	        $this->printer = $list[$id-1];
		    $this->display();
		}
		else
		{
		    $this->error('不好意思，没找到数据'); 
		}    
	}
	
	public function detail($id = 1)
	{
	    
	    $Printer = M('Printer');
	    $result = $Printer->where('id='.$id)->find(); 
	    
	    if($result)
	    {
	        $this->data = $result;
		    $this->success($result);
		}
		else
		{
		    $this->error('不好意思，没找到数据'); 
		}
	}
	
	public function getPrice()
    {
        $uid = use_id();
        $pid = I('pid',0,'int');
        if ($uid && $pid) 
        {
            $Printer = M('Printer');
            $result = $Printer->where('id='.$pid)->getField('price');
            if($result)
            {
                $result = json_decode($result);
                $this->success($result);
            }
            else
            {
                $this->error('打印店还没设置价钱');
            }
        }
        else
        {
            $this->error('你可能还没登录或者没提供打印店编号');
        }
    }
	
}