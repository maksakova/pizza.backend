<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    private $page;

    public function __construct(Page $page)
    {
        $this->page = $page;
    }

    public function index()
    {
        $pages = Page::all();

        return view('admin.pages.index', [
            'pages' => $pages,
        ]);
    }

    public function edit($id)
    {
        return view('admin.pages.edit', [
            'page' => $this->page->whereId($id)->firstOrFail(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $item = Page::find($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        if ($request->file('img') != null) {

            $request->file('img')->move(public_path('img/uploads'), $request->file('img')->getClientOriginalName());

            $data['img'] = '/img/uploads/' . $request->file('img')->getClientOriginalName();

        }

        $result = $item->update($data);

        if ($result) {
            return redirect()
                ->route('admin.pages.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }
}
