<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/3/20/020
 * Time: 17:24
 */
include 'connect.php';     //调用数据库连接文件

$stu_id=$_POST['stu_id'];
$password=$_POST['password'];   //接收前台传递过来的post值
$email=$_POST['email'];
if ($stu_id == "" || $password == "")       //判断用户名和密码是否为空
{
    echo "<script>alert('请输入用户名和密码');history.back();</script>";
}
else
{
    $sql="SELECT stu_id FROM user WHERE stu_id = '$stu_id'";
    $res=$conn->query($sql);
    $row=$res->fetch_object();
    if ($row)                   //判断用户名是否存在
    {
        echo "<script>alert('用户名已存在');history.back()</script>";
    }
    else
    {
        $inssql="INSERT INTO user(email,stu_id,password) VALUES('$email','$stu_id','$password')";
        $insres=$conn->query($inssql);      //插入用户信息
        if ($insres)
        {
            echo "<script>alert('注册成功');location.href='login.html';</script>";
        }
        else
        {
            echo "<script>alert('注册失败');history.back();</script>";
        }
    }
}
?>