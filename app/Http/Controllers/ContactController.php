<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contacts.index', ['contacts' => Contact::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|digits_between:10,15',
            'email' => 'required|email',
            'age' => 'required|integer|min:1|max:130',
        ]);
        // se crea el contacto con los datos validados y se retorna un mensaje de que se creo el contacto
        // esto se hace para que no se pueda inyectar codigo en la base de datos asi que es seguro!
        Contact::create($data);

        return redirect()->route('home')->with('message', 'Contact created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        // se retorna la vista de edicion de contacto con el contacto que se quiere editar
        // se pasa el contacto como parametro para que se pueda mostrar en la vista
        return view('contacts.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    //injeccion de dependencias es cuando se pasa un objeto como parametro a un metodo
    // en este caso se esta pasando un objeto de tipo Contact
    public function update(Request $request, Contact $contact)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|digits_between:10,15',
            'email' => 'required|email',
            'age' => 'required|integer|min:1|max:130',
        ]);
        // como ya nos pasan el contacto con la inyeccion de dependencias podemos hacer update directamente
        // con los datos validados
        $contact->update($data);

        return redirect()->route('home')->with('message', 'Contact updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('home');
    }
}
