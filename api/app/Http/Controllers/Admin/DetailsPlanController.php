<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailsPlan;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailsPlanController extends Controller
{
    protected $respository;
    protected $plan;

    public function __construct(DetailsPlan $detailsPlan, Plan $plan)
    {
        $this->repository = $detailsPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.plans.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);
    }

    public function create($urlPlan)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.details.create', [
            'plan' => $plan
        ]);
    }

    public function store(Request $request, $urlPlan)
    {
        $plan = $this->plan->where('url', $urlPlan)->first();

        if (!$plan) {
            return redirect()->back();
        }

        // $data = $request->all();
        // $data['plan_id'] = $plan->id;
        // $this->respository->create($data);
        $plan->details()->create($request->all());

        return redirect()->route('details.plan.index', $plan->url);
    }
}
