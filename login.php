<?php
    include 'connect.php';
    $stu_id=$_POST['stu_id'];
    $password=$_POST['password'];
if ($stu_id == "" || $password == "")      //判断用户名和密码是否为空
{
    echo "<script>alert('请输入用户名和密码');history.back();</script>";
}
else
{
    $sql="SELECT stu_id,password FROM user WHERE sut_id = '$stu_id'";
    $res=$conn->query($sql);
    $row=$res->fetch_object();
    if ($row->stu_id == $stu_id)
    {                                                //查询是否有此用户
        if ($row->password == $password)              //判断密码是否正确
        {
            echo "登录成功";
        }
        else
        {
            echo "<script>alert('密码错误');history.back();</script>";
        }
    }
    else
    {
        echo "<script>alert('用户不存在');history.back();</script>";
    }
}

?>