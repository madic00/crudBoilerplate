<?php 

    class User extends DbObject{

        public $id;
        public $username;
        public $first_name;
        public $last_name;
        public $password;
        public $userImg;
        public $uploadDir = "assets/images";
        public $placeholderImg = "http://placehold.it/300x300&text=image";

        protected static $dbTable = "users";
        protected static $tableFields = array("username", "password", "first_name", "last_name", "userImg");
        protected static $idColumnName = "id";

        public static function verify_user($username, $pass) {
            global $db;

            // $username = $db->escape_string($username);
            // $pass = $db->escape_string($pass);

            $sql = "SELECT * FROM " . self::$dbTable . " WHERE username = '{$username}' AND password = '{$pass}' LIMIT 1";

            $result = self::getByQuery($sql);

            return !empty($result) ? array_shift($result) : false;
        }

        public function userImg() {
            return empty($this->userImg) ? $this->placeholderImg : $this->uploadDir . "/" . $this->userImg;
        }

        public function set_file($file) {

            if(empty($file) || !$file || !is_array($file)) {
                $this->customErrors[] = "There was no file uploaded here";
                return false;
            } elseif($file['error'] != 0) {
                $this->customErrors[] = $this->uploadErrors[$file['error']];
                return false;
            } else {
                $this->userImg = basename($file['name']);
                $this->tmpPath = $file['tmp_name'];
                $this->type = $file['type'];
                $this->size = $file['size'];
            }

        }

        public function uploadAvatar() {
            // if($this->id) {
            //     $this->update();
            // } else {

                if(!empty($this->customErrors)) {
                    return false;
                }

                if(empty($this->userImg) || empty($this->tmpPath)) {
                    $this->customErrors[] = "The file was not available";
                    return false;
                }

                $targetPath = SITE_ROOT . "/{$this->uploadDir}/" . $this->userImg;

                echo $targetPath;

                if(file_exists($targetPath)) {
                    $this->customErrors[] = "The file {$this->userImg} already exists";
                    return false;
                }

                if(move_uploaded_file($this->tmpPath, $targetPath)) {
                    // if($this->create()) {
                        unset($this->tmpPath);
                        return true;
                    // }

                } else {
                    $this->customErrors[] = "The file directory doesn't have permission";
                    return false;
                }

            // }
        }

        public function saveUserImage($userId, $userImage) {
            global $db;

            // $userImage = $db->escape_string($userImage);
            // $userId = $db->escape_string($userId);

            $this->userImg = $userImage;
            $this->id = $userId;

            $sql = "UPDATE " . self::$dbTable . " SET userImg = '{$this->userImg}' WHERE id = {$this->id} ";
            $updateImg = $db->execQuery($sql);

            echo $this->userImg();
        }

        public function deleteUserImg() {
            if($this->delete()) {
                $targetPath = SITE_ROOT . "/admin/{$this->uploadDir}/" . $this->userImg;

                return unlink($targetPath) ? true : false;
            } else {
                return false;
            }
        }


    }


?>