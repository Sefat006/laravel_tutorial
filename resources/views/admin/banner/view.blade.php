        @extends('layouts.admin')
        @section('content')
        <div class="row">
            <div class="col-md-12">
                <div class="card mb-3">
                    <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>View Banner Information
                        </div>  
                        <div class="col-md-4 card_button_part">
                            <a href="{{route('banner.all')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a>
                        </div>  
                    </div>
                    </div>
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-striped table-hover custom_view_table">
                                <tr>
                                <td>Banner Title</td>  
                                <td>:</td>  
                                <td>{{ $data->ban_title }}</td>  
                                </tr>
                                <tr>
                                <td>Banner Subtitle</td>  
                                <td>:</td>  
                                <td>{{ $data->ban_subtitle}}</td>  
                                </tr>
                                <tr>
                                <td>Banner Button</td>  
                                <td>:</td>  
                                <td>{{ $data->ban_button}}</td>  
                                </tr>
                                <tr>
                                <td>Banner URL</td>
                                <td>:</td>  
                                <td>{{ $data->ban_url}}</td>  
                                </tr>
                                <tr>
                                <td>Banner Creator</td>  
                                <td>:</td>  
                                <td>{{ $data->creatorInfo->name}}</td>  
                                </tr>
                                <tr>
                                <td>Banner Photo</td>  
                                <td>:</td>  
                                <td>
                                    @if($data->ban_image != '')
                                        <img height="200" src="{{asset('uploads/banner/'.$data->ban_image)}}" alt="">
                                    @else
                                        <img height="200" src="{{asset('uploads/banner/default.png')}}" alt="">
                                    @endif
                                </td>  
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
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