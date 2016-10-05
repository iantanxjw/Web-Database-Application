<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    private $id;
    private $title;
    private $desc;
    private $rel_date;
    private $voteAvg;
    private $status;
    private $genre;
    private $poster;
    private $bg;

    public function __construct($id = null, $title = null, $desc = null, $rel_date = null, $voteAvg = null, $status = null, $genre = null, $poster = null, $bg = null)
    {
        $this->setID($id);
        $this->setTitle($title);
        $this->setDescription($desc);
        $this->setReleaseDate($rel_date);
        $this->setVoteAvg($voteAvg);
        $this->setStatus($status);
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

    public function getVoteAvg()
    {
        return $this->voteAvg;
    }

    public function getStatus()
    {
        return $this->status;
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

    public function setVoteAvg($voteAvg)
    {
        if (!$voteAvg || $voteAvg === "")
        {
            $this->voteAvg = null;
        }
        else
        {
            $this->voteAvg = $voteAvg;
        }
    }

    public function setStatus($status)
    {
        $this->status = $status;
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
            "voteAvg" => $this->voteAvg,
            "status" => $this->status,
            "genre" => serialize($this->genre),
            "poster" => $this->poster,
            "bg" => $this->bg
        ];
    }
}
