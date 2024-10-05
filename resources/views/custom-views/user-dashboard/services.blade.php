@extends('custom-views.layouts.app')
@section('title')
    {{__('messages.dashboard')}}
@endsection
@section('content')
<div>
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-body p-0">
                <div class="row p-2">
                      <div class="col-md-12 p-2">
                        <div class="d-flex justify-content-end" style="margin-right: 10px;">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
                                Add Service
                            </button>
                        </div>
                        <div>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>
                                            <img src="{{ $service->service_icon }}" alt="Service Icon" width="50" height="50">
                                        </td>
                                        <td>
                                            <a href="{{ route('user.services.edit',$service->id) }}" class="btn btn-primary">Edit</a>
                                           <form method="POST" action="{{ route('user.services.delete',$service->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title">
                                            Add Service
                                        </h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('user.services.update') }}"
                                              accept-charset="UTF-8" enctype="multipart/form-data">
                                            @csrf


                                            <div class="mb-5"><label
                                                    for="name" class="form-label required">Name:</label> <input
                                                    class="form-control" required="" placeholder="Enter Service Name"
                                                    name="name" type="text" id="name"></div>
                                            <div class="mb-5"><label for="service_url" class="form-label">Service
                                                    URL:</label> <input class="form-control" placeholder="Service URL"
                                                                        name="service_url" type="text" id="service_url">
                                            </div>
                                            <div class="mb-5"><label for="description" class="form-label required">Description:</label>
                                                <textarea class="form-control" placeholder="Enter Short Description"
                                                          rows="5" required="" name="description" cols="50"
                                                          id="description"></textarea></div>
                                            <div class="mb-3" io-image-input="true"><label for="exampleInputImage"
                                                                                           class="form-label required">Service
                                                    Icon:</label>
                                                <div class="d-block">
                                                    <div class="image-picker">
                                                        <div class="image previewImage" id="servicePreview"
                                                             style="background-image: url(http://127.0.0.1:8000/assets/images/default_service.png)"></div>
                                                        <span class="picker-edit rounded-circle text-gray-500 fs-small"
                                                              data-bs-toggle="tooltip" data-placement="top"
                                                              data-bs-original-title="Change Image"> <label> <svg
                                                                    class="svg-inline--fa fa-pen" id="profileImageIcon"
                                                                    aria-hidden="true" focusable="false"
                                                                    data-prefix="fas" data-icon="pen" role="img"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    viewBox="0 0 512 512" data-fa-i2svg=""><path
                                                                        fill="currentColor"
                                                                        d="M362.7 19.32C387.7-5.678 428.3-5.678 453.3 19.32L492.7 58.75C517.7 83.74 517.7 124.3 492.7 149.3L444.3 197.7L314.3 67.72L362.7 19.32zM421.7 220.3L188.5 453.4C178.1 463.8 165.2 471.5 151.1 475.6L30.77 511C22.35 513.5 13.24 511.2 7.03 504.1C.8198 498.8-1.502 489.7 .976 481.2L36.37 360.9C40.53 346.8 48.16 333.9 58.57 323.5L291.7 90.34L421.7 220.3z"></path></svg>
                                                                <!-- <i class="fa-solid fa-pen" id="profileImageIcon"></i> Font Awesome fontawesome.com --> <input
                                                                    type="file" id="serviceIcon" name="service_icon"
                                                                    class="image-upload file-validation d-none"
                                                                    accept="image/*"> </label> </span></div>
                                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                </div>
                                            </div>
                                            <div class="modal-footer pt-0">
                                                <button type="submit" class="btn btn-primary m-0" id="serviceSave">Save
                                                </button>
                                                <button type="button" class="btn btn-secondary my-0 ms-5 me-0"
                                                        data-bs-dismiss="modal">Discard
                                                </button>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
