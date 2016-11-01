<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/13 0013
 * Time: 下午 11:14
 */


abstract class User{

    protected $_username;
    protected $_password;
    protected $_notPassWord;
    protected $_age;
    protected $_sex;
    protected $_email;



    abstract function _query();
    abstract function _check();


}


?>

