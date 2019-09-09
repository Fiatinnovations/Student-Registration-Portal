@extends('layouts.master')

@section('content')

		<div class="row">
							<div class="col">
								<section class="card">
									<header class="card-header">
										<div class="card-actions">
											<a href="#" class="card-action card-action-toggle" data-card-toggle></a>
											<a href="#" class="card-action card-action-dismiss" data-card-dismiss></a>
										</div>
                              <h2 class="card-title text-center">Personal Details</h2>
                             
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
                              <div class="wizard-progress wizard-progress-lg">
											<div class="steps-progress">
												<div class="progress-indicator" style="width: 0%;"></div>
											</div>
											<ul class="nav wizard-steps">
												<li class="nav-item active">
													<a class="nav-link active" href="javascript:void(0)" data-toggle="tab"><span>1</span>Personal Details</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" href="javascript:void(0)" data-toggle="tab"><span>2</span>Program</a>
                                    </li>
                                   
                                    <li class="nav-item">
													<a class="nav-link" href="javascript:void(0)" data-toggle="tab"><span>3</span>Portfolio</a>
												</li>  

												<li class="nav-item">
													<a class="nav-link" href="javascript:void(0)" data-toggle="tab"><span>4</span>Uni Checklist</a>
                                    </li>
                                    <li class="nav-item">
													<a class="nav-link" href="javascript:void(0)" data-toggle="tab"><span>5</span>Compulsory Fees</a>
                                    </li>
                                    <li class="nav-item">
													<a class="nav-link" href="javascript:void(0)" data-toggle="tab"><span>6</span>Offer</a>
												</li>
											</ul>
										</div>
                              
                             
                          
                                        {!! Form::open( ['method' => 'POST', 'class' => 'form-horizontal form-bordered'  , 'action' =>['ProspectController@store']])!!} 

                                     <div  class="form-group row">
                                        
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Title</label>
                                     {!! Form::select('title_id', $titles, null, ['class' =>'form-control col-lg-6']) !!}
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Gender</label>
                                     {!! Form::select('gender_id', $genders, null, ['class' =>'form-control gutterx col-lg-6']) !!}
                                    </div>
                                    
                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">First Name</label>
                                    {!! Form::text('first_name', null, ['class' =>'form-control col-lg-6']) !!}
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Middle Name</label>
                                    {!! Form::text('middle_name', null, ['class' =>'form-control col-lg-6']) !!}
                                    </div>

                                     <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">Last Name / Surname</label>
                                    {!! Form::text('last_name', null, ['class' =>'form-control col-lg-6']) !!}
                                    </div>

                                    <div class="form-group row">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">IC Number / Passport No</label>
                                    {!! Form::text('identification', null, ['class' =>'form-control col-lg-6']) !!}
                                    </div>

                                    <div class="form-group row">
                                    <div class="col-lg-8">
                                
                                   </div>
                                   @if (isset($prospect->first_name))
                                    <div class="col-lg-4">
                                    {!! Form::Update('Save', ['class' =>'btn btn-danger']) !!}  
                                   </div>   
                                   @else
                                    <div class="col-lg-4">
                                    {!! Form::submit('Save', ['class' =>'btn btn-primary']) !!}  
                                   </div>   
                                   @endif
                                   

                                 
                                    </div>
                                   
                                   

                                     {!! Form::close() !!}

                                   
                                    
                           </div>
                           </div>

								</section>
							</div>
                        </div>
                        


@endsection
