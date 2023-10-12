<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::join('shows','artists.shows_id','=','shows.id')
        ->select('artists.firstname', 'artists.middlename', 'artists.lastname', 
        'artists.nickname','artists.agentname', 'artists.agentofficelocation',
        'artists.artistshowtype', 'artists.address', 'artists.city', 
        'artists.natinality', 'artists.age', 'artists.careerage', 'artists.salary', 
        'artists.phonenumber','artists.agentphonenumber', 'artists.whatsupnumber', 
        'artists.telephonenumber', 'artists.gmail', 'artists.facebook', 'artists.instagram', 
        'artists.twitter', 'shows.date', 'shows.spouncerfirstname', 'shows.spouncerlastname',
        'shows.spouncerphone', 'shows.starttime', 'shows.endtime', 'shows.attendancenumber', 
        'shows.artistsnumber', 'shows.showtype')
        ->paginate(6);

        return response()->json($artists);
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
            'firstname' => 'required|string|max:255', 
            'middlename' => 'required|string|max:255', 
            'lastname' => 'required|string|max:255', 
            'nickname' => 'required|string|max:255', 
            'agentname' => 'required|string|max:255', 
            'agentofficelocation' => 'required|string|max:255', 
            'artistshowtype' => 'required|string|max:255', 
            'address' => 'required|string|max:255', 
            'city' => 'required|string|max:255', 
            'natinality' => 'required|string|max:255', 
            'age' => 'required|max:10', 
            'careerage' => 'required|max:10', 
            'salary'  => 'required|max:10', 
            'phonenumber' => 'required|unique:artists|string|max:255', 
            'agentphonenumber'  => 'required|unique:artists|string|max:255', 
            'whatsupnumber'  => 'required|unique:artists|string|max:255', 
            'telephonenumber'  => 'required|unique:artists|string|max:255', 
            'gmail'  => 'required|unique:artists|email|max:255', 
            'facebook'  => 'required|unique:artists|email|max:255', 
            'instagram'  => 'required|unique:artists|email|max:255', 
            'twitter'  => 'required|unique:artists|email|max:255', 
            'showdate'  => 'required'
        ]);

        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()],Response::HTTP_BAD_REQUEST);
        }


        $showdateid = Show::where('shows.date',$request->showdate) ->first()->id;

        $artist = Artist::create([
            'firstname' => $request->firstname, 
            'middlename' => $request->middlename, 
            'lastname' => $request->lastname, 
            'nickname' => $request->nickname, 
            'agentname' => $request->agentname, 
            'agentofficelocation' => $request->agentofficelocation, 
            'artistshowtype' => $request->artistshowtype, 
            'address' => $request->address, 
            'city' => $request->city, 
            'natinality' => $request->natinality, 
            'age' => $request->age, 
            'careerage' => $request->careerage, 
            'salary'  => $request->salary, 
            'phonenumber' => $request->phonenumber, 
            'agentphonenumber'  => $request->agentphonenumber, 
            'whatsupnumber'  => $request->whatsupnumber, 
            'telephonenumber'  => $request->telephonenumber, 
            'gmail'  => $request->gmail, 
            'facebook'  => $request->facebook, 
            'instagram'  => $request->instagram, 
            'twitter'  => $request->twitter, 
            'shows_id'  => $showdateid
        ]);

        return response()->json($artist);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $artist = Artist::join('shows','artists.shows_id','=','shows.id')
        ->select('artists.firstname', 'artists.middlename', 'artists.lastname', 
        'artists.nickname','artists.agentname', 'artists.agentofficelocation',
        'artists.artistshowtype', 'artists.address', 'artists.city', 
        'artists.natinality', 'artists.age', 'artists.careerage', 'artists.salary', 
        'artists.phonenumber','artists.agentphonenumber', 'artists.whatsupnumber', 
        'artists.telephonenumber', 'artists.gmail', 'artists.facebook', 'artists.instagram', 
        'artists.twitter', 'shows.date', 'shows.spouncerfirstname', 'shows.spouncerlastname',
        'shows.spouncerphone', 'shows.starttime', 'shows.endtime', 'shows.attendancenumber', 
        'shows.artistsnumber', 'shows.showtype')
        ->where('artists.id',$id)
        ->get();

        return response()->json($artist);
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
            'firstname' => 'required|string|max:255', 
            'middlename' => 'required|string|max:255', 
            'lastname' => 'required|string|max:255', 
            'nickname' => 'required|string|max:255', 
            'agentname' => 'required|string|max:255', 
            'agentofficelocation' => 'required|string|max:255', 
            'artistshowtype' => 'required|string|max:255', 
            'address' => 'required|string|max:255', 
            'city' => 'required|string|max:255', 
            'natinality' => 'required|string|max:255', 
            'age' => 'required|max:10', 
            'careerage' => 'required|max:10', 
            'salary'  => 'required|max:10', 
            'phonenumber' => 'required|unique:artists|string|max:255', 
            'agentphonenumber'  => 'required|unique:artists|string|max:255', 
            'whatsupnumber'  => 'required|unique:artists|string|max:255', 
            'telephonenumber'  => 'required|unique:artists|string|max:255', 
            'gmail'  => 'required|unique:artists|string|max:255', 
            'facebook'  => 'required|unique:artists|string|max:255', 
            'instagram'  => 'required|unique:artists|string|max:255', 
            'twitter'  => 'required|unique:artists|string|max:255', 
            'showdate'  => 'required'
        ]);

        if($validate->fails()){
            return response()->json(['errors' => $validate->errors()],Response::HTTP_BAD_REQUEST);
        }

        
        $showdateid = Show::where('shows.date',$request->showdate) ->first()->id;

        $artist = Artist::find($id);
        $artist->firstname = $request->firstname;
        $artist->middlename = $request->middlename; 
        $artist->lastname = $request->lastname; 
        $artist->nickname = $request->nickname;
        $artist->agentname = $request->agentname;
        $artist->agentofficelocation = $request->agentofficelocation; 
        $artist->artistshowtype = $request->artistshowtype;
        $artist->address = $request->address; 
        $artist->city = $request->city;
        $artist->natinality = $request->natinality; 
        $artist->age = $request->age;
        $artist->careerage = $request->careerage; 
        $artist->salary  = $request->salary;
        $artist->phonenumber = $request->phonenumber;
        $artist->agentphonenumber  = $request->agentphonenumber; 
        $artist->whatsupnumber  = $request->whatsupnumber;
        $artist->telephonenumber  = $request->telephonenumber; 
        $artist->gmail  = $request->gmail;
        $artist->facebook  = $request->facebook;
        $artist->instagram  = $request->instagram; 
        $artist->twitter  = $request->twitter;
        $artist->shows_id  = $showdateid;
        $artist->update();

        return response()->json($artist);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $artist = Artist::find($id);
        $artist->delete();
        return response('data removed');
    }
}
