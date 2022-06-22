<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Reply;

class Complaint extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'email', 'subject', 'comp_type', 'priority', 'thumbnail', 'body',  'phone_number', 'status'];
}
