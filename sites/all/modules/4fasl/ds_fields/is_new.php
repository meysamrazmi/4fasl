<?php
if(!function_exists('is_new_func')){
  function is_new_func($nid){
    $loged_in_user = user_load($GLOBALS['user']->uid);
    $path = explode("/", current_path());
    if( ($path[0] == 'user' || $path[0] == 'users') && isset($path[1]) && is_numeric($path[1])){
      $user = user_load(intval($path[1]));
    }else{
      $user = $loged_in_user;
    }

    $history=	"SELECT DISTINCT node.nid AS nid, history.timestamp AS history_timestamp, node.changed AS node_changed	FROM node node LEFT JOIN history history ON node.nid = history.nid AND history.uid = :uid	WHERE node.nid = :nid";

    $nodecounter = 'SELECT max(viewc.timestamp) AS viewc_timestamp, node.changed AS node_changed   
		FROM node node 
		LEFT JOIN nodeviewcount viewc ON node.nid = viewc.nid
		WHERE node.nid = :nid AND viewc.uid = :uid';
    $result = db_query($history , array(':uid' => $user->uid , ':nid' => $nid))->fetchObject();

    if(isset($result->history_timestamp) && $result->history_timestamp > $result->node_changed){
      print '<span class="seen-content">دیده شده<span>';
    }else{
      $result = db_query($nodecounter , array(':uid' => $user->uid , ':nid' => $nid))->fetchObject();
      if(isset($result->viewc_timestamp) && $result->viewc_timestamp > $result->node_changed){
        print '<span class="seen-content">دیده شده<span>';
      }else{
        print '<span class="new-content">جدید<span>';
      }
    }
  }
}
