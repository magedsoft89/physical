<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Prologue\Alerts\Facades\Alert;

class SidebarController extends Controller
{
    public function redirectToProblem($id)
    {
        $patientId = session('patient_id', null);
        if ($patientId != null) {
            $patient = Patient::find($id);
            $problem = $patient->problem;
            if ($problem != null) {
                return redirect('/admin/problem/' . $problem->id . '/edit');
            }
        }
        return redirect('/admin/problem/create');
    }

    public function redirectToPhysicalTherapy($id)
    {
        $patientId = session('patient_id', null);
        if ($patientId != null) {
            $patient = Patient::find($id);
            $physicalTherapy = $patient->physicalTherapy;
            if ($physicalTherapy != null) {
                return redirect('/admin/physicaltherapy/' . $physicalTherapy->id . '/edit');
            }
        }
        return redirect('/admin/physicaltherapy/create');
    }

    public function redirectToClinicalSigns($id)
    {
        $patientId = session('patient_id', null);
        if ($patientId != null) {
            $patient = Patient::find($id);
            $visits = $patient->visits;
            if ($visits->isEmpty()) {
                Alert::add('error', 'You must create a visit first.')->flash();;
                return redirect('/admin/visit/create');
            }else{
                $lastVisit = $patient->visits()->latest()->first();
                $clinicalSigns = $lastVisit->clinicalSigns()->latest()->first();

                if( $clinicalSigns != null )
                    return redirect('/admin/clinicalsigns/'. $clinicalSigns->id . '/edit');
                else
                    return redirect('/admin/clinicalsigns/create');
            }
        }

    }

    public function redirectToPrescription($id)
    {
        $patientId = session('patient_id', null);
        if ($patientId != null) {
            $patient = Patient::find($id);
            $visits = $patient->visits;
            if ($visits->isEmpty()) {
                Alert::add('error', 'You must create a visit first.')->flash();;
                return redirect('/admin/visit/create');
            }else{
                $lastVisit = $patient->visits()->latest()->first();
                $prescription = $lastVisit->prescription()->latest()->first();

                if( $prescription != null )
                    return redirect('/admin/prescription/'. $prescription->id . '/edit');
                else
                    return redirect('/admin/prescription/create');
            }
        }

    }

    public function redirectToTreatmentSession($id)
    {
        $patientId = session('patient_id', null);
        if ($patientId != null) {
            $patient = Patient::find($id);
            $physicalTherapy = $patient->physicalTherapy;
            if ($physicalTherapy != null)
                return redirect('/admin/treatmentsession');
            else{
                Alert::add('error', 'You must create a Physical Therapy.')->flash();;
                return redirect('/admin/physicaltherapy/create');
            }
        }
    }

}
