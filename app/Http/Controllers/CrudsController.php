<?php

namespace App\Http\Controllers;
use App\Crud;
use Illuminate\Http\Request;

class CrudsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // if ($request->has('cari')){
        //     $data=Crud::where('first_name','LIKE','%'.$request->cari.'%')->get();
        // }else{
        //     $data = Crud::latest()->paginate(5);
        // return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 5 );
        // }

        $data = Crud::latest()->paginate(3);
        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1) * 3 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $data = Crud::where('first_name', 'like', '%'.$search.'%')->paginate(7);
        return view('index', ['data' => $data]);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'ortu_id' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'first_name'    =>  $request->first_name,
            'last_name'     =>  $request->last_name,
            'ortu_id'       =>  $request->ortu_id,
            'image'         =>  $new_name
        );

        Crud::create($form_data);

        return redirect('crud')->with('success', 'Data Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Crud::findOrFail($id);
        return view('view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Crud::findOrFail($id);
        return view('edit', compact('data'));
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

        $data = Crud::find($id);
        $data->update($request->all());
        if ($request->hasFile('image')) {
            $request->file('image')->move('images/',$request->file('image')->getClientOriginalName());
            $data->image = $request->file('image')->getClientOriginalName();
            $data->save();
        }
        return redirect('crud')->with('success', 'Data is Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Crud::findOrFail($id);
        $data->delete();
        return redirect('crud')->with('success', 'Data is successfully deleted ');
    }
}
