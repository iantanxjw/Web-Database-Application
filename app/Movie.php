<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    private $id;
    private $title;
    private $desc;
    private $rel_date;
    private $popularity;
    private $genre;
    private $poster;
    private $bg;

    public function __construct($id = null, $title = null, $desc = null, $rel_date = null, $popularity = null, $genre = null, $poster = null, $bg = null)
    {
        $this->setID($id);
        $this->setTitle($title);
        $this->setDescription($desc);
        $this->setReleaseDate($rel_date);
        $this->setPopularity($popularity);
        $this->setGenre($genre);
        $this->setPoster($poster);
        $this->setBackground($bg);
    }

    public function getID()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->desc;
    }

    public function getReleaseDate()
    {
        return $this->rel_date;
    }

    public function getPopularity()
    {
        return $this->popularity;
    }

    public function getGenre()
    {
        return $this->genre;
    }

    public function getPoster()
    {
        return $this->poster;
    }

    public function getBackground()
    {
        return $this->bg;
    }

    public function setID($id)
    {
        if (!$id || $id === "")
        {
            $this->id = "Unknown";
        }
        else
        {
            $this->id = $id;
        }
    }

    public function setTitle($title)
    {
        if (!$title || $title === "")
        {
            $this->title = "Unknown";
        }
        else
        {
            $this->title = $title;
        }
    }

    public function setDescription($desc)
    {
        if (!$desc || $desc === "")
        {
            $this->desc = "None";
        }
        else
        {
            $this->desc = $desc;
        }
    }

    public function setReleaseDate($rel_date)
    {
        if (!$rel_date || $rel_date === "")
        {
            $this->rel_date = "Unknown";
        }
        else
        {
            $this->rel_date = $rel_date;
        }
    }

    public function setGenre($genre)
    {
        if (!$genre || $genre === "")
        {
            $this->genre = null;
        }
        else
        {

            $this->genre = $genre;
        }
    }

    public function setPopularity($popularity)
    {
        if (!$popularity || $popularity === "")
        {
            $this->popularity = null;
        }
        else
        {
            $this->popularity = $popularity;
        }
    }

    public function setPoster($poster)
    {
        if (!$poster || $poster === "")
        {
            $this->poster = null;
        }
        else
        {
            $this->poster = $poster;
        }
    }

    public function setBackground($bg)
    {
        if (!$bg || $bg === "")
        {
            $this->bg = null;
        }
        else
        {
            $this->bg = $bg;
        }
    }

    // cos i'm lazy and don't want to type $movie->getBlahblah() every time....
    // this returns an ordered array of all vars
    // IMPORTANT: GENRE IS SERIALISED HERE
    public function getVars()
    {
        return [
            "mv_id" => $this->id,
            "title" => $this->title,
            "desc" => $this->desc,
            "release_date" => $this->rel_date,
            "popularity" => $this->popularity,
            "genre" => serialize($this->genre),
            "poster" => $this->poster,
            "bg" => $this->bg
        ];
    }
}
