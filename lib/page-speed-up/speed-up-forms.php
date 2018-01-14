<div class="metabox-holder">

<!-- ブラウザキャッシュ -->
<div id="speed-up" class="postbox">
  <h2 class="hndle"><?php _e( 'ブラウザキャッシュ', THEME_NAME ) ?></h2>
  <div class="inside">

    <p><?php _e( 'ブラウザキャッシュを設定します。ブラウザキャッシュを設定することで、次回からサーバーではなくローカルのリソースファイルが読み込まれることになるので高速化が図れます。', THEME_NAME ) ?></p>

    <table class="form-table">
      <tbody>

        <!-- ブラウザキャッシュ  -->
        <tr>
          <th scope="row">
            <?php generate_label_tag(OP_BROWSER_CACHE_ENABLE, __( 'ブラウザキャッシュ', THEME_NAME ) ); ?>
          </th>
          <td>
            <?php
            generate_checkbox_tag(OP_BROWSER_CACHE_ENABLE , is_browser_cache_enable(), __( 'ブラウザキャッシュの有効化', THEME_NAME ));
            generate_tips_tag(__( 'ブラウザキャッシュを有効化することで、訪問者が2回目以降リソースファイルをサーバーから読み込む時間を軽減できます。', THEME_NAME ));
            ?>
          </td>
        </tr>

      </tbody>
    </table>

  </div>
</div>




<!-- 縮小化 -->
<div id="speed-up" class="postbox">
  <h2 class="hndle"><?php _e( '縮小化', THEME_NAME ) ?></h2>
  <div class="inside">

    <p><?php _e( 'HTML、CSS、JavaScriptの縮小化を行うことにより転送サイズを減らし高速化を図ります。AMPページも縮小化されます。', THEME_NAME ) ?></p>

    <table class="form-table">
      <tbody>

        <!-- HTML縮小化  -->
        <tr>
          <th scope="row">
            <?php generate_label_tag(OP_HTML_MINIFY_ENABLE, __( 'HTML縮小化', THEME_NAME ) ); ?>
          </th>
          <td>
            <?php
            generate_checkbox_tag(OP_HTML_MINIFY_ENABLE , is_html_minify_enable(), __( 'HTMLを縮小化する', THEME_NAME ));
            generate_tips_tag(__( 'HTMLの余分な改行や余白を削除することによりソースコードのサイズを減らします。', THEME_NAME ));
            ?>
            <!-- <div class="indent">
              <?php
              generate_checkbox_tag(OP_HTML_MINIFY_AMP_ENABLE , is_html_minify_amp_enable(), __( 'AMPページのHTMLも縮小化', THEME_NAME ));
              generate_tips_tag(__( 'AMPページのソースコードを縮小化します。', THEME_NAME ));
               ?>
            </div> -->
          </td>
        </tr>

        <!-- CSS縮小化  -->
        <tr>
          <th scope="row">
            <?php generate_label_tag(OP_CSS_MINIFY_ENABLE, __( 'CSS縮小化', THEME_NAME ) ); ?>
          </th>
          <td>
            <?php
            generate_checkbox_tag(OP_CSS_MINIFY_ENABLE , is_css_minify_enable(), __( 'CSSを縮小化する', THEME_NAME ));
            generate_tips_tag(__( 'CSSの余分な改行や余白を削除することによりソースコードのサイズを減らします。', THEME_NAME ));

            generate_textarea_tag(OP_CSS_MINIFY_EXCLUDE_LIST, get_css_minify_exclude_list(), __( '縮小化除外CSSファイルの文字列を入力', THEME_NAME ) , 3);
            generate_tips_tag(__( '縮小化しないCSSファイルのパス、もしくはパスの一部を改行で区切って入力してください。', THEME_NAME ));

            ?>
          </td>
        </tr>

        <!-- JavaScript縮小化  -->
        <tr>
          <th scope="row">
            <?php generate_label_tag(OP_JS_MINIFY_ENABLE, __( 'JavaScript縮小化', THEME_NAME ) ); ?>
          </th>
          <td>
            <?php
            generate_checkbox_tag(OP_JS_MINIFY_ENABLE , is_js_minify_enable(), __( 'JavaScriptを縮小化する', THEME_NAME ));
            generate_tips_tag(__( 'JavaScript（jQuery）の余分な改行や余白を削除することによりソースコードのサイズを減らします。', THEME_NAME ));

            generate_textarea_tag(OP_JS_MINIFY_EXCLUDE_LIST, get_js_minify_exclude_list(), __( '縮小化除外JavaScriptファイルの文字列を入力', THEME_NAME ) , 3);
            generate_tips_tag(__( '縮小化しないJavaScriptファイルのパス、もしくはパスの一部を改行で区切って入力してください。', THEME_NAME ));

            ?>
          </td>
        </tr>

      </tbody>
    </table>

  </div>
</div>

</div><!-- /.metabox-holder -->