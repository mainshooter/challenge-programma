<?php

namespace App\Override\Harimayco\Menu\Controllers;

use Harimayco\Menu\Facades\Menu;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;

class MenuController extends Controller
{

    public function updateitem()
    {
        $arraydata = request()->input("menuData");
        if (is_array($arraydata)) {
            foreach ($arraydata as $value) {
                $menuitem = MenuItems::find($value['id']);
                $menuitem->label = $value['label'];
                $menuitem->link = $value['link'];
                $menuitem->class = $value['class'];
                $menuitem->save();
            }
        }
        else {
          $menuitem = MenuItems::find(request()->input("id"));
          $menuitem->label = request()->input("label");
          $menuitem->link = request()->input("url");
          $menuitem->class = request()->input("clases");
          $menuitem->save();
        }
    }

    public function addcustommenu()
    {
        $menuitem = new MenuItems();
        $menuitem->label = request()->input("labelmenu");
        $menuitem->link = request()->input("linkmenu");
        $menuitem->menu = request()->input("idmenu");
        $menuitem->sort = MenuItems::getNextSortRoot(request()->input("idmenu"));
        $menuitem->save();

    }

    public function generatemenucontrol()
    {
        $menu = Menus::find(1);
        if (is_array(request()->input("arraydata"))) {
            foreach (request()->input("arraydata") as $value) {

                $menuitem = MenuItems::find($value["id"]);
                $menuitem->parent = $value["parent"];
                $menuitem->sort = $value["sort"];
                $menuitem->depth = $value["depth"];
                $menuitem->save();
            }
        }
        echo json_encode(array("resp" => 1));

    }
}
