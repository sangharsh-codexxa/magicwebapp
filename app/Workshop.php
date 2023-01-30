<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{
  use HasFactory;
  protected $fillable = [
    '_token',
    'image',
    'title',
    'start_date',
    'start_time',
    'end_date',
    'end_time',
    'fee',
    'description',
    'venue',
    'status'
  ];
}
