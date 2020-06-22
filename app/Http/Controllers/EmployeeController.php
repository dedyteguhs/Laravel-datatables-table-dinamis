<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Yajra\Datatables\Datatables;

use Yajra\DataTables\Html\Builder; 

class EmployeeController extends Controller
{
    protected $htmlBuilder;

    public function __construct(Builder $htmlBuilder)
	{
    	$this->htmlBuilder = $htmlBuilder;
	}

	public function getBasic(Datatables $datatables,request $request)
	{

		$columns = ['id', 'name', 'email', 'created_at', 'updated_at'];

	    if ($request->ajax()) {
	     return Datatables::of(Employee::select($columns))->make(true);
	    }

   		$html = $datatables->getHtmlBuilder()
   		                   ->columns($columns)
   		                   ->parameters([
		                        'dom' => 'Blfrtip',
		                        'select' => [
		                            'style' => 'os',
		                            'selector' => 'td:first-child',
		                        ],
		                    ]);
    	return view('datatables', compact('html'));
    	//dd("oke");
	}


    public function index()
    {
       return view('welcome');
    }

    public function show()
    {
       $data = Employee::select(['id','name','email','created_at','updated_at']);
        return Datatables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="#edit-'.$data->id.'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>';
            })

            ->make(true);
    }
}
