<?php



    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('click')->default(0);
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('click');
        });
    }


    Route::get('/click/{product_id}', [HomeController::class, 'click'])
    ->name('product.click');


    public function click($product_id){
        $product = Product::findOrFail($product_id);
        $product->click = $product->click + 1;
        $product->save();

        $no_wa = '628xxxx';
        
        $text = 'Halo, saya mau beli '.$product->name.' dengan jumlah '.$product->stock.' buah';

        $url = 'https://api.whatsapp.com/send?phone='.$no_wa.'&text='.urlencode($text);

        return redirect()->away($url);
    }











