<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class studentdb extends Model
{
  protected $table = 'studentdbs';
  protected $fillable = ['Number','Id_Card','Pname','Fname','Lname','Class_Room','Type'];

  public function studentdb()
  {
    return $this->hasMany(CheckDatastudent::class);
  }
}
