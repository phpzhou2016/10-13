<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/13 0013
 * Time: 下午 11:17
 */
class Login extends User{

    public function __construct($_username,$_password)
    {
        $this-> _username =$_username;
        $this-> _password =md5($_password);

    }


        public function _query()
        {

            if(!$link=mysqli_connect('localhost','root','','te_2016')){
                echo "连接错误";
            }
           // mysqli_select_db($link,'te_2016');
           $sql = "select name_p,password_p from user WHERE name_p='$this->_username'";

            if(!$result=mysqli_query($link,$sql)){
                echo mysqli_error($link)."执行失败";
                        }
            if(!$res=mysqli_fetch_assoc($result)){
                echo "结果集错误";
            }



            if($this-> _username==$res['name_p']&&$this->_password==$res['password_p']) {
                echo "登录成功"."<br />";
                echo "用户名："." $res[name_p]"."<br />";
                echo  "密码："." $res[password_p]"."<br />";

                }else{
                    echo '登录失败';

            }

        }
        public function _check(){
            echo '';

        }

    }
?>

