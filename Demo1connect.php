<?php
header("Content-Type:text/html;charset=utf-8;"); 
   //创建Redis对象
   $redis = new Redis(); //实例化
   //连接到redis服务器
   $redis->connect('127.0.0.1', 6379); 
   //连接成功
   echo "Redis服务器连接成功！<br/>"; 
   //检查Redis服务器的状态 
   echo "Redis服务器状态为: ".$redis->ping(); 
?>