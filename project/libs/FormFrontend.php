<?php
class FormFrontend
{
    public static function selectBox($arrSelect, $id, $name, $selected)
    {
        if (!empty($arrSelect)) {
            $xhtml = '<select id="' . $id . '" name="' . $name . '">';
            foreach ($arrSelect as $key => $value) {
                $keySelected = ($key == $selected) ? 'selected' : '';
                $xhtml .= '<option value="' . $key . '" ' . $keySelected . '>' . $value . '</option>';
            }
            $xhtml .= '</select>';
        }
        return $xhtml;
    }

    public static function label($forName, $title)
    {
        return sprintf('<label for="%s">%s</label>', $forName, ucfirst($title));
    }

    public static function inputText($type, $id, $name, $value, $readonly = false)
    {
        $readonly = ($readonly == true) ? 'readonly' : '';
        return sprintf('<input type="%s" name="%s" id="%s" autocomplete="off" class="form-control" value="%s" %s>', $type, $name, $id, $value, $readonly);
    }

    public static function formGroup($arrElement)
    {
        return sprintf('<div class="form-group">
                            %s
                            %s
                        </div>', $arrElement['label'], $arrElement['input']);
    }

    public static function showForm($arrForm)
    {
        $xhtml = '';
        if (!empty($arrForm)) {
            foreach ($arrForm as $form) {
                $xhtml .= self::formGroup($form);
            }
        }
        return $xhtml;
    }

    public static function showError($arrErrors)
    {
        $xhtml = '';
        if (!empty($arrErrors)) {
            $xhtml = '<div class="alert alert-danger" role="alert">' . $arrErrors . '</div>';
        }
        return $xhtml;
    }

    public static function modalViewProduct()
    {
        $xhtml = '<div class="modal fade bd-example-modal-lg theme-modal" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content quick-view-modal">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">X</span></button>
                        <div class="row mr-2">
                            <div class="col-lg-6 col-xs-12 d-flex justify-content-center align-items-center">
                                <div class="quick-view-img"><img src="" alt="" class="w-100 img-fluid blur-up lazyload book-picture"></div>
                            </div>
                            <div class="col-lg-6 rtl-text">
                                <div class="product-right">
                                    <h2 class="book-name"></h2>
                                    <h3 class="book-price">26.910 ₫ <del></del></h3>
                                    <div class="border-product">
                                        <div class="book-description cs-ellipsis-10"></div>
                                    </div>
                                    <div class="product-description border-product">
                                        <h6 class="product-title">Số lượng</h6>
                                        <div class="qty-box">
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-left-minus btn-change-quantity" data-type="minus" data-field="">
                                                        <i class="ti-angle-left"></i>
                                                    </button>
                                                </span>
                                                <input type="text" name="quantity" autocomplete="off" class="form-control input-number quantity-box" value="1">
                                                <span class="input-group-prepend">
                                                    <button type="button" class="btn quantity-right-plus btn-change-quantity" data-type="plus" data-field="">
                                                        <i class="ti-angle-right"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-buttons">
                                        <a href="" class="btn btn-solid mb-1 btn-add-to-cart">Chọn Mua</a>
                                        <a href="" class="btn btn-solid mb-1 btn-view-book-detail">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>';
        return $xhtml;
    }

    public static function modalViewComment()
    {
        $xhtml = '<div class="modal fade" id="view-comment" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bình luận</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-comment-area mx-3">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>';
        return $xhtml;
    }
}
