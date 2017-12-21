<div class="metabox-holder">

<!-- 管理画面設定 -->
<div id="admin" class="postbox">
  <h2 class="hndle"><?php _e( '管理画面設定', THEME_NAME ) ?></h2>
  <div class="inside">

    <p><?php _e( '管理画面の機能設定です。', THEME_NAME ) ?></p>

    <table class="form-table">
      <tbody>

        <!-- 管理者向け設定  -->
        <tr>
          <th scope="row">
            <?php generate_label_tag('', __( '管理者向け設定', THEME_NAME ) ); ?>
          </th>
          <td>
            <?php

            //アドミンバーに独自管理メニューを表示
            generate_checkbox_tag(OP_ADMIN_TOOL_MENU_VISIBLE, is_admin_tool_menu_visible(), __( 'アドミンバーに独自管理メニューを表示', THEME_NAME ));
            generate_tips_tag(__( '管理者バーに手軽に設定画面にアクセスできるメニューを表示します。', THEME_NAME ));

            //ページ公開前に確認アラートを出す
            generate_checkbox_tag(OP_CONFIRMATION_BEFORE_PUBLISH, is_confirmation_before_publish(), __( 'ページ公開前に確認アラートを出す', THEME_NAME ));
            generate_tips_tag(__( '記事を投稿する前に確認ダイアログを表示します。', THEME_NAME ));

            //タイトル等の文字数カウンター表示
            generate_checkbox_tag(OP_ADMIN_EDITOR_COUNTER_VISIBLE, is_admin_editor_counter_visible(), __( 'タイトル等の文字数カウンター表示', THEME_NAME ));
            generate_tips_tag(__( 'タイトルや、SEOタイトル、メタディスクリプションの文字数を表示します。', THEME_NAME ));

            ?>


          </td>
        </tr>


      </tbody>
    </table>

  </div>
</div>



<!-- 管理者パネル -->
<div id="admin-panel" class="postbox">
  <h2 class="hndle"><?php _e( '管理者パネル', THEME_NAME ) ?></h2>
  <div class="inside">

    <p><?php _e( '管理者向けのPV表示や編集リンクの表示です。', THEME_NAME ) ?></p>

    <table class="form-table">
      <tbody>

        <!-- 管理者パネルの表示  -->
        <tr>
          <th scope="row">
            <?php generate_label_tag(OP_ADMIN_PANEL_VISIBLE, __( '管理者パネルの表示', THEME_NAME ) ); ?>
          </th>
          <td>
            <?php
            generate_checkbox_tag(OP_ADMIN_PANEL_VISIBLE, is_admin_panel_visible(), __( '管理者パネルを表示する', THEME_NAME ));
            generate_tips_tag(__( '投稿・固定ページ下部に管理者向けの情報をエリアを表示します。', THEME_NAME ));
            ?>
          </td>
        </tr>

        <!-- PVの表示  -->
        <tr>
          <th scope="row">
            <?php generate_label_tag(OP_ADMIN_PANEL_PV_AREA_VISIBLE, __( 'PVの表示', THEME_NAME ) ); ?>
          </th>
          <td>
            <?php
            generate_checkbox_tag(OP_ADMIN_PANEL_PV_AREA_VISIBLE, is_admin_panel_pv_area_visible(), __( 'PVエリアを表示する', THEME_NAME ));
            generate_tips_tag(__( '管理者パネル内のPVエリアを表示します。', THEME_NAME ));
            ?>
            <div class="indent">
              <spag><?php _e( 'アクセス集計方法', THEME_NAME ) ?></span>
              <?php
              $theme = '';
              //テーマのアクセス取得が有効でないとき
              if (!is_access_count_enable()) {
                $theme = '<span class="red">'.__( '※テーマのアクセス集計が有効になっていません。', THEME_NAME ).'</span>';
              }
              $jet = '';
              //Jetpackの統計機能が有効でないとき
              if (!is_jetpack_stats_module_active()) {
                $jet = '<span class="red">'.__( '※Jetpackの統計機能が有効になっていません。', THEME_NAME ).'</span>';
              }
              $options = array(
                THEME_NAME => __( 'テーマ独自', THEME_NAME ).$theme,
                'jetpack' => __( 'Jetpack', THEME_NAME ).$jet,
              );
              generate_radiobox_tag(OP_ADMIN_PANEL_PV_TYPE, $options, get_admin_panel_pv_type());
              generate_tips_tag(__( '管理者パネルで表示するPVの取得方法を選択します。', THEME_NAME ));

               ?>
            </div>
          </td>
        </tr>


        <!-- 編集エリアの表示  -->
        <tr>
          <th scope="row">
            <?php generate_label_tag(OP_ADMIN_PANEL_EDIT_AREA_VISIBLE, __( '編集エリアの表示', THEME_NAME ) ); ?>
          </th>
          <td>
            <?php
            generate_checkbox_tag(OP_ADMIN_PANEL_EDIT_AREA_VISIBLE, is_admin_panel_edit_area_visible(), __( '編集エリアを表示する', THEME_NAME ));
            generate_tips_tag(__( '管理者パネル内の編集エリアを表示します。', THEME_NAME ));
            ?>
            <div class="indent">
              <?php
              generate_checkbox_tag(OP_ADMIN_PANEL_WP_EDIT_VISIBLE , is_admin_panel_wp_edit_visible(), __( '投稿編集リンクの表示', THEME_NAME ));
              generate_tips_tag(__( 'Wordpress管理画面で投稿内容を編集するためのリンクです。', THEME_NAME ));

              generate_checkbox_tag(OP_ADMIN_PANEL_WLW_EDIT_VISIBLE , is_admin_panel_wlw_edit_visible(), __( 'WLW編集リンクの表示', THEME_NAME ));
              generate_tips_tag(__( 'Windows Live Writerで投稿内容を編集するためのリンクです。', THEME_NAME ));
               ?>
            </div>
          </td>
        </tr>


      </tbody>
    </table>

  </div>
</div>



</div><!-- /.metabox-holder -->