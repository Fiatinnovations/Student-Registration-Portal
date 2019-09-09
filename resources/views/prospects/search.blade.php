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
					
									<h2 class="card-title">Search Result</h2>
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
                                                <th>Action</th>
											</tr>
										</thead>
										<tbody>
                                            @foreach ($agentProspects as $prospect)
                                              	<tr>
                                                  <td>{{$prospect->first_name}}</td>
                                                  <td>{{$prospect->last_name}}</td>
                                                <td class="actions">
												<a href="{{route('prospectUpdate', $prospect->id)}}"><i class="fas fa-pencil-alt"></i></a>
                                                <a href="{{route('prospect', $prospect->slug)}}"><i class="fas fa-eye"></i></a>
												<a href="{{route('deleteProspect', $prospect->id)}}" class="delete-row"><i class="far fa-trash-alt"></i></a>
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


