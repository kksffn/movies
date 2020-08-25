<?php

namespace app;

    class Movie {

        /**
         * Get all movies
         * @return mixed
         */
        public function getMovies()
        {
            $orderby = $this->getOrderByFromUrl();
            $sql = "
                SELECT
                    d.first_name || ' ' || d.last_name AS director,
                    m.id, director_id, m.title, m.year, m.gross, GROUP_CONCAT(g.name, ',') AS genre
                FROM movies m
                LEFT JOIN directors d ON m.director_id = d.id
                LEFT JOIN movie_genre AS mg ON(m.id = mg.movie_id)
                LEFT JOIN genres AS g ON(mg.genre_id = g.id)
                GROUP BY m.id
                ORDER BY $orderby
            ";
        //PAGINATION
        $sql = $this->pagination($sql);

        return app('db')->select($sql);
    }

        /**
         * Get all movies by director
         * @param $id
         * @return mixed
         */
        public function getMoviesByDirector($id )
        {
            $orderby = $this->getOrderByFromUrl();
            $sql = "
                SELECT
                    d.first_name || ' ' || d.last_name AS director,
                    m.id, m.director_id, m.title, m.year, m.gross, GROUP_CONCAT(g.name,',') AS genre
                FROM
                     movies m
                LEFT JOIN
                     directors d ON m.director_id = d.id

                LEFT JOIN movie_genre AS mg ON(m.id = mg.movie_id)
                LEFT JOIN genres AS g ON(mg.genre_id = g.id)

                WHERE
                     director_id = ?
                GROUP BY m.id
                ORDER BY $orderby
            ";
            $sql = $this->pagination($sql);
            return app('db')->select($sql, [ $id ]);
        }

        /**
         * Get movies by genre $name
         * @param $name
         * @return mixed
         */
        public function getMoviesByGenre($name )
        {
            $orderby = $this->getOrderByFromUrl();
            $sql ="
                SELECT
                    d.first_name || ' ' || d.last_name AS director,
                    m.id, m.director_id, m.title, m.year, m.gross, GROUP_CONCAT(g.name,',') AS genre
                FROM
                     movies m
                LEFT JOIN
                     directors d ON m.director_id = d.id

                LEFT JOIN movie_genre AS mg ON(m.id = mg.movie_id)
                LEFT JOIN genres AS g ON(mg.genre_id = g.id)

                WHERE
                     m.id IN    /* Nejdříve vybereme jen id filmů s daným žánrem a ty vypíšeme */
                        (SELECT
                            m.id
                        FROM
                            movies m
                        LEFT JOIN movie_genre AS mg ON(m.id = mg.movie_id)
                        LEFT JOIN genres AS g ON(mg.genre_id = g.id)
                        WHERE
                            g.name = ?)
                GROUP BY m.id
                ORDER BY $orderby
            ";
            $sql = $this->pagination($sql);
            return app('db')->select($sql, [ $name ]);
        }

        /**
         * Get movie info by movie id.
         * @param $id
         * @return mixed
         */
        public function getMovie($id)
        {
            return app('db')->selectOne("
                SELECT m.*, d.first_name || ' ' || d.last_name AS director, GROUP_CONCAT(g.name,',') AS genre
                FROM movies m
                LEFT JOIN directors d ON m.director_id = d.id

                        LEFT JOIN movie_genre AS mg ON(m.id = mg.movie_id)
                        LEFT JOIN genres AS g ON(mg.genre_id = g.id)

                WHERE m.id = ?
                ", [$id]);
        }

        /**
         * Create new movie
         * @param $data
         * @return mixed
         */
        public function createMovie($data )
        {
            app('db')->insert("

                INSERT INTO movies
                    (director_id, title, year, gross, summary)
                VALUES
                    (:did, :title, :year, :gross, :summary)

            ", [
                'did' => $data[ 'director_id' ],
                'title'  => $data[ 'title' ],
                'year'    => (int) $data[ 'year' ],
                'gross'  => (int) $data[ 'gross' ],
               // 'genre'  => $data[ 'genre' ],
                'summary'  => $data[ 'summary' ],
            ]);
            $id = app('db')->getPdo()->lastInsertId();
            $this->updateGenresForMovie($data, $id);
            return $id;
        }

        /**
         * GET NUMBER OF MOVIES IN DB
         * @return mixed
         */
        public function getMoviesCount()
        {
            $select = app('db') -> selectOne("
                SELECT COUNT(1) AS count
                FROM movies
            ");
                return $select -> count;
        }
        /**
         * UPDATE MOVIE
         * @param $id
         * @param $data
         * @return mixed
         */
        public function updateMovie($id, $data)
        {
             app('db')->update("

                UPDATE movies SET
                    director_id = :did,
                    title = :title,
                    year = :year,
                    gross = :gross,
                    summary = :summary
                WHERE id = :id

            ", [
                'id' => $id,
                'did' => $data[ 'director_id' ],
                'title'  => $data[ 'title' ],
                'year'    => (int) $data[ 'year' ],
                'gross'  => (int) $data[ 'gross' ],
               // 'genre'  => $data[ 'genre' ],
                'summary'  => $data[ 'summary' ],
            ]);

            app('db')->delete("
                DELETE FROM movie_genre
                WHERE movie_id = ?
            ", [ $id ]);

            $this->updateGenresForMovie($data, $id);
            return $id;
        }

        /**
         * Update movie_genre after creating or updating a movie
         * @param $data
         * @param $id
         */
        public function updateGenresForMovie($data, $id): void
        {
            $genres = app('db')->select("
                SELECT *
                FROM genres
                ");

            foreach ($genres as $genre) {
                foreach ($data as $key => $value) {
                    if ($genre->name == $key) {

                        app('db')->insert("
                            INSERT INTO movie_genre
                                (movie_id, genre_id)
                            VALUES
                                (:id, :value)
                        ", ['id' => $id,
                            'value' => $value,]);
                    }
                }
            }
        }
        /**
         * Delete movie from DB
         * @param $id
         * @return mixed
         */
        public function deleteMovie($id)
        {
            return app('db')->delete("
                DELETE FROM movies
                WHERE id = ?
            ", [$id]);
        }

        /**
         * Get total gross for all movies
         * @return mixed
         */
        public function getTotalGross()
        {
            $select = app('db')->selectONE("
                SELECT SUM(gross) AS total_gross
                FROM movies
            ");
            return $select -> total_gross;
        }

        /**
         * Get total gross for director's movies
         * @param $id
         * @return mixed
         */
        public function getTotalGrossForDirector($id)
        {
            $select = app('db')->selectONE("
                SELECT SUM(gross) AS total_gross
                FROM movies
                WHERE director_id = ?
            ", [ $id ]);
            return $select -> total_gross;
        }

        /**
         * Get total gross for all movies of one genre
         * @param $name
         * @return mixed
         */
        public function getTotalGrossForGenre($name)
        {
            $select = app('db')->selectONE("
                SELECT
                    SUM(gross) AS total_gross
                FROM
                    movies m
                LEFT JOIN movie_genre AS mg ON(m.id = mg.movie_id)
                LEFT JOIN genres AS g ON(mg.genre_id = g.id)
                WHERE
                    g.name = ?
            ", [ $name ]);
            return $select -> total_gross;
        }

        /**
         * Limits the number of listed films on page.
         * @param string $sql
         * @return string
         */
        public function pagination(string $sql): string
        {
            $limit = 5;     //Toto by mohlo/mělo být v konfiguračním souboru.
            $page = app('request')->get('page') ?: 1;
            $offset = ($page - 1) * $limit;

            $sql .= "
            LIMIT $limit OFFSET $offset
        ";
            return $sql;
        }

        /**
         * Get number of director's movies
         * @param $id
         * @return mixed
         */
        public function countMoviesByDirector($id)
        {
            $select = app('db') -> selectOne("
                SELECT COUNT(1) AS count
                FROM movies
                WHERE director_id = ?
            ", [ $id ]);
            return $select -> count;
        }

        /**
         * Get number of movies of one genre
         * @param $name
         * @return mixed
         */
        public function countMoviesForGenre($name)
        {
            $select = app('db') -> selectOne("
                SELECT COUNT(1) AS count
                FROM movies m
                LEFT JOIN movie_genre AS mg ON(m.id = mg.movie_id)
                LEFT JOIN genres AS g ON(mg.genre_id = g.id)
                WHERE
                    g.name = ?
            ", [ $name ]);
            return $select -> count;
        }

        /**
         * Fulltext search in DB
         * @param $searchString
         * @return mixed
         */
        public function search($searchString)
        {
            $orderby = $this->getOrderByFromUrl();
            $select ="
                SELECT d.first_name || ' ' || d.last_name AS director,
                       m.id, m.director_id, m.title, m.year, m.gross, GROUP_CONCAT(g.name, ',') AS genre

                FROM movies m
                LEFT JOIN directors d ON m.director_id = d.id
                LEFT JOIN movie_genre AS mg ON(m.id = mg.movie_id)
                LEFT JOIN genres AS g ON(mg.genre_id = g.id)

                WHERE m.id IN(
                    SELECT movie_id FROM movies_index
                    WHERE  movies_index.title MATCH (:data)
                    OR movies_index.summary MATCH (:data))
                GROUP BY m.id
                ORDER BY $orderby
            ";
            $select = $this->pagination($select);
            $select = app('db')->select($select,['data' => $searchString ]);

            return $select;
        }

        /**
         * Count searched movies
         * @param $data
         * @return mixed
         */
        public function countMoviesInSearch($data)
        {
            $select ="
                SELECT COUNT(1) AS count
                FROM movies_index
                WHERE  movies_index.title MATCH (:data)
                    OR movies_index.summary MATCH (:data)
            ";
            $select = app('db')->selectOne($select,[
                'data' => $data ]);

            return $select->count;
        }
        /**
         * Finds out whether the movie with id exists
         * @param $id
         * @return mixed
         */
        public function existsMovie($id)
        {
            $exists = app('db')->selectOne("
                SELECT EXISTS (SELECT * FROM movies WHERE id=?) AS ex"
                , [$id]);
            return $exists->ex;
        }

        /**
         * Count total gross for searched movies
         * @param $searchString
         * @return mixed
         */
        public function getTotalGrossForSearch($searchString)
        {
            $select ="
                SELECT SUM(gross) AS total
                FROM movies m
                WHERE m.id IN(
                    SELECT movie_id FROM movies_index
                    WHERE  movies_index.title MATCH (:data)
                    OR movies_index.summary MATCH (:data))
            ";
            $select = app('db')->selectOne($select,[
                'data' => $searchString ]);

            return $select->total;
        }

        /**
         * Finds in url whether the visitor wants to order the select and prepares the query
         * @return mixed|object|string
         */
        public function getOrderByFromUrl() :string
        {
            if (app('request')->get('orderby')) {
                if (app('request')->get('orderby')=='title' OR
                    app('request')->get('orderby')=='director' OR
                    app('request')->get('orderby')=='year' OR
                    app('request')->get('orderby')=='gross' OR
                    app('request')->get('orderby')=='genre'){   //Ochrana před SQL injection!
                        $orderby = app('request')->get('orderby');
                }else {
                    $orderby = 'm.id';
                }
            } else {
                $orderby = 'm.id';
            }
            if ($orderby == 'director') {
                $orderby = 'd.last_name';
            }

            if (app('request')->get('order')) {
                if (app('request')->get('order') == 'asc' OR app('request')->get('order') == 'desc') {
                    $order = " ".app('request')->get('order');
                    $orderby .= $order;
                }
            }
            return $orderby;
        }


    }
