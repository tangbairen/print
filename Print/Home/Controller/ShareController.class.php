<?php
// ===================================================================
// | FileName:      ShareController.class.php
// ===================================================================
// | Discription：   共享用户控制器
//      <命名规范：>
// ===================================================================
// +------------------------------------------------------------------
// | 云印南开
// +------------------------------------------------------------------
// | Copyright (c) 2014-2015 云印团队 All rights reserved.
// +------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +------------------------------------------------------------------
/**
 * Class and Function List:
 * Function list:
 * - index()
 * - search()
 * - searchAPI()
 * - detail()
 * - add()
 * - createTag()
 * - getTags()
 * - addTags()
 * - rename()
 * - _empty()
 * Classes list:
 * - ShareController extends Controller
 */
namespace Home\Controller;
use Think\Controller;

class ShareController extends Controller {

	/**
	 * 自己分享的文件列表页
	 * @method index
	 * @author NewFuture[newfuture@yunyin.org]
	 */
	public function index()
	{
		$uid = use_id();
		if ( ! $uid)
		{
			$this->error('请登录！', U('/'));
		}
		else
		{
			//获取热门标签
			$this->tags = $this->_getTopTags();
			//自己的分享
			$share = D('ShareView')->where('user.id=%d', $uid)->group('share.id')->select();
			$this->share = $share;
			$this->display();
		}
	}

	/**
	 * 分享文件搜
	 * @method search
	 * @param  输入 tid
	 * @author NewFuture[newfuture@yunyin.org]
	 */
	public function search()
	{
		$uid = use_id();
		if(!$uid)
		{
			$this->error('未登录！');
		}
		$tid    = I('tid', 0, 'int');//标签id
		$string = I('q');//字符搜索
		$page   = I('p', 1, 'int');//翻页
		$Share  = D('ShareView')->field('id,fil_id,time,name,anonymous,user_name');
		$condition=array();
		if ($tid)
		{
			//通过标签搜索
			$condition['hastag.tag_id']=$tid;
			$Share = $Share->join('hastag ON hastag.share_id=share.id');

		}
		elseif ($string)
		{
			//通过关键字搜索
			$condition['share.name']= array('LIKE' ,'%'.$string.'%' );
			// $Share = $Share->where('share.name LIKE "%%%s%%"', $string);
		}
		else
		{
			$this->error(L('PARAM_ERROR'));
		}
		$condition['user.sch_id']=M('User')->getFieldById($uid,'sch_id');
		$condition['file.status']=array('GT', 0);
		$files = $Share->where($condition)->page($page)->limit(20)->select();
		foreach ($files as $file)
		{
			/*匿名隐藏姓名*/
			if ($file['anonymous'])
			{
				$file['user_name'] = '匿名';
			}
		}

		if ($files)
		{
			$this->success($files);
		}
		else
		{
			$this->error('无查询结果╮(╯-╰)╭');
		}
	}

	/**
	 * 文件详细信息页
	 * @method detail
	 * @param  GET： id
	 * @author NewFuture[newfuture@yunyin.org]
	 */
	public function detail()
	{
		$sid   = I('id', null, 'int');//分享的ID
		$uid   = use_id();

		/*读取分享内容*/
		$share = D('ShareView')->where('share.id=%d', $sid)->find();
		if ($share)
		{
			$share['url'] = get_thumbnail_url($share['url']);
		}
		$this->share = $share;
		/*获取分享内容的标签*/
		$this->tags = M('hastag')->join('tag ON tag.id=hastag.tag_id')->where('share_id=%d', $sid)->field('tag.name as name,tag_id')->select();
		if($uid)
		{
			/*判断是否登录*/
			$user    = M('User')->Field('sch_id,phone')->getById($uid);
			$this->lock = $user['phone'] ? 1 : 0;
			$condition['sch_id'] = $user['sch_id'];
			$condition['status'] = 1;
			$this->printers = M('printer')->where($condition)->order('rank desc')->Field('id,name,address')->select();
		}else
		{
			$share['user_name']= mb_substr($share['user_name'], 0, 1, 'utf-8').'**';
		}
		$this->display();
	}

	/**
	 * 添加分享文件
	 * 添加成功返回id
	 * @method add
	 * @param  输入POST：fid ,name,tags[]数组
	 * @author NewFuture[newfuture@yunyin.org]
	 */
	public function add()
	{
		$uid  = use_id();
		$fid  = I('fid', null, 'int');
		$name = I('name', null, 'trim');
		$tags = I('tags', array());
		$anonymous = I('anonymity', true);
		if ( ! $uid)
		{
			$this->error('未登录！');
		}
		elseif ( ! $fid ||  ! $name)
		{
			$this->error('信息不全');
		}
		elseif ($uid != M('File')->getFieldById($fid, 'use_id'))
		{
			$this->error('这份文件不属于你！');
		}
		else
		{
			$share['name'] = $name;
			$share['fil_id'] = $fid;
			$share['anonymous'] = $anonymous;
			$sid = M('share')->add($share);
			if ( ! $sid)
			{
				$this->error('共享失败！');
			}
			else
			{
				$hastag = array();
				$Tag    = M('tag');
				foreach ($tags as $tid)
				{
					$tid = intval($tid);
					if ($tid)
					{
						$hastag[] = array(
							'share_id' => $sid,
							'tag_id'   => $tid,
						);
						$Tag->where('id=%d', $tid)->setInc('count',1);
					}
				}
				M('Hastag')->addAll($hastag);
				$this->success($sid, U('detail', 'id='.$sid));
			}
		}
	}

	/**
	 * 创建新的标签
	 * 创建成功返回 标签id
	 * @method addTag
	 * @param POST：name标签名称
	 * @author NewFuture[newfuture@yunyin.org]
	 */
	public function createTag()
	{
		$uid  = use_id();
		$name = I('tag', null, 'trim');
		if ( ! $uid)
		{
			$this->error('未登录！', '/');
		}
		elseif ( ! $name)
		{
			$this->error('无效标签');
		}
		else
		{
			$Tag = M('tag');
			$tid = $Tag->getFieldByName($name, 'id');
			if ($tid)
			{
				$this->success($tid);
			}
			else
			{
				$tag = array(
					'name'   => $name,
					'use_id' => $uid,
				);

				$tid = $Tag->add($tag);
				if ($tid)
				{
					$this->success($tid);
				}
				else
				{
					$this->error('添加失败!');
				}
			}

		}
	}

	/**
	 * 查询标签列表
	 * @method getTags
	 * @return [type]  [description]
	 * @author NewFuture[newfuture@yunyin.org]
	 */
	public function getTags()
	{
		if ( ! use_id())
		{
			$this->error('未登录!', '/');
		}
		else
		{
			$name = I('tag', null, 'trim');
			if ($name)
			{
				$tags = M('Tag')->where('name LIKE "%%%s%%"', $name)->order('count desc')->limit(10)->select();
			}
			else
			{
				$tags = $this->_getTopTags();
			}
			$this->success($tags);
		}

	}

	/**
	 * 为分享的文件添加标签
	 * @method addTags
	 * @param  string  $value [description]
	 * @author NewFuture[newfuture@yunyin.org]
	 */
	public function addTags()
	{
		# code...

	}

	/**
	 * 分享文件重命名
	 * @method rename
	 * @param  string $value [description]
	 * @return [type]        [description]
	 * @author NewFuture[newfuture@yunyin.org]
	 */
	public function rename()
	{
		# code...

	}

	/**
	 * 获取最热标签
	 * @method _getTopTags
	 * @param  string      $n=10 	[个数，默认10个]
	 * @return [type]             [description]
	 * @access private
	 * @author NewFuture[newfuture@yunyin.org]
	 */
	private function _getTopTags($n = 10)
	{
		return M('Tag')->cache(120)->order('count desc')->limit($n)->select();
	}

	public function _empty()
	{
		$this->redirect('/');
	}
}
