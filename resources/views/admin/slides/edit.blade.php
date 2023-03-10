@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش اسلاید</title>
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
								<h1 class="page-title">اسلاید ها</h1>
							</div>
							<div class="ms-auto pageheader-btn">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">اسلاید ها</a></li>
									<li class="breadcrumb-item active" aria-current="page">صفحات</li>
								</ol>
							</div>
						</div>
						<!-- PAGE-HEADER END -->

            <div class="row">
              
              <div class="col-md-12">
               
              
          
              <div class="card ">

                  <div class="card-header border-bottom" style="flex-direction: column ; align-items: flex-start">
                    <h3 class="card-title">ویرایش اسلاید</h3>
                  </div>

              
                  <!-- /.card-header -->
                  
                  <!-- form start -->
                
                  <div class="card-body">
                    <form style="width: 100%"  method="post" action="{{ route('admin.sliders.updateSlide',['slider' => $slider->id,'slide'=>$slide->id]) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
            
                      <div class="row">


                    




                        <div class="col-md-6">
                      
                          <div class="form-group">
                            <label for="">عنوان</label>
                            <input type="text" name="title" class="form-control mb-2" value="{{ old('title',$slide->title) }}"  placeholder="">
                          
                            @error('title')
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
                            <label for="">آدرس</label>
                            <input type="text" name="url" class="form-control mb-2" value="{{ old('url',$slide->url) }}"  placeholder="">
                          
                            @error('url')
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
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                                      <input type="file" name="image" class="dropify" data-default-file="{{ asset($slide->image['indexArray']['userHome'] ) }}" data-height="200"  />
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
                              <label for="status">وضعیت</label>
                              <select name="status" id="" class="form-control form-select form-control-sm" id="status">
                                  <option value="0" @if (old('status', $slide->status) == 0) selected @endif>غیرفعال</option>
                                  <option value="1" @if (old('status', $slide->status) == 1) selected @endif>فعال</option>
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