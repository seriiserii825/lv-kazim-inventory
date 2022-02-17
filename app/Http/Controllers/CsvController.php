<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tipology;
use DB;

class CsvController extends Controller
{
    public function index()
    {
        $old_tipologies = DB::table('tipologia')->get()->toArray();

        foreach ($old_tipologies as $typology) {
            $data = [
                'nometipologia' => $typology->nometipologia,
                'nometipologia1' => $typology->nometipologia1,
                'nometipologia2' => $typology->nometipologia2,
                'nometipologia3' => $typology->nometipologia3,
                'nometipologia5' => $typology->nometipologia4,
            ];
            // Tipology::query()->insert($data);
        }


        // return EmployeeResource::collection(Employee::query()->orderByDesc('created_at')->get());

        return response()->json([
            'old' => $old_tipologies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
