<?php

namespace App\Http\Controllers;

use App\Models\Approval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApprovalController extends Controller
{
    /**
     * Display a listing of pending approvals.
     */
    public function index()
    {
        $pendingApprovals = Approval::with(['approvable', 'requester'])
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();

        $historyApprovals = Approval::with(['approvable', 'requester', 'approver'])
            ->whereIn('status', ['approved', 'rejected'])
            ->orderBy('updated_at', 'desc')
            ->limit(10)
            ->get();

        return view('erp.approvals_system', compact('pendingApprovals', 'historyApprovals'));
    }

    /**
     * Process an approval request (Approve or Reject).
     */
    public function process(Request $request, Approval $approval)
    {
        $request->validate([
            'action' => 'required|in:approve,reject',
            'reason' => 'required_if:action,reject|string|max:255',
        ]);

        try {
            DB::transaction(function () use ($request, $approval) {
                $status = $request->action === 'approve' ? 'approved' : 'rejected';
                
                $approval->update([
                    'status' => $status,
                    'approver_id' => 1, // Simulating Auth::id() for now if auth is not fully configured
                    'reason' => $request->reason,
                ]);

                // Update the status of the related model (Order, etc.)
                $model = $approval->approvable;
                if ($model) {
                    $newStatus = $request->action === 'approve' ? 'Aprobado' : 'Rechazado';
                    $model->update(['estado' => $newStatus]);
                    
                    // Logic for specific models:
                    // If it's an Order and approved, it might trigger stock deduction or invoice generation.
                }
            });

            return redirect()->route('erp.approvals.index')->with('success', 'Solicitud procesada correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('erp.approvals.index')->with('error', 'Error al procesar la aprobación: ' . $e->getMessage());
        }
    }
}
