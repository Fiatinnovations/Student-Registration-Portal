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
					
									<h2 class="card-title">Prospects</h2>
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
							  <table class="table table-responsive-md table-striped mb-0">
										<thead>
											<tr>
												<th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Status</th>
                                                <th>Progress</th>
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($userProspects as $prospect)
                                              	<tr>
                                                  <td>{{$prospect->first_name}}</td>
                                                  <td>{{$prospect->last_name}}</td>
                                                    @switch($prospect->progress)
                                                        @case(10)
                                                        <td><span class="badge badge-warning">Initial Contact</span></td>    
                                                            @break
                                                        @case(30)
                                                        <td><span class="badge badge-primary">Program Identified</span></td>     
                                                            @break
                                                        @case(50)
                                                        <td><span class="badge badge-info">Portfolio Form</span></td>     
                                                            @break
                                                        @case(70)
                                                        <td><span class="badge badge-dark">documents submitted</span></td>     
                                                            @break
                                                        @case(90)
                                                        <td><span class="badge badge-success">Offer Letter</span></td>     
															@break
														@case(100)
                                                        <td><span class="badge badge-success">Student</span></td>     
                                                            @break
                                                        @default
                                                            
                                                    @endswitch

                                                      @switch($prospect->progress)
                                                        @case(10)
                                                      <td>
													<div class="progress light m-2">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{$prospect->progress}}%;">
                                                    {{$prospect->progress}}
														</div>
													</div>
												</td>   
                                                            @break
                                                        @case(30)
                                                       <td>
													<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
														<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{$prospect->progress}}%;">
															{{$prospect->progress}}%
														</div>
													</div>
												</td>    
                                                            @break
                                                        @case(50)
                                                       <td>
													<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
														<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{$prospect->progress}}%;">
															{{$prospect->progress}}%
														</div>
													</div>
												</td>   
                                                            @break
                                                        @case(70)
                                                       <td>
													<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
														<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{$prospect->progress}}%;">
															{{$prospect->progress}}%
														</div>
													</div>
												</td>   
                                                            @break
                                                        @case(90)
                                                       <td>
													<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
														<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{$prospect->progress}}%;">
															{{$prospect->progress}}%
														</div>
													</div>
												</td>   
															@break
														 @case(100)
                                                       <td>
													<div class="progress progress-sm progress-half-rounded m-0 mt-1 light">
														<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: {{$prospect->progress}}%;">
															{{$prospect->progress}}%
														</div>
													</div>
												</td>   
                                                            @break
                                                        @default
                                                            
                                                    @endswitch
                                                <td class="actions">
												<a href="{{route('prospectUpdate', $prospect->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{route('prospect', $prospect->slug)}}"><i class="fas fa-eye"></i></a>
												<a onclick="return confirm('Are you sure you want to delete this user')" href="{{route('deleteProspect', $prospect->id)}}" class="delete-row"><i class="far fa-trash-alt"></i></a>
													</td>
                                                    
												
												
											</tr>  
                                            @endforeach
										
											
										</tbody>
									</table>

									 </div>
									
								</div>
							</section>
						</div>
					</div>		

@endsection


