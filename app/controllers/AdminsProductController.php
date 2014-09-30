<?php
use copol\Forms\ProductCreation;


class AdminsProductController extends \BaseController {


//Call constructor for Registration form
    private $productCreation;

    function __construct(ProductCreation $productCreation)
    {

        $this->productCreation = $productCreation;
    }

    /**
     * Display a listing of the resource.
     * GET /adminsprovider
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::get(['id', 'name', 'rzTn_img_url']);
        $role      = check_admin_auth();

        return View::make('products.index', compact('role', 'products'));

    }

    /**
     * Show the form for creating a new resource.
     * GET /adminsprovider/create
     *
     * @return Response
     */
    public function create()
    {

        $role      = check_admin_auth();
        $products = Product::all();

        return View::make('products.create', compact('role', 'products'));


    }

    /**
     * Store a newly created resource in storage.
     * POST /adminsprovider
     *
     * @return Response
     */
    public function store()
    {
        if (Input::file('img_url') == null) return Redirect::back()->withInput()->withErrors(['img_url' => 'Tienes que seleccionar una Imagen!']);

        $input = Input::only('name', 'description');

        $this->productCreation->validate($input);

        $fileName = Input::file('img_url')->getClientOriginalName();
        $file     = Input::file('img_url')->getRealPath();
        $image    = Image::make($file);

        File::exists(products_photo_path()) or File::makeDirectory(products_photo_path());

        $originalName   = time() . '-' . 'original-' . $fileName;
        $resized320Name = time() . '-' . '320-' . $fileName;
        $resizedTnName  = time() . '-' . 'Tn-' . $fileName;

        $image->save(products_photo_path() . $originalName)
            ->resize(180, 220)
            ->save(products_photo_path() . $resized320Name)
            ->resize(120, 150)
            ->save(products_photo_path() . $resizedTnName);



        Product::create(
            [

                'name'          => $input['name'],
                'description'   => $input['description'],
                'rz320_img_url' => $resized320Name,
                'rzTn_img_url' => $resizedTnName,
                'img_url'       => $originalName

            ]);


        return Redirect::action('AdminsProductController@index');


    }

    /**
     * Display the specified resource.
     * GET /adminsprovider/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     * GET /adminsprovider/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $provider = Provider::find($id);
        $role      = check_admin_auth();

        return View::make('providers.edit', compact('role', 'provider'));


    }

    
    /**
     * Update the specified resource in storage.
     * PUT /adminsprovider/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $provider = Provider::find($id);

        $input = Input::all();

        $provider->update($input);
        $provider->save();

        return Redirect::to('admins/providers');
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /adminsprovider/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
    }

}