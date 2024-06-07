<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        return view('contacts.index', [
            'contacts' => $request->user()->contacts()->get(),
       ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('contacts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:50',
            'last_name' => 'nullable|regex:/^[\pL\s]+$/u|max:50',
            'phone' => 'required|digits:9',
            'email' => 'nullable|email:strict',
            'edad' => 'nullable|integer|min:0|max:100',
            'sexo' => 'nullable|string|max:10',
            'apodo' => 'nullable|string|max:100',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $validated = array_map('trim', $validated);
        $validated = array_map('strip_tags', $validated);
        
        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();
            $request->imagen->move(public_path('images'), $imageName);
            $validated['imagen'] = 'images/'.$imageName;
        }

        $request->user()->contacts()->create($validated);

        return redirect()->route('contacts.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact): View
    {
        return view('contacts.edit', [
            'contact' =>$contact,
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact $contact): RedirectResponse
    {
        $validated = $request->validate([
            'first_name' => 'required|regex:/^[\pL\s]+$/u|max:30',
            'last_name' => 'nullable|regex:/^[\pL\s]+$/u|max:30',
            'phone' => 'required|digits:9',
            'email' => 'nullable|email:strict',
            'edad' => 'nullable|integer|min:0|max:100',
            'sexo' => 'nullable|string|max:10', 
            'apodo' => 'nullable|string|max:100',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $validated = array_map('trim', $validated);
        $validated = array_map('strip_tags', $validated);

        if ($request->hasFile('imagen')) {
            $imageName = time().'.'.$request->imagen->extension();  
            $request->imagen->move(public_path('images'), $imageName);
            $validated['imagen'] = 'images/'.$imageName;
        }

        $contact->update($validated);

        return redirect(route('contacts.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        return redirect(route('contacts.index'));

    }
}
