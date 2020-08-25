<?php

namespace App\Http\Controllers;
use App\Movie;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    protected $movieModel;

    /**
     * MovieController constructor.
     */
    public function __construct()
    {
        $this -> movieModel = new Movie;
    }
    /**
     * GET ALL MOVIES
     * @return MovieController|\Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function index()
    {
        $movies = $this -> movieModel -> getMovies();
        $count = $this->movieModel-> getMoviesCount();
        $total_gross = $this -> movieModel -> getTotalGross();

        return view( 'movies.index')
            ->with('movies_count', $count)
            ->with('movies', $movies)
            ->with('total_gross', $total_gross);
    }
    /**
     * GET ONE MOVIE
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $exists = $this->movieModel->existsMovie($id);
        if ($exists){
            $movie =  $this -> movieModel -> getMovie($id);
            return view('movies.show')
                ->with('title', 'Movies')
                ->with('movie', $movie);
        }else{
            return redirect("/error");
        }
    }
    /**
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function create()
    {
        return view('movies.create');
    }
    /**
     * @param $id
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function edit($id )
    {
        $movie = $this->movieModel->getMovie($id);

        return view('movies.edit')
            ->with('movie', $movie);
    }
    /**
     * SAVE MOVIE TO DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function store(Request $request)
    {
        $id = $this->movieModel->createMovie(
            $request->all()
        );
        $message = 'Movie created!';
        $message = urlencode($message);
        return redirect("movie/$id?message=$message");
    }
    /**
     * UPDATE MOVIE
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function update(Request $request)
    {
        $id = $request->segment(2); //v druhém segmentu je id filmu
        $data = $request -> except('_method');

        $this->movieModel->updateMovie($id, $data);

        $message = 'Movie updated!';
        $message = urlencode($message);
        return redirect("movie/$id?message=$message");
    }

    /**
     * Before deleting the movie you have to confirm it.
     * @param $id
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function confirmDelete($id )
    {
        $movie =  $this -> movieModel -> getMovie($id);
        return view('movies.show')
            ->with('title', 'Delete Movie')
            ->with('movie', $movie)
            ->with('confirmation', 'required');
    }

    /**
     * DELETE MOVIE FROM DB
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function delete( $id )
    {
        $this->movieModel->deleteMovie($id);
        $message = 'Movie deleted!';
        $message = urlencode($message);
        return redirect("?message=$message");
    }

    /**
     * Prepare url for search to searchString and to make pagination working
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function prepareSearch(Request $request)
    {
        $searchString = urlencode($request['search']);
        return redirect("search/search?search=$searchString&countAppearance=1");
    }
    /**
     * "fulltext" search
     * @param Request $request
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function search()
    {
        $searchString = (app('request')->get('search'));
        try {
            $movies =  $this->movieModel->search($searchString);
            $count = $this->movieModel->countMoviesInSearch($searchString);
            $totalGross = $this->movieModel->getTotalGrossForSearch($searchString);
            $searchMessage = ($count==0 ? 'Nothing found!' : $count. ($count == 1 ? ' movie found!' : ' movies found!'));

            return  view( 'movies.index')
                ->with('movies_count', $count)
                ->with('movies', $movies)
                ->with('total_gross', $totalGross)
                ->with('searchMessage', $searchMessage);
        }catch (QueryException $e){
            $movies = $this -> movieModel -> getMovies();
            $count = $this->movieModel-> getMoviesCount();
            $total_gross = $this -> movieModel -> getTotalGross();

            return view( 'movies.index')
                ->with('movies_count', $count)
                ->with('movies', $movies)
                ->with('total_gross', $total_gross)
                ->with('searchQueryException', 'Do not search for this anymore; heart attack danger!');
        }
    }
}
