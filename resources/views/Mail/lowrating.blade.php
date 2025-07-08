<h3>Low Rating Alert</h3>

<p>The product <strong>{{ $product->title }}</strong> has received an average rating of <strong>{{ round($product->ratings->avg('rating'), 1) }}</strong>, which is below 3.</p>

<p>Please review the product and take action if necessary.</p>
