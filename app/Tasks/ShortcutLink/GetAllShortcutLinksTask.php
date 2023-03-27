<?php

namespace App\Tasks\ShortcutLink;

use App\Models\ShortcutLink;
use Illuminate\Http\Request;

class GetAllShortcutLinksTask
{
    public function __construct()
    {
    }

    public function run(Request $request)
    {
        return datatables()->of(ShortcutLink::query())
            ->addColumn('shortcut_link', function (ShortcutLink $ShortcutLink) {
                return '<a href="'.route('shortcut-links.redirect',['uuid'=>$ShortcutLink->uuid]).'">'.route('shortcut-links.redirect',['uuid'=>$ShortcutLink->uuid]).'</a>';
            })
            ->addColumn('action', function (ShortcutLink $ShortcutLink) {
                $content = '<button type="button" class="btn btn-sm btn-danger-outline" data-toggle="tooltip"  onclick="deleteItem(\''.route('shortcut-links.destroy',$ShortcutLink->id).'\')" data-original-title="Delete"><i class="ti-trash" aria-hidden="true"></i></button>';
                $content .= '<a href="'.route('shortcut-links.edit',$ShortcutLink->id).'" class="btn btn-sm btn-primary-outline" title="modifier">
                <i class="fa fa-edit"></i>
                </a>';
                return html_entity_decode($content);
            })->rawColumns(['action','shortcut_link'])
            ->make(true);
    }
}
