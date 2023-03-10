@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش خودرو</title>
@endsection


@section('content')

			<!--app-content open-->
			<div class="app-content main-content mt-0">
				<div class="side-app">
					 <!-- CONTAINER -->
					 <div class="main-container container-fluid">
						<!-- PAGE-HEADER -->
						<div class="page-header">
							<div>
								<h1 class="page-title">خودرو ها</h1>
							</div>
							<div class="ms-auto pageheader-btn">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">خودرو ها</a></li>
									<li class="breadcrumb-item active" aria-current="page">صفحات</li>
								</ol>
							</div>
						</div>
						<!-- PAGE-HEADER END -->

            <div class="row">
              
              <div class="col-md-12">
               
              
          
              <div class="card ">

                  <div class="card-header border-bottom" style="flex-direction: column ; align-items: flex-start">
                    <h3 class="card-title">ویرایش خودرو</h3>
                  </div>

              
                  <!-- /.card-header -->
                  
                  <!-- form start -->
                
                  <div class="card-body">
                    <form style="width: 100%"  method="post" action="{{ route('admin.cars.update',['car' => $car->id]) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
            
                      <div class="row">


                    
                        <div class="col-md-6 ">
                        <div class="form-group">
                          <label for="">نام خودرو</label>
                          <input type="text" name="name" class="form-control mb-2" value="{{ old('name',$car->name) }}"  placeholder="">
                        
                          @error('name')
                          <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                              <strong>
                                  {{ $message }}
                              </strong>
                          </span>
                          @enderror
                        </div>
                      </div>


                        <section class="col-md-6 ">
                          <div class="form-group">
                              <label for="status">دسته بندی خودرو</label>
                              <select name="category_id" id="" class="form-control form-select sele mb-2" id="">
    
                                @foreach ($categories as $category )
                                <option value="{{$category->id}}" @if(old('category_id',$car->category_id) == $category->id) selected @endif>{{$category->persian_name }}</option>
    
                                @endforeach
    
                              </select>
                          </div>
                          @error('category_id')
                          <span class="alert_required bg-danger text-white p-1 " role="alert">
                              <strong>
                                  {{ $message }}
                              </strong>
                          </span>
                      @enderror
                      </section>


                      
                  <section class="col-md-6 ">
                    <div class="form-group">
                        <label for="status">برند خودرو</label>
                        <select name="brand_id" id="" class="form-control form-select sele mb-2" id="">

                          @foreach ($brands as $brand )
                          <option value="{{$brand->id}}" @if(old('brand_id',$car->brand_id) == $brand->id) selected @endif>{{$brand->persian_name }}</option>

                          @endforeach

                        </select>
                    </div>
                    @error('brand_id')
                    <span class="alert_required bg-danger text-white p-1 " role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
                </section>



                <div class="col-md-6">
                      
                          <div class="form-group">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                                      <input type="file" name="image" class="dropify" data-default-file="{{ asset($car->image['indexArray']['medium'] ) }}" data-height="200"  />
                                    </div>
                                  </div>
                            @error('image')
                            <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                          </div>
                
                </div>



                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">رنگ</label>
                    <input type="text" name="color" class="form-control mb-2" value="{{ old('color',$car->color) }}"  placeholder="">
                    @error('color')
                    <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                  </div>
                 </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="">قدرت</label>
                    <input type="text" name="power" class="form-control mb-2" value="{{ old('power',$car->power) }}"  placeholder="">
                    @error('power')
                    <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                  </div>
                 </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="">قیمت</label>
                    <input type="text" name="price_us" class="form-control mb-2" value="{{ old('price_us',$car->price_us) }}"  placeholder="">
                    @error('price_us')
                    <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                  </div>
                 </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="">کشور سازنده</label>
                    <input type="text" name="country" class="form-control mb-2" value="{{ old('country',$car->country) }}"  placeholder="">
                    @error('country')
                    <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                  </div>
                 </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="">حداکثر سرعت</label>
                    <input type="text" name="maxspeed" class="form-control mb-2" value="{{ old('maxspeed',$car->maxspeed) }}"  placeholder="">
                    @error('maxspeed')
                    <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                  </div>
                 </div>


                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="">میزان امنیت</label>
                    <input type="text" name="safety_class" class="form-control mb-2" value="{{ old('safety_class',$car->safety_class) }}"  placeholder="">
                    @error('safety_class')
                    <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                  </div>
                 </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="">میزان مصرف سوخت</label>
                    <input type="text" name="fuel_consumption" class="form-control mb-2" value="{{ old('fuel_consumption',$car->fuel_consumption) }}"  placeholder="">
                    @error('fuel_consumption')
                    <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                  </div>
                 </div>

                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="">شتاب</label>
                    <input type="text" name="acceleration" class="form-control mb-2" value="{{ old('acceleration',$car->acceleration) }}"  placeholder="">
                    @error('acceleration')
                    <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                  </div>
                 </div>





                      <div class="col-md-6">
                          <div class="form-group">
                              <label for="status">وضعیت</label>
                              <select name="status" id="" class="form-control form-select form-control-sm" id="status">
                                  <option value="0" @if (old('status', $car->status) == 0) selected @endif>غیرفعال</option>
                                  <option value="1" @if (old('status', $car->status) == 1) selected @endif>فعال</option>
                              </select>
                          </div>
                          @error('status')
                              <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                  <strong>
                                      {{ $message }}
                                  </strong>
                              </span>
                          @enderror
                      </div>





                </div>

                
                <div class="d-flex justify-content-center ">
                <button type="submit" class="btn btn-warning   fs-14 text-white edit-icn" style="width: 200px" title="">
                  ویرایش اطلاعات 
                </button>  
                </div>

             
              </form>     


 
          
          
                </div>
          </div>
        </div>

					</div>
				</div>
			</div>
			<!-- CONTAINER END -->

@endsection

@section('script')



@endsection