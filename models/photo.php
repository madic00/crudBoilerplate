<?php 

    class Photo extends DbObject{

        public $id;
        public $title;
        public $description;
        public $filename;
        public $type;
        public $size;
        public $caption;
        public $altText;

        protected static $dbTable = "photos";
        protected static $tableFields = array("title", "caption" ,"description", "filename", "altText", "type", "size");
        protected static $idColumnName = "id";

        public $tmpPath;
        public $uploadDir = "assets/images";
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
        public function set_file($file) {

            if(empty($file) || !$file || !is_array($file)) {
                $this->customErrors[] = "There was no file uploaded here";
                return false;
            } elseif($file['error'] != 0) {
                $this->customErrors[] = $this->uploadErrors[$file['error']];
                return false;
            } else {
                $this->filename = basename($file['name']);
                $this->tmpPath = $file['tmp_name'];
                $this->type = $file['type'];
                $this->size = $file['size'];

            }

        }

        public function picPath() {
            return $this->uploadDir . "/" . $this->filename;
        }

        public function save() {
            if($this->id) {
                $this->update();
            } else {

                if(!empty($this->customErrors)) {
                    return false;
                }

                if(empty($this->filename) || empty($this->tmpPath)) {
                    $this->customErrors[] = "The file was not available";
                    return false;
                }

                $targetPath = SITE_ROOT . "/{$this->uploadDir}/" . $this->filename; 

                if(file_exists($targetPath)) {
                    $this->customErrors[] = "The file {$this->filename} already exists";
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

        public function deletePhoto() {
            if($this->delete()) {
                $targetPath = SITE_ROOT . $this->picPath();

                return unlink($targetPath) ? true : false;
            } else {
                return false;
            }
        }

        public static function displaySidebarInfo($photoId) {
            $photo = Photo::getSingle($photoId);

            $output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picPath()}' alt='Image {$photo->filename}' /></a>";
            $output .= "<p>Filename: {$photo->filename}</p>";
            $output .= "<p>Type: {$photo->type}</p>";
            $output .= "<p>Size: {$photo->size}</p>";

            echo $output;
        }

    }

?>