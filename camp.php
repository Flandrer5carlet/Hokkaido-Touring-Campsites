<?php

function camp_table_func()
{
	ob_start(); // 出力バッファリングを有効化する
	global $wpdb;
	echo '<h1>夏季北海道ツーリング向けキャンプ場</h1>';
	echo '<form align="center"　action="cgi-bin/example.cgi" method="post">';
	echo '<div class="arite">';
	echo '<p class="nyuryoku">検索したい<span class="kensaku">キャンプ場</span>又は<span class="kensaku">住所</span>を入力してください。</p>';
	echo '</div>';
	echo '<input type="search" name="search" class="search" placeholder="キャンプ場か住所を入力">';
	echo '<input type="submit" name="submit" class="hoge" value="検索">';
	echo '</form>';
    echo '<form method="post">';
	echo '<p class="freebutton"><span class="kensaku">無料キャンプ場</span>を知りたい方は <button class="btn btn--orange btn--radius" type="submit" name="add">こちら</button> をクリック</p>';
	echo '</form>';

	if(isset($_POST['add'])) {
		echo '<h3>無料キャンプ場一覧</h3>';
		echo '<table>';
		echo '<tr><th>キャンプ場名</th><th>受付時間</th><th>値段</th><th>住所</th><th>最寄りの温泉</th><th>地域</th></tr>';
		$raws = $wpdb->get_results("SELECT * FROM $wpdb->campingtouring WHERE `price`='無料'");
		if ($raws) {
			foreach ($raws as $raw) {
				echo '<tr>';
				echo '<td>', $raw->name, '</td>';
				echo '<td>', $raw->time, '</td>';
				echo '<td>', $raw->price, '</td>';
				echo '<td>', $raw->address, '</td>';
				echo '<td>', $raw->spa, '</td>';
				echo '<td>', $raw->area, '</td>';
				echo '</tr>';
				echo "\n";
			}
		}
		echo '</table>';
    }

	$trim_after=preg_replace("/\A\s+|\s+\z/u", "", $_POST['search']);

	echo '<table border="1" align="center" bgcolor="#0099FF">';

	if(!empty($_POST['search'])){
		echo '<h3>検索結果</h3>';
		$hous=$wpdb->get_results("SELECT * FROM $wpdb->campingtouring WHERE `name` LIKE '%".$trim_after."%' OR `address` LIKE '%".$trim_after."%'");
		if (empty($hous)){
			echo '検索した情報と一致するキャンプ場はありませんでした。';
		}else{
			echo "<tr><th>キャンプ場名</th><th>受付時間</th><th>値段</th><th>住所</th><th>最寄りの温泉</th><th>地域</th></tr>";
			foreach ($hous as $hou){
				echo '<tr>';
				echo '<td>', $hou->name, '</td>';
				echo '<td>', $hou->time, '</td>';
				echo '<td>', $hou->price, '</td>';
				echo '<td>', $hou->address, '</td>';
				echo '<td>', $hou->spa, '</td>';
				echo '<td>', $hou->area, '</td>';
				echo '</tr>';
				echo "\n";
			}
		}
	}

	echo '</table>';
	echo '<h3>キャンプ場一覧</h3>';
	echo '<p>表のタイトルをクリックすると順番を変えられます。</p>';
	echo '<div class="container-fluid">';
    echo '<div class="row">';

    echo '<div class="p-1 col-sm-12 sortable-table">';

    echo '<table class="table table-hover table-bordered" id="my-table1">';
    echo '<thead>';

	echo '<tr><th scope="col" data-id="name" sortable>キャンプ場名</th><th scope="col" data-id="time" sortable>受付時間</th><th scope="col" data-id="price" sortable>値段</th><th scope="col" data-id="address" sortable>住所</th><th scope="col" data-id="spa" sortable>最寄りの温泉</th><th scope="col" data-id="area" sortable>地域</th></tr>';
	$rows = $wpdb->get_results("SELECT * FROM $wpdb->campingtouring ORDER BY $wpdb->campingtouring.`area`");

	//テーマで読み込むJavaScript
	wp_enqueue_script(
		'my-theme-script',
		get_template_directory_uri() . '/js/my-theme.js',
		array( 'jquery' ),
		filemtime( get_template_directory() . '/js/my-theme.js' ),
		true
	);
	// JavaScriptで使いたい変数
	// 変数をスクリプトに登録
	wp_localize_script( 'my-theme-script', 'myVar', $rows  );

	echo '</thead>';
	echo '</table>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

	echo '<script src="https://cdn.jsdelivr.net/npm/@riversun/sortable-table@1.0.0/lib/sortable-table.js"></script>';

	ob_get_contents();  // 出力バッファに溜まった分を出力
	return ob_get_clean(); // 出力バッファを削除する
}
add_shortcode('camp_table', 'camp_table_func');