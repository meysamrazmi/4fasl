<?php
function user_notification($uid){
  $user = user_load($uid);

	// Replace 'inbox' with 'sent' to display sent messages or 'list' to display all messages.
	$query = _privatemsg_assemble_query('list', $user, 'inbox');
	$theme_variables = $list_parts = $list = array();
	$count=0;
	foreach ($query->execute() as $thread) {
    if ($count < privatemsg_unread_count($user)) {
      // Generate a link with the subject as title that points to the view message page.
      // $list[] = l($thread->subject, 'messages/view/'. $thread->thread_id);
      // take a look at $thread to see if what you needed is already there, so you can bypass other theming functions (you probably shouldnt)

      $list_parts = array();
      // proper solution:
      $theme_variables = array('thread' => (array)$thread);
      $subject = theme('privatemsg_list_field__subject', $theme_variables);
      $list_parts[] = $subject['data'];
      // $list_parts[]=t('from');
      // $participants=theme('privatemsg_list_field__participants', $theme_variables);
      // $list_parts[]=$participants['data'];
      $last_updated = theme('privatemsg_list_field__last_updated', $theme_variables);
      $list_parts[] = '<div class="date">'. $last_updated['data'] .'</div>';
      $list[] = implode(' ',$list_parts);
      $count++;
    } else {
      break;
    }
  }

	// mdump($theme_variables, true);
	// Display list as a themed item_list.
	if(isset($list[0])){
    print '<h4 class="notification-title">پیام ها'.
      '<span class="message-num" style="margin: 4px 10px 0 0 !important;">'. count($list) .'</span>'.
      '</h4>';
    print theme('item_list', array('items'=>$list));
  }
}
?>