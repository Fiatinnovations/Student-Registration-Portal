@extends('layouts.master')

@section('content')

	<div class="row pt-4 mt-1">
					
						<div class="col-xl-12">
							<section class="card">
								<header class="card-header card-header-transparent">
									<div class="card-actions">
										<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
										<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
									</div>
					
									<h2 class="card-title">Admission Offer</h2>
								</header>
								<div class="card-body">
									 <div>
										  @if ($errors->any())
                                 <div class="alert alert-danger">
                                    <ul>
                                          @foreach ($errors->all() as $error)
                                             <li>{{ $error }}</li>
                                          @endforeach
                                    </ul>
                              @endif
                              </div>

                                @if (session('message'))
                              <div class="alert alert-success">
                                 {{session('message')}}  
                              </div>                                         
                              @endif
                              
                              <div>
                                  <p>
                                      Thank you for going through the process of registration with our citedal of learning.
                                      we will have to go through your proof of payment and you will receive a feed back soon which
                                      may include your offer letter, after verfification.
                                  </p>
                                  @if ($prospect->student == '2')
                                <a href=""><button type="button" class="btn btn-danger">Download Offer Letter</button></a>  
                                  @endif
                               
                              </div>
                              


							 

									 </div>
									
								</div>
							</section>
						</div>
					</div>		

@endsection


