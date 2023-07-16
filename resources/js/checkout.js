var button = document.querySelector('#submit-button');

braintree.dropin.create({
    authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
    selector: '#dropin-container'
}, function (err, instance) {
    button.addEventListener('click', function () {
        instance.requestPaymentMethod(function (err, payload) {
            // Submit payload.nonce to your server
            // LA CHIAMATA AZIOS è SOLO UN PLACEHOLDER
            const url = this.API_URL_BASE + this.API_SPONSORED
            axios
                .get(url)
                .then(response => {
                    if (response.data.success) {
                        this.doctorsSponsored = response.data.doc_info;
                    } else {
                        this.doctorsSponsored = []
                    }
                })
                .catch(error => {
                    this.error = error.message
                })
        });
    })
});