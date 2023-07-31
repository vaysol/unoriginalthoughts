// Code by non existing person
function typeSelect( event ){
    const url = window.location;
    const params = new URLSearchParams( url.search );
    if( event.target.value === "-1" ){
        params.delete( event.target.name );
        window.location.href = `${url.origin}${url.pathname}.php?${params.toString()}`;
        return;
    }
    if( params.has( event.target.name ) ){
        params.delete( event.target.name );
    }
    params.append( event.target.name, event.target.options[ event.target.selectedIndex ].value );
    window.location.href = `${url.origin}${url.pathname}.php?${params.toString()}`;
}

window.onload = () => {
    document.getElementById("productDesc").style.maxHeight = document.getElementById("productDesc").scrollHeight + 'px';
}

// Code by keerthana
const plus = document.querySelector(".plus"),
minus = document.querySelector(".minus"),
num = document.querySelector(".num");

let a = 1;
plus.addEventListener( "click", ()=>{
    a++;
    if( a > 10 ){
        a--;
        return;
    }
    a = ( a < 10 ) ? "0" + a : a;
    num.innerText = a;
    // console.log(a);
} );

minus.addEventListener( "click", ()=>{
    if ( a > 1 ) {
        a--;
        a = ( a < 10 ) ? "0" + a : a;
        num.innerText = a;
    }
} );

// Product-view page

var acc = document.getElementsByClassName('accordion');
var i;
var len = acc.length;
for( i = 0; i < len; i++ ){
    acc[i].addEventListener( 'click', function() {

        this.classList.toggle( 'active' );
        var panel = this.nextElementSibling;

        if( panel.style.maxHeight ){
            panel.style.maxHeight = null;

        } else {
            panel.style.maxHeight = panel.scrollHeight + 'px';
        }
    } )
}