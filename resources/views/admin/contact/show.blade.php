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
								<h1 class="page-title">ارتباط با ما</h1>
							</div>
							<div class="ms-auto pageheader-btn">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="javascript:void(0);">ارتباط با ما</a></li>
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
                    <h3 class="card-title">صفحه ی ارتباط با ما</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form role="form" id="updateForm"  method="post" action="{{ route('admin.contact.update',['contact' => '1']) }}">
                      @csrf
                      @method('PUT')
                    <div class="card-body">
                      <div class="row">
          
                      <div class="col-md-6">
                      
                      <div class="form-group">
                        <label for="">نام</label>
                        <input type="text" name="name" class="form-control mb-2" value="{{ old('name', $contact->name) }}" id="name" placeholder="نام را وارد کنید">
                      
                        @error('name')
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
                        <label for="email">ایمیل</label>
                        <input type="email" class="form-control mb-2" value="{{ old('email', $contact->email) }}" name="email" id="email" placeholder="ایمیل را وارد کنید">
                        @error('email')
                        <span class="alert_required bg-danger text-white p-1 " role="alert">
                            <strong>
                                {{ $message }}
                            </strong>
                        </span>
                   
                        @enderror
                      </div>
          
                      
                      </div>
          
                      <div class="col-md-6">
          
                          <div class="form-group">
                            <label for="phone_number">تلفن</label>
                            <input type="text" name="phone_number" class="form-control mb-2" value="{{ old('phone_number', $contact->phone_number) }}" id="phone_number" placeholder="تلفن را وارد کنید">
               
                            @error('phone_number')
                            <span class="alert_required bg-danger text-white p-1 " role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                       
                            @enderror
                          </div>
          
                          
                      </div>
          
                      <div class="col-md-6">
                          <div class="form-group">
                            <label for="subject">عنوان</label>
                            <input type="text" name="subject" class="form-control mb-2" value="{{ old('subject', $contact->subject) }}" id="subject" placeholder="عنوان را وارد کنید">
                  
                            @error('subject')
                            <span class="alert_required bg-danger text-white p-1 " role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                       
                            @enderror
                          </div> 
                          
          
                          
                      </div>
          
          
                      
                      <div class="col-md-6">
                      <div class="form-group">
                          <label for="sts">وضعیت</label>
                          <select name="sts" id="" class="form-control mb-2" id="sts">
                              <option value="0" @if (old('sts', $contact->sts) == 0) selected @endif >غیرفعال</option>
                              <option value="1"  @if (old('sts', $contact->sts) == 1) selected @endif>فعال</option>
                          </select>
          
                          @error('sts')
                          <span class="alert_required bg-danger text-white p-1 " role="alert">
                              <strong>
                                  {{ $message }}
                              </strong>
                          </span>
                     
                          @enderror
          
                      </div>
          
          
                  
                  </div>
          
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="contect">توضیحات</label>
                            <textarea class="form-control mb-2" name="contect" id="contect" cols="30" rows="10">
                              {{ old('contect', $contact->contect) }}
                            </textarea>
                                              
                          @error('contect')
                          <span class="alert_required bg-danger text-white p-1 " role="alert">
                              <strong>
                                  {{ $message }}
                              </strong>
                          </span>
                     
                          @enderror
                          </div>   
          
                          
                      </div>
          
          
          
                    </div>
          
                    <div class="d-flex justify-content-center ">
                      <button type="submit" class="btn btn-warning col-md-4 edit" >ویرایش اطلاعات</button>
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

@section('script')

<script>
    CKEDITOR.replace('contect');
</script>

@include('admin.alerts.sweetalert.edit-confirm', ['className' => 'edit','formId'=>'updateForm'])

@endsection