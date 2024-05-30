<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Priority extends Model
{
  use HasFactory, SoftDeletes;


  /**
   * Get all of the tickets for the Priority
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function tickets(): HasMany
  {
    return $this->hasMany(Ticket::class);
  }
}
