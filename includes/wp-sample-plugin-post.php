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
		$this->page_render();
	}

	/**
	* Rendering Page.
	*
	* @version 1.0.0
	* @since 1.0.0
	*/
	private function page_render () {
		$html = '<div class="wrap">';
		$html .= '<h1 class="wp-heading-inline">サンプル登録</h1>';
		$html .= '</div>';
		
		echo $html;
		
		$html  = '<form method="post" action="">';
		$html .= '<input type="hidden" name="sample_id" value="">';
		
		$html .= '<h2>バナー設定</h2>';
		
		$html .= '<table>';
		
		$html .= '<tr>';
		$html .= '<th>画像のURL（必須）</th>';
		$html .= '<td>';
		$html .= '<img src="' . plugins_url('../images/no-image.png', __FILE__) . '" width="200"><br>';
		$html .= '<input type="text"><br><button type="botton">画像を選択</button>';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>画像 Alt属性 (必須)</th>';
		$html .= '<td><input type="text"><br><p>alt属性のテキストを入力します。</p></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>リンクURL</th>';
		$html .= '<td><input type="text"><p>URLを入力すると、バナー画像にリンクを設定することができます。</p></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>新規タブを開く</th>';
		$html .= '<td><input type="checkbox" id=""><label for="">リンクを新規タブで開く</label></td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>Class名</th>';
		$html .= '<td>';
		$html .= '<input type="text">';
		$html .= '<p>バナー画像にクラス（複数可）を追加することができます。「class=""」は不要です。<br>';
		$html .= '複数設定する場合は、半角スペースで区切ります。</p>';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>ID名</th>';
		$html .= '<td>';
		$html .= '<input type="text">';
		$html .= '<p>バナー画像にIDを追加することができます。「id=""」は不要です。</p>';
		$html .= '</td>';
		$html .= '</tr>';
		$html .= '</table>';
		
		$html .= '<h2>表示設定</h2>';
		
		$html .= '<table>';
		
		$html .= '<tr>';
		$html .= '<th>表示方法（必須）</th>';
		$html .= '<td>';
		$html .= '<input type="radio" name="display" checked>記事の下に表示<br>';
		$html .= '<input type="radio" name="display">ショートコードで表示';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>絞り込み</th>';
		$html .= '<td>';
		$html .= '<input type="checkbox">テゴリーで絞り込み';
		$html .= '<p>チェックされていない場合は、すべてに無条件で表示され、「表示するカテゴリ」項目の設定は無視されます。</p>';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '<tr>';
		$html .= '<th>表示するカテゴリ (必須)</th>';
		$html .= '<td>';
		$html .= '<select>';
		$html .= '<option>未分類</option>';
		$html .= '</select>';
		$html .= '<p>選択したカテゴリーが投稿に紐づいている場合のみ画像が表示されます。</p>';
		$html .= '</td>';
		$html .= '</tr>';
		
		$html .= '</table>';
		
		$html .= '<p>';
		$html .= '<input type="submit" value="変更を保存">';
		$html .= '</p>';
		$html .= '</form>';
		
		
		echo $html;
	}
}
