<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Marker;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    /**
     * ObjectController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Получаем список объектов в админ-панель
     */
    public function list() {
        $markers = Marker::paginate(15);
        return view('admin.objects.index', ['markers' => $markers]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Страница создания объекта
     */
    public function createPage() {
        return view('admin.objects.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Функция создания объекта
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:255',
            'coords' => 'required',
            'status' => 'required'
        ]);

        Marker::create([
           'name' => $request->input('name'),
           'desc' => $request->input('desc'),
           'coords' => $request->input('coords'),
           'status' => $request->input('status'),
        ]);

        $request->session()->flash('success', 'Объект успешно создан');
        //return redirect()->route('list_object');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * Страница редактирования объекта
     */
    public function editPage(Request $request) {
        $marker = Marker::findOrFail($request->id);
        return view('admin.objects.edit', ['marker' => $marker]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Функция обновления существующего объекта
     */
    public function update(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'desc' => 'required|max:255',
            'coords' => 'required',
            'status' => 'required'
        ]);

        Marker::findOrFail($request->id)->update([
            'name' => $request->input('name'),
            'desc' => $request->input('desc'),
            'coords' => $request->input('coords'),
            'status' => $request->input('status'),
        ]);

        $request->session()->flash('success', 'Объект успешно обновлен');
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * Удаление объекта из базы
     */
    public function delete(Request $request) {
        Marker::findOrFail($request->id)->delete();
        $request->session()->flash('success', 'Маркер успешно удален');
        return redirect()->back();
    }
}
