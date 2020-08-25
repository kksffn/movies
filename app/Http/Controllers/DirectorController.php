<?php

namespace App\Http\Controllers;

use App\Director;
use App\Movie;
use Illuminate\Http\Request;

class DirectorController extends Controller {

    protected $movieModel;
    protected $directorModel;

    /**
     * DirectorController constructor
     */
    public function __construct()
    {
        $this->directorModel = new Director;
        $this->movieModel = new Movie;
    }

    /**
     * GET ALL DIRECTORS
     * @return mixed
     */
    public function index()
    {
        return $this->directorModel->getDirectors();
    }

    /**
     * GET ONE DIRECTOR
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $exists = $this->directorModel->existsDirector($id);
        if ($exists){
            list($movies, $director, $total_gross, $count) = $this->getInfoForDirector($id);
            return view( 'movies.index')
                ->with('title', $director -> name)
                ->with('movies_count', $count)
                ->with('director', $director)
                ->with('movies', $movies)
                ->with('total_gross', $total_gross);
        }else{
            return redirect('/error');
        }
    }

    /**
     * GET THE DIRECTOR BEFORE DELETING HIM/HER.
     * @param $id
     * @param $confirmation
     * @param $cannotBeDeleted
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function showWithRequirements($id, $confirmation, $cannotBeDeleted)
    {
        list($movies, $director, $total_gross, $count) = $this->getInfoForDirector($id);
        return view( 'movies.index')
            ->with('title', $director -> name)
            ->with('movies_count', $count)
            ->with('director', $director)
            ->with('movies', $movies)
            ->with('total_gross', $total_gross)
            ->with('confirmation', $confirmation)
            ->with('cannotBeDeleted', $cannotBeDeleted);
    }

    /**
     * NEW DIRECTOR FORM
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('directors.create');
    }

    /**
     * Edit director form
     * @param  $id
     * @return $this
     */
    public function edit( $id )
    {
        $director = $this->directorModel->getDirector( $id );

        return view('directors.edit')
            ->with('director', $director);
    }
    /**
     * Redirect to director page on select
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function choose(Request $request)
    {
        $id = $request->input('director_id');
        return redirect("director/$id");
    }

    /**
     * STORE NEW DIRECTOR IN DB
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $id = $this->directorModel->createDirector(
            $request->all()
        );
        $message = 'Director created!';
        $message = urlencode($message);
        return redirect("director/$id?message=$message");
    }

    /**
     * UPDATE director
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function update(Request $request)
    {
        $id = $request->segment(2);
        $data = $request->except('_method');

        $this->directorModel->updateDirector($id, $data);
        $message = 'Director updated!';
        $message = urlencode($message);
        return redirect("director/$id?message=$message");
    }

    /**
     * Before deleting the director you have to confirm it. Director has to have no movies in DB.
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|\Laravel\Lumen\Application|\Laravel\Lumen\Http\Redirector
     */
    public function confirmDelete($id )
    {
        $existsDirector = $this->directorModel->existsDirector($id);
        $directorHasMovies = $this->directorModel->directorHasMovies($id);
        if (!$existsDirector){
            return redirect('/error');
        }elseif($directorHasMovies) {
            return $this->showWithRequirements($id, 'do not show','You can´t delete director who has movies in DB!');
        }else{
            return $this->showWithRequirements($id, 'required', 'do not show');
        }
    }

    /**
     * DELETE DIRECTOR FROM DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function delete($id )
    {
        $this->directorModel->deleteDirector($id);
        $message = 'Director deleted!';
        $message = urlencode($message);
        return redirect("?message=$message");
    }

    /**
     * GET INFO FOR DIRECTOR FROM DB - MOVIES, TOTAL_GROSS, COUNT
     * @param $id
     * @return array
     */
    public function getInfoForDirector($id): array
    {
        $movies = $this->movieModel->getMoviesByDirector($id);
        $director = $this->directorModel->getDirector($id);
        $total_gross = $this->movieModel->getTotalGrossForDirector($id);
        $count = $this->movieModel->countMoviesByDirector($id);
        return array($movies, $director, $total_gross, $count);
    }
}
