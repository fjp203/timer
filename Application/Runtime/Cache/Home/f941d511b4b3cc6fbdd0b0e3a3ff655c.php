<?php if (!defined('THINK_PATH')) exit();?><table id="dg"></table>
<!--工具栏 -->
<div id="tool">    

<table>
<tr>

	<?php if($_SESSION[C('USER_AUTH_KEY')] > 0 and $_SESSION[C('USER_AUTH_KEY')] < 3): ?><td>
	<a href="#" id= "aaa1" class="easyui-linkbutton"  onclick='show_add()' data-options="iconCls:'icon-standard-folder-page',plain:true">添加</a> 
    <a href="#" class="easyui-linkbutton"  onclick='dele()' data-options="iconCls:'icon-standard-page-white-delete',plain:true">删除</a> 	
    <a href="#" class="easyui-linkbutton"  onclick='show_edit()' data-options="iconCls:'icon-standard-application-edit',plain:true">编辑</a> 		




				 <td>
     <div class="datagrid-btn-separator"></div>
 </td><?php endif; ?>
 <td>
    <a href="#"  class="easyui-linkbutton"   onclick="excel()" data-options="iconCls:'icon-standard-page-white-excel',plain:true">导出</a>
	  <a href="#" class="easyui-linkbutton"  onclick="view()" data-options="iconCls:'icon-standard-application-view-gallery',plain:true">查看</a> 
	  <a href="#" class="easyui-linkbutton"  onclick="show_pinlun()" data-options="iconCls:'icon-standard-building-add',plain:true">评论</a> 
   </td>
   	 <td>
     <div class="datagrid-btn-separator"></div>
 </td>
   <td>

	  <a href="#" class="easyui-linkbutton"  onclick="reload()" data-options="iconCls:'icon-standard-arrow-refresh',plain:true">刷新</a> 

   </td>
   		 <td>
     <div class="datagrid-btn-separator"></div>
 </td>
   <td>
     	<div style="float:right;">        
               <input  id='searchbox' class="easyui-searchbox" data-options="" style="width:400px;"></input>
			   </div>
			  
			      
			   <div id="mm" style="width:400px">
			    <div data-options="name:'miaoshu',iconCls:'icon-standard-table-edit',selected:true">问题描述</div>
	<div data-options="name:'creattime',iconCls:'icon-standard-date-magnify'" >日期</div>
	<div data-options="name:'cx',iconCls:'icon-standard-table-multiple'" >车型</div>
   
	<div data-options="name:'laiyuan',iconCls:'icon-standard-tag-blue'" >来源</div>
	<div data-options="name:'yuanyin',iconCls:'icon-standard-sum'">原因分析</div>
	<div data-options="name:'zhenggai',iconCls:'icon-standard-table-edit'">问题整改</div>

</div>
	   </td>
</tr>
</table>
</div>
<style>
	.uploadpic{
		float:left;
		width: 295px;
		text-align:center;
		height:165px;
	}
	.uploadpic h3{
		text-align:left;
		border:1px solid  #95B8E7;
		float:left;
		padding:4px;
		background-color:#95B8E7;
		color:#FFF;
	}
	.up-content{
		border:1px solid  #95B8E7;
		padding:4px;
	}
	.w10{
		float:left;
		width:10px;
		color:#FFF;
	}
</style>
<div id="add" class="easyui-dialog" style="width: 728px; height: 608px; padding: 0px; overflow: hidden;" title="&nbsp;&nbsp;记录添加" data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg-add',closed:true,resizable:false,modal:false,closable:true">
	<form id="add_form" action="/timer/index.php/Home/Quality/add_quality" enctype="multipart/form-data" method="post" >
		<table width="100%" cellspacing="0" class="table_form">
	<tr>
		<th width="80">基本信息</th>
		<td style="height: 40px" colspan="3">
			<div>
				<label>车型：
					<input id="cx" name="cx" class="easyui-validatebox" style="width: 200px" />
				</label>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="creattime">创建日期：
					<input id="creattime" name="creattime" type="text" class="easyui-datebox" data-options="editable:false" style="width: 178px"></input>
				</label>
			</div>

			<div style="padding:10px 0 0 0 ">

				<label for="laiyuan">来源：
					<select id="laiyuan" class="easyui-combobox" name="laiyuan" data-options="editable:true,panelHeight:'auto'" style="width: 200px;">
						<option value="售后反馈" select="true">售后反馈</option>
						<option value="市场走访">市场走访</option>
						<option value="车辆评审">车辆评审</option>
						<option value="车辆交验">车辆交验</option>
						<option value="工位稽查">工位稽查</option>
						<option value="库房评审">库房评审</option>
						<option value="车辆军检">车辆军检</option>
					</select>
				</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<label for="zrdw">责任单位：
					<select id="zrdw" class="easyui-combobox" name="zrdw" data-options="editable:true,panelHeight:'auto'" style="width: 178px;">
						<option value="零部件" select="true">零部件</option>
						<option value="设计">设计</option>
						<option value="工艺">工艺</option>
						<option value="装配">装配</option>
					</select>
				</label>
			</div>
		</td>
	</tr>
	<tr>
		<th width="80">问题描述</th>
		<td>
			<input type="text" style="width: 400px;" name="miaoshu" id="miaoshu_content" value="">
			<br />
			<div id="miaoshu_contentwordage"></div>
		</td>
	</tr>
	<tr>
		<th width="80">原因分析</th>
		<td>
			<textarea name="yuanyin" id="yuanyin_content" style="width: 98%; height: 46px;" onkeyup=""></textarea>
			<br />
			<div id="yuanyin_contentwordage"></div>
		</td>
	</tr>
	<tr>
		<th width="80">问题整改</th>
		<td>
			<textarea name="zhenggai" id="zhenggai_content" style="width: 98%; height: 46px;" onkeyup=""></textarea>
			<br />
			<div id="zhenggai_contentwordage"></div>
		</td>
	</tr>

	<tr>
		<th width="80">上传图片</th>
		<td>
			<div class="uploadpic">
				<h3>正确状态</h3>
				<br/>
				<div class="up-content"><img id="GoodImgPr" src="/timer/Public/images/nopic.gif" style="height:120px;width:120px" />
					<input type="file" id="filegood" name="img[]" accept="image/jpeg,image/png,image/jpg" aceonchange="CheckFile(this)" />
				</div>
			</div>
			<div class="w10">asda</div>
			<div class="uploadpic">
				<h3>错误状态</h3>
				<br/>
				<div class="up-content"><img id="BadImgPr" src="/timer/Public/images/nopic.gif" style="height:120px;width:120px" />
					<input type="file" id="filebad" name="img[]" accept="image/jpeg,image/png,image/jpg" aceonchange="CheckFile(this)" />
				</div>
			</div>
		</td>
	</tr>
</table>
	<input type="hidden" name="userid" id="userid" value= <?php echo ($_SESSION['uid']); ?>>
	</form>
	<div class="result">
          <?php if(!empty($photos)): if(is_array($photos)): foreach($photos as $key=>$vo): echo ($key); ?>|<?php echo ($vo); endforeach; endif; endif; ?>
    </div>
	<br>
</div>

<div id="dlg-add">
	<div class="tool_tip">添加记录后会在列表中出现！！</div>
	<a href="#" id="addok" class="easyui-linkbutton" data-options="iconCls:'icon-ok'"
		onclick="add()">确认</a>
	<a href="#" class="easyui-linkbutton"
		data-options="iconCls:'icon-cancel'"
		onclick="javascript:$('#add').dialog('close')">取消</a>
</div>
<script>
function CheckFile(obj) {
    var array = new Array('jpeg', 'png', 'jpg');  //可以上传的文件类型
    if (obj.value == '') {
        alert("请选择要上传的图片!");
        return false;
    }
    else {
        var fileContentType = obj.value.match(/^(.*)(\.)(.{1,8})$/)[3]; //这个文件类型正则很有用：）
        var isExists = false;
        for (var i in array) {
            if (fileContentType.toLowerCase() == array[i].toLowerCase()) {
                isExists = true;
                return true;
            }
        }
        if (isExists == false) {
            obj.value = null;
            alert("上传图片类型不正确!");
            return false;
        }
        return false;
    }
}
$(document).ready(function(){
    var limitNum = 100;
    var pattern = '还可以输入' + limitNum + '字符';
    $('#miaoshu_contentwordage').html(pattern);
    $('#miaoshu_content').keyup(
    function(){
        var remain = $(this).val().length;
        if(remain > limitNum){
                pattern = "字数超过限制！";
            }else{
                var result = limitNum - remain;
                pattern = '还可以输入' + result + '字符';
            }
            $('#miaoshu_contentwordage').html(pattern);
        }
    );
    
    var limitNumB = 255;
    var patternB = '还可以输入' + limitNumB + '字符';
    $('#yuanyin_contentwordage').html(patternB);
    $('#yuanyin_content').keyup(
    function(){
        var remain = $(this).val().length;
        if(remain > limitNumB){
                patternB = "字数超过限制！";
            }else{
                var result = limitNumB - remain;
                patternB = '还可以输入' + result + '字符';
            }
            $('#yuanyin_contentwordage').html(patternB);
        }
    );
    $('#zhenggai_contentwordage').html(patternB);
    $('#zhenggai_content').keyup(
    function(){
        var remain = $(this).val().length;
        if(remain > limitNumB){
                patternB = "字数超过限制！";
            }else{
                var result = limitNumB - remain;
                patternB = '还可以输入' + result + '字符';
            }
            $('#zhenggai_contentwordage').html(patternB);
        }
    );
    
    //显示图片
    $("#filegood").uploadPreview({ Img: "GoodImgPr", Width: 120, Height: 120 });
    $("#filebad").uploadPreview({ Img: "BadImgPr", Width: 120, Height: 120 });
});
</script>

<div id="edit" class="easyui-dialog" style="width:646px;height:360px;padding:0px;overflow:hidden;"     
        title="&nbsp;&nbsp;编辑记录"  data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg-edit',closed:true,resizable:false,modal:true,closable:true">  
            

    <form id="edit_form"  method="post" >    
        <table width="100%" cellspacing="0" class="table_form">
			<tr >
			<th width="80">基本信息</th>
				<td style="height: 40px" colspan="3">
				
				<div>
				<label>车型：

						<input id="cx" name="cx" class="easyui-validatebox" style="width: 200px" />
					</label>
					
					&nbsp;&nbsp;&nbsp;&nbsp;
					<label for="creattime">创建日期：
					<input id="creattime" name="creattime" type="text"
						class="easyui-datebox" 
						data-options="editable:false" style="width: 178px"></input></label>

				
				</div>
					
<div style="padding:10px 0 0 0 ">

<label for="laiyuan">来源：
					<select id="laiyuan" class="easyui-combobox" name="laiyuan"
						data-options="editable:false,panelHeight:'auto'"
						style="width: 200px;">
						<option value="零部件" select="true">零部件</option>
						<option value="工艺">工艺</option>
						<option value="装配">装配</option>


					</select></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<label for="zrdw">责任单位：
					<select id="zrdw" class="easyui-combobox" name="zrdw"
						data-options="editable:false,panelHeight:'auto'"
						style="width: 178px;">
						<option value="零部件" select="true">零部件</option>
						<option value="工艺">工艺</option>
						<option value="装配">装配</option>


					</select></label>
</div>

					



				</td>


			</tr>




			<tr>
				<th width="80">问题描述</th>


				<td>
					<input type="text" style="width: 400px;" name="miaoshu"
						id="miaoshu_content1" value=""  >
				
			
					<!-- <input type="button" class="button" id="check_title_alt"
						value="检测重复"
						onclick="$.get('?m=content&amp;c=content&amp;a=public_check_title&amp;catid=8&amp;sid='+Math.random()*5, {data:$('#title').val()}, function(data){if(data=='1') {$('#check_title_alt').val('标题重复');$('#check_title_alt').css('background-color','#FFCC66');} else if(data=='0') {$('#check_title_alt').val('标题不重复');$('#check_title_alt').css('background-color','#F8FFE1')}})"
						style="width: 73px;">
					<span id="title_colorpanel" style="position: absolute;"
						class="colorpanel"></span> -->
				
				</td>


			</tr>
			<tr>
				<th width="80">原因分析</th>
				<td>
					<textarea name="yuanyin" id="yuanyin_content"
						style="width: 98%; height: 46px;"
						onkeyup=""></textarea>
					
				</td>
			</tr>

			<tr>
				<th width="80">问题整改</th>
				<td>
					<textarea name="zhenggai" id="zhenggai_content"
						style="width: 98%; height: 46px;"
						onkeyup=""></textarea>
				<input type="hidden" name="id" value="value">
						
				</td>
			</tr>
	

			
		</table>
    </form>  

</div> 
<div id="dlg-edit">
	<div class="tool_tip">只有自己发布的质量信息才能进行编辑！！</div>
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="edit()">确认</a>    
    <a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#edit').dialog('close')">取消</a>    
</div>
<div id="pl" class="easyui-dialog"
	style="width: 580px; height: 240px; padding: 5px; overflow: hidden;"
	title="&nbsp;&nbsp;评论"
	data-options="iconCls:'icon-standard-building-add',buttons:'#pl-add',closed:true,resizable:false,modal:false,closable:true">


	<form id="add_pl" action="/timer/index.php/Home/Quality/pinlun" enctype="multipart/form-data" method="post" >
		 <!--我要评论-->
       <input type="hidden" name="id" id="hideid" value="value">
       <input type="hidden" name="pinglun" id="hidepl" value="value">
       <textarea name="pl_text" id="pl_text"
						style="width: 100%; height: 100%;"
						onkeyup=""></textarea>
					<br />
					
	</form>
	

</div>

<div id="pl-add">
	<div class="tool_tip" id="pl_contentwordage">
		</div>
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'"
		onclick="pinglun()">确认</a>
	<a href="#" class="easyui-linkbutton"
		data-options="iconCls:'icon-cancel'"
		onclick="javascript:$('#pl').dialog('close')">取消</a>
</div>
<script>
$(document).ready(function(){
    var limitNum = 255;
    var pattern = '还可以输入' + limitNum + '字符';
    $('#pl_contentwordage').html(pattern);
    $('#pl_text').keyup(
    function(){
        var remain = $(this).val().length;
        if(remain > limitNum){
                pattern = "字数超过限制！";
            }else{
                var result = limitNum - remain;
                pattern = '还可以输入' + result + '字符';
            }
            $('#pl_contentwordage').html(pattern);
        }
    );
    
   
 
});
</script>
<style>
	.photo_view {
		width: 660px;
		height: 295px;
		text-align: center;
	}
	.zoomableContainer {
		height: 95%;
		text-align: center;
		content-align: center;
	}
</style>
<div id="view" class="easyui-dialog" style="width:833px;height:715px;padding:2px;overflow:hidden;" title="&nbsp;&nbsp;查看记录" data-options="iconCls:'icon-standard-folder-page',buttons:'#dlg-view',closed:true,resizable:false,modal:true,closable:true">
	<div id="printview">
		<table cellspacing="0" class="table_view" 　summary="这是显示质量问题报表的表格">
		
			<caption class="view_title"> 特种车事业部车辆质量问题</caption>

		
			<tr>
				<td class="thh">车&nbsp;&nbsp;型</td>
				<td id="cx_view"></td>
				<td class="thh">反馈时间</td>
				<td id="creattime_view"></td>
				<td class="thh">责任单位</td>
				<td id="zrdw_view">
				</td>
			</tr>
			<tr>
				<td class="thh">问题描述</td>
				<td colspan="3" valign="middle" id="miaoshu_view"></td>
				<td class="thh">问题来源</td>
				<td valign="middle" id="laiyuan_view"></td>
			</tr>
			<tr>
				<td class="thh">问题照片</td>

				<td colspan="5" style="padding:0px;">

					<div id="tt1" class="easyui-tabs" style="width:680px;height:336px;" data-options="border:'false'">
						<div title="正确照片" style="padding:4px;">
							<div class="photo_view" id="photo_viewOK">图片没有正确显示？</div>
						</div>
						<div title="错误照片" style="padding:4px;">

							<div class="photo_view" id="photo_viewCW">图片没有正确显示？</div>
						</div>

					</div>

				</td>

			</tr>
			<tr>
				<td class="thh">原因分析</td>
				<td colspan="5" height="70px" id="yuanyin_view"> </td>
			</tr>
			<tr>
				<td class="thh">整改情况</td>
				<td colspan="5" height="70px" id="zhenggai_view"></td>
			</tr>
			<tr>
				<td class="thh">评&nbsp;&nbsp;论</td>
				<td colspan="5" height="70px" id="pinlun_view"></td>
			</tr>

		</table>
	</div>
</div>

<div id="dlg-view">
	<div class="tool_tip">
		单击图片,使用鼠标中键可以进行缩放显示！！
		<!--
		<table border="0px" cellspacing="0" cellpadding="0">			
			<tr>
				<td><a href="#" class="easyui-linkbutton" onclick="print_view()" data-options="iconCls:'icon-standard-printer',plain:true" onclick="">打印</a></td>
				<td><div class="datagrid-btn-separator"></div></td>
			<td>单击图片可以进行缩放显示！！</td>
			</tr>
		</table>	 -->
	</div>
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="down()">下载</a>
	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-cancel'" onclick="javascript:$('#view').dialog('close')">取消</a>
</div>
<script>
</script>
<style>
	.picshow {
		width: 49%;
		border: 1px #0E2D5F solid;
		float: left;
		height: 99%;
		padding: 4px;
	}
	.picshow h2 {
		padding-top: 10px;
		text-align: center;
		color: #0E2D5F;
	}
	.b10 {
		width: 10px;
	}
	img {
		max-width: 100%;
		max-height: 100%;
	}
	.zoomableContainer {
		height: 95%;
		text-align: center;
		content-align: center;
	}
</style>

<div id="showpic" class="easyui-dialog" style="width:1024px; height: 768px; padding:5px; overflow: hidden;" title="&nbsp;&nbsp;显示图片" data-options="iconCls:'icon-standard-picture',buttons:'#dlg-showpic',closed:true,resizable:false,modal:true,closable:true">
	<div id="cc" class="easyui-layout" style="width:1000px; height: 690px;">
		<div data-options="region:'center',iconCls:'icon-standard-folder-picture',title:'正确图片'" style="padding:5px;">
			<div id="picshowOK">图片没有正确显示？</div>
		</div>
		<div data-options="region:'east'" style="width:500px;">
			<div class="easyui-panel" title="错误图片" data-options="iconCls:'icon-standard-picture-delete'" fit="true" border="false" style="padding:2px;">
							<p id="picshowCW" style="text-align:center;">此处没有图片！！！</p>
			</div>

		</div>
	</div>
</div>

<div id="dlg-showpic">
	<div class="tool_tip">在图片点击鼠标中键可进行缩放、拖动查看。</div>

	<a href="#" class="easyui-linkbutton" data-options="iconCls:'icon-ok'" onclick="javascript:$('#showpic').dialog('close')">关闭</a>
</div>

<script type="text/javascript">
	$('#dg').datagrid({
	url : '/timer/index.php/Home/Quality/read',
	toolbar : '#tool',
	pagination : true,
	fit : true,
	width : function() {
		return document.body.clientWidth * 0.9
	},
	nowrap : false,
	collapsible : true,
	fitColumns : true,
	autoRowHeight : false,
	striped : true,//交替行
	singleSelect : true,//只允许选择一行
	rownumbers : true,
	border : false,
	sortName : 'id',
	sortOrder : 'desc',//倒序排列
	remoteSort : false,
	pageSize : 50,
	method : "post",
	pageList : [ 10, 15, 20, 40, 50, 100, 200 ],
	columns : [ [
			{
				field : 'id',
				checkbox : true
			},
			{
				field : 'cx',
				title : '车型',
				width : 180
			},

			{
				field : 'creattime',
				title : '创建日期',
				width : 100
			},
			{
				field : 'miaoshu',
				title : '问题描述',
				width : 200
			},
			{
				field : 'laiyuan',
				title : '来源',
				width : 100,
				align : 'left'		
			},
			{
				field : 'zrdw',
				title : '责任单位',
				width : 100,
				align : 'left'		
			},
			{
				field : 'file_big_imgOK',
				title : '图片',
				width : 100,
				align : 'center',
				/*formatter : function(val, rowdata, index) {
					return '<a class="grid_pic" onclick="showpic(&quot;'
							+ val
							+ '&quot;)"  >'
							+ val
							+ '</a>'
				}*/
				formatter : function(val, rowdata, index) {
					return '<a class="grid_pic" onclick="showpic()"></a>'
				}
			},

			{
				field : 'yuanyin',
				title : '原因分析',
				width : 200,
				align : 'left'
			}, {
				field : 'zhenggai',
				title : '问题整改',
				width : 200,
				align : 'center'
			}, {
				field : 'pinglun',
				title : '评论',
				width : 200,
				align : 'left'
			}, {
				field : 'userid',
				title : 'uesrid',
				width : 200,
				align : 'center',
				hidden : 'true'
			}

	] ],

	onLoadSuccess : function() {
		$(".grid_pic").linkbutton({
			text : '&nbsp;&nbsp;显示',
			plain : true,
			iconCls : 'icon-standard-picture'
		});

	}

});
	//
	$('#searchbox').searchbox({
		searcher : function(value, name) {
			/*	$('#dg').datagrid('load', {
		 		"searchKey" : name,
				"searchValue" : value
			}); */
				
			 switch (name)
			 {
			 case 'cx':
			 $('#dg').datagrid('load',{
			 cx:value
			 });
			 break;
			 case 'miaoshu': 
			 $('#dg').datagrid('load',{
			 miaoshu:value
			 });
			 break;
			 case 'laiyuan': 
			 $('#dg').datagrid('load',{
			 laiyuan:value
			 });
			 break;
			 case 'yuanyin': 
			 $('#dg').datagrid('load',{
			 yuanyin:value
			 });
			 break;
			 case 'zhenggai': 
			 $('#dg').datagrid('load',{
			 zhenggai:value
			 });
			 break;
			 } 
		},
		menu : '#mm',
		prompt : '请输入搜索内容'
	});

	//对Date的扩展，将 Date 转化为指定格式的String 
	//月(M)、日(d)、小时(h)、分(m)、秒(s)、季度(q) 可以用 1-2 个占位符， 
	//年(y)可以用 1-4 个占位符，毫秒(S)只能用 1 个占位符(是 1-3 位的数字) 
	//例子： 
	//(new Date()).Format("yyyy-MM-dd hh:mm:ss.S") ==> 2006-07-02 08:09:04.423 
	//(new Date()).Format("yyyy-M-d h:m:s.S")      ==> 2006-7-2 8:9:4.18 
	Date.prototype.Format = function(fmt) { //author: meizz 
		var o = {
			"M+" : this.getMonth() + 1, //月份 
			"d+" : this.getDate(), //日 
			"h+" : this.getHours(), //小时 
			"m+" : this.getMinutes(), //分 
			"s+" : this.getSeconds(), //秒 
			"q+" : Math.floor((this.getMonth() + 3) / 3), //季度 
			"S" : this.getMilliseconds()
		//毫秒 
		};
		if (/(y+)/.test(fmt))
			fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "")
					.substr(4 - RegExp.$1.length));
		for ( var k in o)
			if (new RegExp("(" + k + ")").test(fmt))
				fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k])
						: (("00" + o[k]).substr(("" + o[k]).length)));
		return fmt;
	}
	//今天、昨天 白班 夜班
	//打开添加窗口

	function showupload() {
		$('#showupload').window('open'); // open a window 	
	}

	function show_add() {
		 $("#addok").linkbutton("enable");
		var myDate = new Date();
		var date;

		date = new Date(new Date()).Format("yyyy-MM-dd");
		$('#add').window('open'); // open a window 
		$('#add_form').form('load', {
			creattime : date,
			cx : '',
			miaoshu : '',
			yuanyin : '',
			zhenggai : ''});
$("#filegood").attr("value", ""); //清空file文件上传 
$("#filebad").attr("value", ""); //清空file文件上传  
$("#GoodImgPr").attr("src", "/timer/Public/images/nopic.gif");
$("#BadImgPr").attr("src", "/timer/Public/images/nopic.gif");
}


function showpic() {

		var row = $('#dg').datagrid("getSelected");

		if (row) {
	$('#showpic').dialog("open").dialog('setTitle', '&nbsp;&nbsp;图片浏览');
	
			
			var url = row.file_big_img;
			
			var Aurl=url.split("Fdivide");
			var urlOK="";
			var urlCW="";
			if(Aurl[0]){
				var urlOK=Aurl[0];
				$("#picshowOK").html(
						'<img id="imageFullScreenOK"    src=/timer/public/' + urlOK
								+ '   alt=' + urlOK + '/>');

					$('#imageFullScreenOK').smartZoom({
						'containerClass' : 'zoomableContainer'
					}); 
			}else{
				$("#photo_viewOK").html(
				'此处没有图片！！！');
				
			}
			if(Aurl[1]){
				var urlCW=Aurl[1];
				$("#picshowCW").html(
						'<img id="imageFullScreenCW"    src=/timer/public/' + urlCW
								+ '  alt=' + urlCW + '/>');

			$('#imageFullScreenCW').smartZoom({
					'containerClass' : 'zoomableContainer'
				}); 
			}else{
				$("#photo_viewCW").html(
				'此处没有图片！！！');
			}
	
			
			
		
		} else {
			$.messager.alert("请选择要查看的记录", "请选择要查看的记录！", "info");
		}

	}
	function reload() {
		$('#dg').datagrid('reload', {   
		    cx: '' 
		});
	}
	function add() {
 $("#addok").linkbutton("disable");
		$('#add_form').form('submit', {

			url : '/timer/index.php/Home/Quality/add_quality',

			success : function(data) {
				$("#dg").datagrid("reload");

				$.messager.alert('添加项目', data, 'info');
				$('#add').dialog('close')

			}
		});
	}

	//删除		
	function dele() {
		var row = $('#dg').datagrid("getSelected");
		if (row.userid == "<?php echo ($_SESSION[ 'uid']); ?>" || "<?php echo ($_SESSION[ 'group_id']); ?>"=="1" )  {
			if (row) {
				$.messager.confirm('确认', '您确定要删除此项目吗?', function(r) {
					if (r) {
						$.post('/timer/index.php/Home/Quality/del', {
							id : row.id
						}, function(data) {
							if (data) {
								$.messager.alert('删除项目', data, 'info');
								$("#dg").datagrid("reload");
							} else {
								$.messager.show({ // show error message  
									title : '错误',
									msg : result.errorMsg
								});

							}
						}, 'text');
					}
				});
			} else {
				$.messager.alert("请选择", "请选择要删除的项目！", "info");
			}

		} else {

			$.messager.alert("无法删除", "此服务记录非您创建，无法删除！", "info");
		}

	}

	function show_edit() {

		var row = $('#dg').datagrid("getSelected");

		if (row) {

			$("#edit").dialog("open").dialog('setTitle', '&nbsp;&nbsp;编辑记录');

			$("#edit_form").form("load", row);

		} else {
			$.messager.alert("请选择要编辑的行", "请选择要编辑的行！", "info");
		}

	}
	//查看项目，范建鹏2015年1月19日
	function view() {

		var row = $('#dg').datagrid("getSelected");

		if (row) {

			$("#view").dialog("open").dialog('setTitle', '&nbsp;&nbsp;查看记录');
			$("#cx_view").html(row.cx);
var url = row.file_big_img;
			
			var Aurl=url.split("Fdivide");
			var urlOK="";
			var urlCW="";
	
			if(Aurl[0]){
				var urlOK=Aurl[0];
			
				$("#photo_viewOK").html(
						  '<img id="imageFullScreen1OK"    src=/timer/public/' + urlOK
							+ ' alt=' + urlCW + '/>'
								);
				
				$("#photo_viewOK").click(function(){
					$(this).smartZoom({
						'containerClass' : 'zoomableContainer'
					}); 
					});

			/* 	$('#imageFullScreen1OK').smartZoom({
					'containerClass' : 'zoomableContainer'
				});  */
			}else{
				$("#photo_viewOK").html(
						'此处没有图片！！！');
			}
			if(Aurl[1]){
				var urlCW=Aurl[1];		
				$("#photo_viewCW").html(
						  '<img id="imageFullScreen1CW"   src=/timer/public/' + urlCW
							+ ' alt=' + urlCW + '/>'				
				);
				$("#photo_viewCW").click(function(){
					$('#imageFullScreen1CW').smartZoom({
						'containerClass' : 'zoomableContainer'
					}); 
					});

				/*  $('#imageFullScreen1CW').smartZoom({
					'containerClass' : 'zoomableContainer'
				});  */ 
			}else{
				$("#photo_viewCW").html(
						'此处没有图片！！！');
			}

			$("#creattime_view").html(row.creattime);

			$("#zrdw_view").html(row.zrdw);
			$("#laiyuan_view").html(row.laiyuan);
			$("#miaoshu_view").html(row.miaoshu);
			$("#yuanyin_view").html(row.yuanyin);
			$("#zhenggai_view").html(row.zhenggai);
			$("#pinlun_view").html(row.pinglun);

		} else {
			$.messager.alert("请选择要查看的记录", "请选择要查看的记录！", "info");
		}

	}
 	function edit() {
		var row = $("#dg").datagrid("getSelected");

		$('#edit_form').form('submit', {
			type:'POST',
			 url : '/timer/index.php/Home/Quality/edit',
			success : function(data) {
				$("#dg").datagrid("reload");
				$.messager.alert('编辑质量信息', data, 'info');
				$('#edit').dialog('close')

			}
		});
	} 

	function page() {
		return $('#dg').datagrid('options').pageNumber;
	}
	function pagesize() {
		return $('#dg').datagrid('options').pagesize;
	}
	function excel() {
		
		var grid = $('#dg');  
		var options = grid.datagrid('getPager').data("pagination").options; 
		var pageNumber = options.pageNumber;  
		var pageSize=options.pageSize; 
		window.location.href='/timer/index.php/Home/Quality/out/page/'+pageNumber+'/pagesize/'+pageSize;	
	}
	
	function down(){
		var row = $("#dg").datagrid("getSelected");
		var id=row.id;	
		window.location.href='/timer/index.php/Home/Quality/down/id/'+id;
	}
	function show_pinlun() {

		var row = $('#dg').datagrid("getSelected");
		
		if (row) {

			
			$('#pl').window('open');
			$("#hideid").val(row.id);
			$("#hidepl").val(row.pinglun);
			


		} else {
			$.messager.alert("请选择要进行评论的记录", "请选择要评论的记录！", "info");
		}

	}

	function print_view() {
		$("#printview").jqprint({
			debug : true,
			printContainer : true
		});
	}


function pinglun(){
		 var row = $("#dg").datagrid("getSelected");

			$('#add_pl').form('submit', {
				type:'POST',
				 url : '/timer/index.php/Home/Quality/pinglun',
				success : function(data) {
					$("#dg").datagrid("reload");
					$.messager.alert('评论质量信息', data, 'info');
					$('#pl').dialog('close')

				}
			});
	 }

</script>