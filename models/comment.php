<?php 

    class Comment extends DbObject{

        public $id;
        public $photoId;
        public $author;
        public $body;
        protected static $dbTable = "comments";
        protected static $tableFields = array("photoId", "author", "body");
        protected static $idColumnName = "id";

        public static function createComment($photoId = 0, $author = "John Doe", $body = "") {

            if(!empty($photoId) && !empty($author) && !empty($body)) {
                $comment = new Comment();

                $comment->photoId = (int)$photoId;
                $comment->author = $author;
                $comment->body = $body;
                
                return $comment;
            } else {
                return false;
            }

        }

        public static function findComments($photoId = 0) {
            global $database;

            $sql = "SELECT * FROM " . self::$dbTable;
            $sql .= " WHERE photoId = {$photoId}";
            $sql .= " ORDER BY photoId ASC";

            return self::getByQuery($sql);
        }

    }


?>