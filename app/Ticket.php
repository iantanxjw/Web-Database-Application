<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    private $id;
    private $title;
    private $weekday;
    private $start_time;
    private $type;
    private $qty;
    private $booking_id;


    public function __construct($id = null, $weekday = null, $start_time = null, $title = null,
                                $type = null, $qty = null, $booking_id = null)
    {
        $this->setID($id);
        $this->setTitle($title);
        $this->setWeekday($weekday);
        $this->setStartTime($start_time);
        $this->setType($type);
        $this->setQty($qty);
        $this->setBookingID($booking_id);
    }

    public function getID()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getWeekday()
    {
        return $this->weekday;
    }

    public function getStartTime()
    {
        return $this->start_time;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getQty()
    {
        return $this->qty;
    }

    public function getBookingID()
    {
        return $this->booking_id;
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

    public function setWeekday($weekday)
    {
        if (!$weekday || $weekday === "")
        {
            $this->weekday = "Unknown";
        }
        else
        {
            $this->weekday = $weekday;
        }
    }

    public function setStartTime($start_time)
    {
        if (!$start_time || $start_time === "")
        {
            $this->start_time = "Unknown";
        }
        else
        {
            $this->start_time = $start_time;
        }
    }

    public function setType($type)
    {
        if (!$type || $type === "")
        {
            $this->type = "None";
        }
        else
        {
            $this->type = $type;
        }
    }

    public function setQty($qty)
    {
        if (!$qty || $qty === "")
        {
            $this->qty = "Unknown";
        }
        else
        {
            $this->qty = $qty;
        }
    }

    public function setBookingID($booking_id)
    {
        if (!$booking_id || $booking_id === "")
        {
            $this->booking_id = null;
        }
        else
        {
            $this->booking_id = $booking_id;
        }
    }


    // cos i'm lazy and don't want to type $movie->getBlahblah() every time....
    // this returns an ordered array of all vars
    public function getVars()
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "weekday" => $this->weekday,
            "start_time" => $this->start_time,
            "type" => $this->type,
            "qty" => $this->qty,
            "booking_id" => $this->booking_id
        ];
    }
}
