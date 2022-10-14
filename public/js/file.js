window.addEventListener('DOMContentLoaded', function(){

	var input_file = document.querySelector('[name=image]');

	input_file.addEventListener('change', function(e){

		if( e.target.files[0].type === 'image/jpeg' || e.target.files[0].type === 'image/png' ) {

			// アップロードしたファイルのURLを取得
			var upload_file_url = URL.createObjectURL(e.target.files[0]);

			// img要素を作成
			var img_element = document.createElement("img");
			img_element.src = upload_file_url;
			img_element.alt = e.target.files[0].name;
			img_element.width = 100;
			img_element.onload = function(){
				URL.revokeObjectURL(this.src);
			}

			// ページにimg要素を挿入して画像ファイルを表示
			var div_element = document.getElementById('file_viewer');
			div_element.appendChild(img_element);
		}
	});
});