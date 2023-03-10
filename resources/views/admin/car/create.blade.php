@extends('admin.layouts.master')
@section('head-tag')
<title>خودرو جدید</title>
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
								<h1 class="page-title">خودرها ها</h1>
							</div>
							<div class="ms-auto pageheader-btn">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">ماشین ها</a></li>
									<li class="breadcrumb-item active" aria-current="page">صفحات</li>
								</ol>
							</div>
						</div>
						<!-- PAGE-HEADER END -->

            <div class="row">
               
              <div class="col-md-12">
          
              <div class="card ">
                  {{-- <div class="card-header">
                    <h3 class="card-title">صفحه ارتباط با ما </h3>
                  </div> --}}
                  <div class="card-header border-bottom">
                    <h3 class="card-title">افزودن خودرو  جدید</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form    method="post" action="{{ route('admin.cars.store') }}" enctype="multipart/form-data">
                      @csrf
                      @method('post')
                    <div class="card-body">
                      <div class="row">
          
                      <div class="col-md-6">
                      
                      <div class="form-group">
                        <label for="">نام خودرو</label>
                        <input type="text" name="name" class="form-control mb-2" value="{{ old('name') }}"  placeholder="">
                      
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
                            <option value="{{$category->id}}" @if(old('category_id') == $category->id) selected @endif>{{$category->persian_name }}</option>

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
                          <option value="{{$brand->id}}" @if(old('brand_id') == $brand->id) selected @endif>{{$brand->persian_name }}</option>

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
                                <input type="file" class="form-control file-input mb-2" name="image" id="logo">
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
                        <input type="text" name="color" class="form-control mb-2" value="{{ old('color') }}"  placeholder="">
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
                        <input type="text" name="power" class="form-control mb-2" value="{{ old('power') }}"  placeholder="">
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
                        <input type="text" name="price_us" class="form-control mb-2" value="{{ old('price_us') }}"  placeholder="">
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
                        <input type="text" name="country" class="form-control mb-2" value="{{ old('country') }}"  placeholder="">
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
                        <input type="text" name="maxspeed" class="form-control mb-2" value="{{ old('maxspeed') }}"  placeholder="">
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
                        <input type="text" name="safety_class" class="form-control mb-2" value="{{ old('safety_class') }}"  placeholder="">
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
                        <input type="text" name="fuel_consumption" class="form-control mb-2" value="{{ old('fuel_consumption') }}"  placeholder="">
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
                        <input type="text" name="acceleration" class="form-control mb-2" value="{{ old('acceleration') }}"  placeholder="">
                        @error('acceleration')
                        <span class="alert_required bg-danger text-white p-1 mt-2 " role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                        @enderror
                      </div>
                     </div>


                     <div class="col-md-6 ">
                      <div class="form-group">
                          <label for="status">وضعیت</label>
                          <select name="status" id="" class="form-control form-select mb-2" id="status">
                              <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                              <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                          </select>
                      </div>
                      @error('status')
                      <span class="alert_required bg-danger text-white p-1 " role="alert">
                          <strong>
                              {{ $message }}
                          </strong>
                      </span>
                  @enderror
                  </div>
                               
          
                    </div>
          
                    <div class="d-flex justify-content-center ">
                      <button type="submit" class="btn btn-primary col-md-4 edit" >ایجاد خودرو جدید</button>
                    </div>
          
          
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


