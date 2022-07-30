<?php

namespace App\Librari;

use Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

use App\Librari\GlobalTools;
use App\Models\Menu_akses;

class Menusakses {

    protected $idMenuAktif = array();

    public function getMenus()
    {
        $Globaltools = new GlobalTools();
        $checkUsers  = $Globaltools->userAkses();
        $teksmenu    = "";

        if ($checkUsers->status == true) {
            $listmenu = $Globaltools->listMenu($checkUsers->akses_id);
            $teksmenu = $this->getMenuList($listmenu, $checkUsers->akses_id);
        }

        $url = url('/');
        $teksmenu = str_replace('{{ route(', $url . '/', $teksmenu);
        $teksmenu = str_replace(') }}', '', $teksmenu);

       return $teksmenu;
    }

    function menusActive($akses){

        $path     = request::path();
        $exp      = explode('/', $path);
        $urlMenus = isset($exp[0]) ? $exp[0] : null;

        $url_menus  = false;
        $menusIds   = null;
        $menuParent = [];
        if($urlMenus != null){

                $menus = \App\Models\Menu_app::where('link',$urlMenus)->first();

                if(isset($menus)){
                    $menuParents[$menus->id] = $menus->id;
                    $menus1  = \App\Models\Menu_app::find($menus->parent);

                    if(isset($menus1)){
                        $menuParents[$menus1->id] = $menus1->id;
                        $menus2  = \App\Models\Menu_app::find($menus1->parent);
                        if(isset($menus2)){
                            //next
                            $menuParents[$menus2->id] = $menus2->id;
                        }
                    }

                }

            // dd($menuParents);

            if($menus){
                $url_menus = true;
                $menusIds   = $menus->id;
                $menuParent = $menuParents;
            }
        }

        // dd($menuParent);

        $data['url_menus'] = $url_menus;
        $data['menusIds']  = $menusIds;
        $data['menuParent'] = $menuParent;

        return (object)$data;


    }

    public function getMenuList($getList, $akses)
    {
        $globaltools = new Globaltools();

        $active  = null;
        $html    = "";


        foreach($getList as $key => $parent){
            //  dd($parent->id);
            $submenus = $globaltools->subMenu($parent->id, $akses);
            if(count($submenus) > 0){
                $html .= $this->parentMenus($akses, $parent);
                foreach($submenus as $submenu){
                    $submenus2 = $globaltools->subMenu($submenu->id, $akses);
                    if(count($submenus2) > 0){
                        $html .= $this->parentSubMenus($akses, $submenu);
                        foreach($submenus2 as $sub2){
                            $html .= $this->subMenus($akses, $sub2);
                        }
                        $html .='</ul></div></li>';
                    }else{
                        $html .= $this->subMenus($akses, $submenu);
                    }
                }
                $html .='</ul></div></li>';
            }else{
                $html .= $this->parentEnd($akses, $parent);

            }
        }

        return $html;

    }

    function parentMenus($akses, $list)
    {
        $menuUrl = $this->menusActive($akses);
        $menuParent = $menuUrl->menuParent;
        $html = "";

        $p_act  = null;
        $p_show = null;
        $p_sub  = "false";
        if(array_key_exists($list->id, $menuParent)){
            $p_act  ="active submenu";
            $p_show = "show";
            $p_sub  = "true";
        }


        $icon_link = $list->icon ?? "fas fa-genderless";

        $html .= '<li class="nav-item '.$p_act.'">
                <a data-toggle="collapse" href="#menu_'.$list->id.'" class="collapsed" aria-expanded="'. $p_sub .'">
                <i class="'.$icon_link.'"></i>
                    <p>'.$list->name.'</p>
                    <span class="caret"></span>
                </a><div class="collapse mb-1 '.$p_show.'" id="menu_'.$list->id.'">
                <ul class="nav nav-collapse mb-2 pb-1">';
        return $html;
    }

    function parentEnd($akses, $list)
    {
        $menuUrl      = $this->menusActive($akses);
        $menuParent = $menuUrl->menuParent;
        $html = "";

        $p_act = null;
        if($list->id == $menuUrl->menusIds){
            $p_act ="active";
        }

        $icon_link = $list->icon ?? "fas fa-genderless";
        $link = $this->linkAkses($list->link);

        $html .= '<li class="nav-item '.$p_act.'">
                <a href="'.$link.'">
                <i class="'.$icon_link.'"></i>
                    <span >'.$list->name.'</span>
                </a>';
        return $html;

    }

    function subMenus($akses, $list)
    {

        $menuUrl      = $this->menusActive($akses);
        $menuParent = $menuUrl->menuParent;
        $html = "";

        $p_act = null;
        if(array_key_exists($list->id, $menuParent)){
            $p_act ="active";
        }

        $icon_link = $list->icon ?? "fas fa-genderless";
        $link = $this->linkAkses($list->link);

        $html .= '<li class="'.$p_act.'">
                <a href="'.$link.'">
                <i class="'.$icon_link.'"></i>
                    <span >'.$list->name.'</span>
                </a>';
        return $html;

    }

    function parentSubMenus($akses, $list)
    {
        $menuUrl = $this->menusActive($akses);
        $menuParent = $menuUrl->menuParent;
        $html = "";

        $p_act  = null;
        $p_show = null;
        $p_sub  = "false";
        if(array_key_exists($list->id, $menuParent)){
            $p_act  ="submenu";
            $p_show = "show";
            $p_sub  = "true";
        }


        $icon_link = $list->icon ?? "fas fa-genderless";

        $html .= '<li class="'.$p_act.'">
                <a data-toggle="collapse" href="#menu_'.$list->id.'" class="collapsed" aria-expanded="'. $p_sub .'">
                <i class="'.$icon_link.'"></i>
                    <p>'.$list->name.'</p>
                    <span class="caret" style="margin-right: -7px"></span>
                </a><div class="collapse mb-1 '.$p_show.'" id="menu_'.$list->id.'">
                <ul class="nav nav-collapse mb-2 pb-1">';
        return $html;



    }

    function linkAkses($link = null)
    {
        $data = '';
        if (!empty($link)) {
                $data = '{{ route(';
                if (!empty($link))
                  $data .= $link . ') }}';

        }
        return $data;

    }
    public static function instance() {
        return new Menusakses();
    }
}
