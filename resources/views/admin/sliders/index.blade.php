@extends('admin.layouts.master')
@section('head-tag')
<title>اسلایدر ها</title>
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
								<h1 class="page-title"> اسلایدر ها</h1>
							</div>
							<div class="ms-auto pageheader-btn">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">اسلایدر ها</a></li>
									<li class="breadcrumb-item active" aria-current="page">صفحات</li>
								</ol>
							</div>
						</div>
						<!-- PAGE-HEADER END -->


            



                        <!-- Row -->
							<div class="row row-sm">
								<div class="col-lg-12">
									<div class="card custom-card">
										<div class="card-header border-bottom">
                            

                                        
                                            <div class="d-flex justify-content-between" style="width: 100%">

                                                <div>   
                                                    <h3 class="card-title">اسلایدر ها</h3>   
                                                    </div>
                                                
                                                <div>
                                                <a href="{{route('admin.sliders.create')}}" class="btn btn-primary fs-14 text-white edit-icn" style="width: 200px" title="">
                                                        ساخت اسلایدر جدید
                                                </a>                            
                                                </div>
                                                                              
                                            </div>

										</div>
										<div class="card-body">
											<div class="table-responsive">
												<table class="table border text-nowrap text-md-nowrap table-hover">
													<thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>عنوان</th>
                                                            <th>تعداد اسلاید ها</th>
                                                            <th>تنظیمات</th>
                                                        </tr>
													</thead>
													<tbody>

                                                        @foreach ($sliders as $slider )

                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $slider->title ?? "" }}</td>
                                                            <td>{{ $slider->slides->count() ?? "" }}</td>
                                                            <td style="width: 150px">
                                                                <a href="{{ route('admin.sliders.show',['id' => $slider->id])}}" class="btn btn-warning fs-14 text-white edit-icn" style="width: 100px" title="ویرایش">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
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
							<!-- End Row -->

						</div>

						</div>

						</div>


@endsection