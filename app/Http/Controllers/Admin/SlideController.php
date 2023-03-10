<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slide;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Services\Image\ImageService;

class SlideController extends Controller
{

    public function create($sliderID)
    {
        // dd($sliderID);
        return view('admin.slides.create',compact('sliderID'));
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request,$id)
    {
       
        $inputs  = $request->validate([
            'title' => 'required|string|min:2|max:255',
            'url' => 'required|max:500',
            'status' => 'required|numeric|in:0,1',   
            'image' => 'required|image|mimes:png,jpg,jpeg,gif',

        ]);
        // dd($inputs);
        $imageService = new ImageService;

        if ($request->hasFile('image')) {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'slide');
            $result = $imageService->createIndexAndSave($request->file('image'),'slide');
            if ($result === false) {
                return redirect()->back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
      
        $inputs['slider_id'] = $id;


        DB::transaction(function () use ($inputs) {
            Slide::create($inputs);       
        });

        return redirect()->route('admin.sliders.show', ['id' => $id])->with('swal-success', 'اسلاید جدید با موفقیت اضافه شد');
    }


    public function edit(Request $request, Slider $slider, Slide $slide)
    {
 
        return view('admin.slides.edit', compact('slide', 'slider'));
    
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @param Slide $slide
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Slider $slider, Slide $slide)
    {


        $data = $request->validate([
            'title' => 'required|string|min:2|max:255',
            'url' => 'required|max:500|min:5',
            'status' => 'required|numeric|in:0,1',   
            'image' => 'sometimes|image|mimes:png,jpg,jpeg,gif',   
        ]);


        if(isset($data['image'])){
            $imageService = new ImageService;

            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'slide');
            $result = $imageService->createIndexAndSave($request->file('image'),'slide');
            if ($result === false) {
                return redirect()->back()->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $data['image'] = $result;
        }
        else{
            $data['image'] = $slide->image;
        }


        $slide->update($data);

        return redirect()->route('admin.sliders.show', ['id' => $slider->id])->with('swal-success', 'ویرایش اسلاید انجام شد!');
    }

    /**
     * @param Request $request
     * @param Slider $slider
     * @param Slide $slide
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request, Slider $slider, Slide $slide)
    {
        $slide->delete();

        return redirect()->route('admin.sliders.show', ['id' => $slider->id])->with('swal-success', 'اسلاید حذف شد!');
    }
}
