<?php

namespace App\Http\Controllers\Admin;

use App\Actions\ShortcutLink\DeleteShortcutLinkAction;
use App\Actions\ShortcutLink\FindShortcutLinkByUuidAction;
use App\Actions\ShortcutLink\GetAllShortcutLinksAction;
use App\Actions\ShortcutLink\StoreShortcutLinkAction;
use App\Actions\ShortcutLink\UpdateShortcutLinkAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ShortcutLinkRequest;
use App\Models\ShortcutLink;
use App\ViewModels\ShortcutLinks\ShortcutLinksViewModel;
use Illuminate\Http\Request;

class ShortcutLinkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','activityLog'])->except("redirect");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return (new ShortcutLinksViewModel())->view('admin.shortcut-links.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return (new ShortcutLinksViewModel())->view('admin.shortcut-links.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ShortcutLinkRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShortcutLinkRequest $request)
    {
        try {
            app(StoreShortcutLinkAction::class)->run($request);
            return redirect()->route('shortcut-links.index')->with('success', __('general.Created successfully'));
        } catch (\Exception $e) {
            return redirect()->route('shortcut-links.index')->with('danger', __('general.Server error'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ShortcutLink $shortcutLink)
    {
        return (new ShortcutLinksViewModel($shortcutLink))->view('admin.shortcut-links.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ShortcutLinkRequest  $request
     * @param  ShortcutLink  $shortcutLin
     * @return \Illuminate\Http\Response
     */
    public function update(ShortcutLinkRequest $request, ShortcutLink $shortcutLink)
    {
        try {
            app(UpdateShortcutLinkAction::class)->run($request,$shortcutLink);
            return redirect()->route('shortcut-links.index')->with('success', __('general.Updated successfully'));
        } catch (\Exception $e) {
            return redirect()->route('shortcut-links.index')->with('danger', __('general.Server error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ShortcutLink  $shortcutLin
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShortcutLink $shortcutLink)
    {
        app(DeleteShortcutLinkAction::class)->run($shortcutLink);
        return response()->json(['success'=>true,"message"=>__('general.Deleted successfully')]);
    }

    public function getAll(Request $request)
    {
        return  app(GetAllShortcutLinksAction::class)->run($request);
    }
    public function redirect($uuid){
        $shortcutLink=app(FindShortcutLinkByUuidAction::class)->run($uuid);
        if(!$shortcutLink) return abort(404);
        return redirect($shortcutLink->link);
    }
}
