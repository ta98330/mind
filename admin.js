function check(msg){
    //var message = msg;

	if(window.confirm(msg)){ // 確認ダイアログを表示

		return true; // 「OK」時は送信を実行

	}
	else{ // 「キャンセル」時の処理

		window.alert('キャンセルされました'); // 警告ダイアログを表示
		return false; // 送信を中止

	}

}

/*
 onClick="return check('掲示板がリセットされます．本当によろしいですか？\n※元には戻せません．')"
*/