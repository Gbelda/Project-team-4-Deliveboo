const { remove } = require("lodash");

//GET TOKEN FROM COOKIES
function getCookie(name) {
    function escape(s) { return s.replace(/([.*+?\^$(){}|\[\]\/\\])/g, '\\$1'); }
    var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));
    return match ? match[1] : null;
}
var token = getCookie('token');


var form = document.querySelector('#my-sample-form');
var submit = document.querySelector('#button-pay');

var restaurant = JSON.parse(localStorage.getItem('restaurant'))

 
printCart();



function printCart() {

    // GET CART ARRAY
    var cart = JSON.parse(localStorage.getItem('cart'));


    // TARGET DOM CART LIST
    var cart_list = document.getElementById('cart_list');

    // COUNT PLATE DUPLICATES TO SET COUNTER
    var countsObject = cart.reduce(
        (acc, value) => ({
            ...acc,
            [value.name]: (acc[value.name] || 0) + 1,
        }),
        {}
    );

    // GET PLATE NAMES
    var products = Object.keys(countsObject)

    //GET PLATE COUNTS
    var counts = Object.values(countsObject)

    // PRINT ON HTML DOM
    cart_list.innerHTML = '';
    if (products != '') {

        cart_list.insertAdjacentHTML('afterbegin',
            `<li class="list-group-item d-flex justify-content-between align-items-center lh-condensed bg-brand">
                <h5 class='m-0'>${restaurant.restaurant_name}</h5>
                <input type="hidden" name="restaurant_id" readonly class=" form-control-plaintext p-0" id="restaurant_id" value="${restaurant.id}">
                <div class="btn" id='remove_all'>
                    <i class="fa-solid fa-trash-can"></i>
                </div>
            </li>`
        )
        
        
        for (let i = 0; i < products.length; i++) {

            //GET PLATE INFO THROUGH NAME FIND
            var product = cart.find(product => product.name == products[i]);

            
            cart_list.insertAdjacentHTML('beforeend',
                ` <li class= "list-group-item d-flex justify-content-between lh-condensed" >
                    <div>
                        <h6 class="my-0 fw-bold text-start">${ product.name }</h6>
                        <small class=" d-flex align-items-center">
                            Quantit&aacute;: 
                            <input type="text" name="plates[${product.id}]" readonly class="form-control-plaintext ps-1" value="${counts[i]}" data-id='${product.id}'>
                    <div>
                    <button class="btn btn_meno brand-color fw-bold reduce reduce_${i}">
                      <i class="fa-solid fa-minus"></i>
                    </button>
                    <button class="btn bg-brand btn_piu add add_${i}">
                      <i class="fa-solid fa-plus"></i>
                    </button>
                    </div>
                        </small>
                    </div>
                    <div class="d-flex flex-wrap justify-content-center">
                        <span class="fw-bold">&euro;${Math.round(((product.price * counts[i]) + Number.EPSILON) * 100)/100}</span>
                        <small>
                            <em class="clear clear_${i}">
                            Rimuovi tutto
                            </em>
                        </small>
                    </div>
                    </li >`
                    
            )

        }
    
        var total = 0
        for (let i = 0; i < cart.length; i++) {
            total = total + parseFloat(cart[i].price)
        }
    
        cart_list.insertAdjacentHTML('beforeend', 
            `<li class="bg_title_price list-group-item d-flex justify-content-between align-items-center lh-condensed"><h5 class='m-0'>Totale:</h5>
                <h5 class='d-flex align-items-center justify-content-end m-0'>
                    &euro;
                    <input type="text" name="total" readonly class="brand-color form-control-plaintext p-0" id="total" value=" ${Math.round((total + Number.EPSILON) * 100) / 100}">
                </h5>
            </li>`
        )

    } else {
        cart_list.insertAdjacentHTML('beforeend', `<em class="text-danger text-center">Il carrello e vuoto</em>`)
    }

    // ADD QUANTITY FUNCTION
    var add_button = document.getElementsByClassName('add');
    for (let i = 0; i < products.length; i++) {
        add_button[i].addEventListener('click', function () {
            var product = cart.find(product => product.name == products[i]);
            cart.push(product);
            cart.sort((a, b) => parseFloat(a.price) - parseFloat(b.price));
            localStorage.setItem('cart', JSON.stringify(cart))
            printCart();
        })
    }

    //REDUCE QUANTITY FUNCTION
    if (cart!='') {
        var reduce_button = document.getElementsByClassName('reduce');
        for (let i = 0; i < products.length; i++) {
            reduce_button[i].addEventListener('click', function () {
            var product = cart.find(product => product.name == products[i]);
            var index = cart.indexOf(product)
                if (index > -1) {
                    cart.splice(index, 1);
                }
                localStorage.setItem('cart', JSON.stringify(cart))
                printCart();
            })
            
        }
    }

    //REMOVE PRODUCT
    if (cart != '') {
        var clear_button = document.getElementsByClassName('clear');
        for (let i = 0; i < products.length; i++) {
            clear_button[i].addEventListener('click', function () {
                var product = cart.find(product => product.name == products[i]);
                var index = cart.indexOf(product)
                if (index > -1) {
                    cart.splice(index, counts[i]);
                }
                localStorage.setItem('cart', JSON.stringify(cart))
                printCart();
            })
        }
    }

    //REMOVE ALL
    if (cart!='') {
        var remove_button = document.getElementById('remove_all')
        remove_button.addEventListener('click', function () {
            cart = [];
            localStorage.setItem('cart', JSON.stringify(cart))
            printCart();
        })
    }
}


braintree.client.create({
    authorization:token
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
    
                                document.querySelector('#nonce').value = payload.nonce;
                                document.getElementById("user_info").submit();
                                $("#loader").modal('show',{ backdrop: 'static', keyboard: false });
    
                            });
                        
                        }

                        else if (!forms.checkValidity()) {
                            forms.reportValidity();
                        } 


    
                    

                    }, false)
                    
    });
});