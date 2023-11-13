<?php
require_once 'models/productModel.php';
require_once 'views/apiView.php';

class menuApiController
{
    private $data;
    private $view;
    private $model;
    function __construct()
    {
        $this->data = file_get_contents("php://input");
        $this->model = new ProductModel();
        $this->view = new ApiView();
    }
    public function getAllProducts($params = [])
    {
        if (!isset($params[':sort_filter']) && !isset($params[':sort_mode'])) {
            // products 
            $productsArr = $this->model->getAllProducts();
        } else {
            //products by sort filter and sort mode
            if (!$this->validateOrder($params[':sort_filter'], $params[':sort_mode'])) {
                return $this->view->response("no especificaste ordenamiento valido", 400);
            }
            $sort_filter = $params[':sort_filter'];
            $sort_mode = $params[':sort_mode'];
            if (empty($sort_filter)) {
                return $this->view->response("Filtro vacio", 400);
            }
            $productsArr = $this->model->getFilteredProduct($sort_filter, $sort_mode);
        }
        return $this->view->response($productsArr, 200);
    }
    private function validateOrder($sort_filter, $sort_mode)
    {
        return ($sort_filter == "price" || $sort_filter == "name") && ($sort_mode == "ASC" || $sort_mode == "DESC");
    }
    // si no viene nada en el parametro.
    function getProductById($params = [])
    {
        //compruebo que el parametro, esta seteado y no esta vacio.
        if (!isset($params[':ID']) || empty($params[':ID'])) {
            return $this->view->response("no podemos encontrar el producto.", 400);
        } else {
            $id = $params[':ID'];
            $producto = $this->model->getProductById($id);
            //pregunto si existe producto con ese id.
            if (!$producto) {
                $this->view->response('Producto no encontrado', 500);
            } else {
                $this->view->response($producto, 200);
            }
        }
    }
    //decodifica objeto json con los datos del body.
    function getData()
    {
        return json_decode($this->data);
    }
    function addProduct()
    {
        $producto = $this->getData();
        $name = $producto->name;
        $price = $producto->price;
        $id_category = $producto->id_category;
        $picture = $producto->picture;
        $description = $producto->description;
        $tipo = $producto->tipo;
        //validamos JSON
        if (!$this->validateJSON($name, $price, $id_category, $picture, $description, $tipo)) {
            $this->view->response('Producto no ingresado correctamente', 400);
        } else {
            //si esta repetido
            if ($this->model->getproductByName($name)) {
                $this->view->response('Ese nombre de producto ya esta', 400);
            } else {
                //devuelve id de producto agregado.
                $productoId = $this->model->addProduct($name, $price, $id_category, $picture, $description, $tipo);
                //vemos si el producto esta en la base de datos
                $producto = $this->model->getProductById($productoId);

                if (!$producto) {
                    return $this->view->response("no pudimos agregar el producto.", 500);
                } else {
                    $this->view->response('Se agrego producto correctamente ' . $productoId, 201);
                }
            }
        }
    }
    function validateJSON($name, $price, $id_category, $picture, $description, $tipo)
    {
        if (!isset($name) || !isset($price) || !isset($id_category) || !isset($picture) || !isset($description)
            || !isset($tipo) || empty($name) || empty($price) || empty($id_category) || empty($picture) || empty($description) || empty($tipo)){
            return false;
        } else {
                return true;
            }
    }
    function updateProduct($params = [])
    {
        //compruebo que paso el :ID
        if (!isset($params[':ID']) || empty($params[':ID'])) {
            return $this->view->response("no podemos identificar el producto sin un id", 400);
        }

        //compruebo q existe el producto
        $productId = $params[':ID'];
        $productExisting = $this->model->getProductById($productId);
        if (!$productExisting) {
            $this->view->response("no encontramos el producto", 404);
        } else {
            $product = $this->getData();
            $name = $product->name;
            $price = $product->price;
            $id_category = $product->id_category;
            $picture = $product->picture;
            $description = $product->description;
            $tipo = $product->tipo;
            //validamos JSON
            if (!$this->validateJSON($name, $price, $id_category, $picture, $description, $tipo)) {
                $this->view->response('Producto no ingresado correctamente', 400);
            } else {
                //haces la validacion del json
                $this->model->updateProduct($productId, $name, $price, $id_category, $picture, $description, $tipo);
                $this->view->response('El producto ' . $productId . ' fue modificado correctamente ', 200);
                //envias los datos al update
            }
        }
    }
}
