@extends('admin.layouts.master')
@section('head-tag')
<title>ویرایش دسته یندی</title>
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
								<h1 class="page-title">دسته بندی ها</h1>
							</div>
							<div class="ms-auto pageheader-btn">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">دسته بندی ها</a></li>
									<li class="breadcrumb-item active" aria-current="page">صفحات</li>
								</ol>
							</div>
						</div>
						<!-- PAGE-HEADER END -->

            <div class="row">
              
              <div class="col-md-12">
               
              
          
              <div class="card ">

                  <div class="card-header border-bottom" style="flex-direction: column ; align-items: flex-start">
                    <h3 class="card-title">ویرایش دسته بندی</h3>
                  </div>

              
                  <!-- /.card-header -->
                  
                  <!-- form start -->
                
                  <div class="card-body">
                    <form style="width: 100%"  method="post" action="{{ route('admin.categories.update',['id' => $category->id]) }}">
                      @csrf
                      @method('PUT')
            
                      <div class="row">


                    




                        <div class="col-md-6">
                      
                          <div class="form-group">
                            <label for="">نام دسته بندی(فارسی)</label>
                            <input type="text" name="persian_name" class="form-control mb-2" value="{{ old('persian_name',$category->persian_name) }}"  placeholder="">
                          
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
                            <label for="">نام دسته بندی(اینگلیسی)</label>
                            <input type="text" name="original_name" class="form-control mb-2" value="{{ old('original_name',$category->original_name) }}"  placeholder="">
                          
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
                              <label for="status">وضعیت</label>
                              <select name="status" id="" class="form-control form-select form-control-sm" id="status">
                                  <option value="0" @if (old('status', $category->status) == 0) selected @endif>غیرفعال</option>
                                  <option value="1" @if (old('status', $category->status) == 1) selected @endif>فعال</option>
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