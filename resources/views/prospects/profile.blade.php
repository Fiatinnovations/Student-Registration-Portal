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
					
                                <h2 class="card-title"><b> {{$prospect->first_name}} </b>Overview</h2>
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
                              </div>
                                 
                               
                         
					
							<section class="card">
									<div class="row">
                                    <div class="col-lg-4 mb-3 text-left">
									<div  style="font-size:15px !important; font-weight:700 !important">
										<div id="collapse1One" class="accordion-body collapse show">
													<div class="card-body">
														<ul class="widget-todo-list">
															
															<li style="border-bottom:none !important;">
                                                            @if (isset($prospect->first_name))
                                                            <a href="{{route('prospectUpdate', $prospect->id)}}"><p>Personal Details </p></a>    
                                                            @else
                                                            <p>Personal Details </p>   
                                                            @endif

                                                            </li>

                                                            <li  style="border-bottom:none !important;">
                                                            @if (isset($prospect->field_a))
                                                            <a href="{{route('programReg', $prospect->id)}}"><p>Program </p></a>    
                                                            @else
                                                            <p>Program</p>   
                                                            @endif

															
                                                            </li>

                                                            <li  style="border-bottom:none !important;">
                                                             @if (isset($prospect->school_a))
                                                            <a href="{{route('educationUpdate', $prospect->id)}}"><p>Portfolio</p></a>    
                                                            @else
                                                            <p>Portfolio </p>   
                                                            @endif

                                                            </li>

                                                            <li  style="border-bottom:none !important;">
                                                             @if (isset($prospect->certificate))
                                                            <a href="{{route('documents', $prospect->id)}}"><p>Uni Checklist </p></a>    
                                                            @else
                                                            <p>Uni Checklist </p>   
                                                            @endif

															

                                                            </li>

                                                            <li  style="border-bottom:none !important;">
                                                             @if (isset($prospect->receipt))
                                                            <a href="{{route('getPayment', $prospect->id)}}"><p>Compulsory Fees</p></a>    
                                                            @else
                                                            <p>Compulsory Fees</p>   
                                                            @endif
															

                                                            </li>
                                                            <li  style="border-bottom:none !important;">
															@if (isset($prospect->receipt))
                                                            <a href="{{route('admissionOffer', $prospect->id)}}"><p>Admission Offer </p>	</a>
                                                            @endif
																
															
                                                            </li>
                                                            

														</ul>
													
													</div>
                                                </div>
									</div>
                                    </div>
                                    
                                     <div class="col-lg-2 mb-3 text-left">
									<div  style="font-size:15px !important; font-weight:700 !important">
										<div id="collapse1One" class="accordion-body collapse show">
													<div class="card-body">
														<ul class="widget-todo-list">
															
															<li style="border-bottom:none !important;">
															
															@if (isset($prospect->first_name))
                                                                <p><i style="color:green;" class="far fa-check-circle fa-1x"></i></p>	
                                                            @endif	

                                                            </li>

                                                            <li  style="border-bottom:none !important;">
                                                            @if (isset($prospect->field_a))
                                                                <p> <i style="color:green;" class="far fa-check-circle fa-1x"></i></p>	
                                                            @endif

                                                            </li>

                                                            <li  style="border-bottom:none !important;">
                                                            @if (isset($prospect->grade_a))
                                                                <p> <i style="color:green;" class="far fa-check-circle fa-1x"></i></p>
                                                            @endif
				

                                                            </li>

                                                            <li  style="border-bottom:none !important;">
                                                            @if (isset($prospect->motivation))
                                                               <p> <i style="color:green;" class="far fa-check-circle fa-1x"></i></p> 
                                                            @endif

                                                            </li>

                                                            <li  style="border-bottom:none !important;">
                                                            @if (isset($prospect->receipt))
                                                                    <p> <i style="color:green;" class="far fa-check-circle fa-1x"></i></p>	       
                                                            @endif
	
                                                            </li>

                                                             <li  style="border-bottom:none !important;">
                                                            @if ($prospect->student == 2)
                                                                    <p> <i style="color:green;" class="far fa-check-circle fa-1x"></i></p>	       
                                                            @endif
	
                                                            </li>
                                                          
                                                            
                                                            
															
														</ul>
													
													</div>
                                                </div>
									</div>
									</div>
										<div class="col-md-4 mb-3 text-center flex-3">
                                            @if ($prospect->student == 2)
                                             <h2 class="card-title mt-3"> <b>Student</b> </h2>   
                                            @else
                                             <h2 class="card-title mt-3">Progress</h2>     
                                            @endif
											
											<div class="liquid-meter-wrapper liquid-meter-sm mt-3">
												<div class="liquid-meter liquid-meter-loaded"><svg preserveAspectRatio="xMidYMid meet" viewBox="0 0 220 220" width="100%" height="100%"><desc>Created with Snap</desc><defs><linearGradient x1="0" y1="0" x2="100" y2="100" gradientUnits="userSpaceOnUse" id="linearGradientSk04qzt6w2"><stop offset="0%" stop-color="#ffffff"></stop><stop offset="100%" stop-color="#f9f9f9"></stop></linearGradient><mask id="maskSk04qzt6w8"><circle cx="110" cy="10" r="87" fill="#ffffff" style=""></circle></mask></defs><circle cx="110" cy="110" r="95" fill="url('#linearGradientSk04qzt6w2')" stroke="#f2f2f2" style="stroke-width: 15;"></circle><path id="front" fill="#cccccc" mask="url('#maskSk04qzt6w8')" stroke="#ffffff" style="stroke-width: 1;" d="M0,129.4 C131.4,127.4 167.4,131.4 220,136.4 L220,220 L0,220 z"></path><text x="50%" y="50%" fill="#333333" dy=".4em" stroke="#333333" style="font-family: &quot;Open Sans&quot;; font-size: 24px; font-weight: 600; text-anchor: middle;"><tspan>{{$prospect->progress}}</tspan><tspan stroke="none" style="font-size: 24px;">%</tspan></text></svg>
                                                <meter min="0" max="100" value="{{$prospect->progress}}" id="meterSales"></meter>
												</div>
												<div class="liquid-meter-selector mt-4 pt-1" id="meterSalesSel">
											</div>
                                        </div>
                                        
                                    

                                        @if ($prospect->progress == 90)
                                            <div>
                                    {!! Form::model( $prospect, ['method' => 'PUT', 'class' => 'form-horizontal form-bordered'  , 'action' =>['ProspectController@admission', $prospect->slug]])!!} 

                                    <div style="display:none">
                                      {!! Form::hidden('student', '2') !!}
                                   </div>
                                   <div style="display:none">
                                      {!! Form::hidden('progress', '100') !!}
                                   </div>
                                    {!! Form::submit('Offer Admission', ['class' =>'btn btn-danger']) !!}  
                                     {!! Form::close() !!}
                                        </div>   
                                        @endif
                                     
                                    </div>
                                  

                                    

                                    
								</div>
							</section>
						</div>
						
								</div>
							</div>
						</div>
					</div>
									
									

@endsection


