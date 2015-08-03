<?php

class ERROR{
    /**
     * Created by PhpStorm.
     * User: kadir
     * Date: 16.03.2014
     * Time: 23:46
     */
    public $session;
    function __construct(){

        yukleyici('data','session/Session');
        $this->session = new SESSION();

    }
    function set_error($error){

        $this->session->set_info('ERRORS','ERROR',$error);

    }
    function set_warning($error){

        $this->session->set_info('ERRORS','WARNING',$error);

    }
    function echo_error(){

        if(ERROR_REPORT){

            echo '<ul class="error" >'.$this->show_error($this->session->get_info('ERRORS','ERROR')).'</ul>';
            echo '<ul class="warning" >'.$this->show_warning($this->session->get_info('ERRORS','WARNING')).'</ul>';

        }
    }
    function show_error($error){

            foreach ($error as $error_){
                echo '<li>HATA : '. $error_.'</li>';
            }
    }
    function show_warning($error){

            foreach ($error as $error_){
                echo '<li>DİKKAT : '. $error_.'</li>';
            }
    }
}
?>