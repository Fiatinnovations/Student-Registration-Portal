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
                              <h2 class="card-title text-center">Documents Upload</h2>
                             
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
												<li class="nav-item ">
                                    <a class="nav-link" href="{{route('prospectUpdate', $prospect->id)}}"><span>1</span>Personal Details</a>
												</li>
												  @if (isset($prospect->first_name))
                                     <li class="nav-item">
                                     <a class="nav-link" href="{{route('programReg', $prospect->id)}}"><span>2</span>Program</a>
                                    </li>   
                                    @else
                                     <li class="nav-item ">
													<a class="nav-link" href="javascript:void(0)" data-toggle="tab"><span>2</span>Program</a>
                                    </li>   
                                    @endif
                                   
                                     @if (isset($prospect->program_id))
                                     <li class="nav-item">
                                     <a class="nav-link" href="{{route('educationUpdate', $prospect->id)}}" ><span>3</span>Portfolio</a>
												</li>   
                                   @else
                                     <li class="nav-item">
													<a class="nav-link" href="javascript:void(0)" data-toggle="tab"><span>3</span>Portfolio</a>
												</li>  
                                   @endif 

                                   @if (isset($prospect->school_a))
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{route('documents', $prospect->id)}}"><span>4</span>Uni Checklist</a>
                                    </li>   
                                   @else
                                     <li class="nav-item">
													<a class="nav-link" href="javascript:void(0)" data-toggle="tab"><span>4</span>Uni Checklist</a>
                                    </li>  
                                   @endif
												
                                     @if (isset($prospect->motivation))
                                    <li class="nav-item">
                                    <a class="nav-link" href="{{route('getPayment', $prospect->id)}}"><span>5</span>Compulsory Fees</a>
                                    </li>   
                                   @else
                                     <li class="nav-item">
													<a class="nav-link" href="Javascript:void(0)" data-toggle="tab"><span>5</span>Compulsory Fees</a>
                                    </li>  
                                   @endif
												
                                    
                                     @if (isset($prospect->receipt))
                                   <li class="nav-item">
                                   <a class="nav-link" href="{{route('admissionOffer', $prospect->id)}}"><span>6</span>Offer</a>
												</li>    
                                   @else
                                    <li class="nav-item">
													<a class="nav-link" href="javascript:void(0)" data-toggle="tab"><span>6</span>Offer</a>
												</li>    
                                   @endif
											</ul>
										</div>
                              
                             
                          
                                 {!! Form::model( $prospect, ['method' => 'PUT', 'class' => 'form-horizontal form-bordered'  , 'action' =>['ProspectController@saveCertificates', $prospect->id], 'files' => true])!!} 
                                    
                                    <div class="input-append" style="margin-top:20px;">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">
                                       @if (isset($prospect->certificate))
                                       <i style="color:red" class="fas fa-check"></i>    
                                       @endif   
                                     Certificates
                                    </label>
				                    <span class="btn btn-default btn-file">	
									{!! Form::file('certificate') !!}
                                    </span> &nbsp;
                                     @if (isset($prospect->certificate))
                                    {!! Form::submit('Update', ['class' =>'btn btn-danger']) !!} 
                                    @else
                                    {!! Form::submit('Save', ['class' =>'btn btn-primary']) !!}
                                    @endif 
                                    {!! Form::close() !!} 
                                    </div>
                                     
                                 @if (isset($prospect->certificate))
                                     {!! Form::model( $prospect, ['method' => 'PUT', 'class' => 'form-horizontal form-bordered'  , 'action' =>['ProspectController@saveTranscripts', $prospect->id], 'files' => true])!!}
                                    <div class="input-append" style="margin-top:20px;">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">
                                     @if (isset($prospect->transcript))
                                    <i style="color:red" class="fas fa-check"></i>    
                                     @endif   
                                     Transcript
                                    </label>
				                    <span class="btn btn-default btn-file">	
									{!! Form::file('transcript') !!}
                                    </span>&nbsp;
                                    @if (isset($prospect->transcript))
                                    {!! Form::submit('Update', ['class' =>'btn btn-danger']) !!} 
                                    @else
                                    {!! Form::submit('Save', ['class' =>'btn btn-primary']) !!}
                                    @endif
                                    
                                     {!! Form::close() !!}
                                    </div>  
                                 @endif
                               
                                 @if (isset($prospect->transcript))
                                      {!! Form::model( $prospect, ['method' => 'PUT', 'class' => 'form-horizontal form-bordered'  , 'action' =>['ProspectController@saveResume', $prospect->id], 'files' => true])!!}
                                    <div class="input-append" style="margin-top:20px;">
                                     <label class="col-lg-3 control-label text-lg-right pt-2">
                                     @if (isset($prospect->resume))
                                    <i style="color:red" class="fas fa-check"></i>    
                                     @endif   
                                     Resume
                                    </label>
				                    <span class="btn btn-default btn-file">	
									{!! Form::file('resume') !!}
                                    </span>&nbsp;
                                    @if (isset($prospect->resume))
                                    {!! Form::submit('Update', ['class' =>'btn btn-danger']) !!} 
                                    @else
                                    {!! Form::submit('Save', ['class' =>'btn btn-primary']) !!}
                                    @endif
                                    {!! Form::close() !!}
                                    </div>
                                 @endif

                                 @if (isset($prospect->resume))
                                     {!! Form::model( $prospect, ['method' => 'PUT', 'class' => 'form-horizontal form-bordered'  , 'action' =>['ProspectController@saveMotivation', $prospect->id], 'files'=>true])!!}
                                    
                                    <div class="input-append " style="margin-top:20px;">
                                    <label class="col-lg-3 control-label text-lg-right pt-2">
                                     @if (isset($prospect->motivation))
                                    <i style="color:red" class="fas fa-check"></i>    
                                     @endif   
                                     Motivation
                                    </label>
				                    <span class="btn btn-default btn-file">	
									{!! Form::file('motive') !!}
                                    </span>&nbsp;
                                     @if (isset($prospect->motivation))
                                    {!! Form::submit('Update', ['class' =>'btn btn-danger']) !!} 
                                    @else
                                    {!! Form::submit('Save', ['class' =>'btn btn-primary']) !!}
                                    @endif
                                    </div>

                                   <div style="display:none">
                                      {!! Form::hidden('progress', '70') !!}
                                   </div>
                                   {!! Form::close() !!}  
                                 @endif
                         
                           </div>
                           </div>

								</section>
							</div>
                        </div>
                        


@endsection
