@extends(backpack_view('blank'))

@section('content')
    {{session(['patient_id' => null])}}
    <div class="site-section p-0">
        <div class="container">
            <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <a href='{{ backpack_url('patient') }}' class="service-v1 text-center">
                        <span class="flaticon-scan"></span>
                        <h3>Search For a Patient</h3>
                    </a>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-4">
                    <a href='{{ backpack_url('patient/create') }}' class="service-v1 text-center">
                        <span class="flaticon-medical"></span>
                        <h3>New Patient</h3>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
