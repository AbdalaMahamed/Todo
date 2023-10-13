<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todo'; // Hier moet de daadwerkelijke tabelnaam komen

    protected $primaryKey = 'id'; // De naam van de primaire sleutel

    protected $keyType = 'int'; // Het datatype van de primaire sleutel

    public $timestamps = true; // Zet dit op true als je timestamps wilt gebruiken

    use HasFactory;
    protected $fillable = [
        'Task',

    ];
}
