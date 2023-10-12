<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shows = Show::paginate(6);

        return response()->json($shows);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'date' => 'required', 
            'spouncerfirstname' => 'required|string|max:255', 
            'spouncermiddlename' => 'required|string|max:255', 
            'spouncerlastname' => 'required|string|max:255', 
            'spouncerphone' => 'required|string|max:255', 
            'spouncerofficephone' => 'required|string|max:255', 
            'spouncergmail' => 'required|email|max:255', 
            'starttime' => 'required', 
            'endtime'  => 'required', 
            'noramlticketsalary' => 'required', 
            'firstclassticketsalary' => 'required', 
            'attendancenumber' => 'required', 
            'fees' => 'required', 
            'artistsnumber' => 'required', 
            'showtype' => 'required|string|max:255'
        ]);

        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()], Response::HTTP_BAD_REQUEST);
        }

        $show = Show::create($request->all());
        return response()->json($show);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $show = Show::find($id);

        return response()->json($show);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = Validator::make($request->all(),[
            'date' => 'required', 
            'spouncerfirstname' => 'required|string|max:255', 
            'spouncermiddlename' => 'required|string|max:255', 
            'spouncerlastname' => 'required|string|max:255', 
            'spouncerphone' => 'required|string|max:255', 
            'spouncerofficephone' => 'required|string|max:255', 
            'spouncergmail' => 'required|email|max:255', 
            'starttime' => 'required', 
            'endtime'  => 'required', 
            'noramlticketsalary' => 'required', 
            'firstclassticketsalary' => 'required', 
            'attendancenumber' => 'required', 
            'fees' => 'required', 
            'artistsnumber' => 'required', 
            'showtype' => 'required|string|max:255'
        ]);

        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()], Response::HTTP_BAD_REQUEST);
        }

        $show = Show::find($id);

        $show->date = $request->date;
        $show->spouncerfirstname = $request->spouncerfirstname;
        $show->spouncermiddlename =  $request->spouncermiddlename;
        $show->spouncerlastname = $request->spouncerlastname;
        $show->spouncerphone = $request->spouncerphone;
        $show->spouncerofficephone =  $request->spouncerofficephone;
        $show->spouncergmail = $request->spouncergmail;
        $show->starttime = $request->starttime;
        $show->endtime = $request->endtime;
        $show->noramlticketsalary = $request->noramlticketsalary;
        $show->firstclassticketsalary = $request->firstclassticketsalary;
        $show->attendancenumber = $request->attendancenumber; 
        $show->fees = $request->fees;
        $show->artistsnumber = $request->artistsnumber; 
        $show->showtype = $request->showtype;
        
        $show->update();

        return response()->json($show);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $show = Show::find($id);
        $show->delete();
        return response()->json('data removed');
    }
}
