<?php
header("Content-Type:text/html;charset=utf-8;"); 
   //创建Redis对象
   $redis = new Redis(); //实例化
   //连接到redis服务器
   $redis->connect('127.0.0.1', 6379); 
   //连接成功
   echo "Redis服务器连接成功！<br/>"; 
   //设置值，成功返回boolean true
   if($redis->set("name","zhangsan"))
   {
   	 //获取值
   	 echo "设置值成功：name的值是：".$redis->get("name")."<br/>";
   }
   else
   {
   	 echo "设置值失败！";
   }
   //删除值$redis->delete()
   if($redis->delete("name"))
   {
   	 //删除后，无法获取值返回false
   	 if(!$redis->get("name"))
   	 {
   	 	echo "删除值成功.".$redis->get("name")."<br/>";
   	 }
   }
   else
   {
   	 echo "删除值失败！"."<br/>";
   }
   
?>