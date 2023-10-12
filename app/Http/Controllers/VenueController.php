<?php

namespace App\Http\Controllers;

use App\Models\Show;
use App\Models\Venue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $venues = Venue::join('shows','venues.shows_id','=','shows.id')
        ->select('venues.city', 'venues.square', 'venues.street', 'venues.name', 
        'venues.locationingoogleearth', 'venues.capacity', 'venues.salaryperday', 
        'venues.locationmanagerfirstname', 'venues.locationmanagermiddlename', 
        'venues.locationmanagerlastname', 'venues.locationinmanagerphone', 
        'venues.locationinmanagertelephone', 'venues.locationintelephone',
        'shows.date', 'shows.spouncerfirstname', 'shows.spouncerlastname', 
        'shows.spouncerphone', 'shows.spouncerofficephone', 
        'shows.starttime', 'shows.endtime', 'shows.attendancenumber', 'shows.fees', 
        'shows.artistsnumber', 'shows.showtype')
        ->paginate(6);
        return response()->json($venues);
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
            'city' => 'required|string|max:255', 
            'square' => 'required|string|max:255', 
            'street' => 'required|string|max:255', 
            'name' => 'required|string|max:255', 
            'locationingoogleearth' => 'required|string|max:255', 
            'capacity'  => 'required', 
            'salaryperday' => 'required', 
            'locationmanagerfirstname' => 'required|string|max:255', 
            'locationmanagermiddlename'  => 'required|string|max:255', 
            'locationmanagerlastname' => 'required|string|max:255', 
            'locationinmanagerphone' => 'required|string|max:255', 
            'locationinmanagertelephone' => 'required|string|max:255', 
            'locationintelephone' => 'required|string|max:255',
            'showdate' => 'required'
        ]);

        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()], Response::HTTP_BAD_REQUEST);
        }

        $showdateid = Show::where('shows.date',$request->showdate) ->first()->id;

        $venue = Venue::create([
            'city' => $request->city, 
            'square' => $request->square, 
            'street' => $request->street, 
            'name' => $request->name, 
            'locationingoogleearth' => $request->locationingoogleearth, 
            'capacity'  => $request->capacity, 
            'salaryperday' => $request->salaryperday, 
            'locationmanagerfirstname' => $request->locationmanagerfirstname, 
            'locationmanagermiddlename'  => $request->locationmanagermiddlename, 
            'locationmanagerlastname' => $request->locationmanagerlastname, 
            'locationinmanagerphone' => $request->locationinmanagerphone, 
            'locationinmanagertelephone' => $request->locationinmanagertelephone, 
            'locationintelephone' => $request->locationintelephone,
            'shows_id' => $showdateid
        ]);


        return response()->json($venue);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $venue = Venue::join('shows','venues.shows_id','=','shows.id')
        ->select('venues.city', 'venues.square', 'venues.street', 'venues.name', 
        'venues.locationingoogleearth', 'venues.capacity', 'venues.salaryperday', 
        'venues.locationmanagerfirstname', 'venues.locationmanagermiddlename', 
        'venues.locationmanagerlastname', 'venues.locationinmanagerphone', 
        'venues.locationinmanagertelephone', 'venues.locationintelephone',
        'shows.date', 'shows.spouncerfirstname', 'shows.spouncerlastname', 
        'shows.spouncerphone', 'shows.spouncerofficephone', 
        'shows.starttime', 'shows.endtime', 'shows.attendancenumber', 'shows.fees', 
        'shows.artistsnumber', 'shows.showtype')
        ->where('venues.id',$id)
        ->get();

        return response()->json($venue);
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
            'city' => 'required|string|max:255', 
            'square' => 'required|string|max:255', 
            'street' => 'required|string|max:255', 
            'name' => 'required|string|max:255', 
            'locationingoogleearth' => 'required|string|max:255', 
            'capacity'  => 'required', 
            'salaryperday' => 'required', 
            'locationmanagerfirstname' => 'required|string|max:255', 
            'locationmanagermiddlename'  => 'required|string|max:255', 
            'locationmanagerlastname' => 'required|string|max:255', 
            'locationinmanagerphone' => 'required|string|max:255', 
            'locationinmanagertelephone' => 'required|string|max:255', 
            'locationintelephone' => 'required|string|max:255',
            'showdate' => 'required'
        ]);

        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()], Response::HTTP_BAD_REQUEST);
        }

        $showdateid = Show::where('shows.date',$request->showdate) ->first()->id;

        $venue = Venue::find($id);
            $venue->city = $request->city; 
            $venue->square = $request->square;
            $venue->street = $request->street; 
            $venue->name = $request->name;
            $venue->locationingoogleearth = $request->locationingoogleearth;
            $venue->capacity  = $request->capacity;
            $venue->salaryperday = $request->salaryperday; 
            $venue->locationmanagerfirstname = $request->locationmanagerfirstname; 
            $venue->locationmanagermiddlename  = $request->locationmanagermiddlename; 
            $venue->locationmanagerlastname = $request->locationmanagerlastname;
            $venue->locationinmanagerphone = $request->locationinmanagerphone;
            $venue->locationinmanagertelephone = $request->locationinmanagertelephone; 
            $venue->locationintelephone = $request->locationintelephone;
            $venue->shows_id = $showdateid;

            $venue->update();


        return response()->json($venue);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $venue = Venue::find($id);
        $venue->delete();
        return response()->json('data removed');
    }
}
