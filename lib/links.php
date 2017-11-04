<?php //本文のリンク設定

//本文の外部リンクの置換
add_filter('the_content', 'replace_anchor_links');
if ( !function_exists( 'replace_anchor_links' ) ):
function replace_anchor_links($the_content) {
  $res = preg_match_all('{<a[^>]+?>[^<]+?</a>}i', $the_content, $m);
  if ($res && $m[0]) {
    var_dump($m);
  }
  foreach ($m[0] as $value) {
    //var_dump(strpos('//'.get_the_site_domain(), $value));
    // var_dump('//'.get_the_site_domain());
    // var_dump($value);
    if (strpos($value, '//'.get_the_site_domain()) !== false) {//内部リンクの場合
      # code...
    } else { //外部リンクの場合
      //初期値の設定
      $old_a = $value;
      $new_a = $value;

      //リンクの開き方を変更する場合
      if (!get_external_link_open_type_default()) {

        //外部リンクの開き方を変更する場合はtarget属性のクリアを行う
        $new_a = preg_replace('/ *target="[^"]*?"/i', '', $new_a);
        switch (get_external_link_open_type()) {
          case 'blank':
            $new_a = str_replace('<a', '<a target="_blank"', $new_a);
            break;
          case 'self':
            $new_a = str_replace('<a', '<a target="_self"', $new_a);
            break;
        }
      }


      //何かしらの変更があった場合
      if ($old_a != $new_a) {
        $the_content = str_replace($old_a, $new_a, $the_content);
      }

    }

  }
  return $the_content;
}
endif;

//ビジュアルエディターでrel="noopener noreferrer"自動付加の解除
add_filter('tiny_mce_before_init','tinymce_allow_unsafe_link_target');
if ( !function_exists( 'tinymce_allow_unsafe_link_target' ) ):
function tinymce_allow_unsafe_link_target( $mce_init ) {
 $mce_init['allow_unsafe_link_target'] = true;
 return $mce_init;
}
endif;
