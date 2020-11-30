@extends('layouts.admin')
@section('content')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <div class="row breadcrumbs-top d-inline-block">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a
                                        href="{{route('admin.dashboard')}}">{{__('admin/setting.home')}}</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{route('admin.products')}}">{{__('admin/setting.products')}}</a></li>
                                <li class="breadcrumb-item active">{{__('admin/setting.addnewproduct')}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Form wizard with number tabs section start -->
                <section id="number-tabs">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">{{__('admin/setting.addnewproduct')}}</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-h font-medium-3"></i></a>
                                </div>
                                @include('dashboard.includes.alerts.success')
                                @include('dashboard.includes.alerts.errors')
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                        <form class="number-tab-steps wizard-circle"
                                              action="{{route('admin.products.update',[$product-> id])}}" method="POST"
                                              enctype="multipart/form-data" id="wizard">
                                        @csrf
                                        <input type="hidden" name="id" value="{{$product -> id}}">
                                            <!-- Step 1 -->
                                            <h6>{{__('admin/setting.mainproductdata')}}</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.productname')}}</label>
                                                            <input type="text" id="name"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('name')}}"
                                                                   name="name">
                                                            @error("name")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.slug')}}</label>
                                                            <input type="text"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('slug')}}"
                                                                   name="slug">
                                                            @error("slug")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.productdesc')}}</label>
                                                            <textarea name="description" id="description"
                                                                      class="form-control"
                                                                      placeholder="  "
                                                            >{{old('description')}}</textarea>

                                                            @error("description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1"> {{__('admin/setting.shortdesc')}}</label>
                                                            <textarea name="short_description" id="short-description"
                                                                      class="form-control"
                                                                      placeholder=""
                                                            >{{old('short_description')}}</textarea>

                                                            @error("short_description")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.choosecategory')}}</label>
                                                            <select name="categories[]" class="select2 form-control"
                                                                    multiple>
                                                                <optgroup
                                                                    label="{{__('admin/setting.plzmaincategoriesselect')}}">
                                                                    @if($categories && $categories -> count() > 0)
                                                                        @foreach($categories as $category)
                                                                            <option
                                                                                value="{{$category -> id }}">{{$category -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('categories.0')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.tagsselect')}}</label>
                                                            <select name="tags[]" class="select2 form-control" multiple>
                                                                <optgroup label="{{__('admin/setting.plztagsselect')}}">
                                                                    @if($tags && $tags -> count() > 0)
                                                                        @foreach($tags as $tag)
                                                                            <option
                                                                                value="{{$tag -> id }}">{{$tag -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('tags')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.brandsselect')}}</label>
                                                            <select name="brand_id" class="select2 form-control">
                                                                <optgroup
                                                                    label="{{__('admin/setting.brandtagsselect')}}">
                                                                    @if($brands && $brands -> count() > 0)
                                                                        @foreach($brands as $brand)
                                                                            <option
                                                                                value="{{$brand -> id }}">{{$brand -> name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </optgroup>
                                                            </select>
                                                            @error('brand_id')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row" id="cats_list">
                                                    <div class="col-md-12">
                                                        <div class="form-group mt-1">
                                                            <input type="checkbox" value="1"
                                                                   name="is_active"
                                                                   id="switcheryColor4"
                                                                   class="switchery" data-color="success"
                                                                   checked/>
                                                            <label for="switcheryColor4"
                                                                   class="card-title ml-1">{{__('admin/setting.status')}}</label>
                                                            @error("is_active")
                                                            <span class="text-danger">{{$message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Step 2 -->
                                            <h6>{{__('admin/setting.productprice')}}</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.productprice')}}</label>
                                                            <input type="number" id="price"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('price')}}"
                                                                   name="price">
                                                            @error("price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.specialprice')}}</label>
                                                            <input type="number"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('special_price')}}"
                                                                   name="special_price">
                                                            @error("special_price")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.pricetype')}}</label>
                                                            <select name="special_price_type"
                                                                    class="select2 form-control" multiple>
                                                                <optgroup
                                                                    label="{{__('admin/setting.plzchoosepricetype')}}">
                                                                    <option value="percent">percent</option>
                                                                    <option value="fixed">fixed</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('special_price_type')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> تاريخ البداية
                                                            </label>

                                                            <input type="date" id="special_price_start"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('special_price_start')}}"
                                                                   name="special_price_start">

                                                            @error('special_price_start')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1"> تاريخ البداية
                                                            </label>
                                                            <input type="date" id="special_price_end"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('special_price_end')}}"
                                                                   name="special_price_end">

                                                            @error('special_price_end')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Step 3 -->
                                            <h6>{{__('admin/setting.stock')}}</h6>
                                            <fieldset>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.sku')}}</label>
                                                            <input type="text" id="sku"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('sku')}}"
                                                                   name="sku">
                                                            @error("sku")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="projectinput1">تتبع المستودع</label>
                                                            <select name="manage_stock" style="width: 100%"
                                                                    class="select2 form-control" id="manageStock">
                                                                <optgroup label="من فضلك أختر النوع ">
                                                                    <option value="1">اتاحة التتبع</option>
                                                                    <option value="0" selected>عدم اتاحه التتبع</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('manage_stock')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <!-- QTY  -->
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.status')}}</label>
                                                            <select name="in_stock" class="select2 form-control">
                                                                <optgroup label="{{__('admin/setting.plzchoose')}}">
                                                                    <option
                                                                        value="1">{{__('admin/setting.available')}}</option>
                                                                    <option
                                                                        value="0">{{__('admin/setting.unavailable')}}</option>
                                                                </optgroup>
                                                            </select>
                                                            @error('in_stock')
                                                            <span class="text-danger"> {{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6" style="display:none" id="qtyDiv">
                                                        <div class="form-group">
                                                            <label
                                                                for="projectinput1">{{__('admin/setting.quantity')}}</label>
                                                            <input type="text" id="qty"
                                                                   class="form-control"
                                                                   placeholder="  "
                                                                   value="{{old('qty')}}"
                                                                   name="qty">
                                                            @error("qty")
                                                            <span class="text-danger">{{$message}}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <!-- Step 4 -->
                                            <h6>{{__('admin/setting.productphoto')}}</h6>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div id="dpz-multiple-files" class="dropzone dropzone-area">
                                                        <div
                                                            class="dz-message">{{__('admin/setting.youcanuploadmultiphoto')}}</div>
                                                    </div>
                                                    <br><br>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Form wizard with number tabs section end -->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        // Wizard tabs with numbers setup
        $("number-tab-steps").steps({
            headerTag: "h6",
            bodyTag: "fieldset",
            transitionEffect: "fade",
            titleTemplate: '<span class="step">#index#</span> #title#',
            labels: {
                finish: "@lang('admin/setting.submit')",
                next: "@lang('admin/setting.next')",
                previous: "@lang('admin/setting.previous')",
            },
            onFinished: function (event, currentIndex) {
                $('#wizard').submit();
            }
        });
        $("#category_id").select2();
        $("#brand_id").select2();
        $("#tags").select2();
        $("#in_stock").select2();
        $("#manageStock").select2();
        $("#special_price_type").select2();
    </script>
    <script>
        $(document).on('change', '#manageStock', function () {
            if ($(this).val() == 1) {
                $('#qtyDiv').show();
            } else {
                $('#qtyDiv').hide();
            }
        });
    </script>
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.dpzMultipleFiles = {
            paramName: "dzfile", // The name that will be used to transfer the file
            //autoProcessQueue: false,
            maxFilesize: 5, // MB
            clickable: true,
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            dictFallbackMessage: "@lang('admin/setting.Your browser does not support multiple images, drag and drop')",
            dictInvalidFileType: "@lang('admin/setting.You cannot upload this type of file')",
            dictCancelUpload: "@lang('admin/setting.Cancel the upload')",
            dictCancelUploadConfirmation: "@lang('admin/setting.Are you sure to cancel uploading files?')",
            dictRemoveFile: "@lang('admin/setting.delete picture')",
            dictMaxFilesExceeded: "@lang('admin/setting.Max Files Exceeded')",
            headers: {
                'X-CSRF-TOKEN':
                    "{{ csrf_token() }}"
            }
            ,
            url: "{{ route('admin.products.images.store') }}", // Set the url
            success:
                function (file, response) {
                    $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                    uploadedDocumentMap[file.name] = response.name
                }
            ,
            removedfile: function (file) {


                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name

                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            }
            ,
            // previewsContainer: "#dpz-btn-select-files", // Define the container to display the previews
            init: function () {
                    @if(isset($event) && $event->document)
                var files =
                {!! json_encode($event->document) !!}
                    for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                }
                @endif
            }
        }
    </script>
@stop
