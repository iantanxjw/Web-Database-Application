<?php
use App\Movie;
// use Illuminate\Foundation\Testing\WithoutMiddleware;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
// use Illuminate\Foundation\Testing\DatabaseTransactions;

class MovieTest extends PHPUnit_Framework_TestCase
{
    private $movie;

    public function setUp()
    {
        parent::setUp();
        $this->movie = new Movie();
    }

    public function testValidID()
    {
        // constructor test: set to unknown
        $this->assertEquals("Unknown", $this->movie->getID());

        // constructor test: set to unknown
        $this->movie = new Movie("");
        $this->assertEquals("Unknown", $this->movie->getID());

        // constructor test: set to valid id
        $this->movie = new Movie("123456");
        $this->assertEquals("123456", $this->movie->getID());
    }

    public function testValidTitle()
    {
        // constructor test: set to unknown
        $this->assertEquals("Unknown", $this->movie->getTitle());

        // constructor test: set to unknown
        $this->movie = new Movie("123456", "");
        $this->assertEquals("Unknown", $this->movie->getTitle());

        // constructor test: set to valid title
        $this->movie = new Movie("123456", "test movie");
        $this->assertEquals("test movie", $this->movie->getTitle());
    }

    public function testValidDesc()
    {
        // constructor test: set to none
        $this->assertEquals("None", $this->movie->getDescription());

        // constructor test: set to none
        $this->movie = new Movie("123456", "test movie", "");
        $this->assertEquals("None", $this->movie->getDescription());

        // constructor test: set to valid desc
        $this->movie = new Movie("123456", "test movie", "this is a test desc");
        $this->assertEquals("this is a test desc", $this->movie->getDescription());
    }

    public function testValidRelDate()
    {
        // constructor test: set to unknown
        $this->assertEquals("Unknown", $this->movie->getReleaseDate());

        // constructor test: set to unknown
        $this->movie = new Movie("123456", "test movie", "this is a test desc", "");
        $this->assertEquals("Unknown", $this->movie->getReleaseDate());

        // constructor test: set to valid rel date
        $this->movie = new Movie("123456", "test movie", "this is a test desc", "2016-04-27");
        $this->assertEquals("2016-04-27", $this->movie->getReleaseDate());

    }

    public function testValidVoteAvg()
    {
        $this->assertEquals(null, $this->movie->getVoteAvg());

        // constructor test: valid vote avg
        $this->movie = new Movie("123456", "test movie", "this is a test desc", "2016-04-27", 1.01);
        $this->assertEquals(1.01, $this->movie->getVoteAvg());

    }

    public function testValidStatus()
    {
        $this->assertEquals(null, $this->movie->getStatus());

        $this->movie = new Movie("123456", "test movie", "this is a test desc", "2016-04-27", 1.01, "now_playing");
        $this->assertEquals("now_playing", $this->movie->getStatus());
    }

    public function testValidGenre()
    {
        // constrcutor test: set to null
        $this->assertEquals(null, $this->movie->getGenre());

        // constructor test: set to null
        $this->movie = new Movie("123456", "test movie", "this is a test desc", "2016-04-27", "");
        $this->assertEquals(null, $this->movie->getGenre());

        // constructor test: set to valid genres
        $this->movie = new Movie("123456", "test movie", "this is a test desc", "2016-04-27", 1.01, "now_playing", ["action", "comedy"]);
        $this->assertEquals(["action", "comedy"], $this->movie->getGenre());

        // constructor test: set to valid genre (single)
        $this->movie = new Movie("123456", "test movie", "this is a test desc", "2016-04-27", 1.01, "now_playing", "action");
        $this->assertEquals("action", $this->movie->getGenre());
    }

    public function testValidPoster()
    {
        // constructor test: set to null
        $this->assertEquals(null, $this->movie->getPoster());

        // constructor test: set to null
        $this->movie = new Movie("123456", "test movie", "this is a test desc", "2016-04-27", ["action", "comedy"], "");
        $this->assertEquals(null, $this->movie->getPoster());

        // constructor test: set to valid poster
        $this->movie = new Movie("123456", "test movie", "this is a test desc", "2016-04-27", 1.01, "now_playing", ["action", "comedy"], "poster.png");
        $this->assertEquals("poster.png", $this->movie->getPoster());
    }

    public function testValidBackground()
    {
        // constructor test: set to null
        $this->assertEquals(null, $this->movie->getBackground());

        // constructor test: set to null
        $this->movie = new Movie("123456", "test movie", "this is a test desc", "2016-04-27", ["action", "comedy"], "poster.png", "");
        $this->assertEquals(null, $this->movie->getBackground());

        // constructor test: set to valid poster
        $this->movie = new Movie("123456", "test movie", "this is a test desc", "2016-04-27", 1.01, "now_playing", ["action", "comedy"], "poster.png", "bg.png");
        $this->assertEquals("bg.png", $this->movie->getBackground());
    }

    public function testValidVars()
    {
        // constructor test: empty object
        $movieVars = [
            "id" => "Unknown", 
            "title" => "Unknown", 
            "desc" => "None",
            "release_date" => "Unknown",
            "voteAvg" => null,
            "status" => null,
            "genre" => null,
            "poster" => null,
            "bg" => null
        ];

        $this->assertEquals($movieVars, $this->movie->getVars());
        $this->movie = new Movie(
            "1234",
            "Heat",
            "The famous scene with di nero and pacino",
            "1995",
            10,
            "now_playing",
            ["Action", "Crime"],
            "heat.png",
            "heat.jpg"
        );
        $movieVars = [
            "id" => "1234", 
            "title" => "Heat", 
            "desc" => "The famous scene with di nero and pacino",
            "release_date" => "1995",
            "voteAvg" => 10,
            "status" => "now_playing",
            "genre" => serialize(["Action", "Crime"]),
            "poster" => "heat.png",
            "bg" => "heat.jpg"
        ];

        /*$this->assertEquals($movieVars, $this->movie->getVars());*/

    }

    public function testMovieObject()
    {
        // constructor test: create a legit movie and test all vars
        // order: id, title, desc, release_date, vote average, status, genre, poster, bg
        $this->movie = new Movie("1234", "Goodfellas", "As long as I can remember I wanted to be a gangster", "1990", 10, "top_rated", ["Action", "Crime", "Mafia"], "poster.png", "bg.png");

        $this->assertEquals("1234", $this->movie->getID());
        $this->assertEquals("Goodfellas", $this->movie->getTitle());
        $this->assertEquals("As long as I can remember I wanted to be a gangster", $this->movie->getDescription());
        $this->assertEquals("1990", $this->movie->getReleaseDate());
        $this->assertEquals(10, $this->movie->getVoteAvg());
        $this->assertEquals("top_rated", $this->movie->getStatus());
        $this->assertEquals(["Action", "Crime", "Mafia"], $this->movie->getGenre());
        $this->assertEquals("poster.png", $this->movie->getPoster());
        $this->assertEquals("bg.png", $this->movie->getBackground());
    }
}