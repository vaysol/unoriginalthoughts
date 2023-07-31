async function deleteFromWishList( event ){
    
    let wlid = event.target.dataset.wlid;
    let pId = event.target.dataset.pid;

    
    const body = {
        "type": "deleteFromWishList",
        "wishListId" : wlid,
        "productId": pId
    }

    let result = await fetch("_headers/website_requests/delete_from_cart_and_wishlist.php",{
                    method: "POST",
                    headers: {'Content-Type': 'application/json'}, 
                    body: JSON.stringify( body )
                });

                
    if( result.status === 200 ){
        const elementToDelete = event.target.parentElement.parentElement;
        const parentElement = elementToDelete.parentElement;
        elementToDelete.remove();
        if( parentElement.children.length <= 0 ){
            parentElement.appendChild( document.createTextNode("No items to display.") );
        }
    }

    let jsonResponse = await result.json();
                
    Toast.fire({
      icon: jsonResponse.icon,
      titleText: jsonResponse.titleText,
      "text": jsonResponse.text
    });
    
        
}