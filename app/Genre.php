<?php

namespace app;

use Illuminate\Http\Request;

class Genre {


    /**
     * Get all genres
     * @return mixed
     */
    public function getGenres()
    {
        return app('db')->select("
            SELECT *
            FROM genres
        ");
    }

    /**
     * Get genre by its id
     * @param $id
     * @return mixed
     */
    public function getGenreById($id)
    {
        return app('db')->selectOne("
			SELECT *
			FROM genres
			WHERE id = ?
		", [ $id ]);
    }

    /**
     * Get genre by its name
     * @param $name
     * @return mixed
     */
    public function getGenreByName($name)
    {
        return app('db')->selectOne("
			SELECT *
			FROM genres
			WHERE name = ?
		", [ $name ]);
    }

    /**
     * Create new genre
     * @param $name
     * @return mixed
     */
    public function createGenre($name)
    {
        app('db')->insert("
                INSERT INTO genres
                    (name)
                VALUES
                    (?)
            ", [$name]
        );
        return app('db')->getPdo()->lastInsertId();
    }

    /**
     * Find out whether the genre exists
     * @param $name
     * @return mixed
     */
    public function existsGenre($name)
    {
         $exists = app('db')->selectOne("
            SELECT EXISTS (SELECT * FROM genres WHERE name=?) AS ex", [$name]
        );
        return $exists->ex;
    }

    /**
     * Change genre name
     * @param $id
     * @param $data
     * @return mixed
     */
    public function updateGenre($id, $data)
    {
        return app('db')->update("

			UPDATE genres SET
				name = :name
			WHERE id = :id

		", [
            'id' => $id,
            'name' => trim($data[ 'name' ]),
        ]);
    }

    /**
     * Get id for genre name
     * @param $name
     * @return mixed
     */
    public function getGenreId($name)
    {
        return app('db')->selectOne("
            SELECT id
            FROM genres
            WHERE name = ?
        ", [$name]);
    }

    /**
     * Delete genre from DB
     * @param $name
     * @return mixed
     */
    public function deleteGenre($name)
    {
        return app('db')->delete("
                DELETE FROM genres
                WHERE name = ?
            ", [$name]);
    }
}
