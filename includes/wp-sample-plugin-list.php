<?php
/**
 * Class List Page.
 *
 * @author Megumu Niihara
 * @version 1.0.0
 * @since 1.0.0
*/
Class Sample_Plugin_List {
	/**
	* Constructor
	*
	* @version 1.0.0
	* @since 1.0.0
	*/
	public function __construct() {
		$db = new Sample_Plugin_Admin_Db();
		$this->page_render( $db );
	}

	/**
	* Rendering Page.
	*
	* @version 1.0.0
	* @since 1.0.0
	* @param  Sample_Plugin_Admin_Db $db
	*/
	private function page_render ( $db ) {
		$html = '<div class="wrap">';
		$html .= '<h1 class="wp-heading-inline">サンプル一覧</h1>';
		$html .= '<a href="" class="page-title-action">新規追加</a>';
		
		$html .= '<table>';
		$html .= '<tr>';
		$html .= '<th>画像</th><th>画像alt属性</th><th>表示方法</th><th>絞り込み</th>';
		$html .= '</tr>';
		
		$results = $db->get_list_options();
		
		if ( $results ) {
			foreach ( $results as $row ) {
				$html .= '<tr>';
				$html .= '<td>' . $row->image_url . '</td>';
				$html .= '<td>' . $row->image_alt . '</td>';
				$html .= '<td>' . $row->how_display . '</td>';
				$html .= '<td>' . $row->filter_category . '</td>';
				$html .= '</tr>';
			}
		} else {
			$html .= '<tr>';
			$html .= '<td colspan="4">登録はありません。</td>';
			$html .= '</tr>';
		}
		
		$html .= '</table>';
		$html .= '</div>';
		
		echo $html;
	}
}
