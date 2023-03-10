<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.sliders.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        $data = $request->validate(['title' => 'required|string|min:2|max:255']);

        Slider::create($data);

        return redirect()->route('admin.sliders.index')->with('swal-success', 'اسلایدر جدید با موفقیت ساخته شد');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $slider = Slider::findOrFail($id);
        $slides = $slider->slides;
        // dd($slides,$slides[0]->image['indexArray']['small']);
        
        return view('admin.sliders.show', compact('slider','slides'));
    }



    /**
     * @param Request $request
     * @param Slider $slider
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {


        $slider = Slider::findOrFail($id);

        $data = $request->validate(['title' => 'required|string|min:2|max:255']);


        $slider->update($data);

        return redirect()->route('admin.sliders.index');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Slider::destroy($id);

        return redirect()->route('sliders.index')->with('flash_message', 'Slider deleted!');
    }
}
