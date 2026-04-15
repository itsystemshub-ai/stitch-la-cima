<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AyudaController extends Controller
{
    public function index() { return view('erp.ayuda.index'); }
    public function tickets() { return view('erp.ayuda.tickets'); }
    public function crearTicket() { return view('erp.ayuda.crear-ticket'); }
    public function chat() { return view('erp.ayuda.chat'); }
    public function conocimiento() { return view('erp.ayuda.conocimiento'); }
    public function manuales() { return view('erp.ayuda.manuales'); }
}
