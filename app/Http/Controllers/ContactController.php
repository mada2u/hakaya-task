<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Events\ContactCreated;
use App\Helpers\RESTApi;
use App\Http\Resources\ContactResource;
use App\ServiceArea;
use Grimzy\LaravelMysqlSpatial\Types\Point;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    use RESTApi;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::latest()->paginate(5);
        // TODO: add links and meta to response object, i've already solved this issue in many projects but i've not time to implement it here :) 
        return $this->sendJson(ContactResource::collection($contacts));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|min:12|max:18',
            'comments' => 'string',
            'lat' => 'required|between:-85.0000000,85.9999999',
            'lng' => 'required|between:-180.0000000,180.9999999',
            'area_id' => 'required|integer'
        ]);

        $location = new Point($request->get('lat'),$request->get('lng'));
        $area = ServiceArea::inArea($location)->find($request->get('area_id'));
        
        $contact = new Contact;
        $contact->name = $request->get('name');
        $contact->email = $request->get('email');
        $contact->phone = $request->get('phone');
        $contact->comments = $request->get('comments');
        $contact->location = $location;
        
        if($area){
            $contact->in_area = 1;
        }
        $contact->save();

        event(new ContactCreated($contact));
        return $this->sendJson(new ContactResource($contact));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        if(!$contact){
            // TODO: handle api error by throwing exception
            return $this->sendError([
                'name' => 'ContactNotFound',
                'message' => 'Contact not found'
            ]);
        }
        return $this->sendJson(new ContactResource($contact));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
