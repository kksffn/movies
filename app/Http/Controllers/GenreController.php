<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use Illuminate\Http\Request;

class GenreController extends Controller {

    protected $movieModel;
    protected $genreModel;

    /**
     * genreController constructor
     */
    public function __construct()
    {
        $this->genreModel = new Genre;
        $this->movieModel = new Movie;
    }

    /**
     * GET MOVIES BY GENRE
     * @param $name
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function show($name)
    {
        $existsGenre = $this->genreModel->existsGenre($name);
        if (!$existsGenre){
            return redirect('/error');
        }else{
            list($movies, $total_gross, $count, $genre) = $this->getInfoForGenre($name);

            return view( 'movies.index')
                ->with('title', $name)
                ->with('movies_count', $count)
                ->with('movies', $movies)
                ->with('total_gross', $total_gross)
                ->with('genre',$genre);
        }
    }

    /**
     * Redirect to genre page on select
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function choose(Request $request)
    {
        $name = $request->input('genre_name');
        return redirect("genre/$name");
    }

    /**
     * NEW GENRE FORM
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function create()
    {
        return view('genres.create')
            ->with('placeholder', 'Type new genre name here:');
    }

    /**
     * STORE NEW GENRE IN DB IF IT DOESN'T EXIST
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|\Laravel\Lumen\Application|\Laravel\Lumen\Http\Redirector
     */
    public function store(Request $request)
    {
        $name =$request->all()['genre'];
        $name = trim($name);
        $exists = $this->genreModel->existsGenre($name);
        if ($exists) {
            $cannotCreateGenre = 'Genre '.$name.' already exists!';
            return view('genres.create')
                ->with('cannotCreateGenre', $cannotCreateGenre);
        }else{
            $this->genreModel->createGenre($name);
            $message = 'Genre created!';
            $message = urlencode($message);
            return redirect("genre/$name?message=$message");
        }

    }

    /**
     * EDIT GENRE NAME
     * @param $name
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function edit($name)
    {
        $genre = $this->genreModel->getGenreByName( $name );
        return view('genres.edit')
            ->with('genre', $genre);
    }

    /**
     * UPDATE GENRE NAME IF THE NAME DOESN'T EXIST
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function update(Request $request)
    {
        $name = $request->segment(2);
        $data = $request->except('_method');
        $id = $this->genreModel->getGenreId($name) -> id;
        $exists = $this->genreModel->existsGenre($data[ 'name' ]);
        if ($exists) {
            $cannotCreateGenre = 'Genre '.$data[ 'name' ].' already exists!';
            $genre = $this->genreModel->getGenreByName( $name );
            return view('genres.edit')
                ->with('genre', $genre)
                ->with('cannotCreateGenre', $cannotCreateGenre);
        }else {
            $this->genreModel->updateGenre($id, $data);

            $name = $this->genreModel->getGenreById($id)->name;

            $message = 'Genre name changed!';
            $message = urlencode($message);
            return redirect("genre/$name?message=$message");
        }
    }

    /**
     * Before deleting the genre you have to confirm it.
     * @param $name
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View|\Laravel\Lumen\Application|\Laravel\Lumen\Http\Redirector
     */
    public function confirmDelete($name )
    {
        $existsGenre = $this->genreModel->existsGenre($name);
        if (!$existsGenre){
            return redirect('/error');
        }else  {
            list($movies, $total_gross, $count, $genre) = $this->getInfoForGenre($name);
            return view( 'movies.index')
                ->with('title', $name)
                ->with('movies_count', $count)
                ->with('movies', $movies)
                ->with('total_gross', $total_gross)
                ->with('genre',$genre)
                ->with('confirmation', 'required');
        }
    }

    /**
     * DELETE GENRE FROM DB
     * @param $name
     * @return \Illuminate\Http\RedirectResponse|\Laravel\Lumen\Http\Redirector
     */
    public function delete($name )
    {
        $this->genreModel->deleteGenre($name);
        $message = 'Genre deleted!';
        $message = urlencode($message);
        return redirect("?message=$message");
    }

    /**
     * GET INFO FOR GENRE - MOVIES, TOTAL_GROSS, COUNT
     * @param $name
     * @return array
     */
    public function getInfoForGenre($name): array
    {
        $movies = $this->movieModel->getMoviesByGenre($name);
        $total_gross = $this->movieModel->getTotalGrossForGenre($name);
        $count = $this->movieModel->countMoviesForGenre($name);
        $genre = $this->genreModel->getGenreByName($name);
        return array($movies, $total_gross, $count, $genre);
    }
}
