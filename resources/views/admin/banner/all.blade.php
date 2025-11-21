                    @extends('layouts.admin')
                    @section('content')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-3">
                              <div class="card-header">
                                <div class="row">
                                    <div class="col-md-8 card_title_part">
                                        <i class="fab fa-gg-circle"></i>All Banner
                                    </div>  
                                    @if(session('success'))
                                      <div class="alert alert-success" id='alert-message' role="alert">
                                          {{ session('success') }}
                                      </div>
                                    @endif
                                    <div class="col-md-4 card_button_part">
                                        <a href="{{route('banner.add')}}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Banner</a>
                                    </div>  
                                </div>
                              </div>
                              <div class="card-body">
                                <table class="table table-bordered table-striped table-hover custom_table">
                                  <thead class="table-dark">
                                    <tr>
                                      <th>Banner Title</th>
                                      <th>Banner Subtitle</th>
                                      <th>Banner Button</th>
                                      <th>Banner URL</th>
                                      <th>Banner Image</th>
                                      <th>Manage</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($all as $data)
                                    <tr>
                                      <td>{{ $data->ban_title }}</td>
                                      <td>{{ $data->ban_subtitle }}</td>
                                      <td>{{ $data->ban_button }}</td>
                                      <td>{{ $data->ban_url }}</td>
                                      <td>{{ $data->ban_image }}</td>
                                      <td>---</td>
                                      <td>
                                          <div class="btn-group btn_group_manage" role="group">
                                            <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                            <ul class="dropdown-menu">
                                              <li><a class="dropdown-item" href="{{route('banner.view',$data->ban_slug)}}">View</a></li>
                                              <li><a class="dropdown-item" href="">Edit</a></li>
                                              <li><a class="dropdown-item" href="#">Delete</a></li>
                                            </ul>
                                          </div>
                                      </td>
                                    </tr>
                                  @endforeach
                                  </tbody>
                                </table>
                              </div>
                              <div class="card-footer">
                                <div class="btn-group" role="group" aria-label="Button group">
                                  <button type="button" class="btn btn-sm btn-dark">Print</button>
                                  <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                                  <button type="button" class="btn btn-sm btn-dark">Excel</button>
                                </div>
                              </div>  
                            </div>
                        </div>
                    </div>
                @endsection

