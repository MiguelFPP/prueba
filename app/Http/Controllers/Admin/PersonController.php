<?php

namespace App\Http\Controllers\Admin;

use App\Events\NewUserEvent;
use App\Http\Controllers\Controller;
use App\Mail\SendAdminMailable;
use App\Mail\SendMailable;
use App\Models\Category;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = Person::all();
        return view('admin.persons.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countriesApi = Http::get('https://api.first.org/data/v1/countries?region=South%20America');
        $countries = $countriesApi['data'];
        $categories = Category::all();
        /* return $countries; */
        return view('admin.persons.create', compact('countries', 'categories'));
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
            'identification' => 'required | unique:people',
            'name' => 'required | string | max:100',
            'surname' => 'required | string | max:100',
            'country' => 'required',
            'email' => 'required | email | max:150 | unique:people',
            'addres' => 'max:180',
            'phone' => 'numeric|between:999999999,99999999999'
        ]);
        $person = Person::create($request->all());

        /* $correo = new SendMailable($request->all());
        Mail::to($request->input('email'))->send($correo); */



        $correoAdmin = new SendAdminMailable();
        Mail::to('miguelferneyp@gmail.com')->send($correoAdmin);
        event(new NewUserEvent($person));

        return redirect()->route('admin.persons.edit', compact('person'))->with('info', 'El usuario se agrego con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Person $person)
    {
        $countriesApi = Http::get('https://api.first.org/data/v1/countries?region=South%20America');
        $countries = $countriesApi['data'];
        $categories = Category::all();
        return view('admin.persons.edit', compact('person', 'categories', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Person $person)
    {
        $request->validate([
            'identification' => "required | unique:people,identification,$person->id",
            'name' => 'required | string | max:100',
            'surname' => 'required | string | max:100',
            'country' => 'required',
            'email' => "required | email | max:150 | unique:people,email,$person->id",
            'addres' => 'max:180',
            'phone' => 'numeric|between:999999999,99999999999'
        ]);

        $person->update($request->all());

        return redirect()->route('admin.persons.edit', $person)->with('info', 'Usuario Actualizado con exito!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('admin.persons.index')->with('info', 'El usuario se elimino con exito!');
    }
}
