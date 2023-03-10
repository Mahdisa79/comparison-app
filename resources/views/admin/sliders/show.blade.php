@extends('admin.layouts.master')
@section('head-tag')
<title>ارتباط با ما</title>
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
								<h1 class="page-title">اسلایدر </h1>
							</div>
							<div class="ms-auto pageheader-btn">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">اسلایدر ها</a></li>
									<li class="breadcrumb-item active" aria-current="page">صفحات</li>
								</ol>
							</div>
						</div>
						<!-- PAGE-HEADER END -->

            <div class="row">
               
              <div class="col-md-12">
          
              <div class="card ">

                  <div class="card-header border-bottom" style="flex-direction: column ; align-items: flex-start">
                    <div style="width: 100%">

                    
                      <form style="width: 100%"  method="post" action="{{ route('admin.sliders.update',['id' => $slider->id]) }}">

                    <div class="d-flex justify-content-between" style="width: 100%">  
                        @csrf
                        @method('PUT')
                      <div class="col-6">   
                        <input type="text" name="title" class="form-control mb-2" value="{{ old('title',$slider->title) }}"  placeholder="عنوان را وارد کنید">
                      </div>         
                      <div>
                      <button type="submit" class="btn btn-warning   fs-14 text-white edit-icn" style="width: 200px" title="">
                        ویرایش اطلاعات 
                      </button>  
                   
                      </div>
                    </form>               

                    </div>
                  </div>

                  </div>
                  <!-- /.card-header -->
                  
                  <!-- form start -->
                
                  <div class="card-body">
                    <div class="d-flex justify-content-between mb-4" style="width: 100%">  
                      <div class=""> 
                    <h5>اسلاید ها</h5>
                  </div>

                  <div class=""> 

                    <a href="{{ route('admin.sliders.addSlide.create',['id' => $slider->id])}}" class="btn btn-primary fs-14 text-white edit-icn" style="" title="ویرایش">
                      افزودن اسلاید جدید
                  </a>
                </div>

                  </div>
                    <div class="table-responsive">
                      <table class="table border text-nowrap text-md-nowrap table-hover">
                        <thead>
                              <tr>
                                  <th>#</th>
                                  <th>عنوان</th>
                                  <th>آدرس</th>
                                  <th>وضعیت</th>
                                  <th>عکس</th>

                                  <th>تنظیمات</th>
                              </tr>
                        </thead>
                        <tbody>

                              @foreach ($slides as $slide )

                              <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $slide->title ?? "" }}</td>
                              <td>{{ $slide->url?? "" }}</td>
                              <td>{{ $slide->status == 1? "فعال" : 'غیر فعال' }}</td>
                              <td>
                                <img src="{{ asset($slide->image['indexArray']['small'] ) }}" alt="" width="100" height="50">
                              </td>
                              {{-- {{ asset($slide->image['small']) }}" --}}

                              <td style="width: 200px">

																<div class="d-flex justify-content-around">

																<div>	
                                  <a href="{{ route('admin.sliders.editSlide',['slider' => $slider->id,'slide'=>$slide->id])}}" class="btn btn-success fs-14 text-white edit-icn"  title="ویرایش">
                                    <i class="fe fe-edit"></i>
                                      </a>
															</div>
															<div>
																<form  action="{{route('admin.sliders.deleteSlide',['slider' => $slider->id,'slide'=>$slide->id])}}" method="post">
																	@csrf
																	@method('delete')
																	<button class="btn btn-danger fs-14 text-white delete" title="حذف" type="submit"><i class="fa fa-trash"></i></button>
																
																</form>
															</div>

															  </div>

                                         </td>


                              </tr>
                              @endforeach

                        </tbody>
                      </table>
                    </div>
                  </div>
          
          
                </div>
              </div>
          </div>

					</div>
				</div>
			</div>
			<!-- CONTAINER END -->

@endsection

@section('script')

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection