<?php

namespace App\Http\Controllers;

use App\PhoneBook;
use Illuminate\Http\Request;



class PhoneBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $rows = PhoneBook::orderBy('id', 'ASC'); 
      // dd($rows);

       return view('index', compact('rows'));
    }


    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $data = PhoneBook::where('name', 'like', '%' . $query . '%')
                    ->orWhere('phone', 'like', '%' . $query . '%')
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else {
                $data = PhoneBook::orderBy('id', 'desc')->get();
            }
            $total_row = $data->count();
            if ($total_row > 0) {
                foreach ($data as $row) {
                    $output .= '
                            
                                <tr>
                                    
                                        <td>'.$row->name.'</td>
                                        <td>'.$row->phone. '</td>
                                        <td><a href="/' . $row->id . '" class="btn btn-outline-success" target="_blank" >Show Details</a></td>
                                    
                                </tr>
                            
                        ';
                }
            } else {
                $output = '
                        <tr>
                            <td align="center" colspan="5">Hiçbir Veri Bulunamadı.</td>
                        </tr>
                        ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rows = PhoneBook::orderBy('id', 'ASC')->get();

        return view('create', compact('rows'));
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

            'name' => 'required',

            'phone' => 'required',

        ]);

  

        PhoneBook::create($request->all());

   

        return redirect()->route('phonebook.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rows = PhoneBook::find($id);

        return view('show', compact('rows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rows = PhoneBook::find($id);

        return view('edit', compact('rows'));
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
        $request->validate([

            'name' => 'required',

            'phone' => 'required',

        ]);

  

        PhoneBook::find($id)->update($request->all());

  

        return redirect()->route('phonebook.show',$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rows = PhoneBook::find($id);

        $rows->delete();

  

        return redirect()->route('phonebook.index');

    }
}
