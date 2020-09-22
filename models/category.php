<?php 

    class Category extends DbObject {
        public $id;
        public $name;
        public $imgFilename;

        protected static $dbTable = "categories";
        protected static $tableFields = ["name", "imgFilename"];
        protected static $idColumnName = "id";

        public $tmpPath;
        public $uploadDir = "assets/images/";
        public $customErrors = [];
        public $uploadErrors = [
            UPLOAD_ERR_OK => "There is no error",
            UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload_max_filessize directive",
            UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds the MAX_FILE_SIZE directive",
            UPLOAD_ERR_PARTIAL => "The uploaded file was only partially uploaded.",
            UPLOAD_ERR_NO_FILE => "No file was uploaded",
            UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
            UPLOAD_ERR_CANT_WRITE => "Failed to write file to disk",
            UPLOAD_ERR_EXTENSION => "A PHP extension stopped the file upload"
        ];


        // this is passing $_FILES['uploaded_file'] as an arg
        public function setFile($file) {
            if(empty($file) || !$file || !is_array($file)) {
                $this->customErrors[] = "There was no file uploaded here";
                return false;
            } else if ($file['error'] != 0) {
                $this->customErrors[] = $this->uploadErrors[$file['error']];
                return false;
            } else {
                $this->imgFilename = basename($file['name']);
                $this->tmpPath = $file['tmp_name'];
            }
        }

        public function getImgPath() {
            return $this->uploadDir . $this->imgFilename;
        }

        public function save() {
            if($this->id) {
                $this->update();
            } else {

                if(!empty($this->customErrors)) {
                    return false;
                }

                if(empty($this->imgFilename) || empty($this->tmpPath)) {
                    $this->customErrors[] = "The file was not available";
                    return false;
                }

                $targetPath = SITE_ROOT . "/{$this->uploadDir}" . $this->imgFilename; 

                if(file_exists($targetPath)) {
                    $this->customErrors[] = "The file {$this->imgFilename} already exists";
                    return false;
                }

                if(move_uploaded_file($this->tmpPath, $targetPath)) {
                    if($this->insert()) {
                        unset($this->tmpPath);
                        return true;
                    }

                } else {
                    $this->customErrors[] = "The file directory doesn't have permission";
                    return false;
                }

            }
        }


    }


?>