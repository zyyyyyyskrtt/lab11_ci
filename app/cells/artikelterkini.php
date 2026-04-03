<?php
namespace App\Cells;

use App\Models\ArtikelModel;

// Tidak perlu 'extends Cell' atau 'use CodeIgniter\View\Cell;'
class ArtikelTerkini
{
    public function render()
    {
        $model = new ArtikelModel();
        $artikel = $model->orderBy('id', 'DESC')->limit(5)->findAll();
        
        return view('components/artikel_terkini', ['artikel' => $artikel]);
    }
}