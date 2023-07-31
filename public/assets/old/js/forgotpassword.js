function forgotPassword(){
    Swal.fire({
        title: 'Enter Your Email!',
        html: `<input type="email" id="email" class="swal2-input" placeholder="Email">`,
        confirmButtonText: 'Submit',
        focusConfirm: false,
        preConfirm: async () => {
            const email = Swal.getPopup().querySelector('#email').value;

            if (!email) {
                Swal.showValidationMessage(`Please enter email`);
            } else {

                const body = {
                    email,
                    "process" : true
                };

                let result = await fetch('_headers/forgot_password.php',{
                    method: "POST",
                    headers: {'Content-Type': 'application/json'}, 
                    body: JSON.stringify( body )
                });  
                
                if( result.status === 200 ){

                    Toast.fire({
                        icon: 'success',
                        titleText: 'Success!',
                        text: `Email has been sent to " ${email} "`
                    });

                    return { email }

                }

                let jsonResponse = await result.json();

                Swal.showValidationMessage( jsonResponse.text );

            }

        }
    })
    .then( result => {
        
        Swal.fire({
            title: `We Have Sent A Code To <br>" <strong>${ result.value.email }</strong> "`,
            html: `
                <input type="text" id="code" class="swal2-input" placeholder="Enter Code">
                <input type="hidden" id="email" class="swal2-input" value="${result.value.email}">
            `,
            confirmButtonText: 'Submit',
            focusConfirm: false,
            preConfirm: async () => {
                const code = Swal.getPopup().querySelector('#code').value;
                const email = Swal.getPopup().querySelector('#email').value;
                if( !code ){
                    Swal.showValidationMessage(`Please enter code`);
                } else {

                    const body = {
                        email,
                        code
                    };

                    let result = await fetch('_headers/forgot_password.php',{
                        method: "POST",
                        headers: {'Content-Type': 'application/json'}, 
                        body: JSON.stringify( body )
                    });

                    if( result.status === 200 ){

                        Toast.fire({
                            icon: 'success',
                            titleText: 'Success!',
                            text: `Code Validation Successful`
                        });

                        return { email, code }

                    }

                    
                    let jsonResponse = await result.json();

                    Swal.showValidationMessage( jsonResponse.text );

                }
            }
        })
        .then( result => {

            Swal.fire({
                title: `Enter The New Password`,
                html: `
                    <input type="password" id="password" class="swal2-input" placeholder="Enter Password">
                    <input type="hidden" id="email" class="swal2-input" value="${result.value.email}">
                    <input type="hidden" id="code" class="swal2-input" value="${result.value.code}">
                `,
                confirmButtonText: 'Submit',
                focusConfirm: false,
                preConfirm: async () => {
                    const code = Swal.getPopup().querySelector('#code').value;
                    const email = Swal.getPopup().querySelector('#email').value;
                    const password = Swal.getPopup().querySelector('#password').value;
                    
                    if( !password ){
                        Swal.showValidationMessage(`Please enter password`);
                    } else {

                        const body = {
                            email,
                            code,
                            password
                        };

                        let result = await fetch('_headers/forgot_password.php',{
                            method: "POST",
                            headers: {'Content-Type': 'application/json'}, 
                            body: JSON.stringify( body )
                        });

                        if( result.status === 200 ){

                            Toast.fire({
                                icon: 'success',
                                titleText: 'Success!',
                                text: `Password Updated successfully!`
                            });

                            return { email: email }

                        }

                        
                        let jsonResponse = await result.json();

                        Swal.showValidationMessage( jsonResponse.text );

                    }
                }
            })

        }) 

    });
}