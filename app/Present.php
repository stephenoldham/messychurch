<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    /**
     * Make the gender humanly readable
     *
     * @return string
     **/
    public function formatGender()
    {
    	switch ($this->gender) {
    		case 'm':
    			return 'Boy';
    		break;

    		case 'f':
    			return 'Girl';
    		break;

    		case 'u':
    			return 'Unisex';
    		break;
    	}
    }

    /**
     * Get a color based on the gender
     *
     * @return string
     **/
    public function getColor()
    {
    	$gender = strtolower($this->gender);

    	switch ($gender) {
    		case 'm':
    		case 'male':
    		case 'boy':
    			return 'blue';
    		break;

    		case 'f':
    		case 'female':
    		case 'girl':
    			return 'pink';
    		break;

    		case 'u':
    		case 'unisex':
    			return 'orange';
    		break;
    	}
    }
}
