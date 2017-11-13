<article id="post-<?php the_ID(); ?>" <?php post_class('article') ?> role="article" itemscope="" itemprop="blogPost" itemtype="http://schema.org/BlogPosting">
  <?php
  if ( have_posts() ) {
    while ( have_posts() ) {
      the_post();?>

      <div class="cta-box">
        <div class="cta-heading">
          Call to Action見出し
        </div>
        <div class="cta-content">
          <div class="cta-thumb">
            <img src="http://cocoon.dev/wp-content/uploads/2017/09/cup.jpeg" alt="cup.jpeg (JPEG 画像, 1260x681 px)" />
          </div>
          <div class="cta-message">
            <p>すると作成済みのCTAのタイトルが表示されるので選択しよう。最後に更新内容を保存しないとCTAは反映されないので、ページ上部の「更新」ボタンを忘れずにクリックしよう。これでCTAが表示される。
２−２．各記事に独自のCTAを設定する</p>
            <p>CTA設定にはもう一つ、記事に直接 CTA を作成して設置することができる。</p>
            <p>下図の通り先ほどの項目にある「このページ独自のCTAを作る」を選択するとCTAの入力欄が表示される。ここは上記で解説した「１．CTAの作り方」と同じように入力すると良い。</p>
          </div>
        </div>
        <div class="cta-button">
          <a href="#" class="btn btn-red btn-l">ボタンテスト</a>
        </div>
      </div>

      <?php //タイトル上の広告表示
      if (is_ad_pos_above_title_visible() && is_all_adsenses_visible()){
        get_template_part_with_ad_format(get_ad_pos_above_title_format(), 'ad-above-title', is_ad_pos_above_title_label_visible());
      }; ?>

      <?php //投稿タイトル上ウイジェット
      if ( is_single() && is_active_sidebar( 'above-single-content-title' ) ): ?>
        <?php dynamic_sidebar( 'above-single-content-title' ); ?>
      <?php endif; ?>

      <header class="article-header entry-header">
        <h1 class="entry-title" itemprop="headline" rel="bookmark"><?php the_title() ?></h1>

        <?php //タイトル下の広告表示
        if (is_ad_pos_below_title_visible() && is_all_adsenses_visible()){
          get_template_part_with_ad_format(get_ad_pos_below_title_format(), 'ad-below-title', is_ad_pos_below_title_label_visible());
        }; ?>

        <?php //投稿タイトル下ウイジェット
        if ( is_single() && is_active_sidebar( 'below-single-content-title' ) ): ?>
          <?php dynamic_sidebar( 'below-single-content-title' ); ?>
        <?php endif; ?>

        <?php
        if (is_eyecatch_visible()) {
          get_template_part('tmp/eye-catch');//アイキャッチ挿入
        } ?>

        <?php //SNSシェアボタン
        if (is_sns_share_buttons_visible())
          get_template_part_with_option('tmp/sns-share-buttons', SS_TOP); ?>


        <?php //投稿日と更新日テンプレート
        get_template_part('tmp/date-tags'); ?>


         <?php //本文上の広告表示
        if (is_ad_pos_content_top_visible() && is_all_adsenses_visible()){
          get_template_part_with_ad_format(get_ad_pos_content_top_format(), 'ad-content-top', is_ad_pos_content_top_label_visible());
        }; ?>

        <?php //投稿本文上ウイジェット
        if ( is_single() && is_active_sidebar( 'single-content-top' ) ): ?>
          <?php dynamic_sidebar( 'single-content-top' ); ?>
        <?php endif; ?>

        <?php //固定ページ本文上ウイジェット
        if ( is_page() && is_active_sidebar( 'page-content-top' ) ): ?>
          <?php dynamic_sidebar( 'page-content-top' ); ?>
        <?php endif; ?>

      </header>

      <div class="entry-content cf<?php echo get_additional_entry_content_classes(); ?>" itemprop="articleBody">
      <?php //記事本文の表示
        the_content(); ?>
      </div>

      <?php //マルチページ用のページャーリンク
      get_template_part('tmp/pager-page-links'); ?>

      <footer class="article-footer entry-footer">

        <?php //本文下の広告表示
        if (is_ad_pos_content_bottom_visible() && is_all_adsenses_visible()){
          //レスポンシブ広告のフォーマットにrectangleを指定する
          get_template_part_with_ad_format(get_ad_pos_content_bottom_format(), 'ad-content-bottom', is_ad_pos_content_bottom_label_visible());
        }; ?>

        <?php //投稿本文下ウイジェット
        if ( is_single() && is_active_sidebar( 'single-content-bottom' ) ): ?>
          <?php dynamic_sidebar( 'single-content-bottom' ); ?>
        <?php endif; ?>

        <?php //固定ページ本文下ウイジェット
        if ( is_page() && is_active_sidebar( 'page-content-bottom' ) ): ?>
          <?php dynamic_sidebar( 'page-content-bottom' ); ?>
        <?php endif; ?>

        <div class="entry-categories-tags">
          <?php the_category_links(); //カテゴリの出力
                the_tag_links(); //タグの出力?>
        </div>

        <?php //SNSシェアボタン上の広告表示
        if (is_ad_pos_above_sns_buttons_visible() && is_all_adsenses_visible()){
          get_template_part_with_ad_format(get_ad_pos_above_sns_buttons_format(), 'ad-above-sns-buttons', is_ad_pos_above_sns_buttons_label_visible());
        }; ?>

        <?php //投稿SNSボタン上ウイジェット
        if ( is_single() && is_active_sidebar( 'above-single-sns-buttons' ) ): ?>
          <?php dynamic_sidebar( 'above-single-sns-buttons' ); ?>
        <?php endif; ?>

        <?php //固定ページSNSボタン上ウイジェット
        if ( is_page() && is_active_sidebar( 'above-page-sns-buttons' ) ): ?>
          <?php dynamic_sidebar( 'above-page-sns-buttons' ); ?>
        <?php endif; ?>

        <?php //SNSシェアボタン
        if (is_sns_share_buttons_visible())
          get_template_part_with_option('tmp/sns-share-buttons', SS_BOTTOM); ?>

        <?php //SNSフォローボタン
        if (is_sns_follow_buttons_visible())
          get_template_part('tmp/sns-follow-buttons'); ?>

        <?php //SNSシェアボタン上の広告表示
        if (is_ad_pos_below_sns_buttons_visible() && is_all_adsenses_visible()){
          get_template_part_with_ad_format(get_ad_pos_below_sns_buttons_format(), 'ad-below-sns-buttons', is_ad_pos_below_sns_buttons_label_visible());
        }; ?>

        <?php //投稿SNSボタン下ウイジェット
        if ( is_single() && is_active_sidebar( 'below-single-sns-buttons' ) ): ?>
          <?php dynamic_sidebar( 'below-single-sns-buttons' ); ?>
        <?php endif; ?>

        <?php //固定ページSNSボタン下ウイジェット
        if ( is_page() && is_active_sidebar( 'below-page-sns-buttons' ) ): ?>
          <?php dynamic_sidebar( 'below-page-sns-buttons' ); ?>
        <?php endif; ?>

        <?php //投稿者等表示用のテンプレート
        get_template_part('tmp/footer-meta'); ?>

      </footer>

    <?php
    } // end while
  } //have_posts end if?>
</article>
