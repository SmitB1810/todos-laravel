<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;

class ComponentController extends Controller
{
    public function getComp(){
        try {
            $component = Component::all();
            return $component;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addComp(Request $req) {
        try {
            $component = new Component;
            $component->comp_name = $req->comp_name;
            $component->page_id = $req->page_id;
            $component->save();
            return "Inserted Successfully!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updateComp($id, Request $req) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $component = Component::find($id);
                $component->comp_name = $req->comp_name;
                $component->page_id = $req->page_id;
                $component->save();
                return "Updated Successfully!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deleteComp($id) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $component =Component::find($id)->delete();
                return "Deleted Successfully!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
