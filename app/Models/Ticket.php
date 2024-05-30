<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'title',
    'category_id',
    'operator_id',
    'priority_id',
    'status_id',
    'description',
    'notes',
  ];

  /**
   * The category that belongs to the Ticket
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class)->withTrashed();
  }

  /**
   * The operator that belongs to the Ticket
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function operator(): BelongsTo
  {
    return $this->belongsTo(Operator::class)->withTrashed();
  }

  /**
   * The priority that belongs to the Ticket
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function priority(): BelongsTo
  {
    return $this->belongsTo(Priority::class)->withTrashed();
  }

  /**
   * The status that belongs to the Ticket
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function status(): BelongsTo
  {
    return $this->belongsTo(Status::class)->withTrashed();
  }
}
