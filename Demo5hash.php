<?php
header("Content-Type:text/html;charset=utf-8;");
//实例化redis对象
$redis=new Redis();
//连接redis服务器
$redis->connect("127.0.0.1",6379);
//换行行数
function br()
{
  return "<br/>";
}
echo "连接redis服务器成功.".br();
//使用hset添加键值对到哈希
if($redis->hset("db","db1","mysql"))
{
	echo "db1插入成功。".br();
}
else 
{
	echo "db1已经存在!".br();
}
//再次插入相同的值,返回0，表示已经存在
if(!$redis->hset("db","db1","mysql"))
{
	echo "db1已经存在。".br();
}
//再次往散列中插入两个键值对
$redis->hset("db","db2","redis");
$redis->hset("db","db3","mongodb");
//使用hget获取指定键的值
$value=$redis->hget("db","db1");
echo "db1的值是：".$value.br();
//使用hgetall获取db中所有的元素，返回数组
$hashDb=$redis->hgetall("db");
echo "db的所有元素如下：";
var_dump($hashDb);
echo br()."删除操作：".br();
//使用hdel删除指定键,键之前存在返回1，否则0
if($redis->hdel("db","db1"))
{
	echo "删除db1成功。".br();
}
//再次
if(!$redis->hdel("db","db1"))
{
	echo "db1元素不存在！".br();
}
//再次获取所有元素
echo "再次获取所有哈希元素:".br();
$hashDb1=$redis->hgetall("db");
var_dump($hashDb1);
?>