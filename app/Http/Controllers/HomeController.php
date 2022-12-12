<?php

namespace App\Http\Controllers;

use App\Models\Block;
use App\Models\Material;
use App\Models\Order;
use App\Models\Piece;
use App\Models\PieceStore;
use App\Models\ShipPolicy;
use App\Models\Strip;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    function index()
    {
        $materials_count  = Material::with('currentBlocks:id')->has('currentBlocks' , '>' , 0)->count();
        $blocks_count  = Block::where('position', 'current')->count();
        $blocks_year_count  = Block::whereYear('created_at', Carbon::now()->year)->count();
        $good_blocks_count  = Block::where('position', 'current')->where('status', 'good')->whereYear('created_at', Carbon::now()->year)->count();
        $notgood_blocks_count  = Block::where('position', 'current')->where('status', '!=', 'good')->whereYear('created_at', Carbon::now()->year)->count();
        $strips  = Strip::where('position', 'current')->where('status', 'good')->get();

        $notgood_strips  = Strip::where('position', 'current')->where('status', 'notgood')->whereYear('created_at', Carbon::now()->year)->get();
        $good_strips  = Strip::where('position', 'current')->where('status', 'good')->whereYear('created_at', Carbon::now()->year)->get();
        $broken_strips  = Strip::where('position', 'current')->where('status', 'broken')->whereYear('created_at', Carbon::now()->year)->get();

        $notgood_pieces  = Piece::where('position', 'current')->where('status', 'notgood')->whereYear('created_at', Carbon::now()->year)->get();
        $good_pieces  = Piece::where('position', 'current')->where('status', 'good')->whereYear('created_at', Carbon::now()->year)->get();
        $broken_pieces  = Piece::where('position', 'current')->where('status', 'broken')->whereYear('created_at', Carbon::now()->year)->get();


        $notgood_store_pieces  = PieceStore::where('position', 'current')->where('status', 'notgood')->whereYear('created_at', Carbon::now()->year)->get();
        $good_store_pieces  = PieceStore::where('position', 'current')->where('status', 'good')->whereYear('created_at', Carbon::now()->year)->get();
        $broken_store_pieces  = PieceStore::where('position', 'current')->where('status', 'broken')->whereYear('created_at', Carbon::now()->year)->get();

        $pieces  = Piece::where('position', 'current')->where('status', 'good')->get();
        $pieces_store  = PieceStore::where('position', 'current')->where('status', 'good')->whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->get();
        $pieces_shipped = PieceStore::where('position', 'shipped')->get();
        $policies_count  = ShipPolicy::whereMonth('created_at', Carbon::now()->month)->whereYear('created_at', Carbon::now()->year)->count();
        $orders_count  = Order::where('position', 'current')->count();


        $storage_materials  = PieceStore::with('material')->where('position', 'current')->where('status', 'good')->get()->groupBy(function ($data){
            return $data['material']['name'];
        })->toArray();

        $shipped_year_pieces  = PieceStore::where('position', 'shipped')->get()->groupBy(function ($data){
            return Carbon::parse($data['created_at'])->month;
        })->toArray();
;


        $notgood_strips_count = 0;

        foreach ($notgood_strips as $key => $value) {
            $notgood_strips_count += $value->count;
        }

        $good_strips_count = 0;

        foreach ($good_strips as $key => $value) {
            $good_strips_count += $value->count;
        }
        $broken_strips_count = 0;

        foreach ($broken_strips as $key => $value) {
            $broken_strips_count += $value->count;
        }

        $notgood_pieces_count = 0;

        foreach ($notgood_pieces as $key => $value) {
            $notgood_pieces_count += $value->count;
        }

        $good_pieces_count = 0;

        foreach ($good_pieces as $key => $value) {
            $good_pieces_count += $value->count;
        }
        $broken_pieces_count = 0;

        foreach ($broken_pieces as $key => $value) {
            $broken_pieces_count += $value->count;
        }


        $notgood_pieces_store_count = 0;

        foreach ($notgood_store_pieces as $key => $value) {
            $notgood_pieces_store_count += $value->count;
        }


        $good_pieces_store_count = 0;

        foreach ($good_store_pieces as $key => $value) {
            $good_pieces_store_count += $value->count;
        }

        $broken_pieces_store_count = 0;

        foreach ($broken_store_pieces as $key => $value) {
            $broken_pieces_store_count += $value->count;
        }


        $strips_count = 0;

        foreach ($strips as $key => $value) {
            $strips_count += $value->count;
        }

        $pieces_count = 0;

        foreach ($pieces as $key => $value) {
            $pieces_count += $value->count;
        }
        $pieces_store_count = 0;

        foreach ($pieces_store as $key => $value) {
            $pieces_store_count += $value->count;
        }
        $pieces_shipped_count = 0;

        foreach ($pieces_shipped as $key => $value) {
            $pieces_shipped_count += $value->count;
        }


        return view('home', compact(
            'blocks_count',
            'pieces_shipped_count',
            'pieces_count',
            'strips_count',
            'pieces_store_count',
            'policies_count',
            'orders_count',
            'materials_count',
            'notgood_blocks_count',
            'good_blocks_count',
            'notgood_strips_count',
            'broken_strips_count',
            'good_strips_count',
             'notgood_pieces_count',
            'broken_pieces_count',
            'good_pieces_count',
             'notgood_pieces_store_count',
            'broken_pieces_store_count',
            'good_pieces_store_count',
            'storage_materials',
            'blocks_year_count',
            'shipped_year_pieces',
        ));
    }
}
