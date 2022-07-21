<?php
class FormBackend
{
    public static function createLabel($forName, $name, $required = true)
    {
        $required = ($required == true) ? 'required' : '';
        return sprintf('<label for="%s" class="col-sm-2 col-form-label text-sm-right %s">%s</label>', $forName, $required, ucfirst($name));
    }

    public static function createFormSelectBox($name, $arrOptions, $keySelected = null)
    {
        $xhtml = '';
        $xhtml .= '<select id="' . $name . '" name="' . $name . '" class="custom-select custom-select-sm">';
        if (!empty($arrOptions)) {
            foreach ($arrOptions as $key => $value) {
                $selected = ($keySelected == $key && !empty($keySelected)) ? 'selected' : '';
                $xhtml .= '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
            }
        }
        $xhtml .=   '</select>';
        return $xhtml;
    }

    public static function createInput($name, $type, $value, $readOnly = false)
    {
        $readOnly = ($readOnly == true) ? 'readonly' : '';
        return sprintf('<input type="%s" id="%s" name="%s" value="%s" class="form-control form-control-sm" autocomplete="off" %s>', $type, $name, $name, $value, $readOnly);
    }

    public static function createInputHidden($name, $value)
    {
        return sprintf('<input type="hidden" id="%s" name="%s" value="%s">', $name, $name, $value);
    }

    public static function createBtnGenerate($name){
        $xhtml = '<div class="d-flex">
                    <button type="button" class="btn bg-gradient-info btn-generate-password mr-1 text-nowrap "><i class="fas fa-sync"></i> Generate</button>
                    <input type="text" id="generateString" class="form-control" name="'.$name.'" value="">
                </div>';
        return $xhtml;
    }

    public static function createInputFile($name, $id){
        return sprintf('<input type="file" name="%s" class="form-control-file" id="%s">', $name, $id);
    }

    public static function createTextArea($name, $rows, $value){
        return sprintf('<textarea name="%s" class="form-control form-control-sm" id="%s" rows="%s">%s</textarea>', $name, $name, $rows, $value);
    }

    public static function formGroup($arrElement)
    {
        return sprintf('<div class="form-group row">
                        %s
                            <div class="col-xs-12 col-sm-8">
                            %s
                            </div>
                        </div>
        ', $arrElement['label'], $arrElement['input']);
    }

    public static function showForm($arrElement)
    {
        $xhtml = '';
        if (!empty($arrElement)) {
            foreach ($arrElement as $element) {
                $xhtml .= self::formGroup($element);
            }
        }
        return $xhtml;
    }

    public static function showError($arrError)
    {
        if (!empty($arrError)) {
            echo '<div class="alert bg-gradient-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Lỗi!</h5>
                    <ul class="list-unstyled" style="font-size: 17px">
                    <pre style="color: blue;"><li class="text-white list-unstyled">';
            print_r($arrError);
            echo '</li></pre></ul></div>';
        }
    }

    public static function modalViewImg(){
        return '<div class="modal fade bd-example-modal-lg theme-modal" id="view-img-admin" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content view-img-admin-modal">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
        
                        <div class="col-xs-12 d-flex justify-content-center align-items-center">
                            <div class="view-img-admin"><img src="" alt="" class="img-fluid" style="max-width: 400px;"></div>
                        </div>
        
                    </div>
                </div>
            </div>
        </div>';
    }
}
