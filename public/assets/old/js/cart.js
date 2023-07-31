async function updateQuantity( event, cartId, productId, dbq ){
    showLoadingAnimation( true );
    
    const quantity = parseInt( event.target.value );
    const payLoad = { 
        productId: productId, 
        cartId: cartId,
        quantity: quantity 
    };
    
    if( quantity > 10 || quantity < 1 ){
        showLoadingAnimation( false );
        Toast.fire({
            icon: 'warning',
            titleText: 'Warning!',
            "text": 'Qunatity must in the range 1 to 10'
        });
        event.target.value = dbq;
        return;
    }

    // alert( dbq );
    // alert( quantity );
    // return;

    let result = await fetch("_headers/website_requests/update_cart_quantity.php",{
                    method: "POST",
                    headers: {'Content-Type': 'application/json'}, 
                    body: JSON.stringify( payLoad )
                });

    if( result.status === 200 ){
        window.location.reload();
    } else {
        event.target.value = dbq;
        let jsonResponse = await result.json();
        showLoadingAnimation( false );        
        Toast.fire({
            icon: jsonResponse.icon,
            titleText: jsonResponse.titleText,
            "text": jsonResponse.text
        });
    }
}
