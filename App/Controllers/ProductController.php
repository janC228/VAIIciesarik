<?php

namespace App\Controllers;

use App\Models\Motorcycle;
use Framework\Core\BaseController;
use Framework\Http\HttpException;
use Framework\Http\Request;
use Framework\Http\Responses\Response;

class ProductController extends BaseController
{
    public function index(Request $request): Response
    {
        return $this->html([
            'motorcycles' => Motorcycle::getAll(orderBy: '`price` ASC')
        ]);
    }

    public function add(Request $request): Response
    {
        return $this->html([
            'motorcycle' => new Motorcycle(),
            'errors' => [],
            'priceInput' => ''
        ], 'form');
    }

    public function edit(Request $request): Response
    {
        $motorcycle = $this->getMotorcycleOr404(
            (int)$request->value('id')
        );

        return $this->html([
            'motorcycle' => $motorcycle,
            'errors' => [],
            'priceInput' => (string)$motorcycle->getPrice()
        ], 'form');
    }

    public function save(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $id = (int)$request->post('id');

        $motorcycle = $id > 0
            ? $this->getMotorcycleOr404($id)
            : new Motorcycle();

        $name = trim((string)$request->post('name'));
        $brand = trim((string)$request->post('brand'));
        $category = trim((string)$request->post('category'));
        $description = trim((string)$request->post('description'));
        $priceInput = trim((string)$request->post('price'));

        $motorcycle->setName($name);
        $motorcycle->setBrand($brand);
        $motorcycle->setCategory($category);
        $motorcycle->setDescription($description);

        $errors = [];

        if ($name === '' || mb_strlen($name) > 150) {
            $errors[] = 'Zadaj platný názov motocykla.';
        }

        if ($brand === '' || mb_strlen($brand) > 100) {
            $errors[] = 'Zadaj platnú značku.';
        }

        if ($category === '' || mb_strlen($category) > 100) {
            $errors[] = 'Zadaj platnú kategóriu.';
        }

        if ($description === '') {
            $errors[] = 'Zadaj popis motocykla.';
        }

        $price = $priceInput === ''
            ? false
            : filter_var(
                $priceInput,
                FILTER_VALIDATE_INT,
                ['options' => ['min_range' => 0, 'max_range' => 10000000]]
            );

        if ($price === false) {
            $errors[] = 'Cena musí byť nezáporné celé číslo.';
        } else {
            $motorcycle->setPrice($price);
        }

        if (count($errors) > 0) {
            return $this->html([
                'motorcycle' => $motorcycle,
                'errors' => $errors,
                'priceInput' => $priceInput
            ], 'form');
        }

        $motorcycle->save();

        return $this->redirect($this->url('product.index'));
    }

    public function delete(Request $request): Response
    {
        if (!$request->isPost()) {
            throw new HttpException(405);
        }

        $motorcycle = $this->getMotorcycleOr404(
            (int)$request->post('id')
        );

        $motorcycle->delete();

        return $this->redirect($this->url('product.index'));
    }

    private function getMotorcycleOr404(int $id): Motorcycle
    {
        $motorcycle = Motorcycle::getOne($id);

        if ($motorcycle === null) {
            throw new HttpException(404);
        }

        return $motorcycle;
    }
}
