<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Artist.php (Model)
class Artist extends Model {
    protected $fillable = [
        'name' ];
    public function multimediaFiles() {
        return $this->hasMany(MultimediaFile::class);
    }
}

// MultimediaFile.php (Model)
class MultimediaFile extends Model {
    public function artist() {
        return $this->belongsTo(Artist::class);
    }
}
