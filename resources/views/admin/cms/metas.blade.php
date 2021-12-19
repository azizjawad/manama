@extends('admin.layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1>CMS Management</h1>
            <nav class="breadcrumb-container d-none d-sm-block d-lg-inline-block" aria-label="breadcrumb">
            </nav>
            <div class="separator mb-5"></div>
            <div class="row">

                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="mb-4 font-weight-bold">Static Pages Meta Tags</h5>
                            <div class="separator mb-5"></div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="table-responsive">
                                        <table class="data-table data-table-static-pages">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Static Pages</th>
                                                <th>Page Link</th>
                                                <th>Page Title</th>
                                                <th class="text-center">Actions</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>Who We Are</td>
                                                <td><a href="https://www.manamatoppings.com/aboutus" target="_blank">/aboutus</a></td>
                                                <td>Manama Toppings - Always Something New</td>
                                                <td class="text-center">
                                                    <a href="CMS.Static.Page.Edit.html" class="las la-edit btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Our Distributors</td>
                                                <td><a href="https://www.manamatoppings.com/distributors" target="_blank">/distributors</a></td>
                                                <td>Manama Toppings - Always Something New</td>
                                                <td class="text-center">
                                                    <a href="CMS.Static.Page.Edit.html" class="las la-edit btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Contact Us</td>
                                                <td><a href="https://www.manamatoppings.com/contactus" target="_blank">/contactus</a></td>
                                                <td>Manama Toppings - Always Something New</td>
                                                <td class="text-center">
                                                    <a href="CMS.Static.Page.Edit.html" class="las la-edit btn btn-secondary mx-1"></a></td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
