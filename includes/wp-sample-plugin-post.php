<?php
/**
 * Class Post Page.
 *
 * @author Megumu Niihara
 * @version 1.0.0
 * @since 1.0.0
*/
Class Sample_Plugin_Post {
	/**
	* Constructor
	*
	* @version 1.0.0
	* @since 1.0.0
	*/
	public function __construct() {
		$db = new Sample_Plugin_Admin_Db();
		//$_GET['id']のisset判定が必要
		$args = $db->get_option( $_GET['id'] );
		var_dump( $args );
		// $db->insert_options( $_POST );
		
		
		$this->page_render( $args );
	}

	/**
	* Rendering Page.
	*
	* @version 1.0.0
	* @since 1.0.0
	* @param array $args
	*/
	private function page_render ( $args ) {
		$html = '<div class="wrap">';
		$html .= '<h1 class="wp-heading-inline">サンプル登録</h1>';
		
		echo $html;
		
		$html  = '<form method="post" action="">';
		$html .= '<input type="hidden" name="sample_id" value="' . $args->id . '">';
		
		$html .= '<h2>バナー設定</h2>';
		
		$html .= '<table class="form-table">';
		
		$html .= '<tr>';
		$html .= '<th>画像のURL（必須）</th>';
		$html .= '<td>';
		
		if ( isset( $args->image_url ) ) {
			$image_src = $args->image_url;	
		} else {
			$image_src = plugins_url('../images/no-image.png', __FILE__);
		}
		
		$html .= '<img id="banner-image-view" src="' . $image_src . '" width="200">';
		$html .= '<input id="banner-image-url" type="text" name="sample-image-url" class="large-text" required value="' . $args->image_url . '">';
		$html .= '<button id="media-upload" type="botton" class="button">画像を選択</button>';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>画像 Alt属性</th>';
		$html .= '<td><input id="banner-image-alt" type="text" name="sample-image-alt" class="regular-text" value="' . $args->image_alt . '">';
		$html .= '<p class="description">alt属性のテキストを入力します。</p></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>リンクURL</th>';
		$html .= '<td>';
		$html .= '<input type="text" name="sample-image-link" class="large-text" value="' . $args->link_url . '">';
		$html .= '<p class="description">URLを入力すると、バナー画像にリンクを設定することができます。</p>';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>新規タブを開く</th>';
		
		if ( $args->open_new_tab === "1" ) {
			$open_new_tab_checked = ' checked';
		} else {
			$open_new_tab_checked = '';
		}
		
		$html .= '<td><input type="checkbox" name="sample-image-target" value="1"' . $open_new_tab_checked . '>リンクを新規タブで開く</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>Class名</th>';
		$html .= '<td>';
		$html .= '<input type="text" name="sample-element-class" class="regular-text" value="' . $args->insert_element_class . '">';
		$html .= '<p class="description">バナー画像にクラス（複数可）を追加することができます。「class=""」は不要です。';
		$html .= '複数設定する場合は、半角スペースで区切ります。</p>';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>ID名</th>';
		$html .= '<td>';
		$html .= '<input type="text" name="sample-element-id" class="regular-text" value="' . $args->insert_element_id . '">';
		$html .= '<p class="description">バナー画像にIDを追加することができます。「id=""」は不要です。</p>';
		$html .= '</td>';
		$html .= '</tr>';
		$html .= '</table>';
		
		$html .= '<h2>表示設定</h2>';
		
		$html .= '<table class="form-table">';
		
		$html .= '<tr>';
		$html .= '<th>表示方法（必須）</th>';
		$html .= '<td>';
		
		$how_display_checked = array( '', '' );
		switch ( $args->how_display ) {
			case 'post_bottom': 
				$how_display_checked[0] = ' checked';
				break;
			case 'shortcode': 
				$how_display_checked[1] = ' checked';
				break;
			default:
				break;
		}
		
		$html .= '<input type="radio" name="sample-how-display" value="post_bottom"' . $how_display_checked[0] . '>記事の下に表示<br>';
		$html .= '<input type="radio" name="sample-how-display" value="shortcode"' . $how_display_checked[1] . '>ショートコードで表示';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>絞り込み</th>';
		$html .= '<td>';
		
		if ( $args->filter_category === '1' ) {
			$filter_category_checked = ' checked';
		} else {
			$filter_category_checked = '';
		}
		
		$html .= '<input type="checkbox" name="sample-filter-category" value="1"' . $filter_category_checked . '>テゴリーで絞り込み';
		$html .= '<p class="description">チェックされていない場合は、すべてに無条件で表示され、「表示するカテゴリ」項目の設定は無視されます。</p>';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>表示するカテゴリ (必須)</th>';
		$html .= '<td>';
		
		echo $html;
		
		$param = array(
			'name'         => 'sample-display-category',
			'hierarchical' => 1,
			'selected'     => $args->category_id
		);
		wp_dropdown_categories( $param );
		
		$html  = '<p class="description">選択したカテゴリーが投稿に紐づいている場合のみ画像が表示されます。</p>';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '</table>';
		
		echo $html;
		
		submit_button();
		
		$html  = '</form>';
		$html .= '</div>';
		
		
		echo $html;
		
		require_once( plugin_dir_path( __FILE__ ) . 'wp-sample-plugin-upload.php' );
		
	}
}
