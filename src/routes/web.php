<?php

$namespace = 'Quotes\Http\Controllers';

Route::group([
  'namespace' => $namespace,
  'middleware' => 'web'
],function(){
  Route::resource('quotes','QuoteController');
  Route::get('/quotes-to-database',function(){
    if (Quotes\Models\Quote::get()->count()==0) {
      $filecontent = file_get_contents(storage_path('quotes/quotes.json'));
      $quotes = json_decode($filecontent);
      foreach ($quotes as $key => $filequote) {
          $quote = new Quotes\Models\Quote();
          $quote->category = ucwords($filequote->GENRE);
          $quote->quote = $filequote->QUOTE;
          $quote->author = $filequote->AUTHOR;
          $quote->save();
      }
      return 'Quotes successfully saved to database';
    }else {
      return 'Database Already Contains Quotes';
    }

  });
});
