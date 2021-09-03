<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    public $timestamps = false;
    protected $table = "employee";
    protected $primaryKey = "id";
    protected $fillable = ["name","email","designation","created"];
}
