<?php
//功能：quality控制器
namespace Home\Controller;
use Think\Controller;
class DegsController extends Controller{
	public function search(){
// 	     $this->display();
$this->show("asdasd");
	}
	public function create(){		
		  $this->display();
	}
	public function read(){
		$pagenum=isset($_POST['page']) ? intval($_POST['page']) : 1;
		$rowsnum=isset($_POST['rows']) ? intval($_POST['rows']) : 10;
		$degs=M("degs_copy");
		/* 搜索条件 start*/
		$qualitylist=array();
	
		$cx=isset($_POST['cx']) ? mysql_real_escape_string($_POST['cx']) : '';
		$creattime=isset($_POST['creattime']) ? mysql_real_escape_string($_POST['creattime']) : '';
		$content=isset($_POST['content']) ? mysql_real_escape_string($_POST['content']) : '';
		$tz=isset($_POST['tz']) ? mysql_real_escape_string($_POST['tz']) : '';
		$module=isset($_POST['module']) ? mysql_real_escape_string($_POST['module']) : '';
		$tags=isset($_POST['tags']) ? mysql_real_escape_string($_POST['tags']) : '';	
		$commit=isset($_POST['commit']) ? mysql_real_escape_string($_POST['commit']) : '';
		$bz=isset($_POST['bz']) ? mysql_real_escape_string($_POST['bz']) : '';
		$map['cx'] = array('like',array('%'.$cx.'%'));
		$map['creattime'] = array('like',array('%'.$creattime.'%'));
		$map['content'] = array('like',array('%'.$content.'%'));
		$map['tz'] = array('like',array('%'.$tz.'%'));

		$map['module'] = array('like',array('%'.$module.'%'));
		$map['tags'] = array('like',array('%'.$tags.'%'));

		$map['commit'] = array('like',array('%'.$commit.'%'));
		$map['bz'] = array('like',array('%'.$bz.'%'));
		/* 搜索条件 end*/
		$gslist=$degs->where($map)->limit(($pagenum-1)*$rowsnum.','.$rowsnum)->order('id asc')->select();
		$total=$degs->where($map)->count();

		if ($total==0){
			$json='{"total":'.$total.',"rows":[]}';
			echo $json;
		}else{
			$json='{"total":'.$total.',"rows":'.json_encode($gslist).'}';//重要，easyui的标准数据格式，数据总数和数据内容在同一个json中
			echo $json;
		}
	
	}
}
?>