<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CompareController extends Controller
{

    public function compareList()
    {
        if( auth()->check() ){
        $user = auth()->user();
        $compares = $user->compare;
        


        return view('customer.compare.index',compact('user','compares'));
        }
        else
        return redirect()->back();
    }


    public function addToCompareList(Car $car){


        if( auth()->check() ){
            $user = auth()->user();
            $userCompareList = $user->compare;

            if($userCompareList->where('id',$car->id)->isEmpty()){

                if($userCompareList->count() < 4 ){
                    $user->compare()->attach($car->id);
                    //Car added to compare list
                    return response()->json(1);
                }

                //user have 4 or more car in compare list
                else
                return response()->json(4);
            }
            //user have this car in compare list before that
            else
            return response()->json(3);
        }
        //user dont login
        else
        return response()->json(2);
    }

    public function removeFromCompareList(Car $car)
    {

        if( auth()->check() ){
            $user = auth()->user();     
            $user->compare()->detach($car->id);
            $user = auth()->user();   
            $compares = $user->compare;
            $html = view('customer.layouts.compare-table',compact(['compares']))->render();
            return response()->json(['html'=>$html,'status'=>1]);

        }
        //user dont login
        else
        return response()->json(['status'=>2]);

    }

}
