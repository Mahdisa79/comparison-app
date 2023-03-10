@extends('admin.layouts.master')
@section('head-tag')
<title>دسته بندی ها</title>
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


            



                        <!-- Row -->
							<div class="row row-sm">
								<div class="col-lg-12">
									<div class="card custom-card">
										<div class="card-header border-bottom">
                            

                                        
                                            <div class="d-flex justify-content-between" style="width: 100%">

                                                <div>   
                                                    <h3 class="card-title">دسته بندی ها</h3>   
                                                    </div>
                                                
                                                <div>
                                                <a href="{{route('admin.categories.create')}}" class="btn btn-primary fs-14 text-white edit-icn" style="width: 200px" title="">
                                                        ساخت دسته بندی  جدید
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
                                                            <th>نام دسته بندی فا</th>
                                                            <th>نام دسته بندی en</th>
                                                            <th>وضعیت</th>
                                                            <th>تنظیمات</th>
                                                        </tr>
													</thead>
													<tbody>

                                                        @foreach ($categories as $category )

                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $category->persian_name ?? "" }}</td>
                                                            <td>{{ $category->original_name ?? "" }}</td>
                                                            <td>{{ $category->status==1 ? "فعال" : "غیر فعال"}}</td>
                                                            <td style="width: 200px">

																<div class="d-flex justify-content-around">

																<div>	
                                                                <a href="{{route('admin.categories.edit',['id'=>$category->id])}}" class="btn btn-warning fs-14 text-white edit-icn" style="" title="ویرایش">
                                                                    <i class="fe fe-edit"></i>
                                                                </a>
															</div>
															<div>
																<form id="deleteCategory" action="{{route('admin.categories.destroy',['category'=>$category->id])}}" method="post">
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
							<!-- End Row -->

						</div>

						</div>

						</div>


@endsection

@section('script')

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])


@endsection
