<div class="gmail_quote">
  <div dir="ltr">
    <div class="gmail_quote">
      <div>
        <div style="font-size:10pt;font-family:Verdana,Arial,Helvetica,sans-serif">
          <div id="content">
            <br>
            <blockquote style="border-left:1px solid #cccccc;padding-left:6px;margin-left:5px">
              <div style="margin:0;padding:0;background:#eeeeee">
                <table style="border-collapse:collapse;margin:35px 0;padding:0;background:#eeeeee" border="0" width="100%" cellspacing="0" cellpadding="0" align="center" bgcolor="#eee">
                  <tbody>
                    <tr>
                      <td style="margin:0;padding:0;background:#eeeeee" align="center">
                        <table border="0" width="700" cellspacing="0" cellpadding="0" align="center">
                          <tbody>
                            <tr>
                              <td id="_background-image_url_2" style="margin:0;padding:0;font-size:0;line-height:0;height:5px;background-image:url();background-repeat:no-repeat" colspan="3" height="6">&nbsp;</td>
                            </tr>
                            <tr>
                              <td id="_background-image_url_3" style="margin:0;padding:0;font-size:0;line-height:0;width:5px;background-image:url();background-repeat:repeat-y" width="5">&nbsp;</td>
                              <td style="margin:0" width="690">
                                <table style="border-collapse:collapse;border:1px solid #ededed;background:#ffffff" border="0" width="690" cellspacing="0" cellpadding="0" align="center">
                                  <tbody>
                                    <tr>
                                      <td id="_background-image_url_4" style="margin:0;padding:0;font-size:0;line-height:0;height:8px;background-color:#006699;background-image:url();background-repeat:repeat-x" colspan="4" align="left" width="690" height="8">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td id="_background-image_url_5" style="margin:0;padding:0;font-size:0;line-height:0;height:10px;background-color:#ffffff;background-image:url();background-repeat:repeat-x" colspan="4" align="left" width="690" height="10">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td style="margin:0;padding:0;font-size:0;line-height:0;width:15px;height:50px" align="left" width="15" height="50">&nbsp;</td>
                                      <td style="margin:0;padding:0;font-size:0;line-height:0;height:50px" align="left" valign="middle" width="150" height="50">
                                        <a href="http://www.dradhata.com/" style="border:none" rel="noopener" target="_blank">
                                          <img id="_imgsrc_url_0" style="display:block;border:none;color:#333338;font-family:Arial,Helvetica,Verdana,sans-serif;font-size:18px;font-weight:bold" title="dradhata.com" alt="dradhata.com">
                                        </a>
                                      </td>
                                      <td style="margin:0;padding:0;line-height:1;font-size:12px;font-family:Arial,Helvetica,Verdana,sans-serif;color:#333338" align="right" valign="middle" width="440" height="50">
                                        <a href="http://www.dradhata.com/" rel="noopener" target="_blank" >www.dradhata.com</a> resume notification for the {{date('d-m-Y')}};
                                      </td>
                                      <td style="margin:0;padding:0;font-size:0;line-height:0;width:15px;height:50px" align="left" width="15" height="50">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td id="_background-image_url_6" style="margin:0;padding:0;font-size:0;line-height:0;height:36px;background-color:#ffffff;background-image:url();background-repeat:repeat-x" colspan="4" align="left" height="36">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td style="margin:0;padding:0;font-size:0;line-height:0" colspan="4" align="left">
                                        <table style="border-collapse:collapse" border="0" width="690" cellspacing="0" cellpadding="0" align="center">
                                          <tbody>
                                            <tr>
                                              <td style="margin:0;padding:0;font-size:0;line-height:0" rowspan="0" align="left" width="30">&nbsp;</td>
                                              <td style="margin:0;padding:0;font-size:12px;font-family:Arial,Helvetica,Verdana,sans-serif;color:#333338" align="left" width="630">
                                                <h1 style="margin:0;padding:0;line-height:24px;font-size:12px;font-family:Arial,Helvetica,Verdana,sans-serif;color:#333338;font-weight:normal">You have received {{$summary1}} resumes for your consideration and classification:</h1>
                                              </td>
                                              <td style="margin:0;padding:0;font-size:0;line-height:0" rowspan="999" align="left" width="30">&nbsp;</td>
                                            </tr>
                                            <tr>
                                              <td style="margin:0;padding:0;font-size:0;line-height:0;height:24px" align="left" height="24">&nbsp;</td>
                                            </tr>
                                            
@foreach($jobs as $job)						
                                            <tr>
                                              <td align="left" style="margin:0;line-height:1">
                                                <h2 style="margin:0;padding:0;font-size:18px;line-height:1;font-family:Arial,Helvetica,Verdana,sans-serif;color:rgb(153,153,153)!important">
                                                  <strong>{{$job->jobs_title}}</strong>                                      
                                                  <span style="font-size:12px">
                                                    <a href="{{ route('candidate_apply',encrypt($job->jobs_id)) }}" style="color:rgb(0,102,153)!important" target="_blank" data-saferedirecturl="{{ route('candidate_apply',encrypt($job->jobs_id)) }}>(View more)</a>
                                                  </span>
                                                </h2>
                                              </td>
                                            </tr>       
                                            <tr>
                                              <td height="24" align="left" style="margin:0;padding:0;font-size:0;line-height:0;height:24px"></td>
                                            </tr>       
                                            <tr>
                                              <td align="left" style="margin:0">
                                                <table cellpadding="0" cellspacing="0" border="0" align="center" width="100%" style="margin:0;padding:0;background:rgb(255,255,255)">
                                                  <tbody>
                                                    <tr>
                                                      <th align="left" width="122" style="margin:0;padding:0;text-transform:uppercase;font-size:12px;line-height:1;font-family:Arial,Helvetica,Verdana,sans-serif;color:rgb(51,51,56);font-weight:normal;text-align:left;width:122px">Post date</th>                           
                                                      <th width="6" style="margin:0;padding:0;line-height:0;font-size:0;width:5px"></th>                           
                                                      <th align="left" width="60" style="margin:0;padding:0;text-transform:uppercase;font-size:12px;line-height:1;font-family:Arial,Helvetica,Verdana,sans-serif;color:rgb(51,51,56);font-weight:normal;text-align:center;width:60px">Apply candidate</th>                           
                                                      <th width="6" style="margin:0;padding:0;font-size:0;line-height:0;width:5px"></th>                           
                                                       <th  width="101" style="margin:0;padding:0;text-transform:uppercase;font-size:12px;line-height:1;font-family:Arial,Helvetica,Verdana,sans-serif;color:rgb(51,51,56);font-weight:normal;text-align:center;width:101px">City</th>                           
                                                      <th width="6" style="margin:0;padding:0;font-size:0;line-height:0;width:5px"></th>                           
                                                      <th width="94" style="margin:0;padding:0;text-transform:uppercase;font-size:12px;line-height:1;font-family:Arial,Helvetica,Verdana,sans-serif;color:rgb(51,51,56);font-weight:normal;text-align:left;width:94px">Resume</th>
                                                    </tr>                    
                                                    <tr>
                                                      <td colspan="11" height="10" style="margin:0;padding:0;font-size:0;line-height:0;height:10px"></td>
                                                    </tr>                   
                                                    <tr>
                                                      <td height="1" style="margin:0;padding:0;font-size:0;line-height:0;min-height:1px;background:rgb(237,237,237)" colspan="11"></td>
                                                    </tr>                                                    
                                                    <tr>
                                                      <td colspan="11" height="10" style="margin:0;padding:0;font-size:0;line-height:0;height:15px"></td>
                                                    </tr>                   
                                                    <tr>
                                                      <td align="left" valign="top" style="margin:0;padding:0;text-align:left;vertical-align:top;line-height:18px;font-size:12px;font-family:Arial,Helvetica,Verdana,sans-serif;color:rgb(51,51,56)">
                                                        <a href="{{ route('candidate_apply',encrypt($job->jobs_id)) }}" title="DEEPA ROY" style="color:rgb(0,102,153);font-weight:bold" target="_blank" >{{$job->created_at}}</a>
                                                      </td>                      
                                                      <td style="margin:0;padding:0;font-size:0;line-height:0"></td>                      
                                                      <td align="left" valign="top" style="margin:0;padding:0;text-align:center;vertical-align:top;line-height:18px;font-size:12px;font-family:Arial,Helvetica,Verdana,sans-serif;color:rgb(51,51,56)">{{$job->apply_job->count()}}</td>                      
                                                      <td style="margin:0;padding:0;font-size:0;line-height:0"></td>                      
                                                      <td align="left" valign="top" style="margin:0;padding:0;text-align:center;vertical-align:top;line-height:18px;font-size:12px;font-family:Arial,Helvetica,Verdana,sans-serif;color:rgb(51,51,56)">{{$job->city->city}}</td>                      
                                                      <td style="margin:0;padding:0;font-size:0;line-height:0"></td>                      
                                                       <td align="left" valign="top" style="margin:0;padding:0;text-align:left;vertical-align:top;line-height:18px;font-size:12px;font-family:Arial,Helvetica,Verdana,sans-serif;color:rgb(51,51,56)">
                                                        <a href="{{ route('candidate_apply',encrypt($job->jobs_id)) }}" title="View" style="width:94px;text-decoration:none;color:rgb(255,255,255);font:bold 12px Arial,Helvetica,sans-serif;display:block;line-height:2em;text-align:center;background-image:url();background-repeat:no-repeat;background-color:rgb(118,186,35);text-transform:uppercase;border-radius:3px;font-weight:normal" id="_background-image_url_8" target="_blank" data-saferedirecturl="{{ route('candidate_apply',encrypt($job->jobs_id)) }}">View »</a>
                                                      </td>
                                                    </tr>                    
                                                    <tr>
                                                      <td colspan="11" height="5" style="margin:0;padding:0;font-size:0;line-height:0;height:10px"></td>
                                                    </tr>                   
                                                    <tr>
                                                      <td height="1" style="margin:0;padding:0;font-size:0;line-height:0;min-height:1px;background:rgb(237,237,237)" colspan="11"></td>
                                                    </tr>                                                         
                                                    <tr>
                                                      <td colspan="11" height="15" style="margin:0;padding:0;font-size:0;line-height:0;height:15px"></td>
                                                    </tr>                    
                                                    <tr>
                                                      <td colspan="11" height="15" style="margin:0;padding:0;font-size:0;line-height:0;height:15px"></td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr> 
@endforeach
<!--job complate -->
											
											
											
											
								        <tr>
                                              <td id="_background-image_url_9" style="margin:0;padding:0;background-image:url();background-repeat:repeat-x" colspan="3">
                                                <table style="border-collapse:collapse;width:100%" width="100%" align="left">
                                                  <tbody>
                                                    <tr>
                                                      <td style="margin:0;padding:0;font-size:0;line-height:0;width:30px" rowspan="7" width="30">&nbsp;</td>
                                                      <td style="margin:0;padding:0;font-size:0;line-height:0;height:24px" height="24">&nbsp;</td>
                                                      <td style="margin:0;padding:0;font-size:0;line-height:0;width:30px" rowspan="7" width="30">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="margin:0;padding:0;text-align:left;line-height:1.5;font-size:12px;font-family:Arial,Helvetica,Verdana,sans-serif;color:#333338" align="left">We would like to remind you that you can easily move the resumes to the appropriate folder (In Process, Finalist or Rejected) to provide immediate feedback to the candidates and reinforce your positive image as an interesting employer.</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="margin:0;padding:0;font-size:0;line-height:0;height:20px" height="20">&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="margin:0;padding:0;line-height:18px;font-size:12px;font-family:Arial,Helvetica,Verdana,sans-serif;color:#333338" align="left">
                                                        <p style="margin:0;padding:0">To view the pending resumes, simply 
                                                          <a href="{{ route('user_job_post_list') }}" rel="noopener" target="_blank" >log into your account</a> and click on the "Pending" folder icon. 
                                                          <br>
                                                          <br>Sincerely, 
                                                          <br>Your Dradhata team 
                                                          <br>E-mail: 
                                                          <a href="mailto:info@dradhata.com" rel="noopener" target="_blank">info@dradhata.com</a> 
                                                          <br>Web: 
                                                          <a href="http://www.dradhata.com/" rel="noopener" target="_blank" >http://www.dradhata.com/</a>
                                                        </p>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td style="margin:0;padding:0;font-size:0;line-height:0;height:18px" height="18">&nbsp;</td>
                                                    </tr>
                                                  </tbody>
                                                </table>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                              <td id="_background-image_url_10" style="margin:0;padding:0;font-size:0;line-height:0;width:5px;background-image:url();background-repeat:repeat-y" width="5">&nbsp;</td>
                            </tr>
                            <tr>
                              <td id="_background-image_url_11" style="margin:0;padding:0;font-size:0;line-height:0;height:6px;background-image:url();background-repeat:no-repeat" colspan="3" height="6">&nbsp;</td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="margin:0;padding:0" align="center">
                        <table style="border-collapse:collapse;margin:0;padding:0;width:590px" border="0" width="590" cellspacing="0" cellpadding="0" align="center">
                          <tbody>
                            <tr>
                              <td style="margin:0;padding:0;font-size:0;line-height:0;height:20px" colspan="3" height="20">&nbsp;</td>
                            </tr>
                            <tr>
                              <td style="margin:0;padding:0;font-size:0;line-height:0;width:61px" width="61">&nbsp;</td>
                              <td style="margin:0;padding:0">
    								<a href="{{ route('user_job_post_list') }}" rel="noopener" target="_blank" >
                                  <img id="_imgsrc_url_1">
                                </a>
                              </td>
                              <td style="margin:0;padding:0;font-size:0;line-height:0;width:61px" width="61">&nbsp;</td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                    <tr>
                      <td style="margin:0;padding:0" align="center">
                        <table style="border-collapse:collapse;margin:0;padding:0;width:590px" border="0" width="590" cellspacing="0" cellpadding="0" align="center">
                          <tbody>
                            <tr>
                              <td style="margin:0;padding:0;font-size:0;line-height:0;height:20px" colspan="3" height="20">&nbsp;</td>
                            </tr>
                            <tr>
                              <td style="margin:0;padding:0" colspan="3">
                                <p style="margin:0;padding:0;font-family:Arial,Helvetica,Verdana,sans-serif;font-size:12px;line-height:18px;color:#707070;text-align:center">You decided to receive Resume alerts by Email to be sent to 
                                  <a href="mailto:rahul@retailcore.in" rel="noopener" target="_blank">rahul@retailcore.in</a>. 
                                  <br>To disable this Resume alert please 
                                  <a href="https://www.dradhata.com/" style="color:#006699" rel="noopener" target="_blank" >click here</a>. 
                                  <br>
                                </p>
                              </td>
                            </tr>
                            <tr>
                              <td style="margin:0;padding:0;font-size:0;line-height:0;height:30px" colspan="3" height="30">&nbsp;</td>
                            </tr>
                            <tr>
                              <td style="margin:0;padding:0;font-size:0;line-height:0;width:95px" rowspan="3" width="95">&nbsp;</td>
                              <td style="margin:0;font-size:0;line-height:0;height:1px;background:#cecfce" height="1">&nbsp;</td>
                              <td style="margin:0;padding:0;font-size:0;line-height:0;width:95px" rowspan="3" width="95">&nbsp;</td>
                            </tr>
                            <tr>
                              <td style="margin:0;font-size:0;line-height:0;height:5px" height="5">&nbsp;</td>
                            </tr>
                            <tr>
                              <td>
                                <p style="font-family:Arial,Helvetica,Verdana,sans-serif;font-size:12px;text-align:center;color:#cecfce;margin:12px 0pt;display:block">
                                  <a href="{{URL::to('/')}}" style="color:#006699" rel="noopener" target="_blank" >About us</a> | 
                                  <a href="{{URL::to('/')}}" style="color:#006699" rel="noopener" target="_blank" >FAQ</a> | © 2010-2019 Dradhata. All rights reserved.
                                </p>
                              </td>
                            </tr>
                            <tr>
                              <td style="margin:0;font-size:0;line-height:0;height:15px" colspan="3" height="15">&nbsp;</td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </blockquote>
          </div>
        </div>
        <br>
      </div>
    </div>
  </div>
</div>
