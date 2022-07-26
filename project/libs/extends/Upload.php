<?php 
// require_once EXTEND_PATH . 'PhpThumb' . DS . 'ThumbLib.inc.php';
class Upload{
    public function uploadFile($file, $folderUpload, $option = null){
        if($option == null){
            if(@$file['tmp_name'] != null){
                $uploadDir = UPLOAD_PATH . $folderUpload . DS;
                $exts = '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
                $newFileName = pathinfo($file['name'], PATHINFO_FILENAME) . $this->randomString();
                $fileName = $uploadDir . $newFileName . $exts;
                copy($file['tmp_name'], $fileName);

                // $thumb = PhpThumbFactory::create($fileName);
                // $thumb->adaptiveResize(60, 90);
                // $thumb->save($fileName);
            }
            return $newFileName . $exts;
        }
    }

    public function deleteFile($path, $fileName){
        unlink($path . '/' . $fileName);
    }

    private function randomString($length = 8){
        $arrChar = array_merge(range('A', 'Z'), range('a', 'z'), range(0, 9));
        $arrChar = implode('', $arrChar);
        $arrChar = str_shuffle($arrChar);

        $result = substr($arrChar, 0, $length);
        return $result;
    }
}
?>