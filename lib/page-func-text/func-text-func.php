<?php //関数テキスト関係の関数

//関数テキストテーブルのバージョン
define('FUNCTION_TEXTS_TABLE_VERSION', '0.0');
define('FUNCTION_TEXTS_TABLE_NAME',  $wpdb->prefix . THEME_NAME . '_function_texts');
//_v(FUNCTION_TEXTS_TABLE_NAME);

//関数テキスト移動用URL
define('FT_LIST_URL',   add_query_arg(array('action' => false,   'id' => false)));
define('FT_NEW_URL',    add_query_arg(array('action' => 'new',   'id' => false)));


//関数テキストテーブルのバージョン取得
define('OP_FUNCTION_TEXTS_TABLE_VERSION', 'function_texts_table_version');
if ( !function_exists( 'get_function_texts_table_version' ) ):
function get_function_texts_table_version(){
  return get_theme_option(OP_FUNCTION_TEXTS_TABLE_VERSION);
}
endif;

//関数テキストテーブルの作成
if ( !function_exists( 'create_function_texts_table' ) ):
function create_function_texts_table() {
  // SQL文でテーブルを作る
  $sql = "CREATE TABLE ".FUNCTION_TEXTS_TABLE_NAME." (
      id mediumint(9) NOT NULL AUTO_INCREMENT,
      date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      modified datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
      title varchar(126),
      text text NOT NULL,
      PRIMARY KEY (id),
      INDEX (title)
    )";
  create_db_table($sql);

  set_theme_mod( OP_FUNCTION_TEXTS_TABLE_VERSION, FUNCTION_TEXTS_TABLE_VERSION );
}
endif;
//create_function_texts_table();

//関数テキストテーブルのアップデート
if ( !function_exists( 'update_function_texts_table' ) ):
function update_function_texts_table() {

  // オプションに登録されたデータベースのバージョンを取得
  $installed_ver = get_function_texts_table_version();
  $now_ver = FUNCTION_TEXTS_TABLE_VERSION;
  if (is_update_db_table($installed_ver, $now_ver)) {
    create_function_texts_table();
  }

  // if ( function_exists( '_v' ) ):
  //   _v(THEME_NAME.'アップデートチェック');
  // endif;
  // // オプションに登録されたデータベースのバージョンを取得
  // $installed_ver = get_function_texts_table_version();
  // $now_ver = FUNCTION_TEXTS_TABLE_VERSION;
  // if ( $installed_ver != $now_ver ) {
  //   if ( function_exists( '_v' ) ):
  //     _v(THEME_NAME.'がアップデートされました');
  //   endif;
  //   create_function_texts_table();
  // }
}
endif;
//update_function_texts_table();

//関数テキストテーブルのアンインストール
if ( !function_exists( 'uninstall_function_texts_table' ) ):
function uninstall_function_texts_table() {
  uninstall_db_table(FUNCTION_TEXTS_TABLE_NAME);
  remove_theme_mod(OP_FUNCTION_TEXTS_TABLE_VERSION);
}
endif;

//関数テキストレコードの取得
if ( !function_exists( 'get_function_texts' ) ):
function get_function_texts( $keyword = null, $order_by = null ) {
  update_function_texts_table();
  $table_name = FUNCTION_TEXTS_TABLE_NAME;
  return get_db_table_records($table_name, 'title', $keyword, $order_by);
  // $where = null;
  // if ($keyword) {
  //   $where = $wpdb->prepare(" WHERE title LIKE %s", '%'.$keyword.'%');
  //   //$where = (" WHERE title LIKE %%$keyword%%");
  // }
  // if ($order_by) {
  //   $order_by = esc_sql(" ORDER BY $order_by");
  // }
  // $query = "SELECT * FROM {$table_name}".
  //             $where.
  //             $order_by;

  // //$query = "SELECT * FROM {$table_name}";
  // //var_dump($query);

  // $records = $wpdb->get_results( $query );

  // return $records;
}
endif;

//関数テキストレコードの取得
if ( !function_exists( 'get_function_text' ) ):
function get_function_text( $id ) {
  global $wpdb;
  $table_name = FUNCTION_TEXTS_TABLE_NAME;

  //$query = ("SELECT * FROM {$table_name}  WHERE id = {intval($id)}");
  $query = $wpdb->prepare("SELECT * FROM {$table_name}  WHERE id = %d", $id);
  //_v($query);

  $record = $wpdb->get_row( $query );
  $record->title = esc_attr(stripslashes_deep($record->title));
  //_v($record->title);
  $record->text = wpautop(stripslashes_deep($record->text));

  return $record;
}
endif;

//関数テキストレコードの取得
if ( !function_exists( 'delete_function_text' ) ):
function delete_function_text( $id ) {
  global $wpdb;
  $table_name = FUNCTION_TEXTS_TABLE_NAME;

  $res = $wpdb->delete( $table_name, array(
      'id' => $id,
    ),
    array('%d')
  );
  return $res;
}
endif;

add_shortcode('ft', 'function_text_shortcode');
if ( !function_exists( 'function_text_shortcode' ) ):
function function_text_shortcode($atts) {
  extract(shortcode_atts(array(
    'id' => 0,
  ), $atts));
  if ($id) {
    if ($recode = get_function_text($id)) {
      return $recode->text;
    }
  }

}
endif;
