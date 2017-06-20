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
//将chinese元素插入到language集合中
if($redis->sadd('language','chinese'))
{
   echo "chinese元素成功插入到language集合中。".br();
}
else 
{
   echo "chinese元素已经存储在与".br();
}
//引文上面已经添加了chinse，所有应该返回0
if($redis->sadd('language','chinese'))
{
   echo "chinese元素成功插入到language集合中。".br();
}
else 
{
   echo "chinese元素已经存储在与".br();
}
//添加english和japanese到集合中
$redis->sadd("language","english");
$redis->sadd("language","japanese");
//现在结合中有三个元素，使用smembers取出集合
echo "languag集合中有以下元素：".br();
$languageSet=$redis->smembers("language");
var_dump($languageSet);
//使用sismember检查元素是否存在集合中,成功返回true,否则false
if($redis->sismember("language","chinese"))
{
	echo br()."chinese存在language集合中。".br();
}
else
{
	echo "chinese不存在。".br();
}
//使用srem删除language集合中的chinese元素，成功返回个数1
if($redis->srem("language","chinese")>0)
{
	echo "chinese删除成功！".br();
}
else 
{
	echo "chinese删除失败或不存在。".br();
}
//再次srem删除language集合中的chinese元素，因为上面已经删除，所以不能存在该元素，返回0.
if(!$redis->srem("language","chinese")>0)
{
	echo "chinese不存在language集合中。".br();
}
else 
{
	echo "chinese删除成功！".br();
}

?>