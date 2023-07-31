window.history.replaceState( null, null, window.location.href );
// Variable declaration
// Announcement Bar
const currentAnnouncement = document.querySelector( 'header .announce' );
let announcement_slider_setinterval;
const announcement_slider_timeout = 7000;
// const nextAnnouncement = document.querySelector( 'header .announce p + .next' );

//Login form selector
const loginIcon = document.querySelector( '#Account' );
const loginForm = document.querySelector( '.Login-form' );

// Nav bar selector
const menu = document.querySelector('#menu-bars');
const navbar = document.querySelector('.navbar');

//Searcch bar selector
const serachIcon = document.querySelector( '#search' )
const searchForm = document.querySelector( '.search-form' );

//Add to cart selector
const shoppingCartIcon = document.querySelector( '#addToCart' );
const shoppingCart = document.querySelector( '.shopping-cart' );

const cartTotal = document.getElementById("cartTotal");
const cartCheckOut = document.getElementById("cartCheckOut");

const cartProdList = document.querySelector(".prod-list");

//Icons and its relation in one varialbe
const iconsAndItsRelativeDisplays = [
    { 
        iconId: "menu-bars",
        icon: menu,
        relation: navbar
    }, {
        iconId: "Account",
        icon: loginIcon,
        relation: loginForm
    }
];



// Swal toast 
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    showCloseButton: true,
    didOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    },
    customClass: {
        icon: "swal-icon",
        title: "swal-title-toast",
        htmlContainer: "swal-text-toast"
        // confirmButton: "swal-button-login",
        // cancelButton: "swal-button",
        // closeButton: "swal-close-button"
    }
});


// Add to user's cart or wish list
async function handelATC_WL( event, quantity=1 ){

    let productId = event.target.dataset.pid;
    let type = event.target.dataset.type;

    const body = { productId, type, quantity };

    let url = window.location;
    if( url.pathname.split('/')[ url.pathname.split('/').length - 1 ] === "productview" ){
        const params = new URLSearchParams( url.search );
        const types = {};
        for (const [ key, value ] of params.entries() ) {
            if( key !== "productId" ){
                types[key] = value;
            }
        }
        body["user_specification"] = types;
    }

    let result = await fetch("_headers/website_requests/add_to_cart_and_wishlist.php",{
        method: "POST",
        headers: {'Content-Type': 'application/json'}, 
        body: JSON.stringify( body )
    });

    if( result.status === 401 ){

        Swal.fire({
            icon: "warning",
            titleText: 'Login Required!',
            // denyButtonText: `Don't save`,
            showCancelButton: true,
            confirmButtonText: 'Login',
            showCloseButton: true,
            customClass: {
                icon: "swal-icon-warning",
                title: "swal-title",
                confirmButton: "swal-button-important",
                cancelButton: "swal-button",
                closeButton: "swal-close-button"
            }
        })
        .then((result) => {

            if ( result.isConfirmed ) {
                window.location = "authenticate.php?loginpage";
            } else {
                Toast.fire({
                    icon: "error",
                    titleText: "Login Cancelled!",
                    text: ( type === "addToWishList" )? "Add to wish list has been cancelled." : "Add to cart has been cancelled." 
                });
            }

        })
        .catch( error =>{
            Toast.fire({
                icon: "error",
                titleText: "Login Cancelled!",
                text: "Add to cart has been cancelled."
            });
        });


    } else {

        data = await result.json();

        if( result.status === 200 && type === "addToCart" ){
            cart_data.push( JSON.parse( data.productData )[0] );
            cartToDOM();
        }


        Toast.fire({
            icon: data.icon,
            titleText: data.titleText,
            text: data.text
        });

    } 

}

// Announcement Slider Functionality
async function announcement_slider( display_first = false ){

    if( !announcements_data.data[ announcements_data.current_index ] ){
        return;
    }

    if( ! display_first ){
        for( let i = 0; i >= -100; i-- ){
            currentAnnouncement.children[0].style.transform = `translateX(${i}rem)`;
            currentAnnouncement.children[1].style.transform = `translateX(${i}rem)`;
            await sleep(1);
        }
    }

    currentAnnouncement.children[0].innerText = announcements_data.data[ announcements_data.current_index ].paragraph;

    if( announcements_data.data[ announcements_data.current_index ].anchor !== undefined &&
            announcements_data.data[ announcements_data.current_index ].anchor !== null 
    ){
        currentAnnouncement.children[1].innerText = announcements_data.data[ announcements_data.current_index ].anchor.paragraph;
        currentAnnouncement.children[1].href = announcements_data.data[ announcements_data.current_index ].anchor.href
    }

    if( ! display_first ){
        for( let i = 100; i >= 0; i-- ){
            currentAnnouncement.children[0].style.transform = `translateX(${i}rem)`;
            currentAnnouncement.children[1].style.transform = `translateX(${i}rem)`;
            await sleep(1);
        }
    }

    setTimeout( announcement_slider, announcements_data.data[ announcements_data.current_index ].timeout );

    if( announcements_data.current_index === ( announcements_data.data.length - 1 ) ){
        announcements_data.current_index = 0;
    } else {
        announcements_data.current_index++;
    }

    // console.log("called");

}

// announcement_slider_setinterval = setInterval( 
//     announcement_slider , 
//     announcement_slider_timeout 
// );

// Menu bar toggle
menu.onclick = ( event ) =>{
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
    handelIconClick( event );
}

// Search Bar toggle
if( serachIcon !== null && searchForm !== null  ){
    serachIcon.onclick = ( event ) => {
        searchForm.classList.toggle( 'active' );
        handelIconClick( event );
    }

    iconsAndItsRelativeDisplays.push({
        iconId: "search",
        icon: serachIcon,
        relation: searchForm
    });
}

// Add to cart toggle
if( shoppingCartIcon !== null && shoppingCart !== null  ){
    shoppingCartIcon.onclick = ( event ) => {
        shoppingCart.classList.toggle( 'active' );
        handelIconClick( event );
    }

    iconsAndItsRelativeDisplays.push({
        iconId: "addToCart",
        icon: shoppingCartIcon,
        relation: shoppingCart
    });

}
// Login Toggle
loginIcon.onclick = ( event ) => {
    loginForm.classList.toggle( 'active' );
    handelIconClick( event );
}


// Cart related operations
// Function to add nodes of cart to DOM
function cartToDOM( firstTime = false ){

    if( shoppingCartIcon !== null && shoppingCart !== null  ){
        const cartTemplate = document.getElementById("cart-template").content;
        let totalPrice = 0;

        cart_data.forEach( ( element ) => {

            let temp_template = cartTemplate.cloneNode( true );

            // Selecting Img tag and adding required fields
            let htmlTag = temp_template.querySelector("img");
            htmlTag.src = element.P_IMG;
            htmlTag.alt = `${element.P_NAME} Image`;

            // Selecting h3 tag and adding required fields
            htmlTag = temp_template.querySelector("h3");
            htmlTag.innerText = element.P_NAME;
            
            // Calculating price
            let beforeDiscountPrice;
            let basePrice = parseFloat( element.P_PRICE );
            let p_details = JSON.parse( element.P_DETAILS );
            let userSelectedTypes = JSON.parse( element.ATC_SS );
            // console.log( p_details.default_prices, Object.keys( p_details.default_prices ).length );
            
            for( const key in userSelectedTypes ){
                p_details.default_prices[ key ] = userSelectedTypes[ key ];
            }

            // if( p_details.specification_add_default_price ){
            if( Object.keys( p_details.default_prices ).length > 0 ){

                for( let key of Object.keys( p_details.default_prices ) ){

                    defaultPriceType = p_details.specifications[ key ];
                    defaultPrice = defaultPriceType[ p_details.default_prices[key] ].Price;
                    basePrice += defaultPrice;

                    let pElement = document.createElement("p");
                    let spanElement = document.createElement("span");
                    spanElement.innerText = `${key}: ${defaultPriceType[ p_details.default_prices[key] ].Name}`;
                    pElement.appendChild( spanElement );

                    temp_template.querySelector('.content').appendChild( pElement );
                    // console.log( cartTemplate );

                }

                //    for( let keys of p_details.specifications ) {
                //     // p_details.specifications.forEach( keys => {
                //         let key = Object.keys( keys )[0];
                //         basePrice += parseFloat( keys[key][0].Price );
                //     };
            }

            // Gathering discount data, calculating and adding it to dom / template
            if( element.P_DISCOUNT !== null ){
                beforeDiscountPrice = basePrice;
                basePrice = basePrice - ( basePrice * ( element.P_DISCOUNT / 100 ) );
                temp_template.querySelector(".discount")
                    .querySelector("span")
                    .querySelector("span").innerText = `${beforeDiscountPrice}/-`;
            } else {
                temp_template.querySelector(".discount").style.display = "none";
            }

            

            let quantity = element.ATC_QUNTY;
            htmlTag = temp_template.querySelector(".quantity");
            htmlTag.value = quantity;
            htmlTag.dataset.productId = element.P_ID;
            htmlTag.dataset.cartId = element.ATC_ID;
            htmlTag.dataset.price = basePrice;

            basePrice *= quantity;
            
            totalPrice += basePrice;

            // Selecting price tag and adding required fields
            htmlTag = temp_template.querySelector(".price").querySelector("span");
            htmlTag.innerText = Math.round( basePrice );

            htmlTag = temp_template.querySelector("i.icons.fas.fa-trash");
            htmlTag.dataset.atcid = element.ATC_ID;
            htmlTag.dataset.pid = element.P_ID;

            cartProdList.appendChild( document.importNode( temp_template, true ) );
            
        });

        cart_data.length = 0;

        cartTotal.innerText = Math.round( parseFloat( cartTotal.innerText ) + totalPrice );

        if( cartProdList.children.length > 0 ){
            cartCheckOut.href = "cart.php";
            cartCheckOut.disabled = false;
            cartCheckOut.classList.remove("isDisabled");
        } else {
            cartCheckOut.href = "javascript:void(0);";
            cartCheckOut.disabled = true;
            cartCheckOut.classList.add("isDisabled");
        }
    }
    
}

async function deleteFromCart( event, reload=false ){

    let atcId = event.target.dataset.atcid;
    let pId = event.target.dataset.pid; 

    const body = {
        "type": "deleteFromcart",
        "cartId" : atcId,
        "productId": pId
    }

    let result = await fetch("_headers/website_requests/delete_from_cart_and_wishlist.php",{
                    method: "POST",
                    headers: {'Content-Type': 'application/json'}, 
                    body: JSON.stringify( body )
                });

                
    if( result.status === 200 ){

        if( reload ){
            window.location.reload();
        }

        // Geting the price of the product to remove from total price
        let prodPrice = event.target.parentElement.querySelector(".price").querySelector("span").innerText;
        cartTotal.innerHTML = Math.round( parseFloat( cartTotal.innerText ) - parseFloat( prodPrice ) );

        // Removing from DOM
        event.target.parentElement.remove();

        // Call cartToDOM function inorder to check for enabling or disabling the checkout
        cartToDOM();

    }

    let jsonResponse = await result.json();
                
    Toast.fire({
      icon: jsonResponse.icon,
      titleText: jsonResponse.titleText,
      "text": jsonResponse.text
    });
    
    

}

async function updateCartQuantity( event, callBackType ){
    let inputSelector = event.target.parentElement.querySelector(".quantity");

    if( inputSelector.value === "1" && callBackType === "stepDown" ){
        return null;
    }

    if( inputSelector.value === inputSelector.max && callBackType === "stepUp" ){
        return null;
    }

    ( callBackType === 'stepUp' )?
        event.target.parentNode.querySelector('input[type=number]').stepUp() :
        event.target.parentNode.querySelector('input[type=number]').stepDown() ;

    const payLoad = {
        productId: inputSelector.dataset.productId,
        cartId: inputSelector.dataset.cartId,
        quantity: parseInt( inputSelector.value )
    };
    
    let result = await fetch("_headers/website_requests/update_cart_quantity.php",{
                    method: "POST",
                    headers: {'Content-Type': 'application/json'}, 
                    body: JSON.stringify( payLoad )
                });

    if( result.status !== 200 ) {

        ( callBackType === 'stepUp' )?
            event.target.parentNode.querySelector('input[type=number]').stepDown() :
            event.target.parentNode.querySelector('input[type=number]').stepUp() ;

        let jsonResponse = await result.json();

        Toast.fire({
            icon: jsonResponse.icon,
            titleText: jsonResponse.titleText,
            "text": jsonResponse.text
        });

        return null;
    }

    let productPrice = parseFloat( inputSelector.dataset.price );
    let priceSelector = event.target.parentElement.parentElement.parentElement.querySelector(".price").querySelector("span");
    
    if( callBackType === 'stepUp' ){
        priceSelector.innerText = Math.round( parseFloat( priceSelector.innerText ) + productPrice );
        cartTotal.innerText = Math.round( parseFloat( cartTotal.innerText ) + productPrice );
    } else {
        priceSelector.innerText = Math.round( parseFloat( priceSelector.innerText ) - productPrice );
        cartTotal.innerText = Math.round(  parseFloat( cartTotal.innerText ) - productPrice );
    }
    

}

// Close other menu display except the clicked one
function handelIconClick( event ){

    var id = event.target.id;
    event.target.classList.toggle("menubar-icon-active");
    // console.log( event );
    iconsAndItsRelativeDisplays.forEach( item => {
        if( id != item.iconId ){
            if( item.icon.className.split(' ').indexOf('menubar-icon-active') > -1 ){
                item.icon.classList.toggle("menubar-icon-active");
                item.relation.classList.toggle('active');
                ( item.icon.id === "menu-bars" ) ? menu.classList.toggle('fa-times') : null;
            }
        }
    });

}


function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}


// document.addEventListener("visibilitychange", ( event ) => {

//     if ( document.visibilityState == "visible") {

        // Adding interval for announcemnt slide
        // announcement_slider_setinterval = setInterval( 
        //     announcement_slider, 
        //     announcement_slider_timeout    
        // );

        // console.log( Date.now() + " : visible" );

    // } else if( document.visibilityState == "hidden" ) {
        // console.log( Date.now() + " : invincible");
        // Removing interval for announcemnt slide when user is not in the window
        // clearInterval( announcement_slider_setinterval );

    // }

// });


// const allHoverImages = document.querySelectorAll('.hover-container div img');
// const imgContainer = document.querySelector('.img-container');

// window.addEventListener('DOMContentLoaded', () => {
//     allHoverImages[0].parentElement.classList.add('active');
// });

// allHoverImages.forEach((image) => {
//     image.addEventListener('mouseover', () =>{
//         imgContainer.querySelector('img').src = image.src;
//         resetActiveImg();
//         image.parentElement.classList.add('active');
//     });
// });

// function resetActiveImg(){
//     allHoverImages.forEach((img) => {
//         img.parentElement.classList.remove('active');
//     });
// }

// // Product-view page

// var acc = document.getElementsByClassName('accordion');
// var i;
// var len = acc.length;
// for( i = 0; i < len; i++ ){
//     acc[i].addEventListener( 'click', function() {

//         this.classList.toggle( 'active' );
//         var panel = this.nextElementSibling;

//         if( panel.style.maxHeight ){
//             panel.style.maxHeight = null;

//         } else {
//             panel.style.maxHeight = panel.scrollHeight + 'px';
//         }
//     } )
// }
