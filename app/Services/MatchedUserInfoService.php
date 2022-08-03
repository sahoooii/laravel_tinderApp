<?php

namespace App\Services;

class MatchedUserInfoService
{

	public static function userGender($gender)
	{
		if ($gender === 0) {
            $gender = 'male';
        }
        if ($gender === 1) {
            $gender = 'female';
        }
		return $gender;
	}

	public static function userSearchStatus($search_status)
	{

		if ($search_status === 0) {
            $search_status = 'Relationship';
        }
        if ($search_status === 1) {
            $search_status = 'Something Casual';
        }
        if ($search_status === 2) {
            $search_status = 'Friend';
        }

		return $search_status;
	}

}
