<?php
header("Content-Type:text/html;charset=utf-8;");
//创建redis对象
$redis=new Redis(); //实例化
//连接redis服务器
$redis->connect("127.0.0.1",6379);
//换行函数
function br()
{
  return "<br/>";
}
echo "Redis服务器连接成功：".$redis->ping().br();
//设置list列表中的值
$values=$redis->rpush("database","mysql");
echo "列表的值是：".br();
var_dump($values);
echo br();
//从列表右边添加值
$redis->rpush("database","redis");
echo br();
$redis->rpush("database","mysql");
echo br();
//获取全不知
$list1=$redis->lrange('database',0,-1);
echo "列表的全部元素是：".br().var_dump($list1).br();
//获取索引为1的元素
$value=$redis->lindex("database",1);
echo "获取索引为1的元素是：".br().var_dump($value).br();
//从左边删除一个元素,成功返回元素的值
$value1=$redis->lpop("database");
echo "删除元素的值是：".br().var_dump($value1).br();
//最后再次获取所有元素
$list2=$redis->lrange("database",0,-1);
echo "现在列表的所有元素为：".br().var_dump($list2).br();

?>



