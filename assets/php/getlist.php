<?php
$arr = $_GET;
//print_r($arr);
$newarr = array();

require_once "myphp-backup-master/myphp-backup.php";

function __autoload($class_name){
    include "includes/" . $class_name . ".php";
}

/* if(is_ajax_request()){
    call_user_func($_GET["act"], array($_GET["arg"]));
} */

if ($_SERVER["REQUEST_METHOD"] == "GET") {
	call_user_func($_GET["act"], $_GET["arg"]);
}

function select_operation($arg){
    //echo 'ewere';
    //$arg[0] != 'products' ? print_r($arg) : 'null';
    // /print_r($args);
    $dbobj = new Db_object();
    $args = json_decode($arg, true);
    //print_r($args);
    if(!isset($args['qcol'])){
        $users = Db_object::select_object($args['tb']);
    }else{
        $users = Db_object::select_object($args['tb'],$args['qcol'],$args['qval'],$args['sign']);
    }
    
    //print_r($users[3]);
    !empty($users[3]) ? print json_encode($users[3]) : null;
}

function add_operation($arg){
    $arg = str_replace("^", "&", $arg[0]);
    $arr = array();
    parse_str($arg, $arr);
    //print_r($arr);
    $class_name = array_pop($arr);
    //print_r($class_name);
    $dbObj = new $class_name();
    echo $dbObj->insert_object($arr);
    backup($_GET["sess"]);
}

function update_operation($arg){
    $arg = str_replace("^", "&", $arg[0]);
    $arr = array();
    parse_str($arg, $arr);
    /*print_r($arr);*/
    $class_name = array_pop($arr);
    //print_r($class_name);
    $dbObj = new $class_name();
    echo $dbObj->update_object($arr);
    backup($_GET["sess"]);
}

function delete_operation($arg){
    $arg = str_replace("^", "&", $arg[0]);
    $arr = array();
    parse_str($arg, $arr);
    print_r($arr);
    $class_name = array_pop($arr);
    print_r($class_name);
    $dbObj = new $class_name();
    $dbObj->delete_object($arr);
    backup($_GET["sess"]);
}

function is_ajax_request(){
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest';
}

?>
