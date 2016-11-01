<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/13 0013
 * Time: 下午 11:17
 */
class Reg extends User{

    public function __construct($no,$_username,$_password,$_notPassWord,$_email,$_age,$_sex)
    {
        $this-> _username =str_replace(' ','',$_username);
        $this-> _password =md5($_password);
        $this-> _notPassWord =md5($_notPassWord);
        $this-> _age =$_age;
        $this-> _sex =$_sex;
        $this-> _email = str_replace(' ','',$_email);




    }


    public function _query()
        {
           //$this->_con();

            $link=  mysqli_connect('localhost','root','191977941','te_2016');
            //mysqli_select_db($link,'te_2016');

            $t=date('Y-m-d H:i:s', time());

            $this->_check();
            //var_dump($this-> _username,$this-> _password,$this-> _age ,$this-> _sex ,$this-> _email );
           // d41d8cd98f00b204e9800998ecf8427e


            $sql = "insert into user  values(null,'$this->_username','$this->_notPassWord','$this->_age','$this->_sex' ,'$this->_email','$t');";
            //echo $sql;
            if(!mysqli_query($link,$sql)) {
                die(mysqli_error($link));
            }else{
                echo '<script language="JavaScript">alert("注册成功");location.href="index.php";</script>';
                //sleep(2); //两秒后执行下面代码
               // header('Location: ./index.php');
            }


        }





        public function _check(){
            if(!(empty($this->_username))){
                if (((strlen($str = $this->_username) > 11) || (strlen($str = $this->_username) < 3))) {
                    echo '<script language="JavaScript">alert("用户名错误");location.href="index.php?index=reg";</script>';
                    die();
                    //header('Location: ./index.php?index=reg');
                }
                if(!empty($this->_password)) {
                    if ((($this->_password) !== ($this->_notPassWord))) {
                        echo '<script language="JavaScript">alert("确认密码设置错误");location.href="index.php?index=reg";</script>';
                        header('Location: ./index.php?index=reg');
                        die();
                    }
                    if( !empty($this->_age) ) {
                       if(is_numeric($this->_age)){
                            if ($this->_age > 120||$this->_age<0) {
                                echo '<script language="JavaScript">alert("年龄错误");location.href="index.php?index=reg";</script>';
                                header('Location: ./index.php?index=reg');
                                die();
                            }
                           /*if($this-> _age!=="man"|| $this-> _age!=="female"){
                                echo '<script language="JavaScript">alert("性别错误");location.href="index.php?index=reg";</script>';
                                header('Location: ./index.php?index=reg');
                                die();

                            }*/
                       }else{
                           echo '<script language="JavaScript">alert("年龄设置错误");location.href="index.php?index=reg";</script>';
                           header('Location: ./index.php?index=reg');
                           die();

                       }
                    }else{
                        echo '<script language="JavaScript">alert("年龄设置错误");location.href="index.php?index=reg";</script>';
                        header('Location: ./index.php?index=reg');
                        die();

                    }

                }else{
                    echo '<script language="JavaScript">alert("密码设置错误");location.href="index.php?index=reg";</script>';
                    header('Location: ./index.php?index=reg');
                    die();
                }

            }else{
                header('Location: ./index.php?index=reg');
                die();
            }







        }
    public function _con(){
       //global $link ;
        $link =mysqli_connect('localhost','root','');
        if(!$link){
            echo "数据库连接失败";
            exit();

        }



       /// mysqli_query($link,)




    }
}


?>