<?php
class HelperFrontend
{
    public static function itemNavBar($type, $link, $title, $controllerActive, $arrElement = null)
    {
        $xhtml = '';
        $controller = HelperFrontend::getURLQuery('controller');
        $classActive = ($controller == $controllerActive) ? 'active' : '';
        if ($type == 'single') {
            $xhtml = '<li><a href="' . $link . '" class="my-menu-link ' . $classActive . '">' . $title . '</a></li>';
        } elseif ($type == 'dropdown') {
            $xhtml .= '<li><a href="' . $link . '" class="my-menu-link ' . $classActive . '">' . $title . '</a><ul>';
            foreach ($arrElement as $value) {
                $xhtml .= '<li><a href="' . $value['link'] . '">' . $value['title'] . '</a></li>';
            }
            $xhtml .= '</ul></li>';
        }

        return $xhtml;
    }

    public static function getURLQuery($type = 'controller')
    {
        $result = '';
        if ($type == 'controller') {
            @$string = (explode('&', $_SERVER['QUERY_STRING'])[1]);
            $result = (!is_null($string)) ? (explode('=', $string))[1] : 'home';
        }
        return $result;
    }

    public static function currencyVND($priceFormat)
    {
        return number_format($priceFormat, 0, '', ',');
    }

    public static function sidebarVategory($link, $name, $id, $dataActive = null)
    {
        $textActive = (!empty($dataActive) && $dataActive == $id) ? 'my-text-primary' : 'text-dark';
        $xhtml = '<div class="custom-control custom-checkbox collection-filter-checkbox pl-0 category-item">
                    <a class="' . $textActive . '" data-id="' . $id . '" href="' . $link . '">' . $name . '</a>
                </div>';
        return $xhtml;
    }
}
