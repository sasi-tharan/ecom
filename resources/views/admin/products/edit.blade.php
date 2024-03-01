@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">

                <div class="card-header">
                    <h4>
                        Add Product
                        <a href="{{ url('admin/products') }}" class="btn btn-danger btn-sm text-white float-end">
                            Back
                        </a>
                    </h4>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') {{-- Use the PUT method for updates --}}
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Product details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="sg-tab" data-bs-toggle="tab" data-bs-target="#sgs-tab-pane"
                                    type="button" role="tab" aria-controls="sgs-tab-pane" aria-selected="false">
                                    SG
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="other-tab" data-bs-toggle="tab"
                                    data-bs-target="#others-tab-pane" type="button" role="tab"
                                    aria-controls="others-tab-pane" aria-selected="false">
                                    Other Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="bulk-tab" data-bs-toggle="tab"
                                    data-bs-target="#bulks-tab-pane" type="button" role="tab"
                                    aria-controls="bulks-tab-pane" aria-selected="false">
                                    Bulk Category & Price Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="link-tab" data-bs-toggle="tab"
                                    data-bs-target="#links-tab-pane" type="button" role="tab"
                                    aria-controls="links-tab-pane" aria-selected="false">
                                    Linked items
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="images-tab" data-bs-toggle="tab"
                                    data-bs-target="#images-tab-pane" type="button" role="tab"
                                    aria-controls="images-tab-pane" aria-selected="false">
                                    Product Images ThumbNail & Large
                                </button>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="">SyS ID / SKU</label>
                                        <input type="text" name="sku" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Barcode</label>
                                        <input type="text" name="barcode" class="form-control" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Brand/Manufacturer</label>
                                        <input type="text" name="brand" class="form-control" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="">Product Name</label>
                                        <textarea name="product_name" id="" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="">Description</label>
                                        <textarea name="description" id="" class="form-control" rows="4"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="department_id">Department:</label>
                                        <select name="department_id" id="department_id" class="form-control">
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->department_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="group_id">Group:</label>
                                        <select name="group_id" id="group_id" class="form-control">
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}">{{ $group->group_title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="sub_group_id">Sub Group:</label>
                                        <select name="sub_group_id" id="sub_group_id" class="form-control">
                                            @foreach ($subGroups as $subGroup)
                                                <option value="{{ $subGroup->id }}">{{ $subGroup->sub_group_title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="sgs-tab-pane" role="tabpanel" aria-labelledby="details-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">SG 1</label>
                                            <input type="text" name="sg_1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">SG 2</label>
                                            <input type="text" name="sg_2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">SG 3</label>
                                            <input type="text" name="sg_3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Capacity (Kg/ml)</label>
                                            <input type="text" name="capacity" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Units</label>
                                            <input type="text" name="units" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Case</label>
                                            <input type="text" name="case" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Dimensions</label>
                                            <input type="text" name="dimension" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Supplier Information</label>
                                            <input type="text" name="supplier_info" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="others-tab-pane" role="tabpanel" aria-labelledby="others-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Cost Price before vat</label>
                                            <input type="number" name="cost_price_before_vat" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Inventory Status</label>
                                            <input type="text" name="inventory_status" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Location</label>
                                            <input type="text" name="location" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Age Restricted</label>
                                            <input type="text" name="age_restricted" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Price (WSP)</label>
                                            <input type="number" name="price_wsp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Vat</label>
                                            <input type="number" name="vat" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Profit Margin</label>
                                            <input type="number" name="profit_margin" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">RRP</label>
                                            <input type="number" name="rrp" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Reseller Margin</label>
                                            <input type="number" name="reseller_margin" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="trending">Trending</label>
                                            <input type="checkbox" id="trending" name="trending" value="1"
                                                style="width: 50px; height: 50px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="featured">Featured</label>
                                            <input type="checkbox" id="featured" name="featured" value="1"
                                                style="width: 50px; height: 50px;">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="status">Status</label>
                                            <input type="checkbox" id="status" name="status" value="1"
                                                style="width: 50px; height: 50px;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="bulks-tab-pane" role="tabpanel" aria-labelledby="bulks-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Bulk category 1</label>
                                            <input type="text" name="bulk_category_1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Bulk price category 1</label>
                                            <input type="number" name="bulk_category_price_1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Bulk category 2</label>
                                            <input type="text" name="bulk_category_2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Bulk price category 2</label>
                                            <input type="number" name="bulk_category_price_2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Bulk category 3</label>
                                            <input type="text" name="bulk_category_3" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Bulk price category 3</label>
                                            <input type="number" name="bulk_category_price_3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="links-tab-pane" role="tabpanel" aria-labelledby="links-tab"
                                tabindex="0">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Linked Item 1</label>
                                            <input type="text" name="linked_item_1" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Linked Item 2</label>
                                            <input type="text" name="linked_item_2" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Linked Item 3</label>
                                            <input type="text" name="linked_item_3" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="images-tab-pane" role="tabpanel" aria-labelledby="images-tab"
                                tabindex="0">
                                <div class="mb-3">
                                    <label for="">Upload Product ThumbNail Images</label>
                                    <input type="file" multiple name="image[]" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Upload Product Images</label>
                                    <input type="file" multiple name="large_image[]" class="form-control" />
                                </div>
                            </div>


                            <div class="py-2 float-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </form>

                </div>

            </div>
        </div>
    </div>
@endsection
