<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    private $id;
    private $title;
    private $desc;
    private $rel_date;
    private $genre;
    private $poster;
    private $bg;

    public function __construct($id = null, $title = null, $desc = null, $rel_date = null, $genre = null, $poster = null, $bg = null)
    {
        $this->setID($id);
        $this->setTitle($title);
        $this->setDescription($desc);
        $this->setReleaseDate($rel_date);
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

    public function getGenre()
    {
        // genre should always be stored as a serialised string
        return unserialize($this->genre);
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
            // suppress potential warnings of unserialising something that isn't serialised
            $array = @unserialize($genre);

            if ($array === false)
            {
                // didn't come from db so serialise it
                $this->genre = serialize($genre);
            }
            else
            {
                // otherwise the string has been serialised so don't re-serialise
                $this->genre = $genre;
            }
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
    public function getVars()
    {
        return [
            $this->id,
            $this->title,
            $this->desc,
            $this->rel_date,
            $this->getGenre(),
            $this->poster,
            $this->bg
        ];
    }
}
