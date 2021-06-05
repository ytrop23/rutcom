<?php

namespace App\Http\Controllers;
use App\Models\Client;
use Illuminate\Http\Request;

class ClientsViews extends Controller
{
    public function index(){

        return Client::all();
    }
}
