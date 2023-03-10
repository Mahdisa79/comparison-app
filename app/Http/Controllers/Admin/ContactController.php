<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('admin.contact.show',compact('contact'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $this->validate($request, [
            'name' => 'required|max:120|min:2',
            'email'=>'required|email',
            'phone_number'=>'required|max:14|min:2',
            'subject'=>'required|max:3000|min:2',
            'sts'=>'required|numeric|in:0,1',
            'contect'=>'required|min:5',
        ]);
       
        $contact->update($data);
        return redirect()->route('admin.contact.show',['contact'=>1])->with('swal-success', 'داده با موفقیت ویرایش شد !');
    }


}
