<?php namespace Insights\Http\Controllers;

use Insights\Http\Requests;
use Insights\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Insights\Models\MapDataRepository;

class MapController extends Controller {

    protected $map_data_repo;

    public function __construct(MapDataRepository $map_data_repo)
    {
        $this->map_data_repo = $map_data_repo;
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// here we're going to mock up some data to send them to our front end
        $data = json_decode($this->map_data_repo->all(), true);

        // this is our applications to vacancies feed
        $vacancies = $data['data'];

        // then we take the data and select a random vacancy
        shuffle($vacancies);
        $vacancy = array_shift($vacancies);

        $data = $this->map_data_repo->mock();

        return response($data)->header('Content-Type', 'application/json');

	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
