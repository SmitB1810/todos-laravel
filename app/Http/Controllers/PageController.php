<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function getPage(){
        try {
            $page = Page::all();
            return $page;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function addPage(Request $req) {
        try {
            $page = new Page;
            $page->user_name = $req->user_name;
            $page->save();
            return "Inserted Successfully!";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function updatePage($id, Request $req) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $page = Page::find($id);
                $page->user_name = $req->user_name;
                $page->save();
                return "Updated Successfully!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function deletePage($id) {
        try {
            if ($id==null) {
                return "ID not found";
            } else {
                $page = Page::find($id)->delete();
                return "Deleted Successfully!";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
