<?php

namespace App;

class Director {

    /**
     * Get all directors
     *
     * @return mixed
     */
    public function getDirectors()
    {
        return app('db')->select("

			SELECT *, first_name || ' ' || last_name AS name
			FROM directors

		");
    }

    /**
     * Get director by $id
     *
     * @param $id
     * @return mixed
     */
    public function getDirector( $id )
    {
        return app('db')->selectOne("

			SELECT *, first_name || ' ' || last_name AS name
			FROM directors
			WHERE id = ?

		", [ $id ]);
    }

    /**
     * CREATE NEW DIRECTOR
     * @param $data
     * @return integer last inserted row id
     */
    public function createDirector($data )
    {
        app('db')->insert("

			INSERT INTO directors
				(first_name, last_name, country, birthdate)
		   	VALUES
		   		(:first_name, :last_name, :country, :birthdate)

		", [
            'first_name' => $data[ 'first_name' ],
            'last_name'  => $data[ 'last_name' ],
            'country'    => $data[ 'country' ],
            'birthdate'  => $data[ 'birthdate' ],
        ]);

        return app('db')->getPdo()->lastInsertId();
    }

    /**
     * Update director
     *
     * @param  $id
     * @param  $data
     *
     * @return int last inserted row id
     */
    public function updateDirector( $id, $data )
    {
        return app('db')->update("

			UPDATE directors SET
				first_name = :first_name,
				last_name  = :last_name,
				country    = :country,
				birthdate  = :birthdate
			WHERE id = :id

		", [
            'id' => $id,
            'first_name' => $data[ 'first_name' ],
            'last_name'  => $data[ 'last_name' ],
            'country'    => $data[ 'country' ],
            'birthdate'  => $data[ 'birthdate' ],
        ]);
    }

    /**
     * Find out whether the director has some movies
     * @param $id
     * @return mixed
     */
    public function directorHasMovies($id )
    {
        $exists = app('db')->selectOne("
            SELECT EXISTS (SELECT id FROM movies WHERE director_id=?) AS ex
        ", [$id]);
        return $exists->ex;
    }

    /**
     * Delete director from DB
     * @param $id
     * @return mixed
     */
    public function deleteDirector($id)
    {
        return app('db')->delete("
                DELETE FROM directors
                WHERE id = ?
            ", [$id]);
    }

    /**
     * Find out whether a director with the id exists
     * @param $id
     * @return mixed
     */
    public function existsDirector($id)
    {
        $exists = app('db')->selectOne("
            SELECT EXISTS (SELECT * FROM directors WHERE id=?) AS ex"
                , [$id]);
        return $exists->ex;
    }
}
