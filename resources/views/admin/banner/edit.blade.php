                @extends('layouts.admin')
                @section('content')
                    <div class="row">
                        <div class="col-md-12 ">
                            <form method="post" action="{{route('banner.update',$data->ban_slug)}}" enctype="multipart/form-data">
                              @csrf
                                <div class="card mb-3">
                                  <div class="card-header">
                                    <div class="row">
                                        <div class="col-md-8 card_title_part">
                                            <i class="fab fa-gg-circle"></i>Update Banner
                                        </div>  
                                        <div class="col-md-4 card_button_part">
                                            <a href="{{route('banner.all')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a>
                                        </div>  
                                    </div>
                                  </div>
                                  <div class="card-body">
                                      <div class="row mb-3">
                                        <div class="col-sm-7">
                                          <input type="hidden" class="form-control form_control" id="" name="ban_slug" value="{{ $data->ban_slug }}">
                                        </div>
                                        <div class="col-sm-7">
                                          <input type="hidden" class="form-control form_control" id="" name="ban_id" value="{{ $data->ban_id }}">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Banner Title:<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="ban_title" value="{{ $data->ban_title }}">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Banner Subtitle:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="ban_subtitle" value="{{ $data->ban_subtitle }}">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Banner Subtitle:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="ban_url" value="{{ $data->ban_url }}">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Banner Button<span class="req_star">*</span>:</label>
                                        <div class="col-sm-7">
                                          <input type="text" class="form-control form_control" id="" name="ban_button" value="{{ $data->ban_button }}">
                                        </div>
                                      </div>
                                      <div class="row mb-3">
                                        <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                                        <div class="col-sm-4">
                                          <input type="file" class="form-control form_control" id="" name="pic">
                                        </div>
                                        <div class="col-sm-4">
                                          @if($data->ban_image != '')
                                              <img height="70" src="{{asset('uploads/banner/'.$data->ban_image)}}" alt="">
                                          @else
                                              <img height="70" src="{{asset('uploads/banner/default.png')}}" alt="">
                                          @endif
                                        </div>
                                      </div>
                                  </div>
                                  <div class="card-footer text-center">
                                    <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
                                  </div>  
                                </div>
                            </form>
                        </div>
                    </div>
                @endsection