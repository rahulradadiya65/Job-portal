@foreach($jobs as $jobs)        			<div class="job-ad-item">
								<div class="item-info">
									<div class="item-image-box">
										<div class="item-image">
											<a href="job-details.html"><img src="images/job/1.png" alt="Image" class="img-responsive"></a>
										</div><!-- item-image -->
									</div>
                                                                      
									<div class="ad-info">
										<span><a href="{{route('jobshow',$jobs->jobs_id)}}" class="title">{{$jobs->jobtitle}}</a> @ <a href="#">Dominos Pizza</a></span>
										<div class="ad-meta">
											<ul>
												<li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$jobs->location}}</a></li>
												<li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$jobs->jobtype}}</a></li>
                                                                                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{$jobs->created_at}}</a></li>
												<li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>${{$jobs->minisalary}} - ${{$jobs->maxisalary}}</a></li>
											</ul>
                                                                                        
										</div><!-- ad-meta -->	
                                                                                <a href="{{ route('jobedit',encrypt($jobs->jobs_id)) }}">Edit</a>
                                                                                <form action="{{URL::to('apply')}}" method="post" id="form">
                                                                                   @csrf
                                                                                    <input type="hidden" name="jobs_id" value="{{ encrypt($jobs->jobs_id) }}" id="jobs_id">
                                                                                    <input type="hidden" value="{{ encrypt(Auth::User()->id) }}" name="user_id" ID="user_id">    
                                                                                    <button type="submit" ID="submit" class="btn btn-primary">Apply Job</button>
                                                                                </form>
                                                                                
                                                                                
                                                                        </div><!-- ad-info -->
								</div><!-- item-info -->
							</div><!-- job-ad-item -->
@endforeach