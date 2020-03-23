<?php  
namespace App\Http\Controllers;

use App\Models\Project;

use Illuminate\Http\Request;
use DB;

class ProjectController extends Controller
{
	public function index()
	{
		$projects = Project::select('projects.id','projects.name','projects.description',DB::raw("DATE_FORMAT(start_date,'%d %b %Y') as start_date"),DB::raw("DATE_FORMAT(end_date,'%d %b %Y') as end_date"))
		->latest()
		->get();
		
		return response()->json(['projects'=>$projects],200);
	}

	public function store(Request $request)
	{
		$projects = Project::create($request->all());

		return response()->json(['message'=>'succes','project'=>$projects],200);
	}

	public function find($id)
	{
		$project = Project::find($id);

		return response()->json(['project'=>$project],200);
	}

	public function update($id,Request $request)
	{
		$project = Project::find($id);
		$project->update($request->all());

		return response()->json(['message'=>'success'],200);
	}

	public function destroy($id)
	{		
		$project = Project::find($id);
		$project->delete();

		return response()->json(['message'=>'success'],200);
	}
}


?>