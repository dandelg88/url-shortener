window.shorter = {
    shortUrl: () => {
        let originalUrl = document.querySelector('#original-url').value;

        if(shorter.validateUrl(originalUrl)) {
            axios.post('/generate_url', {
                original_url: originalUrl
            })
            .then( response => {
                document.querySelector('#original-url').value = '';
                document.querySelector('#shor-url-container').classList.remove('hidden');
                document.querySelector('#shor-url-container').classList.add('flex');
                document.querySelector('#short-url').value = response.data.short_url;
            })
            .catch( error => { console.log(error); });
        }
    },

    copyUrl: () => {
        let shortUrl = document.querySelector('#short-url');
        shortUrl.select();
        shortUrl.setSelectionRange(0,99999);
        document.execCommand('copy');
    },

    validateUrl: url => {
        let status = true;

        if(url.trim == '') {
            status= false;
            alert('Debe ingresar una URL');
        }

        if(!validUrl.isWebUri(url)) {
            status = false;
            alert('Ingrese una URL valida');
        }

        return status;
    }
}
