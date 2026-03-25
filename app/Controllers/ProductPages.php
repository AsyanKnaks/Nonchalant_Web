<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductPages extends BaseController
{
public function shop()
{
    $productModel = new ProductModel();

    $collection = $this->request->getGet('collection');
    $sort = $this->request->getGet('sort');
    $searchQuery = trim($this->request->getGet('q') ?? '');

    if (!empty($searchQuery)) {
        $productModel->groupStart()
            ->like('name', $searchQuery)
            ->orLike('description', $searchQuery)
            ->orLike('collection', $searchQuery)
            ->groupEnd();
    }

    if (!empty($collection)) {
        $productModel->where('collection', $collection);
    }

    switch ($sort) {
        case 'name_asc':
            $productModel->orderBy('name', 'ASC');
            break;
        case 'name_desc':
            $productModel->orderBy('name', 'DESC');
            break;
        case 'price_asc':
            $productModel->orderBy('price', 'ASC');
            break;
        case 'price_desc':
            $productModel->orderBy('price', 'DESC');
            break;
        default:
            $productModel->orderBy('id', 'DESC');
            break;
    }

    $products = $productModel->paginate(6);

    return view('collections/shop', [
        'title' => 'Shop',
        'products' => $products,
        'pager' => $productModel->pager,
        'selectedCollection' => $collection,
        'selectedSort' => $sort,
        'searchQuery' => $searchQuery,
    ]);
}

    public function collection($slug)
{
    $productModel = new ProductModel();

    $collections = [
        'drop26' => [
            'dbValue' => 'Drop26',
            'title' => 'Drop 26 - Nonchalant',
            'heroTitle' => 'DROP 26',
            'heroText' => 'Latest streetwear collection',
            'heroImage' => 'assets/images/Local1.webp',
        ],
        'drop25' => [
            'dbValue' => 'Drop25',
            'title' => 'Drop 25 - Nonchalant',
            'heroTitle' => 'DROP 25',
            'heroText' => 'Previous local drop collection',
            'heroImage' => 'assets/images/Local2.webp',
        ],
        'collab26' => [
            'dbValue' => 'COLLAB26',
            'title' => 'Collab 26 - Nonchalant',
            'heroTitle' => 'COLLAB 26',
            'heroText' => 'Featured collaboration collection',
            'heroImage' => 'assets/images/Collab2.webp',
        ],
        'manga26' => [
            'dbValue' => 'MANGA26',
            'title' => 'Manga 26 - Nonchalant',
            'heroTitle' => 'MANGA 26',
            'heroText' => 'Manga-inspired collection',
            'heroImage' => 'assets/images/Collab1.webp',
        ],
    ];

    $slug = strtolower($slug);

    if (!isset($collections[$slug])) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    }

    $collectionData = $collections[$slug];

    $products = $productModel
        ->where('collection', $collectionData['dbValue'])
        ->orderBy('id', 'DESC')
        ->findAll();

    return view('collections/collection_page', [
        'title' => $collectionData['title'],
        'products' => $products,
        'collectionData' => $collectionData,
        'collectionSlug' => $slug,
    ]);
}

public function search()
{
    $keyword = trim($this->request->getGet('q') ?? '');

    $productModel = new ProductModel();

    if ($keyword !== '') {
        $productModel
            ->groupStart()
            ->like('name', $keyword)
            ->orLike('description', $keyword)
            ->orLike('collection', $keyword)
            ->groupEnd();
    }

    $products = $productModel->orderBy('id', 'DESC')->paginate(6);

    return view('collections/shop', [
        'title' => 'Search Results',
        'products' => $products,
        'pager' => $productModel->pager,
        'selectedCollection' => null,
        'selectedSort' => null,
        'searchQuery' => $keyword,
    ]);
}
}