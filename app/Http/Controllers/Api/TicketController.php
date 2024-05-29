<?php

namespace App\Http\Controllers\Api;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{

  public function index(Request $request)
  {
    $data = $request->all();
    $date = $data['date'] ?? false;
    $statusId = $data['statusId'] ?? false;
    $categoryId = $data['categoryId'] ?? false;
    $operatorId = $data['operatorId'] ?? false;

    if (!$statusId && !$date && !$categoryId && !$operatorId) {
      return response()->json([
        'success' => false,
        'results' => null,
      ]);
    }

    $tickets = Ticket::with('category', 'operator', 'status', 'priority');

    if ($date)
      $tickets->where('date', '=', $date);
    if ($statusId)
      $tickets->where('status_id', '=', $statusId);
    if ($categoryId)
      $tickets->where('category_id', '=', $categoryId);
    if ($operatorId)
      $tickets->where('operator_id', '=', $operatorId);

    $tickets = $tickets->orderBy('priority_id', 'asc')->orderBy('status_id', 'desc')->paginate(10);

    return response()->json([
      'success' => true,
      'results' => $tickets,
    ]);
  }

}
