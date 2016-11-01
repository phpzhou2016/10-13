<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/10/13 0013
 * Time: 下午 10:00
 */

//主类
    class Main{
        private $_index;
        private $_send;
        public function __construct($_index ='')
        {
            $this ->_index = $_index;
          if(isset($_POST['send'])){
               $this ->_send = $_POST['send'];
          }else{
              $this ->_send ='';
          }


        }

        //总管
        public function _run(){
              $this -> _send();
            include $this->_ui();

        }

        private function _ui()
        {
            if (empty($this->_index) || !file_exists($this -> _index.'.inc.php')) {
                $this->_index = 'start';
            }
            return $this ->_index.'.inc.php';

        }
        private function _send(){

          switch ($this->_send){
              case '注册':
                  $this ->_exec(new Reg($no="",$_POST['username'],$_POST['password'],$_POST['notPassWord'],$_POST['email'],$_POST['age'],$_POST['sex']));
                  break;
              case '登录':
                   $this ->_exec(new Login($_POST['username'],$_POST['password']));
                  break;


          }

        }
        private function  _exec($_class){
            $_class ->_query();
        }
    }

?>

