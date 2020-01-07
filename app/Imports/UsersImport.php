<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
          'Number'        => $row[1],
          'Id_Card'       => $row[2],
          'Pname'         => $row[3],
          'Fname'         => $row[4],
          'Lname'         => $row[5],
          'Class_Room'    => $row[6],
          'Type'          => $row[7],
          'Room'          => $row[8],
        ]);
    }
}
