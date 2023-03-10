@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش برند</title>
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
								<h1 class="page-title">برند ها</h1>
							</div>
							<div class="ms-auto pageheader-btn">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">برند ها</a></li>
									<li class="breadcrumb-item active" aria-current="page">صفحات</li>
								</ol>
							</div>
						</div>
						<!-- PAGE-HEADER END -->

            <div class="row">
              
              <div class="col-md-12">
               
              
          
              <div class="card ">

                  <div class="card-header border-bottom" style="flex-direction: column ; align-items: flex-start">
                    <h3 class="card-title">ویرایش برند</h3>
                  </div>

              
                  <!-- /.card-header -->
                  
                  <!-- form start -->
                
                  <div class="card-body">
                    <form style="width: 100%"  method="post" action="{{ route('admin.brands.update',['brand' => $brand->id]) }}" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
            
                      <div class="row">


                    




                        <div class="col-md-6">
                      
                          <div class="form-group">
                            <label for="">نام برند(فارسی)</label>
                            <input type="text" name="persian_name" class="form-control mb-2" value="{{ old('persian_name',$brand->persian_name) }}"  placeholder="">
                          
                            @error('persian_name')
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
                            <label for="">نام برند(اینگلیسی)</label>
                            <input type="text" name="original_name" class="form-control mb-2" value="{{ old('original_name',$brand->original_name) }}"  placeholder="">
                          
                            @error('original_name')
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
                                    <label for="logo">تصویر</label>
                                    <div class="col-sm-12 col-md-4 mg-t-10 mg-sm-t-0">
                                      <input type="file" name="logo" class="dropify" data-default-file="{{ asset($brand->logo['indexArray']['medium'] ) }}" data-height="200"  />
                                    </div>
                                  </div>
                            @error('logo')
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
                                  <option value="0" @if (old('status', $brand->status) == 0) selected @endif>غیرفعال</option>
                                  <option value="1" @if (old('status', $brand->status) == 1) selected @endif>فعال</option>
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