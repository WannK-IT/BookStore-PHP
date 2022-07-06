<?php
class HelperBackend
{
    public static function itemStatus($id, $status)
    {
        $xhtml = '';
        $class = 'bg-gradient-success';
        $icon = 'fa-check';
        if ($status == 'inactive') {
            $class = 'bg-gradient-danger';
            $icon = 'fa-minus';
        }
        $xhtml .= '<a href="index.php?module=backend&controller=group&action=changeStatus&status=' . $status . '&id=' . $id . '" class="py-2 my-btn-state rounded-circle btn btn-sm ' . $class . '"><i class="fas ' . $icon . '"></i></a>';

        return $xhtml;
    }

    public static function itemStatusAjax($module, $controller, $id, $status, $function)
    {
        $link = URL::createLink($module, $controller, 'changeStatus', ['id' => $id, 'status' => $status]);
        $xhtml = '';
        $class = 'bg-gradient-success';
        $icon = 'fa-check';
        if ($status == 'inactive') {
            $class = 'bg-gradient-danger';
            $icon = 'fa-minus';
        }
        $xhtml .= '<a id="status-post-' . $id . '" href="javascript:' . $function . '(\'' . $link . '\')" class="py-2 my-btn-state rounded-circle btn btn-sm ' . $class . '"><i class="fas ' . $icon . '"></i></a>';

        return $xhtml;
    }

    public static function itemSpecialAjax($module, $controller, $id, $special, $function)
    {
        $link = URL::createLink($module, $controller, 'changeSpecial', ['id' => $id, 'special' => $special]);
        $xhtml = '';
        $class = 'bg-gradient-success';
        $icon = 'fa-check';
        if ($special == 'no') {
            $class = 'bg-gradient-danger';
            $icon = 'fa-minus';
        }
        $xhtml .= '<a id="special-post-' . $id . '" href="javascript:' . $function . '(\'' . $link . '\')" class="py-2 my-btn-state rounded-circle btn btn-sm ' . $class . '"><i class="fas ' . $icon . '"></i></a>';

        return $xhtml;
    }

    public static function itemGroupACP($module, $controller, $id, $groupACP, $function)
    {
        $link = URL::createLink($module, $controller, 'changeGroupACP', ['id' => $id, 'groupACP' => $groupACP]);
        $xhtml = '';
        $class = 'bg-gradient-success';
        $icon = 'fa-check';
        if ($groupACP == 'inactive') {
            $class = 'bg-gradient-danger';
            $icon = 'fa-minus';
        }
        $xhtml .= '<a id="groupACP-post-' . $id . '" href="javascript:' . $function . '(\'' . $link . '\')" class="py-2 my-btn-state rounded-circle btn btn-sm ' . $class . '"><i class="fas ' . $icon . '"></i></a>';

        return $xhtml;
    }

    public static function itemHistory($by, $time)
    {
        $xhtml = '';
        if ($by != '' || $time != '') {
            $xhtml .= '
                <p class="mb-0 history-by py-1"><i class="far fa-user"> ' . $by . '</i></p>
                <p class="mb-0 history-time"><i class="far fa-clock"></i> ' . date('d/m/Y H:i:s', strtotime($time)) . '</p>
            ';
        }
        return $xhtml;
    }

    public static function itemHomeAjax($module, $controller, $id, $status, $function)
    {
        $link = URL::createLink($module, $controller, 'changeIsHomepage', ['id' => $id, 'status' => $status]);
        $xhtml = '';
        $class = 'bg-gradient-success';
        $icon = 'fa-check';
        if ($status == 'no') {
            $class = 'bg-gradient-danger';
            $icon = 'fa-minus';
        }
        $xhtml .= '<a id="isHome-post-' . $id . '" href="javascript:' . $function . '(\'' . $link . '\')" class="py-2 my-btn-state rounded-circle btn btn-sm ' . $class . '"><i class="fas ' . $icon . '"></i></a>';

        return $xhtml;
    }

    public static function highlightSearch($keyword, $string)
    {
        $xhtml = !empty($keyword) ? preg_replace("#$keyword#ui", "<mark>$0</mark>", $string) : $string;
        return $xhtml;
    }

    public static function showEmptyRow($colspan = 5, $message = 'Dữ liệu đang được cập nhật!')
    {
        return sprintf('<tr><td colspan="%s" style="text-align: center">%s</td></tr>', $colspan, $message);
    }

    public static function btnLink($link, $color, $title, $icon)
    {
        return sprintf('<a href="%s" class="py-2 mx-1 rounded-circle btn btn-sm %s" title="%s">
                            <i class="%s"></i>
                        </a>', $link, $color, $title, $icon);
    }

    public static function btnLinkAjax($function, $link, $color, $title, $icon)
    {
        return sprintf('<a href="javascript:%s(\'%s\')" class="mx-1 rounded-circle btn btn-sm %s" title="%s">
                            <i class="%s"></i>
                        </a>', $function, $link, $color, $title, $icon);
    }

    public static function selectBox($id, $name, $arrOptions, $selected, $dataID = '')
    {
        $xhtml = '';
        $xhtml .= '<select id="' . $id . '" name="' . $name . '" class="custom-select custom-select-sm mr-1" data-id="' . $dataID . '" style="width: unset">';
        if (!empty($arrOptions)) {
            foreach ($arrOptions as $key => $value) {
                $active = ($key == $selected) ? 'selected' : '';
                $xhtml .= '<option value="' . $key . '" ' . $active . '>' . $value . '</option>';
            }
        }
        $xhtml .= '</select>';
        return $xhtml;
    }

    public static function filterStatus($module, $controller, $itemStatusCount, $currentStt, $arrFilter = null)
    {
        $xhtml = "";
        if (!empty($itemStatusCount)) {
            foreach ($itemStatusCount as $key => $value) {
                $active = ($key == $currentStt) ? 'bg-gradient-info' : 'bg-gradient-secondary';
                $name =  ucfirst($key);
                $params = ['status' => $key];
                
                if(!empty($arrFilter)){
                    foreach($arrFilter as $keyFilter => $valueFilter){
                        $params[$keyFilter] = $valueFilter;
                    }
                }
                // if (!empty($search)) $params['search_value'] = $search;
                // if (!empty($group_acp)) $params['filter_group_acp'] = $group_acp;
                // if (!empty($group)) $params['filter_group'] = $group;
                // if (!empty($special)) $params['filter_special'] = $special;
                // if (!empty($category)) $params['filter_category'] = $category;
                // if (!empty($isHomePage)) $params['filter_homepage'] = $isHomePage;
                $link = URL::createLink($module, $controller, 'index', $params);
                $xhtml .= sprintf('<a href="' . $link . '" class="mr-1 btn btn-sm ' . $active . '">' . $name . ' <span class="badge badge-pill badge-light">' . $value . '</span></a>');
            }
            return $xhtml;
        }
    }

    public static function itemSideBar($type, $link, $title, $icon, $active,  $arrElement = null)
    {
        $xhtml = '';
        $active = ($title == $active) ? 'active' : '';
        if ($type == 'single') {
            $xhtml = '<li class="nav-item">
                        <a href="'.$link.'"  class="nav-link '.$active.'" data-active="'.$title.'">
                            <i class="nav-icon '.$icon.'"></i>
                            <p>'.ucfirst($title).'</p>
                        </a>
                    </li>';
        } elseif ($type == 'multi') {
            $xhtml = '<li class="nav-item has-treeview">
                        <a href="'.$link.'" class="nav-link '.$active.'"  data-active="'.$title.'">
                            <i class="nav-icon '.$icon.'"></i>
                            <p>'.ucfirst($title).'<i class="fas fa-angle-left right"></i></p>
                        </a>
                        <ul class="nav nav-treeview">';
                        foreach($arrElement as $value){
                            $xhtml .= '<li class="nav-item pl-2">
                                        <a href="'.$value['link'].'" class="nav-link">
                                            <i class="'.$value['icon'].' nav-icon"></i>
                                            <p>'.ucfirst($value['title']).'</p>
                                        </a>
                                    </li>';
                                    }
            $xhtml .= '</ul></li>';
        }
        return $xhtml;
    }
}
