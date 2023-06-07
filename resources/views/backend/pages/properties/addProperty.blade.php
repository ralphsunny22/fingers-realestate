@extends('backend.layouts.design')
@section('title')Add Property @endsection

@section('extra_css')
<style>
    .page-title {
        width: 100%;
        height: 50px;
        text-align: left;
        display: flex;
        flex-direction: column;
        align-items: center;
        flex-wrap: wrap;
        justify-content: center;
        background: gray;
        padding-top: 10px;
    }
    section {
        padding: 40px 0 80px;
    }
    .tox .tox-promotion, .tox-statusbar__branding{
        display: none !important;
    }
    .pointer{
        cursor: pointer;
    }
    .imgPreview img {
        padding: 8px;
        max-width: 100px;
    }
    /* .form-control{
        border: 1px solid black !important;
    } */ 
</style>
@endsection

@section('content')
<!-- ============================ Page Title Start================================== -->
<div class="page-title d-none">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">All Properties</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Property</li>
                    </ol>
                </nav>
                
            </div>
        </div>
    </div>
</div>
<!-- ============================ Page Title End ================================== -->

<!-- ============================ User Dashboard ================================== -->
<section class="gray-simple">
    <div class="container-fluid">
                    
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="filter_search_opt">
                    <a href="javascript:void(0);" onclick="openFilterSearch()">Dashboard Navigation<i class="ml-2 ti-menu"></i></a>
                </div>
            </div>
        </div>
                    
        <div class="row">
            
            <div class="col-lg-3 col-md-12">
                @include('backend.layouts.sidebar')
            </div>
            
            <div class="col-lg-9 col-md-12">

                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">All Properties</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add Property</li>
                    </ol>
                </nav>

                @if(Session::has('success'))
                <div class="alert alert-success mb-3 text-center">
                    {{Session::get('success')}}
                </div>
                @endif
                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h4>Add Property</h4>
                    </div>
                </div>
            
        
                <div class="dashboard-wraper">
                    
                    <div class="row">
                        
                        <!-- Submit Form -->
                        <div class="col-lg-12 col-md-12">
                            <form action="{{ route('addPropertyPost') }}" method="post" enctype="multipart/form-data">@csrf
                                <div class="submit-pages">
                                    
                                    <!-- Basic Information -->
                                    <div class="form-submit">	
                                        <h3>Basic Information</h3>
                                        <div class="submit-section">
                                            <div class="row">
                                            
                                                <div class="form-group col-md-12">
                                                    <label>Property Title<span class="tip-topdata" data-tip="Property Title"><i class="ti-help"></i></span></label>
                                                    <input type="text" name="title" class="form-control @error('title') is-invalid border-danger @enderror" value="{{ old('title') }}">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label>Select Property Status<span class="tip-topdata" data-tip="For Sale or Rent"><i class="ti-help"></i></span></label>
                                                    <select id="for_what" name="for_what" class="form-control @error('for_what') is-invalid border-danger @enderror">
                                                        <option value="">&nbsp;</option>
                                                        <option value="rent">For Rent</option>
                                                        <option value="sale" selected>For Sale</option>
                                                    </select>
                                                    @error('for_what')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label>Select Property Category<span class="tip-topdata" data-tip="Land, Building etc"><i class="ti-help"></i></span></label>
                                                    <div class="d-flex @error('category_id') is-invalid border-danger @enderror">
                                                        <select id="ptypes" name="category_id" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="1">Houses</option>
                                                            <option value="2">Apartment</option>
                                                            <option value="3">Villas</option>
                                                            <option value="4">Commercial</option>
                                                            <option value="5">Offices</option>
                                                            <option value="6">Garage</option>
                                                        </select>
                                                        <button type="button" class="btn btn-primary bg-primary" data-bs-toggle="modal" data-bs-target="#category">
                                                        <i class="ti-plus"></i></button>
                                                    </div>
                                                    @error('category_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                    
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Price<span class="tip-topdata" data-tip="Property Cost In Naira"><i class="ti-help"></i></span></label>
                                                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="NGN" value="{{ old('price') }}">
                                                    @error('price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Gallery -->
                                    <div class="form-submit">	
                                        <h3>Media Gallery</h3>
                                        <div class="submit-section">
                                            <div class="row">
                                            
                                                <div class="user-image mb-3 text-center">
                                                    <div class="imgPreview"> </div>
                                                </div> 

                                                <div class="form-group col-md-12">
                                                    <label>Upload Image<span class="tip-topdata" data-tip="Upload Images that represents this property"><i class="ti-help"></i></span></label>
                                                    <input type="file" name="images[]" id="images" class="form-control @error('images') is-invalid @enderror" multiple="multiple">
                                                    @error('images')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Paste Video Url(Link) From Youtube<span class="tip-topdata" data-tip="Seperate multiple urls with commas"><i class="ti-help"></i></span> (Optional)</label>
                                                    <input type="text" name="youtube_videos" class="form-control" placeholder="https://www.youtube.com/watch?v=KbTjl1PNCzg" value="{{ old('youtube_videos') ? old('youtube_videos') : 'https://www.youtube.com/watch?v=KbTjl1PNCzg' }}">
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Location -->
                                    <div class="form-submit mb-3">	
                                        <h3>Location (Optional)</h3>
                                        <div class="submit-section">
                                            <div class="row">
                                            
                                                <div class="form-group col-md-12">
                                                    <label>Address</label>
                                                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label>City</label>
                                                    <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label>State</label>
                                                    <input type="text" name="state" class="form-control" value="{{ old('state') }}">
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label>Zip Code</label>
                                                    <input type="text" name="zipcode" class="form-control" value="{{ old('zipcode') }}">
                                                </div>

                                                <div class="landmarks-clone-section wrapper">
                                                    <div class="form-group col-md-12 mt-1 element">
                                                        <label>Landmarks<span class="tip-topdata" data-tip="Nearby places to property location"><i class="ti-help"></i></span></label>
                                                        <input type="text" name="landmarks[]" class="form-control" placeholder="" value="">
                                                    </div>
                                    
                                                    <!--append elements to-->
                                                    <div class="results"></div>
                                    
                                                    <div class="buttons d-flex justify-content-between" style="margin-top: -15px;">
                                                        <button type="button" class="clone btn btn-success btn-sm rounded-pill"><i class="ti-plus"></i></button>
                                                        <button type="button" class="remove btn btn-danger btn-sm rounded-pill"><i class="ti-plus"></i></button>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Detailed Information -->
                                    <div class="form-submit">	
                                        <div class="d-flex justify-content-start align-items-center">
                                            <h3 class="me-3">Detailed Information</h3>
                                            <div>
                                                <button type="button" class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#details"><i class="ti-plus"></i></button>
                                            </div>
                                        </div>
                                        <div class="submit-section">
                                            <div class="row" id="basicFeatures">

                                                <div class="form-group col-md-4">
                                                    <label>Area<span class="tip-topdata" data-tip="In Square-ft or hectares or plots, etc"><i class="ti-help"></i></span> (Optional)</label>
                                                    <input type="text" id="area" name="property_features[Area]" class="form-control">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Year Built<span class="tip-topdata" data-tip="Year property was built"><i class="ti-help"></i></span> (Optional)</label>
                                                    <input type="text" name="property_features[Year Built]" class="form-control">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Bedrooms<span class="tip-topdata" data-tip="No. of bedrooms"><i class="ti-help"></i></span> (Optional)</label>
                                                    <select id="bedrooms" name="property_features[Bedroom]" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        @for ($i = 0; $i < 100; $i++)
                                                            <option value="1">{{ ++$i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label>Bathrooms (Optional)</label>
                                                    <select id="bathrooms" name="property_features[Bathroom]" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        @for ($i = 0; $i < 100; $i++)
                                                            <option value="1">{{ ++$i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>Floors <span class="tip-topdata" data-tip="No. of storey buildings"><i class="ti-help"></i></span> (Optional)</label>
                                                    <select id="floors" name="property_features[Floor]" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        @for ($i = 0; $i < 100; $i++)
                                                            <option value="1">{{ ++$i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label>Garage (optional)</label>
                                                    <select id="garage" name="property_features[Garage]" class="form-control">
                                                        <option value="">&nbsp;</option>
                                                        @for ($i = 0; $i < 100; $i++)
                                                            <option value="1">{{ ++$i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                                
                                                <div class="form-group col-md-12">
                                                    <div class="d-flex justify-content-start align-items-center">
                                                        <label class="me-3">Other Features (optional)</label>
                                                        <div>
                                                            <button type="button" class="btn btn-success btn-sm rounded-pill" data-bs-toggle="modal" data-bs-target="#amenityModal"><i class="ti-plus"></i></button>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="o-features">
                                                        <ul class="no-ul-list third-row" id="amenities">
                                                            <li>
                                                                <input id="a-1" class="checkbox-custom" name="property_features[Air Condition]" type="checkbox">
                                                                <label for="a-1" class="checkbox-custom-label">Air Condition</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-2" class="checkbox-custom" name="property_features[Bedding]" type="checkbox">
                                                                <label for="a-2" class="checkbox-custom-label">Bedding</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-3" class="checkbox-custom" name="property_features[Swimming Pool]" type="checkbox">
                                                                <label for="a-3" class="checkbox-custom-label">Swimming Pool</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-4" class="checkbox-custom" name="property_features[Internet]" type="checkbox">
                                                                <label for="a-4" class="checkbox-custom-label">Internet</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-5" class="checkbox-custom" name="property_features[Gym]" type="checkbox">
                                                                <label for="a-5" class="checkbox-custom-label">Gym</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-6" class="checkbox-custom" name="property_features[Car Parking]" type="checkbox">
                                                                <label for="a-6" class="checkbox-custom-label">Car Parking</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-7" class="checkbox-custom" name="property_features[WiFi]" type="checkbox">
                                                                <label for="a-7" class="checkbox-custom-label">WiFi</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-8" class="checkbox-custom" name="property_features[Balcony]" type="checkbox">
                                                                <label for="a-8" class="checkbox-custom-label">Balcony</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-9" class="checkbox-custom" name="property_features[Laundry Room]" type="checkbox">
                                                                <label for="a-9" class="checkbox-custom-label">Laundry Room</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-10" class="checkbox-custom" name="property_features[Elevator]" type="checkbox">
                                                                <label for="a-10" class="checkbox-custom-label">Elevator</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-11" class="checkbox-custom" name="property_features[Beach]" type="checkbox">
                                                                <label for="a-11" class="checkbox-custom-label">Beach</label>
                                                            </li>
                                                            <li>
                                                                <input id="a-12" class="checkbox-custom" name="property_features[Pets Allowed]" type="checkbox">
                                                                <label for="a-12" class="checkbox-custom-label">Pets Allowed</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Tags or keywords<span class="tip-topdata" data-tip="Seperate multiple tags with commas"><i class="ti-help"></i></span> (Optional)</label>
                                                    <input type="text" name="tags" id="" class="form-control @error('tags') is-invalid @enderror" value="{{ old('tags') }}">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Description</label>
                                                    <textarea class="form-control h-120 d-none"></textarea>
                                                    <textarea name="description" id="" cols="30" rows="5" class="tinymce-editor form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div class="o-features">
                                                        <ul class="no-ul-list third-row justify-content-start" id="is_active">
                                                            <li>
                                                                <input id="status" class="checkbox-custom" name="status" type="checkbox" checked>
                                                                <label for="status" class="checkbox-custom-label">Active</label>
                                                            </li>
                                                            <li>
                                                                <input id="isFeatured" class="checkbox-custom" name="isFeatured" type="checkbox" checked>
                                                                <label for="isFeatured" class="checkbox-custom-label">Is Featured</label>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Contact Information -->
                                    
                                    <div class="form-group col-lg-12 col-md-12">
                                        <button class="btn btn-success rounded" type="submit">Submit</button>
                                    </div>
                                                
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</section>
<!-- ============================ User Dashboard End ================================== -->

<!-- ============================ Call To Action ================================== -->
<section class="theme-bg call-to-act-wrap">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="call-to-act">
                    <div class="call-to-act-head">
                        <h3>Want to Become a Real Estate Agent?</h3>
                        <span>We'll help you to grow your career and growth.</span>
                    </div>
                    <a href="#" class="btn btn-call-to-act">SignUp Today</a>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Call To Action End ================================== -->

<!-- Category Modal -->
<div class="modal fade signup" id="category" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document">
        <div class="modal-content">
            <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title" style="font-size: 18px;">Add Category</h4>
                <div class="login-form">
                    <form>
                        
                        <div class="row">
                            
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <label>Category Name</label>
                                        <input type="text" class="form-control border bg-white" placeholder="">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-group text-end">
                            <button type="submit" class="btn bg-primary full-width w-50 rounded">Submit</button>
                        </div>
                    
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Details Modal -->
<div class="modal fade signup" id="details" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document" style="width: 30%;">
        <div class="modal-content">
            <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title" style="font-size: 18px;">Add New Feature</h4>
                <div class="login-form">
                    <form id="addFeatureForm" action="">@csrf
                        
                        <div class="row">
                            
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <label>Feature Name</label>
                                        <input type="text" name="feature_name" class="form-control border bg-white feature_name" placeholder="">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-group text-end">
                            <button type="submit" id="addFeatureBtn" class="btn bg-primary full-width w-50 rounded">Submit</button>
                        </div>
                    
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Amenities Modal -->
<div class="modal fade signup" id="amenityModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered login-pop-form" role="document" style="width: 30%;">
        <div class="modal-content">
            <span class="mod-close" data-bs-dismiss="modal" aria-hidden="true"><i class="ti-close"></i></span>
            <div class="modal-body">
                <h4 class="modal-header-title" style="font-size: 18px;">Add New Amenity</h4>
                <div class="login-form">
                    <form id="addAmenityForm" action="">@csrf
                        
                        <div class="row">
                            
                            <div class="col-lg-12 col-md-6">
                                <div class="form-group">
                                    <div class="input-with-icon">
                                        <label>Feature Name</label>
                                        <input type="text" name="amenity_name" class="form-control border bg-white amenity_name" placeholder="">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                        <div class="form-group text-end">
                            <button type="submit" class="btn bg-primary full-width w-50 rounded">Submit</button>
                        </div>
                    
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

@endsection



@section('extra_js')
<script src="{{asset('/assets/js/dropzone.js')}}"></script>
<!-- New Js -->
<script>
    function openFilterSearch() {
        document.getElementById("filter_search").style.display = "block";
    }
    function closeFilterSearch() {
        document.getElementById("filter_search").style.display = "none";
    }
</script>

<!--tinymce--->
<script>
    tinymce.init({
      selector: '.tinymce-editor',
      height: "200",
    });
</script>

<!---upload-image---->
<script>
    $(function() {
    // Multiple images preview with JavaScript
    var multiImgPreview = function(input, imgPreviewPlaceholder) {
        if (input.files) {
            
            var filesAmount = input.files.length;
            
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function(event) {
                    $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
    };
    $('#images').on('change', function() {
        $('div.imgPreview').html('');
        multiImgPreview(this, 'div.imgPreview');
    });
    });    
</script>

<!---addFeatureModal--->
<script>
    //details Modal
   $('#addFeatureForm').submit(function(e){
        e.preventDefault();
        var feature_name = $("form .feature_name").val();
        // alert(category_name)
        if (feature_name != '') {
            $('#details').modal('hide');

            $.ajax({
                type:'get',
                url:'/ajax-create-property-feature',
                // data:{ category_name:category_name },
                data: $(this).serialize(),
                success:function(resp){
                    console.log(resp)
                    if (resp.status) {
                        var start = '<div class="form-group col-md-4">';
                        var feature = '<label>'+resp.data.feature.name+'</label>';
                            feature += '<input type="text" class="form-control" name="property_features['+resp.data.feature.name+']">';
                        var end = '</div>';

                        var col = start + feature + end;
                                                
                        $('#basicFeatures').prepend(col);

                        alert('Feature Added Successfully')
                        // return false;
                    } else {
                        alert(resp.data)
                    } 
                        
                },error:function(){
                    alert("Error");
                }
            });
        
        } else {
            alert('Error: Something went wrong')
        }
   });
</script>

<!---addAmenityModal--->
<script>
    //amenity Modal
   $('#addAmenityForm').submit(function(e){
        e.preventDefault();
        var amenity_name = $("form .amenity_name").val();
        // alert(category_name)
        if (amenity_name != '') {
            $('#amenityModal').modal('hide');

            $.ajax({
                type:'get',
                url:'/ajax-create-amenity-feature',
                // data:{ category_name:category_name },
                data: $(this).serialize(),
                success:function(resp){
                    console.log(resp)
                    if (resp.status) {
                        
                        var start = '<li>';
                        var amenity = '<input class="checkbox-custom" name="property_features['+resp.data.feature.name+']" type="checkbox">';
                            amenity += '<label class="checkbox-custom-label">'+resp.data.feature.name+'</label>';
                        var end = '</li>';

                        var li = start + amenity + end;
                                                
                        $('#amenities').prepend(li);

                        alert('Amenity Added Successfully')
                        // return false;
                    } else {
                        alert(resp.data)
                    } 
                        
                },error:function(){
                    alert("Error");
                }
            });
        
        } else {
            alert('Error: Something went wrong')
        }
   });
</script>

<!--landmark-clone--->
<script>
    //clone
    $('.wrapper').on('click', '.remove', function() {
        $('.remove').closest('.wrapper').find('.element').not(':first').last().remove();
    });
    $('.wrapper').on('click', '.clone', function() {
        $('.clone').closest('.wrapper').find('.element').first().clone().appendTo('.results');
    });
  </script>
@endsection