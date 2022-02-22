var form = document.querySelector('#my-sample-form');
var submit = document.querySelector('input[type="button"]');

// GET CART ARRAY
var cart = JSON.parse(localStorage.getItem("cart"));
console.log(cart, 'log 1');

var restaurant = JSON.parse(localStorage.getItem('restaurant'))
console.log(restaurant);

// TARGET DOM CART LIST
var cart_list = document.getElementById('cart_list');
console.log(cart_list, 'log 2');

// COUNT PLATE DUPLICATES TO SET COUNTER
var countsObject = cart.reduce(
    (acc, value) => ({
        ...acc,
        [value.name]: (acc[value.name] || 0) + 1,
    }),
    {}
);
console.log(countsObject, 'log 3');
 
// GET PLATE NAMES
var products = Object.keys(countsObject)
console.log(products, 'log 4');

//GET PLATE COUNTS
var counts = Object.values(countsObject)
console.log(counts , 'log counts');


//Assign to DOM element
if (products != '') {

    cart_list.insertAdjacentHTML('afterbegin',
        `<li class="list-group-item d-flex justify-content-between align-items-center lh-condensed"><h5 class='m-0'>${restaurant.restaurant_name}</h5>
            <h5 class='d-flex align-items-center justify-content-end m-0'>
                <input type="hidden" name="restaurant_id" readonly class=" form-control-plaintext p-0" id="restaurant_id" value="${restaurant.id}">
            </h5>
        </li>`
    )
    
    
    for (let i = 0; i < products.length; i++) {
        //GET PLATE INFO THROUGH NAME FIND
        var product = cart.find(product => product.name == products[i]);
        console.log(product, 'log 5');
        cart_list.insertAdjacentHTML('beforeend',
            ` <li class= "list-group-item d-flex justify-content-between lh-condensed" >
                <div>
                    <h6 class="my-0 fw-bold">${ product.name }</h6>
                    <small class=" d-flex align-items-center">
                        Quantit&aacute;: 
                        <input type="text" name="plates[${product.id}]" readonly class="form-control-plaintext ps-1" id="count" value="${counts[i]}" data-id='${product.id}'>
                    </small>
                </div>
                <span class="text-muted">&euro;${Math.round(((product.price * counts[i]) + Number.EPSILON) * 100)/100}</span>
                </li >`
        )
    }
    var total = 0
    for (let i = 0; i < cart.length; i++) {
        total = total + parseFloat(cart[i].price)

        

    }
    cart_list.insertAdjacentHTML('beforeend', 
        `<li class="list-group-item d-flex justify-content-between align-items-center lh-condensed"><h5 class='m-0'>Totale:</h5>
            <h5 class='d-flex align-items-center justify-content-end m-0'>
                &euro;
                <input type="text" name="total" readonly class=" form-control-plaintext p-0" id="total" value="${Math.round((total + Number.EPSILON) * 100) / 100}">
            </h5>
        </li>`
    )
} else {
    cart_list.insertAdjacentHTML('beforeend', `<em class="text-danger">Il carrello e vuoto</em>`)
}






braintree.client.create({
    authorization: 'sandbox_38b6pcrv_9xyqb7hxsmjp4hsm'
}, function (err, clientInstance) {
    if (err) {
        console.error(err);
        return;
    }

    // Create input fields and add text styles  
    braintree.hostedFields.create({
        client: clientInstance,
        styles: {
            'input': {
                'color': '#282c37',
                'font-size': '16px',
                'transition': 'color 0.1s',
                'line-height': '3'
            },
            // Style the text of an invalid input
            'input.invalid': {
                'color': '#E53A40'
            },
            // placeholder styles need to be individually adjusted
            '::-webkit-input-placeholder': {
                'color': 'rgba(0,0,0,0.6)'
            },
            ':-moz-placeholder': {
                'color': 'rgba(0,0,0,0.6)'
            },
            '::-moz-placeholder': {
                'color': 'rgba(0,0,0,0.6)'
            },
            ':-ms-input-placeholder': {
                'color': 'rgba(0,0,0,0.6)'
            },
            // prevent IE 11 and Edge from
            // displaying the clear button
            // over the card brand icon
            'input::-ms-clear': {
                opacity: '0'
            }
        },
        // Add information for individual fields
        fields: {
            number: {
                selector: '#card-number',
                placeholder: '1111 1111 1111 1111'
            },
            cvv: {
                selector: '#cvv',
                placeholder: '123'
            },
            expirationDate: {
                selector: '#expiration-date',
                placeholder: '10 / 2019'
            }
        }
    }, function (err, hostedFieldsInstance) {
        if (err) {
            console.error(err);
            return;
        }

        hostedFieldsInstance.on('validityChange', function (event) {
            // Check if all fields are valid, then show submit button
            var formValid = Object.keys(event.fields).every(function (key) {
                return event.fields[key].isValid;
            });

            if (formValid) {
                $('#button-pay').addClass('show-button');
            } else {
                $('#button-pay').removeClass('show-button');
            }
        });

        hostedFieldsInstance.on('empty', function (event) {
            $('header').removeClass('header-slide');
            $('#card-image').removeClass();
            $(form).removeClass();
        });

        hostedFieldsInstance.on('cardTypeChange', function (event) {
            // Change card bg depending on card type
            if (event.cards.length === 1) {
                $(form).removeClass().addClass(event.cards[0].type);
                $('#card-image').removeClass().addClass(event.cards[0].type);
                $('header').addClass('header-slide');

                // Change the CVV length for AmericanExpress cards
                if (event.cards[0].code.size === 4) {
                    hostedFieldsInstance.setAttribute({
                        field: 'cvv',
                        attribute: 'placeholder',
                        value: '1234'
                    });
                }
            } else {
                hostedFieldsInstance.setAttribute({
                    field: 'cvv',
                    attribute: 'placeholder',
                    value: '123'
                });
            }
        });

            var forms = document.querySelector('.needs-validation')

                    submit.addEventListener('click', function (event) {
                        forms.checkValidity()

                        if (forms.checkValidity()) {
                            hostedFieldsInstance.tokenize(function (err, payload) {
                                if (err) {
                                    console.error(err);
                                    return;
                                }
    
                                // This is where you would submit payload.nonce to your server
                                // alert('Submit your nonce to your server here!');
    
                                document.querySelector('#nonce').value = payload.nonce;
                                document.getElementById("user_info").submit();
    
                            });
                        
                        }

                        else if (!forms.checkValidity()) {
                            // document.getElementById('client_phone').reportValidity();
                            // document.getElementById('client_address').reportValidity();
                            // document.getElementById('client_email').reportValidity();
                            // document.getElementById('client_lastname').reportValidity();
                            // document.getElementById('client_name').reportValidity();
                            forms.reportValidity();
                        } 


    
                    

                    }, false)
                    
                // })


        // }, false);
    });
});