@extends('auth.master')

@section('head-tag')
<title>ورود به سایت</title>
@endsection

@section('content')

				    <!-- CONTAINER OPEN -->
					<div class="col col-login mx-auto text-center">
						<a href="{{route('customer.home')}}" class="text-center">
							<img src="{{ asset("admin-assets/assets/images/brand/logo.png")}}" class="header-brand-img" alt="">
						</a>
					</div>
					<div class="container-login100">
						<div class="wrap-login100 p-0">
							<div class="card-body">
								<form class="login100-form validate-form" method="post" action="{{ route('auth.login-attempt') }}" >


                                    @csrf
                                    @method('POST')

									<span class="login100-form-title">
										ورود
									</span>
									<div class="wrap-input100 validate-input" >
										<input class="input100 form-control" type="text" name="email" placeholder="ایمیل یا نام کاربری">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-email" aria-hidden="true"></i>
										</span>
									</div>
									<div class="wrap-input100 validate-input">
										<input class="input100 form-control" type="password" name="password" placeholder="رمز عبور">
										<span class="focus-input100"></span>
										<span class="symbol-input100">
											<i class="zmdi zmdi-lock" aria-hidden="true"></i>
										</span>
									</div>

                                    <div class="wrap-input100 validate-input">
                                        <img src="{{ Captcha::src('default') }}" style="width: 100%" alt="captcha" class="mb-2">
                                        <input name="captcha" type="text" class="input100 form-control p-2" placeholder="کد تصویر امنیتی">
                                    </div>
                
									<div class="text-start pt-1">
										<p class="mb-0"><a href="#" class="text-primary ms-1">رمز عبور خود را فراموش کرده اید؟</a></p>
									</div>
									<div class="container-login100-form-btn">
                                            <button type="submit" class="login100-form-btn btn-primary ">
                                            ورود
                                            </button>
									</div>
									<div class="text-center pt-3">
										<p class="text-dark mb-0">ثبت نام نکرده اید؟<a href="{{ route('auth.register') }}" class="text-primary ms-1">ثبت نام</a></p>
									</div>
								</form>
							</div>
                            @if ($errors->any())
                            <div class="card-footer">
                                <div class="alert alert-danger" dir="rtl">
                                    <h6>لطفا خطاهای زیر را بررسی کنید</h6>
                                    <ul class="list-unstyled">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

						</div>
					</div>
					<!-- CONTAINER CLOSED -->



@endsection
