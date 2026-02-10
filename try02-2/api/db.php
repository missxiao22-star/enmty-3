<?php
session_start();
date_default_timezone_set("Asia/Taipei");
/***
 * 建立一個簡單的資料庫連接類別，使用 PDO 來進行資料庫操作
 * 包括連接資料庫、執行查詢、新增、更新、刪除等功能
 * @author Your Name
 * @version 1.0
 * @date 2025-12-12
 * 
 */

Class DB{
    private $dsn="mysql:host=localhost;dbname=db02;charset=utf8";
    private $table;
    private $pdo;
                                
    public function __construct($table){
        $this->table=$table;
        $this->pdo=new PDO($this->dsn,'root','');
    }

    //all count sum  max find del save    
    function array_to_sql($array) {
        // 輸入 ['sh'=>1] 目的轉成 "`col` = 'value'"
        // 輸出  "`sh` = '1'"
        $tmp = [];
        foreach ($array as $col => $value) {
            $tmp[] = "`$col` = '$value'";
        }
        return $tmp;
    }
    // $News->all(" limit 0, 3");

    // $rows = $News->all(" limit $start, $div");
    // $rows = $News->all(['sh'=>1]," limit $start, $div");
    function all(...$arg){
        // 因為我們參數一開始就要制訂數量
        // ...$arg  ...可以在不確定有幾個的數量時候全部接收

        $sql = "SELECT * FROM `{$this->table}`";
        if(isset($arg[0])){
            if (is_array($arg[0])) {
               $tmp = $this->array_to_sql($arg[0]);
            //    dd(join(" AND ", $tmp));
               $sql .= " WHERE ".join(" AND ", $tmp);
            //    join把陣列拆開變成字串以第一個參數為間隔
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .=$arg[1];
        }
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
    // $News->all(['sh'=>1]" limit 0, 3");

    function find($id){
        $sql = "SELECT * FROM `{$this->table}`";
        if (is_array($id)) {
            $tmp = $this->array_to_sql($id);
            $sql .= " WHERE ".join(" AND ", $tmp);
        }else{
            $sql .= " WHERE `id` = '$id'";
        }
        return $this->pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
    }

    // 刪除跟更新一定要有WHERE條件 不然會全部!!!! 刪除會更新
    function del($id){
        $sql = "DELETE FROM `{$this->table}`";
        if (is_array($id)) {
            $tmp = $this->array_to_sql($id);
            $sql .= " WHERE ".join(" AND ", $tmp);
        }else{
            $sql .= " WHERE `id` = '$id'";
        }
        // exec 不需要回傳所以用這個, 要回傳資料的都是SELEET 都會用fetch
        return $this->pdo->exec($sql);
    }

    function count(...$arg){
        $sql = "SELECT COUNT(*) FROM `{$this->table}`";
        if(isset($arg[0])){
            if (is_array($arg[0])) {
               $tmp = $this->array_to_sql($arg[0]);
               $sql .= " WHERE ".join(" AND ", $tmp);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .=$arg[1];
        }
        // dd($sql);
        return $this->pdo->query($sql)->fetchColumn();
    }

    // $Menu->sum('visit');
    function sum($col,...$arg){
        $sql = "SELECT SUM($col) FROM `{$this->table}`";
        if(isset($arg[0])){
            if (is_array($arg[0])) {
               $tmp = $this->array_to_sql($arg[0]);
               $sql .= " WHERE ".join(" AND ", $tmp);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .=$arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }

    function max($col,...$arg){
        $sql = "SELECT MAX($col) FROM `{$this->table}`";
        if(isset($arg[0])){
            if (is_array($arg[0])) {
               $tmp = $this->array_to_sql($arg[0]);
               $sql .= " WHERE ".join(" AND ", $tmp);
            }else{
                $sql .=$arg[0];
            }
        }
        if(isset($arg[1])){
            $sql .=$arg[1];
        }
        return $this->pdo->query($sql)->fetchColumn();
    }


    // [
    //     'text'=>'新聞哈哈哈哈',
    //     'sh'=>1
    // ]

    // [
    //     'text'=>'新聞哈哈哈哈',
    //     'sh'=>1,
    //     'id'=>1
    // ]
    // 刪除跟更新一定要有WHERE條件 不然會全部!!!! 刪除會更新
    function save($array){
        if (isset($array['id'])) {
            // 如果送過來的資料內有id就是更新 UPDATE
            // UPDATE users SET name = 'Tom', age = 20 WHERE id = 5;
            // [
            //     'id'=>1,
            //     'text'=> "asd",
            //     'main_id'=> 0
            // ]
            $id = $array['id'];
            unset($array['id']);
            $tmp = $this->array_to_sql($array);
            $sql = "UPDATE `{$this->table}` SET " .join("," ,$tmp) ." WHERE `id` = '$id'";
        }else {
            // 送過來的資料內沒有id就是新增
            // [
            //     'img'=>1,
            //     'text'=> "asd",
            //     'main_id'=> 0
            // ]
            // INSERT INTO `title` (`img`,`text`,`sh`) VALUES ('CC', '新聞阿哈哈哈', '1');
            $cols = join("`,`", array_keys($array)); // ['text','main_id'] -> "" 用特定符號將陣列間格並轉成字串 'img`,`text`,`main_id'
            // array_keys($array) ['img','text','main_id']，使用join之後的字串->'img,text,main_id'
            $vals = join("','", $array); //["asd","0"] ，"1','asd','0"
            $sql = "INSERT INTO `{$this->table}` (`{$cols}`) VALUES ('{$vals}')";
        }
        return $this->pdo->exec($sql);
    }
}
//array_keys(['text','main_id']) -> [0,1]; 
// $News->save($_POST)
function q($sql){
    $dsn="mysql:host=localhost;dbname=db02;charset=utf8";
    $pdo=new PDO($dsn,'root','');
    return $pdo->query($sql)->fetchALL(PDO::FETCH_ASSOC);
}

function dd($array){
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}


function to($url){
    header("location:".$url);
}
$Visit = new DB("visit");
$Member = new DB("member");
$News = new DB("news");
$Que =  new DB("que");

// dd($test->array_to_sql(['sh'=>1, 'main_id'=>0])); // 一個一為陣列有兩個數值
// dd($test->array_to_sql(['sh'=>0]," LIMIT $star")); // 兩個一微陣列各只有一個數值
// Array
// (
//     [0] => `sh` = '1'
//     [1] => `main_id` = '0'
// )
// Array
// (
//     [sh] => 1
//     [main_id] => 0
// )
// join([])
// $test->all(['sh'=>1, 'main_id'=>0])
// `sh` = '1' AND `main_id` = '0'
// SELECT * FROM `title` WHERE `sh` = '1' limit 0, 3
// $_SESSION['visit']=1;
// dd($_SESSION);
// echo "<hr>";
// dd(empty($_SESSION['visit']));
// echo "<hr>";
// dd(!empty($_SESSION['visit']));



if (empty($_SESSION['visit'])) {
    $today = date("Y-m-d");  //Y = 2026-01-19 y=26
    if($Visit->count(['date'=>$today])){
        $row = $Visit->find(['date'=>$today]);
        $row['visit']++;
        $Visit->save($row);
    }else{
        $Visit->save(['date'=>$today, 'visit'=>1]);
    }
    $_SESSION['visit']=1;
}

?>