<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i
            class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

@if (session('patient_id', null) != null)
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('patient/create') }}'>
            <div class="sidebar-icon">
                <span class="flaticon-medical nav-icon"></span>Edit Patient Info
            </div>
        </a>
    </li>
    {{--    /patient/40001/edit--}}
    <li class='nav-item'><a class='nav-link' href='/sidebar/problem/{{session('patient_id')}}'>
            <div class="sidebar-icon">
                <span class="flaticon-headache nav-icon"></span>Main Problem
            </div>
        </a>
    </li>

    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('visit') }}'>
            <div class="sidebar-icon">
                <span class="flaticon-visitor nav-icon"></span>Visits
            </div>
        </a>
    </li>

    <li class='nav-item'><a class='nav-link' href='/sidebar/clinicalsigns/{{session('patient_id')}}'>
            <div class="sidebar-icon">
                <span class="flaticon-heart nav-icon"></span>Clinical Signs
            </div>
        </a>
    </li>

    <li class='nav-item'><a class='nav-link' href='/sidebar/physicaltherapy/{{session('patient_id')}}'>
            <div class="sidebar-icon">
                <span class="flaticon-physical-therapy nav-icon"></span>Physical Therapy
            </div>
        </a>
    </li>

    <li class='nav-item'><a class='nav-link' href='/sidebar/treatmentsession/{{session('patient_id')}}'>
            <div class="sidebar-icon">
                <span class="flaticon-spa nav-icon"></span>Treatment Session
            </div>
        </a>
    </li>

    <li class='nav-item'><a class='nav-link' href='/sidebar/prescription/{{session('patient_id')}}'>
            <div class="sidebar-icon">
                <span class="flaticon-tablets nav-icon"></span>New Prescription
            </div>
        </a>
    </li>

    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('xrayimage') }}'>
            <div class="sidebar-icon">
                <span class="flaticon-x-ray nav-icon"></span>X-Ray Image
            </div>
        </a>
    </li>

    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('laboratorytest') }}'>
            <div class="sidebar-icon">
                <span class="flaticon-test-tube nav-icon"></span>Laboratory Test
            </div>
        </a>
    </li>

    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('nervoussystemtest') }}'>
            <div class="sidebar-icon">
                <span class="flaticon-brain nav-icon"></span>Nervous System Test
            </div>
        </a>
    </li>
@endif

