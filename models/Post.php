<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/models/Database.php');

class Post {

    // Completed ####
    static function index(...$var) {

        $db = Database::connect();

        $baseQuery = "SELECT * FROM books";
        $query = '';

        $queryEND = '';
        $displayCount = 3;

        if(isset($var[0]['page'])){
            $offset = $var[0]['page'] * 3;
            if($offset < 1){
                $queryEND = " LIMIT {$displayCount} ";
            } else {
                $queryEND = " LIMIT {$offset}, {$displayCount} ";
            }
            
            unset($var[0]['page']);
        } else {
            $queryEND = " LIMIT {$displayCount} ";

        }

        if ($var) {
            $data = $var[0];
            $keys = array_keys($data);

            for ($i=0; $i < count($keys); $i++) { 
                switch ($i) {
                    case 0:
                        $query = $query . " WHERE ";
                        break;
                    default:
                    $query = $query . " AND ";
                        break;
                }

                switch ($keys[$i]) {
                    case 'author':
                        $query = $query . " {$keys[$i]}='{$data[$keys[$i]]}'";
                        break;
                    case 'genre':
                        $query = $query . " {$keys[$i]}='{$data[$keys[$i]]}'";
                        break;
                    case 'year':
                        $query = $query . " pub_year BETWEEN {$data[$keys[$i]][0]} AND {$data[$keys[$i]][1]}";
                        break;
                    default:
                        # code...
                        break;
                }
            }
        }

        $baseQuery = $baseQuery . $query . $queryEND; 
        $result = $db->query($baseQuery);
        $rowCnt = $result->num_rows;
        $res = array();

        // Add Database response to associative array
        $res['data'] = array();
        while ($row = $result->fetch_assoc()) {
            $post_item = $row;
            array_push($res['data'], $post_item);
        } 

        // "SELECT COUNT(id) FROM books" {$displayCount}
        $pageCntQ = 'SELECT COUNT(id) FROM books' . $query;
        $pageCount = $db->query($pageCntQ)->fetch_assoc();

        $pageCount = $pageCount['COUNT(id)'] / $displayCount;

        $res['information'] = array(
            "endpoint" => "index",
            "author" => "Wyatt Marshall",
            'pageCount' => ceil($pageCount),
        );
        
        $result = json_encode($res);

        return $result;

        
    }

    // Completed ####
    static function show($id) {

        $db = Database::connect();
        $sql = "SELECT * FROM books WHERE id=$id";
        $result = $db->query($sql);
        // --------------------------------------------
        $rowCnt = $result->num_rows;
        $res = array();

        // Add Database response to associative array
        $res['data'] = array();
        while ($row = $result->fetch_assoc()) {
            $post_item = $row;
            array_push($res['data'], $post_item);
        } 
        $res['information'] = array(
            "endpoint" => "index",
            "author" => "Wyatt Marshall",
            'pageCount' => ceil($pageCount),
        );
        
        $result = json_encode($res);
        // --------------------------------------------

        return $result;
    }



    static function create($isbn, $author, $title, $pub_year, $genre, $thumbnail) {

        $db = Database::connect();
        session_start();

        $sql = "INSERT INTO books (isbn, author, title, pub_year, genre, thumbnail) VALUES (
            '$isbn',
            '$author',
            '$title',
            '$pub_year',
            '$genre',
            '$thumbnail'
            )";
        
        $result = $db->query($sql);
        if(!$result){
            header("Location: http://localhost/Projects/REST_API/views/500.php");
        } else {
            $_SESSION['success'] = "Insert Successful";
            return $result;
        }
    }

    // Not used....yet
    static function store() {

        $db = Database::connect();

        // $sql = "SELECT * FROM books WHERE id=$id";
        // $result = $db->query($sql);
        // return $result;
    }

    static function edit($id, $isbn, $author, $title, $pub_year, $genre, $thumbnail) {

        $db = Database::connect();
        session_start();

        $sql = "UPDATE books SET
            isbn='$isbn',
            author='$author',
            title='$title',
            pub_year='$pub_year',
            genre='$genre',
            thumbnail='$thumbnail'
        WHERE id=$id";

        $result = $db->query($sql);
        if(!$result){
            header("Location: http://localhost/Projects/REST_API/views/500.php");
        } else {
            $_SESSION['success'] = "Insert Successful";
            return $result;
        }
    }

    // Not used....yet
    static function update($id) {

        $db = Database::connect();

        // $sql = "SELECT * FROM books WHERE id=$id";
        // $result = $db->query($sql);
        // return $result;
    }

    static function destroy($id) {

        $db = Database::connect();

        $sql = "DELETE FROM books WHERE id=$id";
        $result = $db->query($sql);
        return $result;
    }
}

?>