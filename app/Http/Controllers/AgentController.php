<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Psy\CodeCleaner\ReturnTypePass;

class AgentController extends Controller
{
    public function agentDashboard(): View
    {
        return view('agent.agent_dashboard');
    }
}
