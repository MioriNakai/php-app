<?php
require_once('config.php');

// PDOクラスのインスタンス化/サーバーとデータベースのやり取り
function connectPdo()
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
        // configから持ってきている引数、throwの説明とそこから受け取ったエラーの内容をexceptionで表している
    } catch (PDOException $e) {
        // PDOExceptionクラスがインスタンス化されたものが内容を$eに代入している
        echo $e->getMessage();
        exit();//処理を中断している
    }
}

function createTodoData($todoText)
// $postだったものが変数名を変えこの関数の引数となった。１番に説明
{
    $dbh = connectPdo();
    // （）の中にインスタンス化したpdo関数が入っている
    $sql = 'INSERT INTO todos (content) VALUES ("' . $todoText . '")';
    // ここで todosにレコードの追加を行っている
    $dbh->query($sql);
    // 関数を呼び出したファイルに戻ります
}

function getAllRecords()
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
    return $dbh->query($sql)->fetchAll();
    // pdostatmentクラスを返す、↳残っている行を取得するすべての行を含む配列を返すのが最後のやつ。$sqlの説明でこうしたらどうなるもセットで。データベースから削除日時がNULLのレコードを全取得する。
}

function updateTodoData($post)
{
    $dbh = connectPdo();//（）の中に上記のPODインスタンスを呼び出す。上記は関数宣言されただけなのでここに呼び出している。
    $sql = 'UPDATE todos SET content = "' . $post['content'] . '" WHERE id = ' . $post['id'];//ユーザーが入力した内容が入る。最初のcontentはカラム名。WHERE idはレコード名。テーブルのどこに入れるか指定。

    $dbh->query($sql);//左のクラスからアローでめそっどを呼び出す。
}


